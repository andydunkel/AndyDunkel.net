---
author: admin
comments: true
date: 2013-12-05 17:00:00+00:00
layout: post
slug: exfat_truecrypt_volume
title: 'exFAT für TrueCrypt Volume nutzen'
categories:
- Windows
- Linux
- Mac
- Tools
tags:
- truecrypt
- exfat
---

Externe Festplatten und USB-Sticks verschlüssele ich meist mit TrueCrypt. Geht der Datenträger verloren, kann man zumindest recht sicher sein, dass niemand etwas mit den Daten anfangen kann. Da ich privat Windows, OSX und Linux nutze, stellt sich die Frage, welches Dateisystem man verwendet. Schließlich will ich von allen Betriebssystemen problemlos darauf zugreifen können.

Die beste Lösung in Dateisystemform kommt von Microsoft und nennt sich [exFat](http://de.wikipedia.org/wiki/ExFAT#exFAT). Windows kann es ab XP lesen, OSX hat auch keine Probleme damit und auch Linux lässt sich problemlos dazu [überreden](https://andydunkel.net/linux/2012/12/18/exfat-unter-ubuntu-nutzen.html).

Der Vorteil von exFat ist die Möglichkeit der Speicherung von Dateien größer 4GB. Leider bietet TrueCrypt keine Möglichkeit bei der Erstellung von Containern exFat zu nutzen. Entweder das alte FAT oder NTFS. 

Macht aber nix, exFat lässt sich trotzdem nutzen: Zuerst wird der TrueCrypt Container ganz normal erstellt und formatiert. 

![]({{ site.url }}/assets/uploads/2013/12/truecrypt/true_format.png)

Nachdem der Container erstellt wurde, mountet man ihn. Nun kann man das geöffnete Laufwerk mit dem exFat-Dateisystem formatieren. Im Explorer geht dies allerdings nicht, hier erlaubt Windows das exFat-Dateisystem nur für mobile Datenträger.

Über die Eingabeaufforderung (Windows-Taste und dann CMD eingeben), lässt sich das Laufwerk dann mit exFat-Dateisystem ausstatten:

	format <drive letter>: /FS:exfat /Q

![]({{ site.url }}/assets/uploads/2013/12/truecrypt/true_format2.png)

