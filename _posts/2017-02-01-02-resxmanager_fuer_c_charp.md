---
author: admin
comments: true
date: 2017-02-01 17:00:00+00:00
layout: post
slug: resxmanager_uebersetzungs_werkzeug_fuer_c_sharp
title: 'ResXManager - Übersetzungstool für .net Anwendungen'
categories:
- Coding
- Programmierung
tags:
- Csharp
- Coding
- Internatiolization

---

Die Übersetzung von .net-Anwendungen ist in Visual Studio bereits ganz gut umgesetzt. Ich hatte bereits darüber geschrieben:

- [C#-Anwendungen mehrsprachig gestalten](http://www.andydunkel.net/coding/2015/07/04/c_sharp_anwendungen_mehrsprachig.html)
- [WPF-Anwendungen mehrsprachig](http://www.andydunkel.net/coding/2016/12/15/wpf_anwendungen_mehrsprachig.html)

Allerdings gibt es auch ein paar Schattenseiten. Die Übersetzungen sind in diverse Resourcendateien verteilt. Mit Visual Studio ist das Bearbeiten einfach möglich. Will man Übersetzungen extern machen lassen, ist das schwierig.

Auch mehrere Sprachen gleichzeitig zu übersetzen ist umständlich. Man muss jede Resourcendatei öffnen, die Texte anlegen und übersetzen.

In diese Bresche springt das kostenlose Plugin [ResXManager](https://resxresourcemanager.codeplex.com/). Es sammelt die Resourcen aus dem gesamten Projekt zusammen, welche anschließend in einer Liste gleich in alle Sprachen übersetzt werden kann. Auch werden fehlende Übersetzungen gleich farblich markiert. Somit können fehlende Texte und Lücken schnell indentifiziert werden.

![](/assets/uploads/2017/2/resx_1.png)

Export und späterer Import mit Excel ist möglich. Damit kann man die Übersetzungen jemand anderem überlassen.

Wer, wie ich, die Übersetzungen selbst machen muss, freut sich über Integration von Übersetzungsdiensten, wie Bing. Mit diesen kann man die Übersetzung ermitteln lassen. Man muss anschließend nur die Übersetzung überprüfen, sofern man der jeweiligen Sprache mächtig ist. Zumindest erleichtert dies schonmal jede Menge Arbeit.

In jedem Fall eine gute Erweiterung für Visual Studio. Sie erleichtert den Umgang mit Übersetzungen enorm. Kostenlos ist das Plugin auch noch. Perfekt.

- [Hier geht es zur Webseite](https://resxresourcemanager.codeplex.com/) 
- [Download für Visual Studio im Marketplace](https://marketplace.visualstudio.com/items?itemName=TomEnglert.ResXManager)