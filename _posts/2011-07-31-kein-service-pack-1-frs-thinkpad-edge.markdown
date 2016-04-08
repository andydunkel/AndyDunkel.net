---
author: admin
comments: true
date: 2011-07-31 11:43:00+00:00
layout: post
slug: kein-service-pack-1-frs-thinkpad-edge
title: Kein Service Pack 1 fürs ThinkPad Edge
wordpress_id: 827
categories:
- Sonstiges
tags:
- Edge
- Intel
- SP1
- Thinkpad
- Treiber
- Windows
---

Service Pack 1 für Windows 7 gibt es ja schon eine Weile. Allerdings wollte das SP1 im Windows Update auf meinem Thinkpad Edge nie auftauchen. Hat mich erst mal nicht weiter gekümmert, irgendwie schwang da die Hoffnung mit das sich das Problem irgendwann selbst löst. Hat es natürlich nicht.

![image](http://andydunkel.net/assets/uploads/2011/07/image28.png)

Auch manuelles herunterladen vom SP1 hat außer 3 Stunden Zeitverschwendung nichts gebracht.

[![image](http://andydunkel.net/assets/uploads/2011/07/image_thumb5.png)](http://andydunkel.net/assets/uploads/2011/07/image29.png)

Nun war guter Rat teuer.

<!-- more -->

Also Google angeworfen und siehe da, anscheinend ist ein veralteter Grafikkartentreiber von Intel schuld. Genau genommen, die Versionen von 8.15.10.2104 bis 8.15.10.2141.

Wie findet man raus welche Version man installiert hat? Startmenü öffnen und “dxdiag” eintippen. Dort klickt man dann auf Grafik und sieht auf der rechten Seite die Version des Grafikkartentreibers (hier bereits die aktuelle Version):

![image](http://andydunkel.net/assets/uploads/2011/07/image30.png)

Also von Lenovo die neue Version des Treibers geladen und schon zeigt das Windows Update das Service Pack 1 an:

![image](http://andydunkel.net/assets/uploads/2011/07/image31.png)
