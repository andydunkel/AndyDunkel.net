---
author: admin
comments: true
date: 2015-10-08 17:00:00+00:00
layout: post
slug: jekyll_el_capitan
title: 'Jekyll auf El Capitan installieren'
categories:
- Jekyll
tags:
- Jekyll

---

Nach dem Update auf El Capitan, fehlte Jekyll zur Erstellung meiner Homepage. Ärgerlich. Laut Webseite lässt sich Jekyll mit einem einfachen

	gem install jekyll

installieren. Geklappt hat das bei mir allerdings noch nie. Mindestens ein <code>sudo</code> musste schon vorangestellt werden.

Auch dieses brachte kein Glück, da die folgende Fehlermeldung die Installation jäh unterbrach:

	Building native extensions.  This could take a while...
	ERROR:  Error installing jekyll:
	    ERROR: Failed to build gem native extension.
	
	    /System/Library/Frameworks/Ruby.framework/Versions/2.0/usr/bin/ruby extconf.rb
	mkmf.rb can't find header files for ruby at /System/Library/Frameworks/Ruby.framework/Versions/2.0/usr/lib/ruby/include/ruby.h
	
	Gem files will remain installed in /Library/Ruby/Gems/2.0.0/gems/yajl-ruby-1.2.1 for inspection.
	
Na fein. Stellt sich heraus, dass man zuerst die XCode command line tools installieren muss:

	xcode-select --install
	
Das dauert ein wenig. Ist das installiert, stimmen wir noch den Lizenzbedingungen zu:

	sudo xcodebuild -license
	
Nachdem auch das erledigt ist, installiert sich Jekyll hoffentlich ohne Probleme.

	sudo gem install jekyll	