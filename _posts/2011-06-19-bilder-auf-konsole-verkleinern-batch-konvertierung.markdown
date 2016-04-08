---
author: admin
comments: true
date: 2011-06-19 13:20:00+00:00
layout: post
slug: bilder-auf-konsole-verkleinern-batch-konvertierung
title: Bilder auf Konsole verkleinern / Batch Konvertierung
wordpress_id: 487
categories:
- Tools
tags:
- Batch
- Bilder
- ImageMagick
- Konvertierung
- verkleinern
---

Bilder von modernen Digi-Cams sind recht groß. Will man diese per E-Mail verschicken oder ins Internet hochladen ist es oft sinnvoll diese verkleinern. Nur wie macht man das am Besten bei vielen Bildern? Abhilfe schafft [ImageMagick](http://www.imagemagick.org/script/index.php), kostenlose OpenSource Software. Unter Windows muss man diese erst noch installieren, unter Linux ist diese meist schon installiert.

Das ganze geht dann mit dem Befehl “**mogrify -resize 800 *.JPG**” den man einfach in dem Verzeichnis auf der Konsole eingibt wo die Bilder sind.

![image](http://andydunkel.net/assets/uploads/2011/06/image3.png)

<!-- more -->

Die Bilder haben anschließend eine Breite von 800 Pixel, die Höhe wird automatisch gesetzt.

**Achtung! Die Bilder werden in dem Verzeichnis überschrieben.**

Daher sollte man die Dateien vorher kopieren. ![Smiley](http://andydunkel.net/assets/uploads/2011/06/wlEmoticon-smile4.png)

Damit ich den Befehl von überall auf der Konsole aufrufen kann, habe ich den Pfad in die “Path” Umgebungsvariable aufgenommen:

![image](http://andydunkel.net/assets/uploads/2011/06/image4.png)
