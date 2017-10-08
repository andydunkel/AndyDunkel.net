---
author: admin
comments: true
date: 2011-07-09 08:36:00+00:00
layout: post
slug: screenshots-unter-android-erstellen-ohne-root
title: Screenshots unter Android erstellen (ohne Root)
wordpress_id: 704
categories:
- Gadgets
- Tools
tags:
- Android
- No Root
- Root
- Screenshot
---

Screenshots unter Android erstellen, gar nicht so trivial. Es gibt einige Apps, diese benötigen aber Root-Rechte. Habe ich keinen Bock drauf. Geht bei [Apple Geräten](https://andydunkel.net/ipad/2011/06/25/quicktipp-screenshot-auf-dem-ipad-erstellen.html) leichter.

Wie es doch mit halbwegs vernünftigen Aufwand geht, möchte ich hier kurz erklären. Das ganze habe ich mit meinem HTC Desire getestet, bei anderen Phones kann es etwas anders aussehen.

Zuerst müssen wir das USB-Debugging aktivieren. Also in die Einstellungen, Anwendungen gehen, dort dann auf Entwicklung:

![image](https://andydunkel.net/assets/uploads/2011/07/image3.png)

Nun brauchen wir noch das Android SDK.

<!-- more -->

Dieses gibt’s unter [http://developer.android.com/sdk/index.html](http://developer.android.com/sdk/index.html)

Einfach runterladen und entpacken. Nun das Handy mittels USB an den Rechner anschließen. Unter Umständen verlangt das System einen Treiber. Also in der Windows Treiberinstallation eigenen Ordner festlegen. Den finden wir im Ordner vom SDK:

![image](https://andydunkel.net/assets/uploads/2011/07/image4.png)

Nachdem das erledigt ist, starten wir den Android Debugger, der ist im Verzeichnis Tools vom SDK:

![image](https://andydunkel.net/assets/uploads/2011/07/image5.png)

Nach dem Start sollte das Handy im Debugger sichtbar sein. Dieses nun markieren und dann im Menü “Device” auf “Screen Capture” gehen.

![image](https://andydunkel.net/assets/uploads/2011/07/image6.png)

Es öffnet sich nun ein Fenster, welches den aktuellen Bildschirminhalt vom Handy wiedergibt:

![image](https://andydunkel.net/assets/uploads/2011/07/image7.png)

Der Rest dürfte dann selbsterklärend sein. ![Smiley](https://andydunkel.net/assets/uploads/2011/07/wlEmoticon-smile1.png)
