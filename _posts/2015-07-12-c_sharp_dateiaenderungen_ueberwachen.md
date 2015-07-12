---
author: admin
comments: true
date: 2015-07-12 17:00:00+00:00
layout: post
slug: c_sharp_dateiaenderungen_ueberwachen
title: 'C#-Anwendungen mehrsprachig gestalten'
categories:
- Coding
tags:
- C#

---

# C# - Dateiänderungen in Verzeichnissen überwachen
Eine Aufgabe, die kompliziert klingt, es aber dann doch nicht ist: Überwachen von Verzeichnissen auf Änderungen. Egal, ob eine Datei umbenannt wird, eine Datei hinzukommt, Verzeichnisse verschoben werden etc.

Stellt sich heraus, dass dies in C#, bzw. mit dem .net-Framework, eine einfache Sache ist. Die Klasse <code>FileSystemWatcher</code> nimmt uns die Arbeit ab. Einmal gestartet, überwacht und benachrichtigt uns dieser über Änderungen. Hier eine Beschreibung wie man diesen einsetzt.

![](/assets/uploads/2015/7/fsw1.png)

Zuerst legen wir uns das <code>FileSystemWatcher</code>-Object an und konfigurieren es:

	private FileSystemWatcher _watcher;

    _watcher = new FileSystemWatcher();
    _watcher.Path = "c:\\temp";
    _watcher.NotifyFilter = NotifyFilters.LastAccess | NotifyFilters.LastWrite | NotifyFilters.FileName | NotifyFilters.DirectoryName;
    _watcher.Filter = "*.*";

Neben dem Pfad können wir festlegen über welche Änderungen wir uns benachrichtigen lassen wollen. Ebenfalls können wir festlegen, welche Dateien wir überwachen wollen. In unserem Beispiel einfach alle.

    _watcher.Changed += new FileSystemEventHandler(OnChanged);
    _watcher.Created += new FileSystemEventHandler(OnChanged);
    _watcher.Deleted += new FileSystemEventHandler(OnChanged);
    _watcher.Renamed += new RenamedEventHandler(OnRenamed);

Nun müssen wir den <code>FileSystemWatcher</code> nur noch starten:

	_watcher.EnableRaisingEvents = true;

Die EventHandler sehen so aus:

    private void OnRenamed(object sender, RenamedEventArgs e)
    {
        MessageBox.Show("Änderung: " + e.FullPath + " - " + e.ChangeType.ToString());          
    }

    private void OnChanged(object source, FileSystemEventArgs e)
    {
        MessageBox.Show("Änderung: " + e.FullPath + " - " + e.ChangeType.ToString());
    }


Die übergebenen EventArgs enthalten Informationen zu den geänderten Datei, als auch Informationen über die Art der Änderung.

Das war es auch schon. Wer will kann sich das [Beispielprojekt hier herunterladen](/assets/uploads/2015/7/FileSystemWatcher.zip).

