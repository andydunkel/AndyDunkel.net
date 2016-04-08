---
author: admin
comments: true
date: 2012-12-18 19:31:37+00:00
layout: post
slug: exfat-unter-ubuntu-nutzen
title: exFat unter Ubuntu nutzen
wordpress_id: 1547
categories:
- Linux
---

Ein mit exFat formatierte Festplatte oder USB-Stick lässt sich nicht einfach unter Ubuntu nutzen, aber wie immer unter Linux lässt sich das in "three simple steps" bewerkstelligen. :-)

Also fix ein Terminal aufgemacht und dort nacheinander die folgenden drei Zeilen reinklopfen:

	sudo -s  
	apt-add-repository ppa:relan/exfat  
	apt-get install fuse-exfat





Das wars schon, anschließend sollte sich das Gerät problemlos mounten lassen. Sollte Ubuntu beim dritten Befehl rummeckern, dass das Paket "fuse-exfat" nicht gefunden werden kann, einfach vorher noch den folgenden Befehl absetzen:


	apt-get update 


## Nachtrag - 11.12.2014

Unter Ubuntu 14.04 bricht die Installation von "fuse-exfat" ab: 

	fuse-exfat : Depends: fuse-utils (>= 2.7) but it is not installable

Abhilfe schafft die alternative folgende Zeile zur Installation:

	sudo apt-get install exfat-fuse exfat-utils

