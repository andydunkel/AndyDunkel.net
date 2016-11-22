---
author: admin
comments: true
date: 2016-11-22 17:00:00+00:00
layout: post
slug: c_sharp_nicht_lokalisierte_backgroundworker_und_threads
title: 'Mehrsprache C# Anwendungen - nicht lokalisierte Backgroundworker und Threads'
categories:
- Coding
tags:
- C#

---

Vor einiger Zeit habe ich beschrieben, wie man [C#-Anwendungen lokalisieren](//andydunkel.net/coding/2015/07/04/c_sharp_anwendungen_mehrsprachig.html) kann.

Die Sprache kann man z.B. so im Code festlegen:

	CultureInfo myCultureInfo = new CultureInfo("en");
	Thread.CurrentThread.CurrentCulture = myCultureInfo;
	Thread.CurrentThread.CurrentUICulture = myCultureInfo;

Allerdings reicht dies nicht in allen Fällen aus. So trat das Problem auf, dass in Backgroundworkern und Threads in meinen Logik-Klassen, immer die deutschen Texte verwendet worden sind:

![](/assets/uploads/2016/11/trans_error1.png)

Hier sollte eigentlich der Text in englischer Sprache aus der Resourcendatei kommen.

## Lösung

Die Lösung ist einfach, zumindest ab .net Version 4.5. Hier fügt man einfach die folgenden zwei Zeilen dem ursprünglichen Code hinzu:

	CultureInfo.DefaultThreadCurrentCulture = myCultureInfo;
	CultureInfo.DefaultThreadCurrentUICulture = myCultureInfo;

Der Code bewirkt das auch andere Threads und damit auch die Backgroundworker die richtige Sprache verwenden.

![](/assets/uploads/2016/11/trans_error1.png)