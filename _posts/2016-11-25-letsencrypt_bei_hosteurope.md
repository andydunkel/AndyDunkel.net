---
author: admin
comments: true
date: 2016-11-25 17:00:00+00:00
layout: post
slug: letsencrypt_bei_hosteurope_nutzen
title: 'LetsEncrypt Zertifikat bei Hosteurope eingerichtet'
categories:
- Webseiten
- Computer
tags:
- LetsEncrypt
- SSL

---

[LetsEncrypt](https://letsencrypt.org/) bietet nun schon seit einiger Zeit kostenlose SSL-Zertfikate an. Diese kann man auf dem eigenen Server relativ problemlos einrichten und konfigurieren. Bei normalem Webspace sieht es leider anders aus. Ein paar Webhoster unterstützen es mittlerweile. Allerdings gibt es da auch einen Interessenkonflikt, da die Anbieter gerne auch selbst SSL-Zertifikate verkaufen.

So auch bei [Hosteurope](https://www.hosteurope.de). Direkte Unterstützung gibt es nicht und auch über den SSH-Zugang kann man es auch nicht installieren und konfigurieren. Ein SSL-Zertifikat kostet je nach Abstufung mindestens 2,49 Euro im Monat. Dieses ist dann allerdings nur für eine Domain gültig. Mehrere Domains und Subdomains gehen ins Geld.

Wir haben einen ganzen Zoo an Domains und Subdomains. Allerdings ist es bei den größeren Webspacepaketen möglich ein eigenes Zertifikat hochzuladen.

Dies ist auch der Ansatzpunkt wie man LetsEncrypt-Zertifikate nutzen kann.

## Einrichtung

Als Clients für die Generierung funktionieren nur Web-Clients. Ich habe hierfür [ZeroSLL](https://zerossl.com/free-ssl/#crt) genutzt. Der Dienst ist leicht bedienbar und generiert alle benötigten Dateien im Prozess.

Im ersten Schritt generiert man den Account-Key und die CSR-Datei (Certificate Signing Request). 

![](/assets/uploads/2016/11/he_ssl1.png)

Die CSR enthält alle Domains für die das Zertfikat gelten soll. Dies sollte alle Domains und auch Subdomains umfassen. Für jede Domain sollte auch die Subdomain www. mit angegeben werden. 

Natürlich wird das Zertifikat nicht einfach so ausgestellt. Es muss noch überprüft werden, ob man wirklich Inhaber der Domain ist. Dies geht auf zwei Arten: HTTP-Überprüfung oder DNS-Überprüfung. Bei der DNS-Überprüfung fügt man einen DNS-TXT-Eintrag der jeweiligen Domain hinzu. Dieser enthält einen "Schlüssel" anhand dessen das Eigentum überprüft wird.

Ich habe mich für die Überprüfung mittels HTTP entschieden. Hierzu legt man eine Datei mit vom Wizard vorgegebenen Inhalt auf dem Webspace in einem speziellen Verzeichnis an.

![](/assets/uploads/2016/11/he_ssl3.png)


![](/assets/uploads/2016/11/he_ssl_http.png)


Bei vielen Domains und Subdomains artet das recht schnell in viel Arbeit aus. Für jede Domain und Subdomain muss eine entsprechende Datei mit Inhalt angelegt werden. Dieses wird anschließend überprüft. Passt alles, werden die Zertifikate erzeugt.

Diese kann man anschließend bei Hosteurope hochladen:

![](/assets/uploads/2016/11/he_ssl2.png)

Nach wenigen Minuten ist die Einstellung übernommen und die Seite ist mit https:// und dem LetsEncrypt-Zertifikat erreichbar. So weit so gut.

![](he_ssl4.png)

## Fazit und Probleme

Obwohl technisch alles funktioniert gibt es doch ein paar Nachteile:

1. Man kann nur ein Zertifikat bei Hosteurope hochladen. Kommt eine Domain oder Subdomain hinzu, muss man den Prozess erneut durchführen. Zeitaufwändig.

2. SSL wird für alle Domains und Subdomains aktiviert. Hierbei spielt es keine Rolle, ob man nur eine bestimmte Domain mit SSL ausstatten wollte. Auch die anderen sind nun unter https:// erreichbar. Da das Zertifikat dann nicht passt, mit entsprechender Warnmeldung vom Browser. Deswegen sollte man gleich für alle Domains und Subdomains das Zertifikat mit erstellen.

3. Das Zertifikat ist 90 Tage gültig. Nach Ablauf der Zeit muss man also erneut tätig werden. Ich habe diesen Prozess noch nicht durchgeführt und kann nur hoffen, dass zumindest die Arbeit des Anlegens der Überprüfungsdateien erspart bleibt. Am Besten setzt man sich gleich einen Termin im Kalender dafür. Ansonsten bekommen die Benutzer die Warnmeldung eines abgelaufenen Zertifikats. 

Insgesamt kann ich nur hoffen, dass der Konkurrenzdruck zunimmt und Hosteurope irgendwann eine Unterstützung für LetsEncrypt direkt einbaut. Ob das so schnell passiert, wohl eher nicht, da man ja selbst SSL-Zertifikate anbietet. 


### Update 29.01.2017
 
Inzwischen hat Hosteurope die Situation geringfügig verbessert. Neben dem globalen Template, kann man jetzt für jede Domain ein eigenes Zertifikat hochladen. Allerdings ist das erste Zertifikat immer noch global und für alle Domains gültig. In der Praxis hat dies zumindest den Vorteil, dass man nun die Zertifikate unabhängig voneinander erstellen und hochladen kann.
 
![](/assets/uploads/2016/11/he_ssl_update.png)



