---
author: admin
comments: true
date: 2011-08-03 18:18:00+00:00
layout: post
slug: windows-7-service-pack-1-unbekannter-fehler-0x8004401e
title: Windows 7 Service Pack 1-Unbekannter Fehler 0x8004401e
wordpress_id: 839
tags:
- '0x8004401e'
- Inplace
- Installation
- Problem
- SP1
- Upgrade
- Windows
---

Tja, nach meinem letzten Eintrag [zum Thema](https://andydunkel.net/sonstiges/2011/07/31/kein-service-pack-1-frs-thinkpad-edge.html), war ich recht optimistisch. Aber denkste, zwar tauchte das Service Pack nun in der Liste der Updates auf, lud herunter und tat so, als ob es sich installierte.

Beim nächsten Neustart wurde dann wieder ein Fehler festgestellt und die Installation zurückgerollt:

**Unbekannter Fehler 0x8004401e**

[![image](https://andydunkel.net/assets/uploads/2011/08/image_thumb.png)](https://andydunkel.net/assets/uploads/2011/08/image.png)

Na toll, Google und Foren gaben zum Thema nicht viel her. Außer probiere mal Voodoo XY, installiere Windows neu, deinstalliere alle Treiber und installiere alle neu, mit Linux wäre das nicht passiert…

Irgendwie ließ sich dann das ganze auf “fehlerhafte Systemdateien” eingrenzen. Welche, keine Ahnung. Aber es wurde in “Inplace Upgrade” empfohlen. Dies hat letztendlich auch die Lösung gebracht.

**Nun aber zur Lösung:**


<!-- more -->


Eins vorneweg: ob das wirklich für alle, welche das Problem haben, die Lösung ist, kann ich nicht sagen. Auf jeden Fall sollte man vorher seine Daten sichern.

Prinzipiell bleiben beim "Inplace Upgrade" alle Daten und Programme erhalten. Lediglich Windows wird neu drüberinstalliert. 

Zuerst legt man eine Windows DVD ein. Wer keine hat, kann sich ein Image aus dem Internet ziehen ([Infos z.B. hier](http://stadt-bremerhaven.de/windows-7-dvd-als-iso-downloaden)). Wichtig, die DVD muss den gleichen Stand haben wie das installierte Windows, d.h. ohne Service Pack in diesem Fall.

Dann geht man auf Arbeitsplatz und das DVD-Laufwerk öffnet die DVD und klickt auf die **setup.exe**:

![image](https://andydunkel.net/assets/uploads/2011/08/image1.png)

Anschließend klickt man auf “Jetzt installieren”. Dann  geht’s weiter:

![image](https://andydunkel.net/assets/uploads/2011/08/image2.png)

[![image](https://andydunkel.net/assets/uploads/2011/08/image_thumb1.png)](https://andydunkel.net/assets/uploads/2011/08/image3.png)

Updates wollen wir keine machen und wir machen ein “Upgrade”.

Dann legt er auch schon los. Dauert eine Weile, Neustart, Weiterinstallation.

Nachdem das ganze fertig war, hat dann auch die Service Pack 1 Installation geklappt.

Tada:

![image](https://andydunkel.net/assets/uploads/2011/08/image4.png)
