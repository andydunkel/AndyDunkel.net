---
author: admin
comments: true
date: 2017-09-22 10:00:00+00:00
layout: post
slug: jekyll_blogartikel_wird_nicht_erzeugt.md
title: 'Jekyll Blog Post wird nicht erzeugt  - post has a future date'
categories:
- Webdesign
- Jekyll

tags:
- Jekyll

---
<img src="/assets/logos/logo_code.jpg" class="imagelogo">

Vor kurzem hatte ich ein blödes Problem hier im Blog mit Jekyll. Ich hatte einen neuen Blogartikel angelegt. Aber beim Generieren wurde dieser nicht erzeugt. Es kam auch keine Fehlermeldung und auch kein Hinweis. Ich hatte schon mal Probleme mit Blogartikeln, da lag es meist an Kleinigkeiten wie der Kodierung mit [UTF-8 und BOM](https://ekiwi.de/tutorials/PHP/Headers_already_sent_-_Fehler/index.html). Diesmal jedoch nicht.

<!--more-->

Bei Problemen ist generell empfehlenswert den --verbose Output zu aktivieren:

	jekyll serve --verbose

Dies gibt jede Menge Statusinformationen und Logmessages aus und meist auch den Fehler oder Warnung, welches Problem gerade anliegt.

<iframe width="640" height="360" src="https://www.youtube.com/embed/R8mMsUTyByM" frameborder="0" allowfullscreen></iframe>

Bei mir war das Problem, dass mein Blogartikel in der Zukunft lag. Poste ich bei Wordpress, wird einfach die aktuelle Zeit genommen, quasi sofort. Bei Jekyll trage ich das Datum und die Uhrzeit in den Header ein. Da die Zeit nicht wirklich relevant ist, stand dort 17 Uhr. Im speziellen Fall hat ein paar Stunden in der Zukunft. Beim normalen Erzeugen wurde kein Fehler ausgegeben. Erst im Verbose-Output stand dann der folgende Eintrag:

 	Skipping: _posts/2017-09-22-jekyll_blogartikel_wird_nicht_erzeugt.md has a future date

![](/assets/uploads/2017/9/jekyll.png)

Da der Debug-Output recht lang werden kann, kann man zur Not diesen mit <code>more</code> seitenweise ausgeben: 	

	jekyll serve --verbose | more

Prinzipiell ist das Verhalten von Jekyll an der Stelle natürlich richtig. Posts in der Zukunft kann ich so reinstellen und das Veröffentlichen z.B. mit einem Cronjob automatisieren. Dann würde neue Artikel nach und nach automatisch veröffentlicht. Auf der anderen Seite gehört so eine Info, wenn ein Artikel nicht erzeugt wird, in die normale Ausgabe. 
