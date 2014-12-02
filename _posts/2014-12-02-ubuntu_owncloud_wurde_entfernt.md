---
author: admin
comments: true
date: 2014-12-02 17:00:00+00:00
layout: post
slug: owncloud_automatische_deinstallation_nach_update
title: 'Owncloud - automatische Deinstallation unter Ubuntu und Passwort zurücksetzen'
categories:
- Linux
tags:
- Owncloud
---

Das es unter Linux ab und zu mal etwas Gefrickel ist, diverse Dinge und Dienste einzurichten und in Betrieb zu halten ist ja nix neues. Für die Synchronisierung von Kontakten und Kalender verwende ich Owncloud. Dieses lief anfangs auf einem Raspberry Pi, mittlerweile auf einem etwas größeren Server der mit Ubuntu arbeitet.

Ich war auch einigermaßen froh, dass sich unter Ubuntu die Owncloud-Software direkt mit “apt-get install owncloud” einrichten ließ. Bis vor ein paar Tagen.Da kam ich auf die Idee, dass man ja mal die neuesten Updates einspielen kann. Eigentlich Routine. Im Laufe der Einrichtung wurde mir dann lapidar mitgeteilt, dass in der installierten Version von Owncloud eine Sicherheitslücke vorhanden ist und man Owncloud deswegen einfach deinstalliert hat.**Bravo!**Der Aufruf im Browser brachte die Gewissheit, in der Tat war Owncloud einfach weg. IPhone und Thunderbird synchronisierten sich auch gleich brav und so leerten sich Kontakte und Kalender auf den Geräten. Auch war nicht klar, ob die Daten auch gleich mit “deinstalliert” worden sind.Nachdem der erste Ärger verflogen war,  machte ich mich daran Owncloud neu zu installieren. Dies gelang auch recht flott. Allerdings begrüßte mich die neueste Version mit dem Assistenten zur Neueinrichtung. Im Besten Fall wären also alle Daten weg? Zum Glück nicht.

## Daten einspielen

Ob ich nur Glück hatte oder ob die Daten auch einfach hätten überschrieben werden können und damit weg wären, kann ich leider gar nicht mehr sagen. In jedem Fall lagen die bisherigen Daten unter:

	/var/lib/owncloud/dataDie neue Installation legte die Datenbank jedoch unter:

	/var/www/owncloud/dataan. Also habe ich einfach das bisherige Datenverzeichnis einfach über die neuen drüberkopiert. Die Datenbank wurde auch brav erkannt beim nächsten Aufruf. Inklusive der Option zum Datenbankupgrade auf die aktuelle Version. Hier sei noch erwähnt, dass ich SQLite als Datenbank verwende. Bei MySQL ist das nochmal etwas anders.Allerdings konnte ich mich danach nicht mehr einloggen. Trotz richtiger Zugangsdaten.## Passwort zurücksetzen

Prinzipiell kann man zwar das Passwort via E-Mail zurücksetzen, allerdings habe ich bei meinem Account dummerweise keine E-Mail-Adresse hinterlegt. Zum Glück gibt es die Möglichkeit das Passwort auf der Kommandozeile zurückzusetzen. Hierfür wechselt man in das Owncloud-Verzeichnis:

	cd /var/www/owncloud/Mit dem folgenden Befehl kann das Passwort neu gesetzt werden:

	sudo ./occ user:resetpassword adminBei mir war die Datei standardmäßig “nicht ausführbar”, was zu einer Fehlermeldung führte. Hier hilft dann folgender Befehl weiter:

	sudo chmod +x occ

## Fazit

Auch wenn nun alles wieder lief, ist es natürlich sehr nervig, wenn Software einfach so ohne großartige Benutzerinteraktion bei einem Update deinstalliert wird. Für mich war es in erster Linie nervig, da nur ich die Synchronisation mit dem Server nutze. Wer das ganze für seine Familie oder gar professionell nutzt steht da erstmal recht dumm da und darf sich mit sicher schnell mit jeder Menge Supportanfragen herumärgern. Zumindest eine Abfrage ob die Software wirklich entfernt werden soll wäre hier hilfreich. 