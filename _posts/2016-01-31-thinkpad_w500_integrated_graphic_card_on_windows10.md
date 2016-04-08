---
author: admin
comments: true
date: 2016-01-31 17:00:00+00:00
layout: post
slug: thinkpad_w500_integrated_graphic_card_on_windows_10
title: 'Thinkpad W500 - Integrierte Grafikkarte - Treiber für Windows 10'
categories:
- Windows
- Computer
tags:
- Thinkpad
- W500
- Linux
- Windows

---

*English Version below*

Mein Thinkpad W500, mit SSD und 6GB RAM, ist immer noch eine veritable Workstation für alles was ich so mache. Neuere Notebooks haben leider oft auch noch eine kleinere Displayauflösung als das W500. Deswegen hoffe ich, dass ich das Ding noch eine ganze Weile verwenden kann. Windows 10 läuft ebenfalls ohne Probleme, wenn man von etwas Treiberproblemen absieht. Aber die sind lösbar. 

Leider liefert Lenovo keine neuen Treiber für das Notebook. Man will da [lieber neue Geräte verkaufen](http://www.heise.de/newsticker/meldung/Lenovo-Chef-Windows-10-Gratis-Upgrade-war-ein-Fehler-3067578.html), als sich um den alten Kram zu kümmern. Übrigens läuft Linux ohne Probleme.

Hauptsächlich macht die Grafikkarte Probleme. hier gibt es keinen Treiber für Windows 10. Ich hatte bereits geschrieben, wie man die [ATI Fire GL 5700 Grafikkarte](http://andydunkel.net/computer/2015/08/09/windows_10_on_thinkpad_w500.html) unter Windows 10 zum Laufen bekommt. Dies funktioniert auch problemlos, allerdings läuft dann immer die ATI-Grafikkarte. Diese verbraucht allerdings mehr Strom, was zu geringerer Akkulaufzeit führt.

Also die integrierte Grafik im Bios aktiviert. Linux bootet ohne Probleme, unter Windows wird erstmal nur der Standardtreiber installiert. Bei der integrierten Grafik handelt es sich um einen "Intel Graphics Media Accelerator 4500MHD"-Grafikkarte. Leider gibt es von Haus aus keinen Treiber für Windows 10. Auch hier führt der Weg über den Windows 7 Treiber zum Erfolg. Nach mehreren Versuchen mit diversen Treibern, die nicht funktioniert haben (ließen sich gar nicht installieren), habe ich den folgenden Treiber von der Intel-Webseite ausprobiert [Win7Vista_64_151717bb.zip](https://downloadcenter.intel.com/download/18402).

Statt diesen über das Setup zu installieren, habe ich den manuell über den Gerätemanager ausgewählt. Im Gerätemanager die Eigenschaften des Video-Adapters anzeigen lassen und dann dort Treiber aktualisieren auswählen.

![](/assets/uploads/2016/1/intel_treiber.png)

Der Treiber befindet sich im Downloadarchiv im Unterordner "Graphics":

![](/assets/uploads/2016/1/intel_treiber1.png)

Gleich nach der Installation der erste Erfolg, Auflösung und Darstellung passen und der Gerätemanager meldet keine Probleme mehr. Leider musste ich kurz darauf feststellen, dass es doch noch zu Grafikproblemen kam. Ab und zu wurden Elemente von Windows mit Artefakten dargestellt:

![](/assets/uploads/2016/1/intel_grafikfehler.png)

Mein Verdacht war, dass der Treiber doch nicht so gut unter Windows 10 funktioniert. Das [Thinkpad-Wiki](http://thinkwiki.de/W500) brachte hier aber die Lösung:

>Artefakte beim Betrieb der Intel Grafikkarte in Verbindung mit zwei verschiedenen Arbeitsspeichermodulen und aktiviertem Intel VT-d

Und siehe da, kaum hatte ich dies im Bios deaktiviert, lief es ohne Probleme. Damit lässt sich nun auch die interne Grafik unter Windows nutzen. Wie sich das auf die Akkuleistung auswirkt muss ich noch testen. Das Notebook läuft zumindest mit weniger Lüfter und wird weniger warm, als mit der ATI-Grafikkarte. Wer die meiste Zeit am Notebook arbeitet und keine 3D-Leistung benötigt, spart so Strom und Akku. Momentan beim Tippen dieses Textes meldet Windows derzeit knappe 5 Stunden, mit Auslastung wird es weniger sein. Mit der ATI-Grafik bin ich mit Müh und Not auf 2,5 Stunden gekommen.

Für den Betrieb eines externen Monitors am Display-Port wird allerdings die ATI-Grafik benötigt.

--------------

# Thinkpad W500 - Use Integrated Graphic Card on Windows 100

My Thinkpad W500 is still a very powerful workstation for everything I am doing. New notebooks often lack the display resolution of the W500. Windows 10 is running without any problems, if you have solved the driver problems.

Lenovo does not provide any Windows 10 support for the W500. Selling new laptops seems more important for them than supporting older models. By the way: Linux runs without any problems. The biggest driver problem is the graphic card. There is no driver for Windows 10.

I wrote an [article](http://andydunkel.net/computer/2015/08/09/windows_10_on_thinkpad_w500.html) in the past how to get the "ATI Fire GL 5700 Grafikkarte running on Windows 10. This works without problems, however the ATI card needs a lot of power, which results in bad battery life.

To get more battery life I switched to the integrated graphics card in the Bios. Linux runs without problems, Windows does not have a driver for the "Intel Graphics Media Accelerator 4500MHD" and runs only the standard driver. As for the ATI card installing the Windows 7 driver is the solution. Finding the correct driver was a bit of an issue. Several drivers did not work, however the following worked: [Win7Vista_64_151717bb.zip](https://downloadcenter.intel.com/download/18402).

I did not install the driver with the Setup. In the device manager I selected the graphics card and installed the driver manually. After unzipping the driver package, you can find the driver in the "graphics" directory. See images above.

After installation the display resolution was correct and everthiny seemed fine. However I had some graphic issues, some windows where showing artifacts. Turned out that this happens, if you have different memory modules installed and Intel VT-d actived in the Bios. Deactivating VT-d in the Bios and everything worked fine.

![](/assets/uploads/2016/1/intel_grafikfehler.png)

Now I can use the integrated graphic card on Windows 10. How much more battery life I will get out of that, I have not tried yet. But first tests showed that the fan is running much less and the noteboo is much cooler. Currently Windows is saying something about 5 hours of battery life. With the ATI card is was usually 2,5 hours. For using an external display the ATI graphic card must be actived. The display port is only working with the ATI graphic card.