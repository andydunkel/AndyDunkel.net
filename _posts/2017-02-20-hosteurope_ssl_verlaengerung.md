---
author: admin
comments: true
date: 2017-02-20 17:00:00+00:00
layout: post
slug: verlaengerung_hosteurope_ssl_letsencrypt
title: 'Letsencrypt bei Hosteurope verlängern'
categories:
- Webseiten
- Computer
tags:
- LetsEncrypt
- SSL

---

Letzte Woche stand nun die Verlängerung des Letsencrypt-Zertifikates an. Die Einrichtung hatte ich in einem [anderen Blogartikel](http://andydunkel.net/webseiten/computer/2016/11/25/letsencrypt_bei_hosteurope.html) beschrieben. Die Einrichtung ist, gelinde gesagt, umständlich. Bei einer Domain ist das Ganze noch überschaubar, bei vielen Domains und Subdomains wirds umständlich. 

Man muss sich als Eigentümer der Domain verifizieren. Hierbei hat man zwei Möglichkeiten. Entweder man legt eine spezielle Datei auf dem Webspace an oder man hinterlegt einen TXT-Eintrag im DNS. Ich hatte mich für die erste Variante entschieden. Ich hatte die Hoffnung, dass bei der Verlängerung einfach die gleichen Daten bzw. Dateien nochmals abgefragt werden. Leider ist dem nicht so, man muss sich neu verifizieren. Inklusive neuer Dateien mit neuen Inhalten.

## Verlängern über ZeroSSLL

Das Prozedere gleicht dem [der ersten Erstellung](http://andydunkel.net/webseiten/computer/2016/11/25/letsencrypt_bei_hosteurope.html). Man kann wahlweise seinen Letsencrypt-Key und Domains CSR-Datei einbinden. Damit spart man sich allerdings nur etwas Tipparbeit. Hat man die Dateien nicht mehr, keine Panik, einfach neu einrichten und fertig. 

![](/assets/uploads/2017/2/ssl2.jpg)


Nach der ganzen manuellen Arbeit mit der Verifikation hat es dann auch schon geklappt. Nach dem Upload wurde das neue Zertifikat von Hosteurope übernommen und nach wenigen Minuten war es aktualisiert. Jetzt habe ich wieder für 3 Monate Ruhe. Bei der nächsten Verlängerung werde ich statt der Dateien versuchen die DNS-Authentifizierung zu verwenden. Vielleicht spart das noch etwas Zeit.

## Geht auch besser

Wie es besser geht zeigt der Anbieter Uberspace. Bei dem Webspace dort ist die [Einrichtung von Letsencrypt](https://wiki.uberspace.de/webserver:https) für alle Domains und Subdomains in wenigen Minuten eingerichtet. Außerdem gibt es die Möglichkeit die Erneuerung über einen Cron-Job zu automatisieren. 

Bleibt zu hoffen, dass Hosteurope das irgendwann auch anbieten wird. Etwas Verbesserungen gibt es bereits. So kann man jetzt für jede Domain und Subdomain eigene Zertifikate hinterlegen. Kommt eine Domain oder Subdomain hinzu, kann man dieses nun zusätzlich erstellen und einbinden. Vorher musste man das Zertifikat für alle Domains erneuern.
