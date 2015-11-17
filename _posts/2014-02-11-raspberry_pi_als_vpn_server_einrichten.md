---
author: admin
comments: true
date: 2014-02-11 17:00:00+00:00
layout: post
slug: raspberry_pi_als_vpn_server_einrichten
title: 'VPN für mobile Geräte auf dem Raspberry PI einrichten'
categories:
- Raspberry
- Linux
tags:
- RPI
- VPN
---

Ich hatte schon eine Weile mal vor, mir einen VPN-Server auf dem Raspberry Pi einzurichten. Zum einen will ich von unterwegs in irgendwelchen WLANs nicht unverschlüsselt kommunizieren und zum Anderen wird bei mobilen Internettarifen gern der ein oder andere Dienst blockiert. So funktioniert bei Congstar kein VOIP mit Skype. Richtet man hingegen ein VPN ein, funktioniert es, da der Anbieter nicht mehr in die Kommunikation reinschauen kann.


Bisher hatte ich den Dienst [SwissVPN](http://www.swissvpn.net/) benutzt. Wer öfter unterwegs ist und regelmäßig einen VPN-Dienst benötigt fährt mit so einem Dienst besser, beim Home-VPN ist der Upload vom DSL ein limitierender Faktor. Außerdem geht damit Youtube. :-) Da ich geizig bin, will ich mir das Geld aber sparen und mein VPN-Server selbst betreiben.

Also los geht es: Wir gehen davon aus, dass auf dem RPI bereits ein Linux installiert ist, z.B. Raspbian. [Hier gibt es eine gute Anleitung](http://blog.ekiwi.de/?p=1757) für die erste Einrichtung.

## PPTP ##

Als VPN verwenden wir [PPTP](http://de.wikipedia.org/wiki/PPTP). Dieses wird praktischerweise auf dem iPhone, iPad und Co direkt unterstützt.

## Updates ##

Zuerst updaten wir mal die Software auf unserem RPI:

	sudo apt-get update
	sudo apt-get upgrade

Das kann je nach Stand der Software eine Weile dauern.

## Installation und Konfiguration ##

Die PPTP-Software installieren wir mit:

	sudo apt-get install pptpd

Anschließend bearbeiten wir die Config mit Nano:

	sudo nano /etc/pptpd.conf

Man kann alternativ auch VIM verwenden. Im Nano-Editor speichern wir mit STRG+X und anschließend Y.

In der "pptdp.conf" Datei tragen wir die lokale IP des Raspberry ein:

	localip 192.168.1.5

Außerdem die Remote-IP-Adressen. Diese werden unseren VPN-Clients zugeteilt. Hier vergibt man einen Adressbereich, je nachdem wieviele Geräte man plant zu nutzen:

	remoteip 192.168.1.234-238

Nach dem Speichern, konfigurieren wir jetzt die Optionen von PPTDP:

	sudo nano /etc/ppp/pptpd-options

Am Ender Datei tragen wir folgende Zeilen ein:

	ms-dns 192.168.1.1
	noipx
	mtu 1490
	mru 1490

Nach "ms-dns" muss ein gültiger DNS-Server eingetragen werden. In den meisten Fällen verwendet man hier die Adresse seines Routers oder man trägt einen [öffentlichen DNS-Server](http://www.ccc.de/de/censorship/dns-howto) ein.

### Benutzer hinzufügen ###

Nun noch die VPN-Benutzer hinzufügen; dazu bearbeiten wir die folgende Datei:

	sudo nano /etc/ppp/chap-secrets

Das Anlegen von Benutzern ist sehr einfach:
	
	Benutzername[TAB]*[TAB]Passwort[Tab]*

Beispiel:
	
	Andy	*	GeheimesPasswort	*

Nach dem Bearbeiten muss der PPTP-Server neu gestartet werden:

	sudo service pptpd restart

## Sonstige Konfiguration ##

Wir wollen nicht nur auf den RPI zugreifen, sondern auch auf das Internet und sonstige Resourcen. Das richten wir jetzt ein:

	sudo nano /etc/sysctl.conf

Hier tragen wir die folgende Zeile ein:

	net.ipv4.ip_forward=1

Die Änderung übernehmen wir mit:

	sudo sysctl -p

### Firewall konfigurieren ###

Zuletzt aktualisieren wir noch die Firewall des RPI:

	sudo iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE

Bei mir kam an der Stelle die Fehlermeldung <code>iptables: Table does not exist (do you need to insmod?)</code>. Ein Neustart des RPI nach den Updates, vom Anfang, schaffte hier  Abhilfe. Wichtig: Dieser Befehl muss nach jedem Start des RPI neu ausgeführt werden. Also am Besten gleich einen Cronjob einrichten:

	sudo crontab -e

Am Ende fügen wir die folgende Zeile ein:

	@reboot sudo iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE

Speichern und fertig.

### Portforwarding auf dem Router aktivieren ###

PPTP verwendet den Port 1723. Damit der RPI Anfragen auf diesem Port entgegen nehmen kann, muss dieser vom Router weitergeleitet werden. Dazu loggen wir uns auf unserem Router ein und konfigurieren die Weiterleitung.

Hier für eine FritzBox:

![]({{ site.url }}/assets/uploads/2014/02/vpn/vpn2.png) 
	
### Einrichten auf dem iPhone ###

Die Einrichtung auf dem iPhone und anderen Geräten ist einfach. Zuerst gehen wir in die VPN-Einstellungen und legt ein neues VPN-Profil an:

![]({{ site.url }}/assets/uploads/2014/02/vpn/vpn1.png)

PPTP auswählen, Servernamen, Benutzername und Passwort eingeben.

Als Servernamen gibt man den Servernamen oder die IP-Adresse seines Internetzugangs ein. Da die IP-Adresse bei einem DSL-Anschluss oft dynamisch ist, sollte man einen DynDNS-Dienst nutzen.

Das war es auch schon. Wenn alles korrekt konfiguriert ist, sollte die Verbindung nach dem Speichern funktionieren.




