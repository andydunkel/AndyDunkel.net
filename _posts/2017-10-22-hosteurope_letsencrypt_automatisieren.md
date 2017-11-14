---
author: admin
comments: true
date: 2017-10-22 10:00:00+00:00
layout: post
slug: hosteurope_letsencrypt_automatisieren
title: 'Hosteurope - SSL-Zertifikate von LetsEncrypt automatisieren'
categories:
- Webseiten
- Computer
tags:
- LetsEncrypt
- SSL

---
<img src="/assets/logos/logo_code.jpg" class="imagelogo">

Hosteurope unterstützt leider immer noch kein LetsEncrypt. Man kann zwar die SSL-Zertifikate von LetsEncrypt bei Hosteurope nutzen, muss aber ein vergleichsweise unpraktisches Verfahren anwenden um diese zu nutzen. Ich hatte die Vorgehensweise bereits hier [im Blog beschrieben](https://andydunkel.net/webseiten/computer/2016/11/25/letsencrypt_bei_hosteurope.html).

Je nach Anzahl der Domains artet da in jede Menge Arbeit aus. Diese muss zudem alle 3 Monate wiederholt werden. Meine Hoffnung ist, dass Hosteurope irgendwann direkt in der Admin-Oberfläche Unterstützung für LetsEncrypt bietet. Andere Webhoster wie [Uberspace](https://uberspace.de/) oder [Serverprofis](https://www.serverprofis.de/) bieten dies bereits. Aber ich bin mit Hosteurope sonst in allen Belangen zufrieden und ein Wechsel von derzeit über 10 Webseiten ist auch nicht mal eben getan.

Glücklicherweise wurde Emile Schenk von <a href="http://donauweb.at" target="_blank">donauweb.at</a> auf meinen Artikel aufmerksam und er hat ein Script gebastelt, mit welchem man den ganzen Prozess auch bei Hosteurope automatisieren kann. Das sehr pfiffige Script automatisiert die Erstellung und Einbindung der Zertifikate bei Hosteurope. Zudem hat er mir erlaubt das Script hier vorzustellen und auch zum Download anzubieten.

<!--more-->

Das Script selbst basiert auf [CertLE](https://github.com/skoerfgen/CertLE), einem LetsEncrypt-Client auf Basis von PHP. Der Aufruf erfolgt direkt in der Shell. D.h. ein SSH-Zugang bei Hosteurope ist Pflicht. Bevor man sich nun an die Automatisierung macht, sollte man das im ersten Blogartikel gezeigte manuelle Verfahren einmal von Hand durchmachen, damit man die beiden benötigten Dateien <code>account_key.pem</code> und <code>domain_key.pem</code> erhält.

Das Script gibt es [hier zum Download](/assets/uploads/2017/10/hosteurope_letsencrypt.zip). 

<iframe width="640" height="360" src="https://www.youtube.com/embed/IP3Kgc7deZ0" frameborder="0" allowfullscreen></iframe>

Schauen wir uns im ersten Schritt die Dateien an:

![](/assets/uploads/2017/10/cert_1.png)

Die markierten Dateien müssen vor der Nutzung angepasst werden. In die <code>.kis</code>-Datei müssen die Zugangsdaten für den KIS-Zugang von Hosteurope eintragen werden. In der Datei <code>certificate_upload.php</code> muss das <code>$homedir</code> angepasst werden:

	$homedir = '/is/htdocs/wp999999_ZZZZZZZZZ';
	
Hier trägt man einfach den kompletten Pfad zum Script ein. Mittels dem Linux-Befehl <code>pwd</code> kann man in der Konsole den Pfad schnell ermitteln:

	wp@vwp1108:~/le$ pwd
	/is/htdocs/wp999999_ZZZZZZZZZ/le
	
Nun kommt die Anpassung der <code>myletsencrypt.sh</code> Datei:

	/usr/bin/env php7.0 CertLE.php cert account_key.pem domain_key.pem \
		-w /is/htdocs/wp999999_ZZZZZZZZ/www/DOMAIN1/ \
		-d www.domain1.com \
		-w /is/htdocs/wp999999_ZZZZZZZZ/www/DOMAIN2/ \
		-d www.domain2.com \
		--csr csr.pem \
		--cert cert.pem \
		--chain chain.pem \
		--fullchain fullchain.pem

Angepasst werden müssen die Zeilen für jede Domain und Subdomain:

		-w /is/htdocs/wp999999_ZZZZZZZZ/www/DOMAIN1/ \
		-d www.domain1.com \
		-w /is/htdocs/wp999999_ZZZZZZZZ/www/DOMAIN2/ \
		-d www.domain2.com \
		
Wie man sieht, gibt man hier den absoluten Pfad auf dem Webspace an, zusätzlich mit der Domain. Da <code>www.domain1.com</code> und <code>domain1.com</code> technisch gesehen zwei Domains sind, sollte man beide Schreibweisen angeben:

		-w /is/htdocs/wp999999_ZZZZZZZZ/www/DOMAIN1/ \
		-d domain1.com \
		-d www.domain1.com \
		
Je nach Anzahl der Domains und Subdomains wird die Liste recht lang. Hat man alle Anpassungen vorgenommen, wird das Script zusammen mit den Dateien <code>account_key.pem</code> und <code>domain_key.pem</code> auf den Webspace geladen.

Die beiden Dateien <code>myletsencrypt.sh</code> und <code>upload.sh</code> müssen zudem noch ausführbar gemacht werden. Hierfür genügt es via FTP die Rechte 777 zu vergeben.

Bei unserem ersten manuelle Erstellen der Zertifikate haben wir bereits die Verzeichnisse <code>.well-known/acme-challenge</code> angelegt. Sofern dies mittels FTP erfolgt ist, muss hier noch der Besitzer des Ordners abgeändert werden. Dies geht am Besten über die Dateiverwaltung in KIS:

![](/assets/uploads/2017/10/cert_2.png)
	
Hat der Ordner den Besitzer <code>ftpXXXXX</code>, dann den Ordner markieren, die Besitzer und Gruppe auf <code>wpXXXXX</code> abändern. Das Ganze rekursiv. Andernsfalls kann das Script die Challenge-Dateien nicht abspeichern und es kommt zu einer Fehlermeldung.

![](/assets/uploads/2017/10/cert_3.png)

Wie man sieht, ist auch dieser Weg zur Automatisierung steinig und erstmal Arbeit. Ist der Prozess abgeschlossen, können wir jetzt jedoch über SSH die Erneuerung der SSL-Zertifikate anstoßen:

	./myletsencrypt.sh
	
Bei der Ausgabe sollte man auf Fehlermeldungen achten. Bei mir gab es ein paar Probleme mit den Berechtigungen. Denen sollte man nachgehen, wenn eine Datei nicht geschrieben werden konnte. Das Script legt die Challenge-Dateien von LetsEncrypt ab und löscht diese am Ende wieder. Hier kam es zu Warnungen, dass Verzeichnisse nicht entfernt werden konnten. Diese Warnungen kann man ignorieren.

Klappt alles, erfolgt die Ausgabe, dass das Zertifikat nun angelegt worden ist.
		
![](/assets/uploads/2017/10/cert_4.png)	

Das Zertifikat wird nun abgelegt: 

	  Saved Fullchain to: fullchain.pem
	Saved Certificate to: cert.pem
	      Saved Chain to: chain.pem
	        Savee CSR to: csr.pem
	        
Wer mag, kann die Dateien herunterladen und bei Hosteurope im KIS hochladen. Alternativ kann man den Befehl:

	./upload.sh

Ausführen. Dieser erledigt den Upload, sofern man die korrekten Zugangsdaten in die <code>.kis</code> abgelegt hat.

Beim manuellen Upload verwendet man die <code>fullchain.pem</code> als Zertifikat und <code>domain_key.pem</code> als Key-Datei. Anschließend überprüft man im Browser, ob das Zertifikat korrekt übernommen worden ist. Dies kann ein paar Minuten dauern. 

Beim Erneuten verlängern, müssen nun nur noch alle paar Monate die Befehle für die Generierung und dem Upload ausgeführt werden.

## Update

Kommt beim Ausführen der Scripte eine Fehlermeldung:

	file_get_contents(http://www.domain.de/.well-known/acme-challenge/59fee33f9fd03): 
	failed to open stream: php_network_getaddresses: getaddrinfo failed: 
	Name or service not known

Sollte man die Script-Einstellungen im KIS überprüfen. Hier kann ggf. eine Einstellung verhindern, dass PHP auf externe URLs zugreifen kann:

![](/assets/uploads/2017/10/cert_sec.png)	