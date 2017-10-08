---
author: admin
comments: true
date: 2013-05-30 09:06:23+00:00
layout: post
slug: windows-8-aktivierung-produktkey-wird-nicht-angenommen
title: Windows 8 Aktivierung - Produktkey wird nicht angenommen
wordpress_id: 1587
categories:
- Windows
tags:
- Aktivierung
- ProductKey
- Windows 8
---

Ich habe letztes Jahr zugeschlagen und mir eine günstige Windows 8 Lizenz gekauft. Benutzen tue ich das nur in VMware um meine Software zu testen. Die Bedienung vom neuen Windows, naja. Aber das ist ein anderes Thema.




Nun wollte Windows aktiviert werden, trotz gültigem Product-Key. Es kam immer die Meldung:




> 

> 
> Mit dem Product Key stimmt etwas nicht. Bitte überprüfen Sie ihn, und versuchen Sie es noch mal, oder verwenden Sie einen anderen Key.
> 
> 





![Key ungültig](https://andydunkel.net/assets/uploads/2013/05/no_valid_key.png)




Eine typische Microsoft-Fehlermeldung also. :-)




Meine Vermutung war, dass es sich um eine Update-Lizenz handelt und dies Probleme gibt, wenn man diese nicht über ein bestehendes Windows drüber installiert. Ich habe natürlich eine Windows 7 Lizenz, aber ich hatte damals wenig Lust erst ein Windows 7 in der VM zu installieren und dann auf Windows 8 zu updaten. 




Zum Glück gibt es eine Lösung über die Registry. Und da sage man mal Windows sei einfacher als Linux. 




Also fix den Registry-Editor öffnen:






  * Windows-Taste + R drücken


  * "regedit" eintippen und Enter


  * Registrys-Shlüssel suchen: KEY_LOCAL_MACHINE/Software/Microsoft/Windows/CurrentVersion/Setup/OOBE


  * Wert "MediaBootInstall" von 1 auf 0 setzen:




![Registry bearbeiten](https://andydunkel.net/assets/uploads/2013/05/registry.png)




Damit die Änderungen übernommen werden, muss man noch die Admin-Eingabeaufforderung starten. Mit dem neuen Bedienkonzept von Windows gar nicht so intuitiv wie früher. Im Kachelmenü "Eingabeaufforderung" eintippen. Dann Rechtsklick auf den Eintrag:




![Eingabeaufforderung](https://andydunkel.net/assets/uploads/2013/05/eingabeaufforderung.png)




Und dann als Administrator starten:




![Als Admin ausführen](https://andydunkel.net/assets/uploads/2013/05/runas.png)




Nun noch "slmgr /rearm" in die Konsole eintippen und es erfolgt eine Meldung, dass man neu starten solle. Nach dem Neustart war dann das Windows auch gleich aktiviert. Wenn nicht, die Prozedur über die Systemsteuerung wiederholen.




![slrmgr /rearm](https://andydunkel.net/assets/uploads/2013/05/slrmgr.png)
