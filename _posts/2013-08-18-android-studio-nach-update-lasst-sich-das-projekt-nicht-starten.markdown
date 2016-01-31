---
author: admin
comments: true
date: 2013-08-18 10:16:24+00:00
layout: post
slug: android-studio-nach-update-lasst-sich-das-projekt-nicht-starten
title: 'Android Studio: Nach Update lässt sich das Projekt nicht starten'
wordpress_id: 1610
categories:
- Coding
---

Heute wurde mir ein Update für Android Studio angezeigt. Also Update heruntergeladen und installiert. Wie immer erwartet man da natürlich Probleme mit bestehenden Projekten. :-)




War natürlich der Fall: 



    
    Gradle: <br></br>FAILURE: Could not determine which tasks to execute.<br></br>* What went wrong:<br></br>Task 'assemble' not found in root project 'SomeProject'.<br></br>* Try:<br></br>Run gradle tasks to get a list of available tasks.



    
    Could not execute build using Gradle installation <br></br>'/Users/da/.gradle/wrapper/dists/gradle-1.6-bin/.../gradle-1.6'.




Die Lösung ist in der *.iml Datei (liegt im Root-Verzeichnis, den folgenden Inhalt herauszulöschen:




![Raus Damit](http://andydunkel.net/assets/uploads/2013/08/RausDamit.png)
