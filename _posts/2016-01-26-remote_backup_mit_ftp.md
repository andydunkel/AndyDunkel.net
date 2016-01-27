---
author: admin
comments: true
date: 2016-01-26 17:00:00+00:00
layout: post
slug: remote_backup_mit_ftp
title: 'Linux: Remote Backup mit FTP'
categories:
- Linux
tags:
- Linux
- Backup
- FTP

---

Backups sind wichtig und hoffentlich hat man eins, wenn man es mal braucht. Neben den lokalen Backups auf NAS und USB-Speicher, sichere ich die wichtigsten Daten gerne nochmal außerhalb für den Fall der Fälle. 

Aus diesem Grund habe ich mir ein kleines Bash-Script geschrieben, welches die wichtigsten Daten mit ZIP packt und anschließend auf einen FTP-Server kopiert.

Ich stelle das hier online, falls jemand mal sowas in der Arbeit implementieren will.

	#/!bin/bash
	now=$(date +"%Y.%m.%d.%H.%M.%S")
	zip -r /home/da/backup_remote/backup.$now.zip /home/da/SVN/* /verzeichnis2/* /verzeichnis3/*
	lftp -u username,password ftp.server.de:21 << EOF
	set ssl:verify-certificate false
	set ftp:ssl-allow yes 
	cd /remote/verzeichnis
	put /home/da/backup_remote/backup.$now.zip

	bye
	EOF

Zuerst generieren wir das Datum für das aktuelle Backup. Dieses wird der ZIP-Datei hinzugefügt. Anschließend wird das Backup mit LFTP auf den Server geladen. LFTP ist normalerweise noch nicht standardmäßig installiert. Der Vorteil von LFTP ist die Möglichkeit eine verschlüsselte FTP-Verbindung zu nutzen. Ansonsten werden Benutzername und Passwort im Klartext übermittelt, was eher uncool ist.

Im LFTP-Teil des Scriptes, aktivieren wir SSL und deaktivieren die Verifikation des SSL-Zertifikates. Die Deaktivierung der Zertifikatsüberprüfung muss nur gemacht werden, wenn man ein eigenes Zertifikat verwendet. Im letzten Teil, wechseln wir auf dem FTP-Server in das passende Verzeichnis und laden die lokale Datei hoch, anschließend verabschieden wir uns.