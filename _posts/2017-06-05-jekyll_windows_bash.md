---
author: admin
comments: true
date: 2017-06-05 17:00:00+00:00
layout: post
slug: jekyll_windows_bash
title: 'Jeykyll in der Windows 10 Bash nutzen'
categories:
- Windows
- Software
tags:
- Windows
- Software
- Jekyll

---
<img src="/assets/logos/logo_code.jpg" class="imagelogo">

Windows 10 bringt netterweise ein Linux-Subsystem mit. Somit spart man sich für viele Dinge ein extra Linux, z.B. in einer virtuellen Maschine. Da ich auch [Jekyll](https://jekyllrb.com/)  verwende, liegt es nahe dieses auch von der Windows-Bash nutzbar zu machen. Bisher lief das über mein Macbook, so dass ich dieses immer kurz starten musste um eine Webseite zu generieren.

Ich hatte dies vor ein paar Monaten bereits einmal ausprobiert, damals noch ohne Erfolg. Damals kam es noch zu Fehlern bei der Erstellung der Webseite. Mit dem Creators Update funktioniert es jetzt jedoch ohne Probleme. Die Installation ist einfach.

<!--more-->

Sofern noch nicht geschehen, installiert man das Subsystem für Linux. Hierfür muss zuerst der Entwicklermodus freigeschaltet werden.

![](/assets/uploads/2017/6/jekyll1.png)

Anschließend kann man die Bash aus dem Startmenü heraus aufrufen. Jekyll kann nun anschließend installiert werden. Zuerst installiert man die benötigten Komponenten wie Ruby:

	sudo apt-get update -y
	sudo apt-get upgrade -y
	sudo apt-get install -y build-essential ruby-full 
	
Ist das	erledigt kann Jekyll installiert werde:

	sudo gem update –system
	sudo gem install jekyll bundler

Anschließend kann man die Webseite generieren.

![](/assets/uploads/2017/6/jekyll2.png)

Die im Screenshot dargestellte Fehlermeldung, trat bei mir nur noch in Einzelfällen auf. Änderungen an Webseiten oder Templates wurden erkannt und die Webseite richtig erstellt. Bei einigen Änderungen, z.B. neues Plugin ist das nicht passiert. Hier hat es geholfen, den <code>_site</code> Ordner zu leeren und die Webseite komplett neu zu erstellen. Ingesamt ist es ohne größere Probleme benutzbar.
