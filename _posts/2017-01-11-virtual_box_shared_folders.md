---
author: admin
comments: true
date: 2017-01-11 17:00:00+00:00
layout: post
slug: virtualbox_failed_to_open_directory_shared_folders
title: 'Virtual Box - "Failed to open directory" bei Shared Foldern unter Linux'
categories:
- Linux
- Computer
tags:
- VirtualBox
- Linux
- Windows

---

Ich habe ein Linux in VirtualBox am Laufen. Für den Datenaustausch habe ich einen "Shared Folder" bzw. einen "Gemeinsamen Ordner" definiert. 

Dieser taucht auch im Dateimanager unter Linux auf, allerdings kam beim Zugriff nur diese Meldung:

![](/assets/uploads/2017/1/virtualbox.png "")

	Failed to open directory - Permission denied
	
Was tun? Die Lösung zu diesem Berechtigungsproblem ist, den eigenen Benutzer der Gruppe <kbd>vboxsf</kbd> hinzuzufügen:

	sudo usermod -aG vboxsf $(whoami)
	
Anschließend muss man die virtuelle Maschine noch neu starten. Danach lief der Zugriff ohne Probleme.