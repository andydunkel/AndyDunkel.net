---
author: admin
comments: true
date: 2014-04-18 17:00:00+00:00
layout: post
slug: jekyll_fuer_die_webseite
title: 'Umstellung auf Jekyll'
categories:
- Meinung
- Tools
tags:
- Jekyll
- Webseite
---

Seit ein paar Monaten verwende [Jekyll](http://jekyllrb.com/) für meine Webseite/Blog. Zeit genug um ein Fazit zu ziehen. Als ich meinen Blog startete habe ich klassisch mit Wordpress begonnen.
Da ich damals noch nicht wusste wie weit meine Blogausdauer gehen würde, war das eine gute Lösung. Wordpress ist schnell installiert und recht leicht durch Plugins und Themes anpassbar.  Zugegeben, damals hatte ich mich auch nicht weiter mit Alternativen oder anderen Systemen beschäftigt.

Für einen reinen Blog ist Wordpress gut genug. Aber irgendwann sollte meine Webseite eine Mischung aus Webseite und Blog werden. Wordpress stößt hier, trotz anlegbarer Seiten und Unterseiten, an seine Grenzen. Die Inhalte wandern allesamt in eine MySQL-Datenbank an die man zwar problemlos rankommt, aber irgendwie sind die Inhalte doch darin gefangen.
Designanpassungen erfordern eine Einarbeitung in das Template-System von Wordpress. Spaß, nicht!

Also Alternativen gesucht, bis ich irgendwann auf Jekyll gestoßen bin. Jekyll lässt sich als eine Art Generator für Webseiten und Blogs beschreiben. Statt dynamischer serverseitiger Scriptsprache mit Datenbank und Gedöns, wird das Blog offline erstellt und besteht nur aus Text- und HTML-Dateien. Blogartikel und HTML-Seiten lassen sich sehr leicht als Markdowndatei verfassen.

Jekyll generiert daraus dann die eigentliche Webseite. Diese besteht nur noch aus HTML-Seiten, den Bildern und sonstigen Dateien und wird dann nur noch auf den Server gepackt. Fertig!

Damit die Webseite auch so aussieht wie Webseitenbetreiber sich das wünscht, steht vorher noch eine Anpassung des Templates an.

Da die Webseite nur aus einfachen Textdateien besteht kann diese recht leicht in ein beliebiges Versionierungssystem gepackt werden. Backup der Webseite? Einfach alle Dateien Zippen und fertig.

## Statische Seiten

Während Wordpress die Seiten beim Aufruf neu erzeugt, ist die Jekyll-Seite nichts weiter als HTML-Seiten. Serverseitig wird daher wenig benötigt: Einfacher Webspace genügt, PHP und Datenbank werden nicht gebraucht. Sicherheitslücken sind bei statischen HTML-Seiten auch kein Thema. Regelmäßige Updates wie bei Wordpress entfallen daher.

Dennoch: Bei größeren Webseiten / Blogs zieht das auch Probleme nach sich. Bei jeder Aktualisierung ändern sich viele, wenn nicht gar alle, HTML-Seiten. Die müssen auf den Webspace transferiert werden.
Geht dies bei Klein-Webseiten noch einfach mit FTP, verkommt es bei größeren Seiten schnell zu einer Langwierigkeit. Da ich Shell-Zugang habe, mache ich hier einen Umweg über Git. Dies funktioniert so: Offline Webseite erstellen, git push auf den Server. Zuletzt wird auf dem Webserver die neue Version abgerufen. Ein Update der Webseite auf dem Server dauert so nur eine knappe Minute.

Dann gibt es Dinge die bei statischen Webseiten nicht gehen: Kommentarfunktion oder Suche sind zwei davon. Beides lässt sich mit externen Diensten nachrüsten, Kommentare mache ich bei Disqus und die Suche übernimmt Google. Allerdings ist mir auch klar, dass ich hier einen Teil meiner Webseite und Daten aus der Hand gebe.

## Installation bis zur Ersten Webseite

Die Installation ist recht einfach, unter Linux und MacOS (mit Homebrew) ist das mit einer Handvoll Terminalbefehlen erledigt. Unter [Windows](http://herbie79.de/development/web/2014/03/22/Running_Jekyll_on_Windows.html) ist der Aufwand etwas höher. Strafe muss sein liebe Windows-Nutzer.

Jetzt beginnt der eigentliche Aufwand. Im Gegensatz zu Wordpress  hieß das: etwas mehr Aufwand hineinstecken bis das Design meinen Wünschen angepasst war. Ein guter Mittelweg war für mich einfach Bootstrap zu verwenden und an meine Bedürfnisse anzupassen.
Im Gegenzug hat man volle Kontrolle über seine Webseite bis in den letzten HTML-Tag.

Wer bereits einen Wordpress oder anderen Blog betreibt wird sich darüber freuen, dass man die Inhalte des alten Blogs übernehmen kann. Hier gibt es entsprechende Konverter.

## Plugins

Sehr beliebt bei Wordpress, die Plugins. Welche man reichhaltig installiert, ohne sich Gedanken zu machen welche Änderungen diese an der Datenbank vornehmen oder welche Sicherheitslücken mit installiert werden. Natürlich müssen auch diese regelmäßig auf Updates überprüft werden.
Für Jekyll gibt es auch Plugins. Diese kommen in Form von Ruby-Dateien daher, welche einfach in ein Verzeichnis gepackt werden. Macht ein Plugin mal nicht was es soll, kann man es mit etwas Programmierkenntnissen anpassen oder einfach löschen und Webseite neu erstellen. Fertig.

## Bloggen mit Jekyll

Bloggen geht einfach: Der Blogartikel wird in Markdownsyntax in eine Textdatei (mit einem speziellen Header) geschrieben. 
Etwas umständlicher wird es beim Einbinden von Bildern.

Bei Wordpress verwendete ich nicht das Webinterface sondern einen lokales Programm (MarsEdit). Hier fügt man die Bilder mit Copy & Paste ein. Der Editor kümmert sich dann um die Größenanpassung, Upload und Verlinkung.

Dieser Komfort steht bei Jekyll nicht zur Verfügung. Die Bilder müssen in der richtigen Größe in die Webseite gespeichert und dann von Hand im Artikel verlinkt werden. Kein großer Akt, aber etwas umständlicher.

## Webseiten

Neben der reinen Blogfunktionalität, wollte ich auch eine Webseite bauen. Auch dafür ist Jekyll geeignet. Ein gemeinsames Menü für die gesamte Webseite? Kein Problem! Einfach im Template anlegen. Beim generieren wird alles automatisch richtig in alle Seiten eingefügt. Das gesamte Design der Webseite ist extrem schnell austauschbar, da alle Unterseiten und Artikel nur den Inhalt enthalten.
Mittlerweile erstelle ich jede neue Webseite, egal ob klein oder groß, schnell in Jekyll.

## Fazit

Um es kurz zu machen, ich bin sehr zufrieden mit Jekyll. Es gibt ein paar Nachteile, aber die Vorteile überwiegen zumindest für mich. Es war am Anfang etwas aufwändiger alles einzurichten und zu konfigurieren. Dafür habe ich, salopp formuliert, jetzt die Kontrolle über jedes Byte meiner Webseite.
Hat man die diese Hürde genommen, ist die Pflege der Webseite eine Leichtigkeit.
Nachts kann ich ruhig schlafen, um Sicherheitsupdates für die Webseite muss ich mir keine Gedanken mehr machen. Gleiches gilt für Backups. Die Nachteile, wie fehlende Suche oder fehlende Kommentarfunktion lassen sich umgehen.
