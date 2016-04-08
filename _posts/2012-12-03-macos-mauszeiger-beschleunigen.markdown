---
author: admin
comments: true
date: 2012-12-03 19:05:26+00:00
layout: post
slug: macos-mauszeiger-beschleunigen
title: 'MacOS: Mauszeiger beschleunigen'
wordpress_id: 1538
categories:
- Gadgets
---

Ich habe mir letzte Woche eine [Apple Magic Maus](http://www.amazon.de/gp/product/B002NX0M8C/ref=as_li_ss_tl?ie=UTF8&camp=1638&creative=19454&creativeASIN=B002NX0M8C&linkCode=as2&tag=ekiwide0b-21) gekauft. Einrichtung war schnell erledigt. Die Maus selbst ist schick, die Touchbedienung erstmal gewöhnungsbedürftig. 




Allerdings war mir der Mauszeiger viel zu langsam, trotz höchster Einstellung in den Mauseinstellungen.




![Tracking](http://andydunkel.net/assets/uploads/2012/12/Tracking.png)




Natürlich gibt es mit etwas Terminal-FU Abhilfe. Also Terminal aufmachen und folgende Zeile reinklopfen:




> 

> 
> defaults write -g com.apple.mouse.scaling 8.0
> 
> 





Wobei 8.0 die Geschwindigkeit der Maus ist. Die höchste Defaulteinstellung in der GUI ist 5.0. Also einfach mal etwas herum probieren. Damit die Änderung wirksam wird muss man sich noch Ausloggen und wieder Einloggen. Jetzt flitzt der Mauszeiger auch über den 27" Monitor. 




[![2012 11 30 21 19 13](http://andydunkel.net/assets/uploads/2012/12/2012-11-30-21.19.13.jpg)](http://www.amazon.de/gp/product/B002NX0M8C/ref=as_li_ss_tl?ie=UTF8&camp=1638&creative=19454&creativeASIN=B002NX0M8C&linkCode=as2&tag=ekiwide0b-21)
