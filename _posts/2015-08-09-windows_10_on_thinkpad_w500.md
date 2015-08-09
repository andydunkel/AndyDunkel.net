---
author: admin
comments: true
date: 2015-08-09 17:00:00+00:00
layout: post
slug: windows_10_auf_lenovo_thinkpad_w500_installieren
title: 'Windows 10 auf Lenovo Thinkpad W500'
categories:
- Computer
tags:
- Windows
- Thinkpad

---

# Windows 10 auf Lenovo Thinkpad W500


**English Version below.**

Vor kurzem habe ich mein Thinkpad W500 auf Windows 10 geupdated. Die Installation lief ohne Probleme durch und auch fast alle Treiber wurden installiert. Fast alle: nur die Grafikkarte machte Probleme. Das Thinkpad besitzt eine ATI Fire GL 5700 und eine integrierte Grafikeinheit von Intel.

Beim ersten Start von Windows stimmte die Auflösung nicht und die Grafikkarte wurde als "Microsoft Basic Graphics Display" erkannt. Nach einiger Zeit besserte sich die Situation, Windows hat aus dem Internet den Treiber für die Intel-Grafikkarte nachgeladen. Damit war zumindest die korrekte Auflösung einstellbar.

Prinzipiell benötige ich die 3D-Leistung der ATI-Grafikkarte nicht, aber leider funktioniert der Display-Port-Anschluss nicht mit der Intel-Grafikkarte. Damit ließe sich mein externes Display nicht mehr am Laptop betreiben. Keine Option.

Wenig später wurde erneut ein Treiber nachgeladen, leider führte dieser dazu, dass der Bildschirm dauerhaft schwarz blieb. Auch nach dem Neustart. Ein Boot in den abgesicherten Modus offenbarte das Dilemma. Die ATI-Grafikkarte wurde als Radeon 3650 erkannt. Obwohl diese beiden Chips ungefähr baugleich sind, funktionierte der Treiber nicht in Verbindung mit dem Intel-Grafikchip.

### Die Lösung

Die Lösung überhaupt ein Bild angezeigt zu bekommen lag nun darin, die Intel-Grafik im Bios abzustellen. Hierzu stellt man die Einstellung auf “Discrete”. Und siehe da, immerhin zeigte Windows wieder ein Bild ein. Leider nur bis zum nächsten Neustart. Ein Blick ins Bios: Windows hat die eben gemachte Einstellung rückgängig gemacht. Hierfür gibt es eine weitere Option, welches dem Betriebssystem die Anpassung der Einstellung erlaubt. 

![](/assets/uploads/2015/8/w500_1.jpg)

Obwohl damit nun wieder ein Bild angezeigt wurde, funktionierte der falsche Treiber für die Radeon 3650 nicht korrekt. Die Auflösung des Displays und externen Monitors stimmte nicht und ließ sich auch nicht einstellen.

Leider gibt es auch keinen Windows 10 Treiber für die ATI Fire GL 5700. Was tun? Also als letzten Versuch den Windows 7 Treiber von der Lenovo Homepage geladen und mit Windows-Kompatibilitätseinstellungen installiert. Und siehe da, plötzlich lief alles wieder. Die Grafikkarte wurde korrekt im Gerätemanager angezeigt, die richtige Auflösung war verfügbar und auch der externe Monitor über Display-Port funktionierte wieder.

Damit läuft auch Windows 10 auf dem etwas betagten Gerät endlich ohne Probleme.

![](/assets/uploads/2015/8/w500_2.jpg)


## English Version

Some days ago I installed Windows 10 on my Lenovo Thinkpad W500. The installation had no problems, except no graphic drivers where installed. Just some “Basic Microsoft Display Adapter”. However with that thing you cannot set the correct resolution and most likely cannot use any special functions of the graphics card.
After some time Windows automatically adjusted the display resolution, as in the background the driver for the Intel graphics card was installed.

The W500 has two graphic chips. An ATI Fire GL 5700 and an Intel graphic chip. The main problem with the Intel chip is, that the Display Port is not working with this option. 
Some time later another driver was installed, but this time the display turned black. Even after restart the screen remained black.

Starting Windows in Safe Mode made the problem visible. The ATI graphics was detected as Radion 3650 graphics. However this did not work well in combination with the Intel graphics. 

### Solution

The solution was to disable the Intel graphic card in the computers Bios. There is also an option that allows Windows to set this value, turn this off too. Otherwise Windows will reset the value and you will have a black screen again.

After that, at least Windows was showing the screen again. However the correct graphics resolution could not be set with the Radeon 3650 driver. What to do? Since there is no official driver for this graphic chip for Windows 10, I downloaded the Windows 7 driver from Lenovo’s homepage and installed those in compatibility mode. After that and a restart the graphic card was detected correctly and the resolution was set correctly. Both on the Laptops screen and on the external display.

Now Windows 10 runs without any further problems on the device!
