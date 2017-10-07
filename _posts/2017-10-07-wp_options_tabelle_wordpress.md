---
author: admin
comments: true
date: 2017-10-07 10:00:00+00:00
layout: post
slug: wp_options_tabelle_wordpress
title: 'wp_options Tabelle in Wordpress ständig kaputt'
categories:
- Software
- OpenSource

tags:
- Wordpress
- Internet

---
<img src="/assets/logos/blog_logo.jpg" class="imagelogo">

In unserem Blog [ekiwi-blog.de](http://www.ekiwi-blog.de) hatten wir in der vergangenen Zeit immer wieder Probleme damit, dass die Datenverbindung nicht funktionierte und damit das Blog nicht erreichbar war. Eine lapidare Meldung, dass keine Verbindung zur Datenbank hergestellt werden konnte, mehr kam nicht mehr.

Es stellte sich stets heraus, dass die Tabelle <code>wp_options</code> defekt war. In phpMyAdmin wurde die Tabelle mit 0 Zeilen und <code>in use</code> dargestellt. Was tun? Im Internet findet man zahlreiche Tipps, wie man die Tabelle repariert. Alles das hilft auch, aber da da Problem stets erneut auftrat, war das nicht die endgültige Lösung.

<!--more-->

In phpyAdmin kann man die Tabelle mit folgendem Befehl überprüfen:

	CHECK TABLE wp_options
	
Die Überprüfung ergab folgende Unstimmigkeiten.	

	Table				Op		Msg_type	Msg_text
	db-blog.wp_options	check	warning		Table is marked as crashed and last repair failed
	db-blog.wp_options	check	warning		1 client is using or hasn't closed the table prope...
	db-blog.wp_options	check	warning		Size of indexfile is: 41984      Should be: 4096
	db-blog.wp_options	check	error		Record-count is not ok; is 517   Should be: 0
	db-blog.wp_options	check	warning		Found 803320 deleted space.   Should be 0
	db-blog.wp_options	check	warning		Found 28 deleted blocks Should be: 0 
	db-blog.wp_options	check	warning		Found 551 key parts. Should be: 0
	db-blog.wp_options	check	error		Corrupt

Die manuelle Reparatur kann man über phpMyadmin vornehmen. Entweder über die Funktion in der Oberfläche oder durch Eingabe des folgenden SQL-Befehls:

	REPAIR TABLE wp_options
	
Anschließend meldete die Überprüfung, dass wieder alles OK sei:
	
	db-blog.wp_options	repair	status	OK
	
Der Blog lief wieder. Tritt das Problem einmalig auf, ist die manuelle Reparatur das Mittel der Wahl. Leider trat das Problem nach unregelmäßiger Zeit immer wieder auf. Das ist blöd, weil man solche Dinge dann erst durch Zufall mitbekommt, wenn man den Blog im Browser aufruft. Da die Tabelle <code>wp_options</code> irgendwelche Einstellungen diverser Plugins speichert, habe ich einfach mal versucht ein paar Plugins zu entfernen. Ohne Erfolg.

	
## Ändern der Storage Engine

Das Problem scheint ein allgemeines <a href="https://dev.mysql.com/doc/refman/5.7/en/myisam-table-close.html" target="_blank">Problem der Storage Engine MyIsam</a> zu sein. Deutet man die Fehlermeldung, dann hat ein Client die Verbindung zur Tabelle nicht ordentlich geschlossen. Das ist meiner Meinung nach etwas, was eine vernünftige Datenbank ohne Probleme aushalten sollte. 

Daher kam ich auf die Idee, die Storage Engine auf <code>InnoDB</code> abzuändern. InnoDB sollte hoffentlich etwas zuverlässiger funktionieren, als das einfachere MyISAM-Format.

Die Konvertierung der Tabelle geht recht leicht über phpMyAdmin:

![](/assets/uploads/2017/10/wp_options.png)

Am Besten erstellt man vorher ein Backup der Tabelle. Negative Auswirkungen habe ich bisher keine mitbekommen und das Problem der kaputten Tabelle ist bisher nicht wieder aufgetreten. Ich hoffe das bleibt so.