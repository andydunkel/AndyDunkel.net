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

Ich war auch einigermaßen froh, dass sich unter Ubuntu die Owncloud-Software direkt mit “apt-get install owncloud” einrichten ließ. Bis vor ein paar Tagen.

## Daten einspielen

Ob ich nur Glück hatte oder ob die Daten auch einfach hätten überschrieben werden können und damit weg wären, kann ich leider gar nicht mehr sagen. In jedem Fall lagen die bisherigen Daten unter:

	/var/lib/owncloud/data

	/var/www/owncloud/data

Prinzipiell kann man zwar das Passwort via E-Mail zurücksetzen, allerdings habe ich bei meinem Account dummerweise keine E-Mail-Adresse hinterlegt. 

	cd /var/www/owncloud/

	sudo ./occ user:resetpassword admin

	sudo chmod +x occ

## Fazit

Auch wenn nun alles wieder lief, ist es natürlich sehr nervig, wenn Software einfach so ohne großartige Benutzerinteraktion bei einem Update deinstalliert wird. 