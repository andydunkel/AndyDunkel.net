---
author: admin
comments: true
date: 2016-04-28 17:00:00+00:00
layout: post
slug: hp_compaq_dc7800_soundcard
title: 'hP Compaq DC 7800 - kein Sound'
categories:
- Computer
tags:
- Computer
- Soundcard

---

Mein Arbeitsrechner für Windows ist ein älterer HP Compaq DC 7800. Hat gebraucht gerade mal 60 Euro gekostet, SSD rein die ich noch rumliegen hatte und etwas gebrauchten RAM und schon rennt die Kiste.

![](/assets/uploads/2016/4/hp0.jpg)

Windows 10 läuft ebenfalls super auf der Kiste. Mache damit alles was anfällt. Surfen, Programmieren, Bildbearbeitung, Videobearbeitung, Zocken.

Vor kurzem habe ich noch eine neue Grafikkarte eingebaut, da die alte die hohe Auflösung von meinem Monitor nicht unterstützt hat.

Irgendwann habe ich festgestellt, dass die interne Soundkarte nicht funktioniert. Ist mir nicht gleich aufgefallen, da der Monitor eine Soundbar mit integrierter USB-Soundkarte hat. 

Erst dachte ich, ok Windows 10 hat keinen Treiber dafür. Nach etwas Nachforschen bin ich aber drauf gekommen, dass wohl der Einbau der Grafikkarte dafür gesorgt hat, dass die Onboard-Soundkarte deaktiviert worden ist.

Nachdem ich diese im Bios (F10 beim Start drücken) wieder aktiviert hatte, funktionierte es wieder ohne Probleme. 

![](/assets/uploads/2016/4/hp1.png)

Hintergrund ist, dass die Grafikkarte ebenfalls eine interne HDMI-Soundkarte installiert und dadurch die vom Mainboard deaktiviert hat.