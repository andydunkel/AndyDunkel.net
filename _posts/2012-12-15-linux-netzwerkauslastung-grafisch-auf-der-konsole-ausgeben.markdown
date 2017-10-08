---
author: admin
comments: true
date: 2012-12-15 15:38:11+00:00
layout: post
slug: linux-netzwerkauslastung-grafisch-auf-der-konsole-ausgeben
title: 'Linux: Netzwerkauslastung grafisch auf der Konsole ausgeben'
wordpress_id: 1545
categories:
- Linux
---

Mein neues Spielzeit ist ein [Raspberry Pi](http://www.raspberrypi.org). Nun wollte ich die Netzwerkauslastung auf der Konsole anzeigen lassen. Natürlich gibt es unter Linux ein Tool dafür, man muss nur wissen wie es heißt. :-)




In diesem Fall: "ethstatus".




Also geschwind installiert mit:




> 

> 
> sudo apt-get install ethstatus
> 
> 





Anschließend einfach das Tool starten, standardmäßig wird die Schnittstelle eth0 überwacht. Über den Parameter -i kann man eine andere Schnittstelle angeben.




![EthStatus](https://andydunkel.net/assets/uploads/2012/12/EthStatus.png)
