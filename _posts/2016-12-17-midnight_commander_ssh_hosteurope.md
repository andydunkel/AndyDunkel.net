---
author: admin
comments: true
date: 2016-12-17 17:00:00+00:00
layout: post
slug: ssh_bei_hosteurope_midknight_commander
title: 'SSH bei Hosteurope - Midnight Commander ausführen'
categories:
- Webdesign
- Linux
tags:
- Hosteurope

---

![](/assets/uploads/2016/12/mc1.png)

Der SSH-Zugang bei Managed Servern ist bei Hosteurope naturgemäß eingeschränkt. Man kann seine eigenen Dateien verwalten, das wars.

Ausführen kann man die installierten Programme. Aber auch hier gibt es Einschränkungen. So läuft der Midnight Commander standardmäßig erstmal nicht. Stattdessen erscheint die folgende Fehlermeldung:

	user@hosteurope:~$ mc
	Failed to run:
	Cannot create /is/htdocs/wp_koko/.config/mc directory
	
Dies ist einfach nur ein Berechtigungsproblem. Auf dieses Verzeichnis hat standardmäßig nur der FTP-User Zugriff. Es gibt aber eine Lösung. Man legt das Verzeichnis einfach von Hand über FTP an.

Angelegt werden müssen drei Verzeichnisse:

	.config
	.cache
	.local	

![](/assets/uploads/2016/12/mc1.png)

Anschließend ändert man über die Dateiverwaltung im KIS die Berechtigung für diese drei Ordner. Dies muss dann der SSH-Benutzer sein. Dieser fängt mit <code>wp</code> an.

![](/assets/uploads/2016/12/mc2.png)

Anschließend klappt der Start vom Midnight Commander-

![](/assets/uploads/2016/12/mc3.png)