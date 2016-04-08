---
author: admin
comments: true
date: 2011-08-10 06:00:00+00:00
layout: post
slug: der-befehl-ping-konnte-nicht-gefunden-werden
title: Der Befehl “ping” konnte nicht gefunden werden
wordpress_id: 890
categories:
- Tools
tags:
- command
- found
- ipconfig
- not
- ping
- tracert
---

Windows schafft es auch nach vielen Jahren mich zu überraschen. Diesmal auf der Kommandozeile, die man ab und zu mal braucht um Befehle wie “ping”, “ipconfig” oder ein “tracert” abzusetzen.

Nun wollte Windows keine dieser Befehle mehr kennen:

[![image](http://andydunkel.net/assets/uploads/2011/08/image_thumb6.png)](http://andydunkel.net/assets/uploads/2011/08/image12.png)

**Was kann man tun?**

<!-- more -->

Nach etwas Überlegungszeit war mein erster Ansatz die PATH Umgebungsvariable. Diese legt fest, welche Pfadinhalte überall verfügbar sind auf der Kommandozeile. Und siehe da, dort waren die Windows-Systemverzeichnisse nicht mehr drinnen, in denen die kleinen Tools liegen.

Hier nun die Abhilfe: Zuerst in die Systemsteuerung gehen, dort dann auf “System” und anschließend auf “Erweiterte Systemeinstellungen”:

![image](http://andydunkel.net/assets/uploads/2011/08/image13.png)

Dort klickt man dann auf den Button “Umgebungsvariablen” woraufhin sich dann dieser schöne Dialog öffnet:

![image](http://andydunkel.net/assets/uploads/2011/08/image14.png)

Nun einfach zur Variable “path” scrollen und bearbeiten klicken. Bei mir haben dann die folgenden Einträge gefehlt:

> %SystemRoot%\system32;%SystemRoot%;%SystemRoot%\System32\Wbem;%SYSTEMROOT%\System32\WindowsPowerShell\v1.0\

Diese fügt man nun einfach am Ende der Liste hinzu (Trennung der Einträge mit Semikolon. Die bestehenden Einträge nicht löschen.

Anschließend ist auch Windows wieder lieb:

![image](http://andydunkel.net/assets/uploads/2011/08/image15.png)

Leider konnte ich keine Ursache herausfinden, warum die Einträge weg waren. Meine Vermutung liegt in einer fehlerhaften Installation eines anderen Programms.
