---
author: admin
comments: true
date: 2016-03-14 17:00:00+00:00
layout: post
slug: owncloud9_thunderbird_synch_problems
title: 'Owncloud 9 und Thunderbird / Lightning - Probleme beim Synchronisieren'
categories:
- Computer
tags:
- Thunderbird
- Owncloud

---

Durch Neueinrichtung meines Servers habe vor kurzem auf Owncloud 9 geupdatet. Leider wusste ich zu dem Zeitpunkt noch nicht, dass die neue Version noch nicht wirklich rund läuft. Die Kalender- und Kontakte-App wurden neu entwickelt. D.h. es fehlen noch Funktionen und auch sonst gibt es noch Probleme.

Das erste Problem: Kontakte ließen sich nicht mehr über die Weboberfläche importieren. Dies ließ sich lösen, indem man diese in Thunderbird von einem Adressbuch ins Owncloud-Adressbuch kopierte. 

Ein weiteres Problem, die Synchronisation des Kalenders funktionierte im Thunderbird nicht mehr. In der Kalender-App bekommt man nun nicht mehr den Link zum jeweiligen Kalender, sondern einen CalDAV-Sammellink:

	https://server/owncloud/remote.php/dav/

![](/assets/uploads/2016/3/cal1.png)

Mein Verständnis ist, dass dort einfach alle Kalender angeboten werden und der Client bedient sich dann dort. Für IOS gibt es einen etwas anderen Link, aber im Prinzip das Gleiche. Dort hat es auch sofort funktioniert.

Leider zeigte Thunderbird nur ein gelbes Ausrufezeichen an. 

![](/assets/uploads/2016/3/cal2.png)

Geht man in die Fehlerkonsole findet man die entsprechenden Fehlereinträge:

	Warning: There has been an error reading data for calendar: Owncloud.  However, this error is believed to be minor, so the program will attempt to continue. Error code: DAV_DAV_NOT_CALDAV. Description: The resource at https://mate.ekiwi.de/owncloud/remote.php/dav/ is a DAV collection but not a CalDAV calendar
	Source File: file:///C:/Users/da/AppData/Roaming/Thunderbird/Profiles/2kiixeal.default/extensions/%7Be2fda1a4-762b-4020-b5ad-a41df1933103%7D/calendar-js/calCalendarManager.js
	Line: 960

	Error: [calCachedCalendar] replay action failed: null, uri=https://mate.ekiwi.de/owncloud/remote.php/dav/, result=2147500037, op=[xpconnect wrapped calIOperation]
	Source File: file:///C:/Users/da/AppData/Roaming/Thunderbird/Profiles/2kiixeal.default/extensions/%7Be2fda1a4-762b-4020-b5ad-a41df1933103%7D/calendar-js/calCachedCalendar.js
	Line: 322

Im Internet findet man entsprechende Tipps, den richtigen Kalender in die URL einzufügen. Also z.B. so:

	https://server/owncloud/remote.php/caldav/calendars/admin/Andy/

Meinen Kalender habe ich "Andy" genannt und dies wird in der Weboberfläche auch so angezeigt. Leider kein Erfolg. 

## Lösung

Zeitintensives suchen im Internet hat dann doch noch eine Lösung gebracht. Der Kalender hatte intern einen anderen Namen als online angezeigt wurde.

Doch wie findet man den richtigen Namen heraus? Dies geht mit folgendem Befehl, zumindest unter Linux oder auf dem Mac:

	curl -u admin -X PROPFIND https://server/remote.php/dav/calendars/admin  

Statt "admin" gibt man den entsprechenden Benutzernamen ein. Es kommt dann zu folgender Ausgabe:

![](/assets/uploads/2016/3/cal3.png)

Rot habe ich den richtigen Namen des Kalenders markiert. Dies gibt dann die folgende URL:

	https://server/owncloud/remote.php/dav/calendars/admin/andy-1

Und siehe da, mit der neuen URL konnte Thunderbird den Kalender nun ohne Fehler synchronisieren.


## Update

Ein Leser hat mich darauf hingewiesen, dass man die URL auch ohne <code>curl</code>-Befehl ermitteln kann. Man bleibt einfach mit der Maus auf dem Kalender, bis der Tooltip erscheint:

![](/assets/uploads/2016/3/cal4.png)

Schon hat man fast die richtige URL. Bei der angezeigten URL muss noch der Teil "dave.php/" entfernt werden. Anschließend hat man auch so die korrekte URL.
