---
author: admin
comments: true
date: 2015-07-04 17:00:00+00:00
layout: post
slug: c_sharp_anwendungen_mehrsprachig
title: 'C#-Anwendungen mehrsprachig gestalten'
categories:
- Coding
tags:
- C#

---

# C# Anwendungen lokalisieren

Im folgenden Artikel werde ich kurz die ersten Schritte beschreiben um eine C#-Anwendung mehrsprachig zu gestalten.

Legen wir los und beginnen mit den Formularen. Im Designer setzen wir die Eigenschaft <code>Localizable</code> auf <code>true</code>:

![](/assets/uploads/2015/7/inter1.png)

Anschließend können wir über die <code>Language</code>-Eigenschaft die Sprache umschalten. In Beispiel möchte ich die Sprachen Deutsch und Englisch implementieren. Im Hintergrund legt Visual Studio nun für die gewählte Sprache die entsprechende Resourcen-Datei an:

![](/assets/uploads/2015/7/inter2.png)

Für jede Sprache können wir jetzt im Designer die Texte der Steuerelemente anpassen und übersetzen. Da für jede Sprache oft auch mehr oder weniger Platz benötigt wird um Texte oder Grafiken darzustellen, können wir auch für jede Sprache das Design abändern.

Beim Start der Anwendung wird nun automatisch die Sprache des Systems ermittelt und die Anwendung automatisch in der passenden Sprache geöffnet. Oder alternativ die Default-Sprache.

## Sprache manuell festlegen

Nicht immer will man sich auf die automatische Sprachwahl vom System verlassen. Daher können wir beim Start der Anwendung die Sprache auch manuell festlegen:

	CultureInfo myCultureInfo = new CultureInfo("en");
    Thread.CurrentThread.CurrentCulture = myCultureInfo;
    Thread.CurrentThread.CurrentUICulture = myCultureInfo;

Ein guter Platz für diese Einstellung ist z.B. die <code>Program.cs</code> Datei:

    /// <summary>
    /// The main entry point for the application.
    /// </summary>
    [STAThread]
    static void Main()
    {
        CultureInfo myCultureInfo = new CultureInfo("de");
        Thread.CurrentThread.CurrentCulture = myCultureInfo;
        Thread.CurrentThread.CurrentUICulture = myCultureInfo;

        Application.EnableVisualStyles();
        Application.SetCompatibleTextRenderingDefault(false);
        Application.Run(new MainForm());
    }

Die Angabe der Sprache erfolgt in Form von <code>en</code> oder spezifischer mit <code>en-US</code>.

## Strings im Code

Die Übersetzung der Anwendung im Designer gestaltet sich wie gesehen recht einfach. Doch was ist mit Strings im Code? 

	MetroMessageBox.Show(this, "Die Einstellungen werden nach Neustart der Anwendung übernommen.", "Hinweis");

Auch diese müssen übersetzt werden. Auch dies ist sehr leicht möglich. Zuerst legen wir neue Resourcendateien für unsere Sprachen an:

![](/assets/uploads/2015/7/inter3.png) 

In diesen Tragen wir jetzt unsere Strings ein, mit den jeweiligen Übersetzungen.

![](/assets/uploads/2015/7/inter4.png)

Nun passen wir den Code unserer MessageBox noch an:

	MetroMessageBox.Show(this, AppResources.SettingsMessage, AppResources.SettingsTitle);

Das wars auch schon.

## Abschluss

 Neben den Texten gibt es noch weitere Dinge zu beachten, welche hier nicht besprochen wurden, wie Datum- und Zeitangaben, welche oft anders formatiert sind. 

Hier ein Beispiel:

	CultureInfo ci = new CultureInfo("de");
	MessageBox.Show(DateTime.Now.ToString("d", ci));

Wie man sieht, ist die grundsätzliche Mehrsprachigkeit einer Anwendung in C# sehr leicht möglich.