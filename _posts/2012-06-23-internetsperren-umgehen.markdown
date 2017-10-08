---
author: admin
comments: true
date: 2012-06-23 17:53:00+00:00
layout: post
slug: internetsperren-umgehen
title: Internetsperren umgehen
wordpress_id: 1381
categories:
- Sonstiges
- Tools
tags:
- DNS
- Sperre
- VPN
---

Ich bin momentan für einige Zeit in Irland, schön, Internet und WLAN gibt es in der Unterkunft überall. Unschön, der Internetzugang ist gefiltert und nicht alle Dienste stehen zur Verfügung, kein Remotedesktop zu meinen Servern, kein MSN Messenger, Sperre für einige Webseiten. Uncool!

[![IMG_20120621_182013](https://andydunkel.net/assets/uploads/2012/06/IMG_20120621_182013_thumb.jpg)](https://andydunkel.net/assets/uploads/2012/06/IMG_20120621_182013.jpg)

**So geht es natürlich nicht.** Die erste Idee, einfach ein VPN einrichten, z.B. über [SwissVPN](http://www.swissvpn.net/). Die bieten für ne schmale Mark VPN Dienste an. Monatlich kaufbar, ohne weitere Verpflichtungen und Anmeldungen.

Erstes Problem, die Seite von SwissVPN ist schon mal gesperrt:

[![image](https://andydunkel.net/assets/uploads/2012/06/image_thumb.png)](https://andydunkel.net/assets/uploads/2012/06/image.png)

Sieht nach einer einfachen DNS-Sperre aus, also ändern wir fix den DNS-Server in den Einstellungen vom Mac:

![image](https://andydunkel.net/assets/uploads/2012/06/image1.png)

8.8.8.8 ist ein freier DNS-Server von Google. Wer Google nicht traut, findet im Netz jede Menge andere. Anschließend kann man schon mal jede beliebige Webseite aufrufen. Auch SwissVPN:

[![image](https://andydunkel.net/assets/uploads/2012/06/image2.png)](http://www.swissvpn.net/)

Meine Empfehlung: SwissVPN bietet einen Testzugang an, damit kann man vorher testen ob VPN Pakete von irgendeiner Firewall geblockt oder gefiltert werden. Den sollte man vorher ausprobieren. Bei mir hat es geklappt, also fix 2 Monate VPN eingekauft, die VPN Einstellungen im System vorgenommen und schon waren alle Dienste und Internet freigeschaltet.

Für den Fall, dass die VPN Pakete nicht durchkommen, bietet SwissVPN auch noch einen VPN-Dienst auf OpenVPN-Basis und Port 443 (https) an. 
