---
author: admin
comments: true
date: 2013-04-22 16:35:19+00:00
layout: post
slug: enigmail-und-openpgp-inv_recp-0-0x008d5dbc
title: 'Enigmail und OpenPGP: INV_RECP 0 0x008D5DBC'
wordpress_id: 1572
categories:
- Tools
tags:
- Encrypted
- Enigmail
- GPG
---

Vor kurzem habe ich, zugegeben aus Langeweile, mal wieder OpenPGP im Thunderbird installiert. Dazu habe ich mir auch gleich einen neuen Key generiert und den alten danach in den Ruhestand geschickt, Backup erstellt und aus der Keychain entfernt.




Beim Senden trat nun aber ein unschöner Fehler auf: INV_RECP 0 0x008D5DBC




Offensichtlich versuchte er hier partout noch mit meinem alten Key die Nachricht zu verschlüsseln und zu signieren. Die Lösung: in den Accounteinstellungen unter OpenPGP Security den neuen Standardkey auswählen:




![Enigmail Key Settings](http://andydunkel.net/assets/uploads/2013/04/EnigMailKeySetting.png)




Anschließend klappt nun alles.

----------

# Alte Kommentare #

### Hauke Laging says:	
April 28, 2013 at 18:44	

"Dazu habe ich mir auch gleich einen neuen Key generiert"

Na, hoffentlich ist der neue dann auch ein guter Schlüssel… :-)
	
### Eduard says:	
August 2, 2013 at 14:49	

Ich hatte dasselbe Problem, ein anderes Symptom war die Meldung “Der Schlüssel 0xXXXXX wurde nicht gefunden oder ist ungültig. Der (Unter-)Schlüssel könnte abgelaufen sein”.

Deine Lösung hat mein Problem gelöst. Dankeschön!
	
### Lothar says:	
August 5, 2013 at 18:22	

Danke für die Lösung. Bei mir war kein Schlüssel, sondern die eMail-Adresse abgegeben.
Grund: Es war nur ein öffentlicher Schlüssel importiert, aber kein eigenes Schlüsselpaar vorhanden.

Schlüsselpaar erzeugt, jetzt klappt es.
	
### M E says:	
August 15, 2013 at 01:23	

Auf diese Stelle wäre ich nicht im Traum gekommen.

Danke!
	
### Frederik says:	
September 22, 2013 at 10:28	

Klasse! Nun klappt wieder alles. Was eine dämliche Fehlermeldung ohne Mehrwert ;) Gruß aus Bielefeld
	
### Theodore M Rolle, Jr. says:	
September 27, 2013 at 03:12	

From beautiful Clyde, North Carolina, USA (http://www.townofclyde.com)
Thank you for the solution.
It got me up and running.
German is rusty, but I got enough to fix Enigmail…the screenshot is especially helpful.
Ted
