---
author: admin
comments: true
date: 2017-07-17 17:00:00+00:00
layout: post
slug: linux_alte_kernel_entfernen
title: 'Ubuntu Linux Festplatte aufräumen - Alte Kernel entfernen'
categories:
- Linux
- Software

tags:
- Ubuntu
- Linux

---
<img src="/assets/logos/logo_linux.jpg" class="imagelogo">

Ich habe ein Ubuntu in einer virtuellen Maschine laufen. Als beim letzten Update die Klage kam, dass der Speicherplatz voll wahr, musste ich der Sache mal nachgehen. Installiert hatte ich nichts neues und auch keine großen Datenmengen kamen dazu. Am Ende hat sich herausgestellt, dass bei jedem Update des Kernels der alte Kernel im System verblieben ist.

Dies hat natürlich auf Dauer dazu geführt, dass die 30 GB Speicher der VM langsam voll liefen. 

<!--more-->

Da man diese alten Kernel im Normalfall nicht mehr braucht, kann man diese entfernen. Warum das nicht gleich automatisch passiert, keine Ahnung. Im ersten Schritt installieren wir den Synaptic Package Manager:

	sudo apt-get install synaptic

Nach dem Start des Package Managers, filtert man die Kernel in der Suche durch Eingabe von <code>linux-image</code>. In meinem Fall wurden jede Menge ältere Kernel angezeigt. Diese markiert man anschließend zum Entfernen:
	
![](/assets/uploads/2017/7/linux1.png)

Hier sollten nur ältere Versionen entfernt werden. Die aktuell verwendete Version sollte man natürlich behalten. Durch Eingabe von <code>uname -r</code> im Terminal kann man den aktuell verwendeten Kernel ermitteln.

![](/assets/uploads/2017/7/linux2.png)

Anschließend übernimmt man die Einstellungen. Es folgt die Deinstallation. Bei mir hat die Deinstallation am Ende satte 6 GB mehr freien Speicher eingebracht.