---
author: admin
comments: true
date: 2013-01-29 20:03:32+00:00
layout: post
slug: steam-halflife-und-linux-error-initializing-main-frame-buffer
title: 'Steam, Halflife und Linux: Error initializing main frame buffer'
wordpress_id: 1553
categories:
- Linux
---

Vor kurzem wurde die Beta-Version vom Steam Client für Linux gestartet. Mittlerweile gibt es auch die Klassiker Halflife 1 und Counterstrike für Linux. 




Also flugs auf meinem Ubuntu Laptop installiert, die Spiele heruntergeladen und beim Start dann die Ernüchterung:




![Counter Strike Frame Buffer Error](http://andydunkel.net/assets/uploads/2013/01/CS_error_frame_buffer.png)




Eine richtige Lösung konnte ich auf die Schnelle nicht finden, aber zumindest einen Workaround um das Spiel im Fenstermodus zu starten:






  * Steam starten


  * Rechtsklick auf das Spiel


  * Einstellungen bzw. Propierties auswählen


  * Start Optionen / Start Options


  * dort "-window" hinzufügen (ohne Anführungszeichen)




Anschließend konnte das Spiel starten, wenn auch nicht ganz so schön mit Rahmen im Fenster.
