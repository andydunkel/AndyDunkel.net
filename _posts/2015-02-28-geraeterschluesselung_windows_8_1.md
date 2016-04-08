---
author: admin
comments: true
date: 2015-02-28 17:00:00+00:00
layout: post
slug: geraeteverschluesselung_windows_8_1
title: 'Die Geräteverschlüsselung ist vorübergehend unterbrochen und wird beim nächsten Neustart des Gerätes fortgesetzt.'
categories:
- Windows
tags:
- Tablett
- Windows
- Encryption
---

So stand es in den Einstellungen meines neuen HP Stream 7 Gerätes. Eine typische "sinnvolle" Windows-Fehlermeldung. Und ja, auch nach einem Neustart funktionierte es natürlich nicht. Auch Aktivieren und Deaktivieren der Funktion brachte nix.

Da eine Verschlüsselung des Tabletts für den Falle des Verlustes durchaus sinnvoll ist, machte ich mich auf die Suche. Zu dieser Fehlermeldung findet man leider nicht viel im deutschsprachigen Internet. Aber englische Webseiten brachten ein paar Infos zu Tage.

Um es kurz zu machen: diese Fehlermeldung rührte daher, dass ich mich bei meinem Windows 8.1 mit einem lokalen Benutzerkonto angemeldet hatte. Wechselt man auf die Anmeldung zu einem Live/Outlook.com/Microsoft Konto funktioniert es plötzliche ohne Probleme.

Der Hintergrund ist, Microsoft synchronisiert den Key für die Entschlüsselung mit der Cloud. Ja nicht schön, prinzipiell können Microsoft, NSA und Co damit das Tablett entschlüsseln. Aber zumindest bei einem Geräteverlust kann man denke etwas ruhiger schlafen.

Ist letztendlich Abwägungssache und zumindest wenn man den Key verliert kann man den wohl auch online wiederherstellen.

![](/assets/uploads/2015/2/encryption_windows_8.jpg)