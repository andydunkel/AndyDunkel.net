---
author: admin
comments: true
date: 2014-10-29 17:00:00+00:00
layout: post
slug: airsonos_airplay_fuer_sonos
title: 'AirSonos - Airplay für Sonos mit dem Raspberry Pi'
categories:
- Raspberry
- Linux
tags:
- Sonos
- Linux
---

Vor kurzem habe ich mir ein [Sonos Play1](http://www.sonos.com/shop/products/play1) zugelegt. Mein Kumpel Kiwi besitzt dieses bereits eine Weile und hat [das hier](http://blog.ekiwi.de/?p=1927) vor einiger Zeit bereits getestet. Gegen Hardware und Technik ist nichts einzuwenden. Die Klang ist gut und die App funktioniert zuverlässig. Leider ist das auch der einzige Knackpunkt am Sonos-System: ohne Sonos-App kein Abspielen von Inhalten. 
Problemlos funktioniert dies für vorhandene Inhalte auf dem Smartphone oder Tablett. Radiosender und diverse Musikdienste lassen sich ebenfalls über die App nutzen.

![image](https://andydunkel.net/assets/uploads/2014/10/sonos.jpg)

IOS- und Mac-User, wie ich, vermissen die Unterstützung für Airplay. Diese erlaubt die Wiedergabe aus jeder App. Ich verwende [Instacast](http://vemedio.com/products/instacast) als Podcastapp auf meinem Telefon. Mit dieser läuft jedoch nichts in Sachen Sonos. 

Die Lösung in diesem Fall heißt [AirSonos](https://github.com/stephen/airsonos): AirSonos ist ein, in [Node.js](http://nodejs.org/) geschriebener, AirPlay-Server, welche die Musik an das Sonos-System weiterleitet. Der Server läuft auf einem extra Rechner, welcher an das Heimnetzwerk angeschlossen sein muss. In Zeiten von Raspberry Pi und Co. ist damit zum Glück kein großer klobiger PC mehr notwendig. Die Software kommt zudem mit mehreren Lautsprechern im Netzwerk klar.

Legen wir los: Ich beschreibe Installation und Einrichtung unter [Raspbian](http://www.raspbian.org/) auf dem Raspberry Pi. Das ganze funktioniert aber auch mit etwas Variation auf anderen Linuxderivaten und Rechnertypen.

## Übertakten

Mit der Standardtaktfrequenz vom RPI funktionierte bei mir die Musikwiedergabe leider nicht flüssig. Deswegen ist die Empfehlung den Kleinen auf 1000 Mhz zu übertakten. Dies geschieht entweder direkt bei der Installation von Raspbian oder später durch einfaches Bearbeiten der entsprechenden Config-Datei:

     sudo vim /boot/config.txt

In der Config-Datei kommentiert man die folgenden Zeilen ein (# Symbol am Anfang entfernen):

     #Turbo
     arm_freq=1000
     core_freq=500
     sdram_freq=500
     over_voltage=6

Nach dem Neustart sollte der RPI in der neuen hohen Taktrate unterwegs sein.

Installation von AirSonos

Wie so oft beginnen wir die Installation mit einem Update der Paketquellen und der bereits installierten Software:

     sudo apt-get update
     sudo apt-get upgrade

Nun installieren wir noch ein paar Dinge:

     sudo apt-get install git-all libavahi-compat-libdnssd-dev

Es folgt Node.js, welches wir vorkompiliert herunterladen: 

     wget http://node-arm.herokuapp.com/node_latest_armhf.deb
     
und installieren:

     sudo dpkg -i node_latest_armhf.deb
     
Das Ganze dauert ein wenig, also geduldig sein. :-)
Im vorletzten Schritt folgt nun noch die Installation von AirSonos selbst:

     sudo npm install airsonos -g

Auch das dauert eine Weile. Unschön: bei mir kam es vor, dass der Vorgang mit der Fehlermeldung <code>npm ERR! cb() never called</code> abgebrochen wurde. Hier hat es geholfen den letzten Schritt einfach nochmal durchzuführen.

## Fertig!

Ist alles installiert und eingerichtet, kann man AirSonos starten:

     sudo airsonos

Es sollten nun alle Sonos-Lautsprecher im Netzwerk gefunden und aufgelistet werden:

	Searching for Sonos devices on network...
	Setting up AirSonos for Kitchen {192.168.1.108:1400}

Im IOS-Gerät der Wahl werden diese jetzt auch als AirPlay-Device angezeigt und können entsprechend genutzt werden.

![image](https://andydunkel.net/assets/uploads/2014/10/airplay.png)

Kleiner Schönheitsfehler, schließt man die Konsole zum Rechner beendet sich AirSonos. Dies kann man verhindern indem man den Prozess von der Konsole entkoppelt:

     $ airsonos & disown

Viel Spaß beim Ausprobieren!