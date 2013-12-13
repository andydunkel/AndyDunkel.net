---
author: admin
comments: true
date: 2013-04-23 06:10:53+00:00
layout: post
slug: wget-mit-benutzername-und-passwort
title: wget mit Benutzername und Passwort
wordpress_id: 1573
categories:
- Linux
tags:
- raspberry
- rpi
- wget
---

Auf meinem [RaspberryPi](http://www.amazon.de/gp/product/B008PT4GGC/ref=as_li_ss_tl?ie=UTF8&camp=1638&creative=19454&creativeASIN=B008PT4GGC&linkCode=as2&tag=ekiwide0b-21) läuft momentan ein Cronjob der alle 30 Minuten meinen Feedreader ([Tiny Tiny RSS](http://tt-rss.org/redmine/projects/tt-rss/wiki)) aktualisiert. Dieser ist, aus Sicherheitsgründen, mittlerweile mit einem Passwort geschützt und läuft auf meinem Webspace. Etwas unpraktische Kombination, aber Cronjobs auf meinem Webspace haben so ihre Eigenheiten.




Durch den Passwortschutz konnte der Cronjob nun nicht mehr das Aktualisierungscript mittels "wget" aufrufen. :-(




Dafür müssen wir wget einfach ein paar Parameter mitgeben:




> 

> 
> --user=userName  
--password=passWord
> 
> 





Funktioniert für FTP- und HTTP-Passwörter. Hier ein Beispiel




> 

> 
> $ wget --user=andy --password='geheim' http://ekiwi.de/foo.zip
> 
> 

