---
author: admin
comments: true
date: 2017-10-14 10:00:00+00:00
layout: post
slug: netzwerk_port_monitoring_mit_wireshark
title: 'Port Monitoring mit Wireshark und Netgear Switch'
categories:
- Computer
- Software

tags:
- Netgear
- Wireshark
- Entwicklung
- SPS
- Steuerung

---
<img src="/assets/uploads/2017/10/netgear_logo.jpg" class="imagelogo">

Mittels Wireshark die Netzwerkkommunikation mitzuschneiden ist kein Problem, wenn man direkt auf dem System arbeiten kann, welches die Netzwerkkommunikation regelt. Anders sieht es aus, wenn die Kommunikation zwischen zwei anderen Geräten stattfindet auf denen man Wireshark nicht mitlaufen lassen kann. Dies können z.B. Steuerungssysteme sein, welche über Ethernet untereinander kommunizieren.

<!--more-->

Früher war das kein Problem, damals gab es Hubs. Diese senden eingehende Datenpakete einfach auf allen Ports wieder raus. Switche sind intelligenter und senden das Paket nur auf dem Zielport wieder raus. Somit bekommen wir am gleichen Switch normal nichts von der Kommunikation mit.

Die Lösung ist ein managebarer Switch. Auf diesem können wir Ports definieren die als Spiegelport fungieren und ein sogenanntes Portmirroring betreiben. Kurz formuliert werden alle Datenpakete der anderen Ports hier nochmal ausgegeben. An diesem Port hängt nun unser Computer mit Wireshark und kann so die Kommunikation mitschnüffeln.


![](/assets/uploads/2017/10/netgear0.jpg)

Ein managebarer Switch ist etwas teurer als die billige Variante. In dem Beispiel verwende ich einen Netgear GS110 TP. Dieser kostet knapp 130 Euro. Managebare Switche haben den Vorteil, dass man unzählige Einstellungen in einer Weboberfläche vornehmen kann. 

Im ersten Schritt melden wir uns an der Weboberfläche des Switches an. Dies geschieht über einen Webbrowser. Dort gibt es nun den Unterpunkt "Monitoring" und dort finden wir auch den Unterpunkt "Port Mirroring". Das war einfach! :-)


![](/assets/uploads/2017/10/netgear1.png)

In dem Beispiel oben sind bereits Ports für Port-Mirroring konfiguriert. Die Ports 2 bis 4 werden auf Port 1 gespiegelt. Man kann festlegen ob man nur die Empfangsrichtung (Rx), die Senderichtung (Tx) oder beides gespiegelt haben möchte. Im Normalfall wählt man beides aus.

Einen weiteren Port kann man einfach hinzufügen:


![](/assets/uploads/2017/10/netgear2.png)

Die Einstellung wird mit "Apply" übernommen. Der Button befindet sich perfiderweise am äußeren Bildschirmrand und kann daher leicht übersehen werden.

Sind die Ports eingerichtet, kann man nun auf dem an Port 1 angeschlossenen Rechner mittels Wireshark die Kommunikation mitlesen.


![](/assets/uploads/2017/10/netgear3.png)

*Beispiel: Logging von ModbusTCP zwischen SPS und Steuerung*
