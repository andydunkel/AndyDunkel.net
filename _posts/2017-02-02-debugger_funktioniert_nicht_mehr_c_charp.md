---
author: admin
comments: true
date: 2017-02-01 17:00:00+00:00
layout: post
slug: debugger_geht_nicht_mehr_c_sharp
title: 'Visual Studio - Debugger geht nicht mehr'
categories:
- Coding
- Programmierung
tags:
- Csharp
- Coding
- Debugger

---

Was tun, wenn der Debugger nicht richtig funktioniert? Ich hatte das Problem, dass der Debugger innerhalb Threads und in Verbindung mit Code aus verschiedenen Projekten nicht mehr wollte. Es wurden keine Autos, keien Lokals und auch keine überwachten Variablen mehr angezeigt.

Stattdessen wurde nur der Fehler "Internal error in the expression evaluator" angezeigt. Auch mit der Maus über der Variable bleiben half nix.

![](/assets/uploads/2017/2/debugger1.png)

Den genauen Grund was da los ist, habe ich nicht herausgefunden. Aber ich habe es zumindest wieder zum Laufen bekommen. In meinem Fall musste ich "Used Managed Compatibility Mode" in den Einstellungen des Debuggers aktivieren:

![](/assets/uploads/2017/2/debugger1.png)

Und siehe da, schon ging es wieder:

![](/assets/uploads/2017/2/debugger1.png)