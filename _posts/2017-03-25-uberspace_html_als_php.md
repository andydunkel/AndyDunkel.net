---
author: admin
comments: true
date: 2017-03-25 17:00:00+00:00
layout: post
slug: uberspace_html_als_php
title: 'Uberspace: .html Dateien als PHP ausführen'
categories:
- Linux
- Webdesign
tags:
- Uberspace

---

HTML-Dateien als PHP-Dateien ausführen zu lassen, lässt sich über die <code>.htaccess</code> Datei leicht umsetzen. Dies ist meist folgender Code:

	AddType application/x-httpd-php .html
	
Bei Uberspace funktioniert das leider nicht so. Hier musste ich etwas tüfteln. Funktionieren tut der folgende Code:

	AddHandler php-fcgid .html
	
Hintergrund ist, dass PHP hier als [Fast-CGI](https://wiki.uberspace.de/webserver:fastcgi) läuft.