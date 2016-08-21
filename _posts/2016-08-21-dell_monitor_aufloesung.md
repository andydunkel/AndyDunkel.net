---
author: admin
comments: true
date: 2016-08-21 17:00:00+00:00
layout: post
slug: Dell_U2515H_monitor_aufloesung
title: 'Dell U2515H  Monitor mit voller Auflösung betreiben'
categories:
- Windows
- Computer
tags:
- Monitor
- Windows

---

Letztes Jahr hatte ich mir einen [Dell U2515H Monitor](http://amzn.to/2aZ8K84) gekauft. Dieser hat eine maximale Auflösung von 2560x1440 Pixel, also mehr als die normalen Full-HD-Monitore. 

Der Monitor ist top. Beim Programmieren kann man den zusätzlichen Platz gut gebrauchen. Das Bild ist super. Es gibt 2 HDMI-, 2 Displayport- und einen Mini-Display-Port-Eingang. Leute wie ich, können also ihren ganzen Computerzoo da anschließen. Ein USB-Hub ist ebenfalls integriert. Mittels [USB-Umschalter](http://ekiwi-blog.de/?p=2511), kann ich so alles zwischen den Computern umschalten.

Der Monitor hat 24 Zoll. Damit ist er recht kompakt und nimmt nicht soviel Platz auf dem Schreibtisch weg. Vorher hatte ich einen 27 Zoll Display mit gleicher Auflösung. Das war mir zu klobig. Zusätzlich lässt sich [eine Soundbar anschließen](http://amzn.to/2b1VFuu). Diese macht ganz guten Ton; reicht mir zum Musikhören, gelegentlichen Zocken und Skypen aus. So spare ich den Platz von zusätzlichen Lautsprechern auf dem Schreibtisch.

Probleme hatte ich allerdings mit der Auflösung. Windows bot mir die Auflösung gar nicht erst an. Schluss war bei 2048x1152 Pixeln. Meine Computer sind schon etwas älter. Bei einem neueren Computer + Grafikkarte sind keine Probleme zu erwarten.

## Neue Grafikkarte

Zuerst habe ich die Grafikkarte ersetzt. Viel Geld wollte ich dafür nicht ausgeben. Es ist eine [Zotac GT 210 ZT mit GeForce-Chip](http://amzn.to/2bp59AH) geworden. Die Karte ist passiv gekühlt und lässt sich auch als Low-Profile einbauen. Die maximale Aufläsung wird mit 2560x1600 Pixel angegeben. Sollte also reichen.

Die Performance ist für Office-Kram und Programmieren mehr als OK. Ältere Spiele, wie z.B. Left 4 Dead, laufen auch flüssig.

Die Grafikkarte hat zwei Anschlüsse, einmal HDMI und einmal DVI. Leider kein Display-Port, was für den Monitor perfekt wäre, aber da gibt es in der Preisklasse nix.
 

## Das richtige DVI- oder HDMI-Kabel

Nachdem die Grafikkarte eingebaut worden ist, die große Ernüchterung. Trotzdem war keine höhere Auflösung  möglich. Stellt sich heraus, dass das richtige DVI- bzw. HDMI-Kabel verwendet werden muss. Hier gibt es Unterschiede. 

Zuerst bei DVI. Hier muss es sich um ein [Dual-Link-Kabel](http://amzn.to/2b1SyD2) handeln. Bei vielen Kabeln fehlen Pins, die haben dann nur Single-Link. Dies sieht man direkt, wenn man sich den Stecker anschaut. 

![](/assets/uploads/2016/8/dvi.jpg)

Interessanterweise kosten die Dual-Link-Kabel nichtmal viel mehr und man fragt sich, warum überhaupt andere Kabel hergestellt werden.

Auch beim [HDMI-Kabel](http://amzn.to/2bC4hWM) hatte ich anfangs kein Glück. Ich hatte anfangs das von der Xbox genommen. Darüber ging jedoch auch nur maximal Full-HD-Auflösung. Für die Xbox reicht es, hier nicht. Die Lösung ist hier ein Kabel zu kaufen, welches [HDMI 1.4](http://amzn.to/2bC4hWM) unterstützt.

Was gar nicht funktioniert sind Kabel von HDMI auf Display-Port. Diese funktionieren nur in umgekehrter Richtung, also der Computer hat Display-Port und der Monitor hat HDMI. Ansonsten bleibt das Bild schwarz.


## Auflösung im Grafikkartentreiber einrichten

Nachdem auch die Kabel als Ursache ausgeschlossen werden konnten, bot Windows immer noch nicht die richtige Auflösung an. Hier hilft es dann im Grafikkartentreiber die Auflösung manuell anzulegen:

![](/assets/uploads/2016/8/einstellung0.png)
![](/assets/uploads/2016/8/einstellung1.png)
![](/assets/uploads/2016/8/einstellung2.png)


## Fazit

Nachdem dann alles passte, funktionierte die Grafikkarte mit dem Monitor ohne Probleme. Auch ein späteres anschließen eines weiteren Monitors (mit Full-HD-Auflösung) war kein Problem. Schafft die Grafikkarte ohne Probleme.



