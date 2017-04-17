---
author: admin
comments: true
date: 2017-04-17 17:00:00+00:00
layout: post
slug: jekyll_alternative_eltexto
title: 'Jekyll Alternative ElTexto'
categories:
- Webseiten
- Webdesign
- Tools
tags:
- ElTexto
- Webdesign
- Jekyll

---

Für die Erstellung dieser Homepage verwende ich [Jekyll](https://jekyllrb.com/). Vorher hatte ich Wordpress im Einsatz. Der Vorteil von Jekyll ist, dass es sich um statische Webseiten handelt. Das heißt es kommt keine Datenbank und keine Scriptsprache zum Einsatz. Prinzipbedingt muss ich nicht auf Sicherheitsupdates achten und diese regelmäßig einspielen. Jekyll erzeugt einfache HTML-Dateien, welche auf den Webspace geladen werden. Fertig.

Jekyll ist recht leistungsfähig und hat jede Menge Funktionen. Leistungsfähigkeit und Flexibilität bringen allerdings auch mit sich, dass die Bedienung relativ komplex ist. Zudem kümmert sich Jekyll auch "nur" um die eigentliche Generierung der Inhalte. 

Bearbeitung, Erstellung und Upload der Inhalte bleiben dem Anwender überlassen. Neben Jekyll benötigt man also noch mindestens einen Texteditor, ein FTP-Upload-Programm und ein Grafiktool.

Da es sich eher um eine Software aus dem Linux/Unix-Umfeld ist, ist auch die Installation für Windows-Benutzer nicht einfach. Als Basis wird Ruby verwendet, welches auf dem System vorhanden sein muss. Wer Jekyll unter Windows installieren will, dem [sei diese Anleitung empfohlen](https://davidburela.wordpress.com/2015/11/28/easily-install-jekyll-on-windows-with-3-command-prompt-entries-and-chocolatey/).

## ElTexto

Die Alternative für Windows-Benutzer, die ich hier vorstelle, heißt "[ElTexto](http://eltexto.net)". Genauso wie Jekyll generiert die Software statische Webseiten. 

Im Gegensatz zu Jekyll handelt es sich um eine Windows-Anwendung. Diese stellt alle Funktionen zur Erstellung, Bearbeitung, Export und Upload der Webseite in der Programmoberfläche bereit.

![](/assets/uploads/2017/4/eltexto.png)

Ich stelle nun nicht gleich jede Seite auf ElTexto um, aber neue Webseiten und auch Bestehende habe ich umgestellt. Hier ein paar Beispiele:

- [Acapio.de](https://acapio.de/)
- [ekiwi-computer.de](https://ekiwi-computer.de/)
- [Online-Hilfe-Erstellen.de](https://online-hilfe-erstellen.de/)
- [eKiwi.de - Homepage-Anleitungen](https://ekiwi.de/anleitungen/index.html)

### Anlegen eines Projektes

Der erste Schritt ist wie bei Jekyll: zuerst muss das Projekt angelegt werden. Geschieht dies bei Jekyll auf der Kommandozeile, wählt man in ElTexto Speicherort und Template aus. Das Projekt wird in einer Baumstruktur verwaltet, welche auch den Aufbau der späteren Webseite wiederspiegelt. Dadurch können auch größere Webseiten mit vielen Unterebenen erstellt werden.

### Templates

ElTexto bringt einige Templates mit. Damit ist das Layout der Webseite schnell erstellt. Bei Jekyll muss man sich zuerst selbst ein eigene Vorlage zusammenbasteln. Ähnlich wie bei Jekyll kann das Template jederzeit angepasst oder ausgetauscht werden. Ändere ich das Template, muss ich nur neu exportieren und schon hat die Webseite das neue Design.

![](/assets/uploads/2017/4/eltexto_template.png)

### Erstellung der Inhalte

Wie bei Jekyll kommt auch hier Markdown für die Erstellung der Inhalte zum Einsatz. Auf jeder Seite können Markdown und HTML-Elemente gemischt werden. Beim Export werden die Inhalte als Seite gerendert und der Webseite hinzugefügt. 

Auch das Einfügen von Bildern oder Grafiken geht einfacher von der Hand. Grafiken lassen sich direkt aus der Zwischenablage oder mit Drag & Drop einfügen. Das lästige Anpassen von Pfaden entfällt.

Besonders das Einfügen von Bildern über die Zwischenablage nutze ich oft. Als Softwareentwickler erstelle ich oft Screenshots. Screenshot erstellen, STRG + V in ElTexto und schon wird das Bild im Projekt angelegt und in die Seite eingefügt.

Blog-Funktionen wie bei Jekyll gibt es leider derzeit noch nicht.

### Automatische Erstellung der Navigation

Ein großer Vorteil von ElTexto gegenüber Jekyll sind die Makro-Funktionen. Mit diesen lassen sich Navigationselemente oder Inhaltsverzeichnisse automatisch erzeugen. Dies geht auch mit Jekyll, allerdings müssen hierfür extra Plugins in Ruby geschrieben werden. Das ist auch nicht jedermanns Sache.

Alternativ muss man sich selbst um die Verlinkung oder Erstellung der Navigation kümmern. Bei ElTexto erstelle ich eine neue Seite und beim Export wird diese automatisch der Navigation hinzugefügt und verlinkt. 

In ElTexto schreibe ich z.B. einfach folgenden Tag ins Dokument:

	<!--sitemap-->

Beim Export wird an dieser Stelle dann eine Sitemap mit allen Seiten erzeugt und verlinkt. Es gibt zahlreiche Makrofunktionen, wie z.B. verschiedene Navigationen, Inhaltsverzeichnisse, Sitemap, Datum- und Zeitfunktionen.

![](/assets/uploads/2017/4/eltexto_makro.png)

### Dateiverwaltung

Bei der Dateiverwaltung ähneln sich beide Programme. Im Hintergrund werden Textdateien verwendet. Die offene Dateistruktur hat den Vorteil, dass die Projekte auch mit anderen Tools und Editoren bearbeiten werden können. Auch die Verwendung von Versionierungssystemen wie Git oder SVN funktioniert damit ohne Probleme.

### FTP-Upload

Ein größeres Problem bei Jekyll ist der Upload der Dateien. Jekyll bietet hier selbst nichts an. Für kleinere Webseite schiebt man einfach die exportierte Seite auf den Webspace. Für größere Webseiten wird dies zu einem langwierigen Unterfangen. Diese Webseite hier z.B. pushe ich zuerst nach Github um dann auf dem Webserver einen Pull zu machen um das Projekt dort wieder auszulesen.

Bei ElTexto geht das zum Glück etwas einfacher. Hier klickt man einfach auf "FTP-Upload" und schon wird der Upload ausgeführt. Zudem werden nur die geänderten Dateien hochgeladen. Das spart Zeit. Gerade, wenn man öfter Änderungen an der Webseite durchführt wird man diese Funktion zu schätzen wissen. 

![](/assets/uploads/2017/4/eltexto_ftp.png)

### Fazit

[ElTexto ist eine Alternative für Jekyll](https://eltexto.net) unter Windows. Im Gegensatz zu Jekyll muss man sich nicht mit komplexer Installation und Konfiguration herumschlagen. Auch werden keine extra Tools wie Texteditoren oder FTP-Programme benötigt. Beide Systeme erzeugen statische HTML-Seiten. Nach dem Upload der Seite muss man sich also nicht mit Sicherheitsupdates herumschlagen. HTML-Dateien sind nicht hackbar und haben keine Sicherheitslücken.

Was derzeit noch fehlt sind die Blog-Funktionen. Das heißt, die Software eignet sich damit primär für die Erstellung von normalen Webseiten. Auch Anleitungen und Hilfe-Dokumente lassen sich damit schnell umsetzen.
