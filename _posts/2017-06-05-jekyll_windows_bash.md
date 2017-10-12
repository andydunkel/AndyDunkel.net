---
author: admin
comments: true
date: 2017-06-05 17:00:00+00:00
layout: post
slug: jekyll_windows_bash
title: 'Jekyll in der Windows 10 Bash nutzen'
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

## Update 23.09.2017

Auf einem neu eingerichteten PC ist die ganze Prozedur in etwas Gefrickel ausgeartet, deswegen eine Ergänzung. Der Befehl

	sudo gem install jekyll bundler
	
funktionierte nicht richtig und brachte eine Fehlermeldung, dass eine zu alte Ruby-Version (1.9) installiert war. Jekyll benötigt >= 2.1.

Die Installation einer neuen Ruby-Version ist wiederum gar nicht so einfach. Dazu musste ich erstmal [ein PPA hinzufügen](https://www.brightbox.com/docs/ruby/ubuntu/):

	$ sudo apt-add-repository ppa:brightbox/ruby-ng
	$ sudo apt-get update
	$ sudo apt-get install ruby2.4
	
Anschließend war ein etwas neueres Ruby installiert:

	$ ruby -v
	ruby 2.4.1p111 (2017-03-22 revision 58053) [x86_64-linux-gnu]

Natürlich lief es dann trotzdem noch nicht! :-)

	current directory: /var/lib/gems/2.4.0/gems/ffi-1.9.18/ext/ffi_c
	/usr/bin/ruby2.4 -r ./siteconf20170923-2076-su1aih.rb extconf.rb
	mkmf.rb can't find header files for ruby at /usr/lib/ruby/include/ruby.h

Was hier fehlt ist das "dev" Package. Dieses lies sich zum Glück ebenfalls einfach installieren:

	sudo apt-get install ruby2.4-dev

Anschließend ließ sich Jekyll installieren. Dummerweise erkannte er auch den Jekyll Befehl am Ende erst mal nicht. Durch den Aufruf von <code>/usr/local/bin/jekyll serve</code> ließ sich das Problem umgehen.


