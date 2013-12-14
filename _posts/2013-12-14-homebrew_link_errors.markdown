---
author: admin
comments: true
date: 2013-12-05 10:00:00+00:00
layout: post
slug: homebrew_link_errors
title: 'Homebrew - Could not link xz Fehler'
categories:
- Mac
- Tools
tags:
- homebrew
---

[Homebrew](http://brew.sh/) ist eine feine Sache. Ähnlich die unter Linux kann man so allerhand Pakete über die Konsole installieren. Leider brachte das Update auf OSX 10.9 ein paar Probleme mit sich.

Zuerst lief die alte Brew-Version gar nicht mehr. Also geupdated. Dann fingen die Probleme an. Bei der Installation von Paketen wurden diese zwar heruntergeladen, allerdings konnten die Symlinks nicht erstellt werden, da bereits vorhanden aus einer alten Version. Eventuell habe ich beim Update ein paar Fehler gemacht und irgendwas nicht bereinigt, keine Ahnung. 

Die Fehlermeldung sah in etwa so aus:

	Linking /usr/local/Cellar/... Warning: Could not link $foo. Unlinking...
	Error: Could not symlink file: /usr/local/Cellar/...
	/usr/local/... may already exist.
	/usr/local/... may not be writable.

Jedenfalls kann man die Symlinks in <code>/usr/local/share</code> von Hand löschen, was sehr viel Arbeit ist. Also etwas das Internet bemüht und das ganze mit folgenden Schritten gelöst:

	# Besitzer von /usr/local auf den aktuellen Benutzer setzen
	$ sudo chown -R `whoami` /usr/local

	# ggf. die fehlgeschlagene Installation entfernen
	$ brew uninstall -f $foo

	# Cache leeren
	$ rm -rf `brew --cache`

	# Aufräumen
	$ brew cleanup

	# nicht mehr aktuelle Symlinks löschen
	$ brew prune

	# der Homebrew Doktor:
	$ brew doctor
	
Im letzten Schritt wurden mir noch ein paar Hinweise ausgegeben, welche ich manuell auf der Konsole ausführen musste.

Anschließend lief wieder alles ohne Probleme.

