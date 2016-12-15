---
author: admin
comments: true
date: 2016-12-15 17:00:00+00:00
layout: post
slug: wpf_anwendungen_mehrsprachig
title: 'WPF Anwendung lokalisieren und übersetzen'
categories:
- Coding
tags:
- C#
- WPF

---


WPF-Anwendungen bzw. Formulare zu übersetzungen funktioniert etwas anders als bei Windows-Forms-Dialogen. Bei diesen kann man bequem die Sprache in der IDE umschalten und anschließend die Texte übersetzen.

Bei WPF-Anwendungen hat man den Komfort nicht ganz. Aber auch hier lässt sich die Übersetzung recht schnell bewerkstelligen.

Gehen wir von einer einfachen Anwendung mit einem Dialog aus:

![](/assets/uploads/2017/12/trans1.png)

Wir haben hier den Anwendungstitel, zwei Labels und den Button zu übersetzen. Für jeden dieser Texte legen wir einen Eintrag in der Resourcendatei an:

![](/assets/uploads/2017/12/trans2.png)

Ebenfalls setzen wir den "AccesModifier" auf "Public". Dies ist notwendig um aus der XAML-Datei darauf zugreifen zu können.

![](/assets/uploads/2017/12/trans3.png)

Die Resourcendatei wird nun kopiert, bzw. dupliziert, und mit entsprechend der Lokalisierung benannt. Da ich die Anwendung nach Deutsch übersetzen möchte, heißt die neue Datei <code>Resources.de.resx</code>:

![](/assets/uploads/2017/12/trans4.png)

![](/assets/uploads/2017/12/trans5.png)

Nun müssen wir in der Formulardatei die Texte noch zuweisen. Im Quelltext der XAML-Datei machen wir zuerst den Namespace des Properties Namespaces bekannt:

	xmlns:p = "clr-namespace:WPFLocExample.Properties"
	
![](/assets/uploads/2017/12/trans6.png)


Anschließend können die Texte ersetzt werden. Dies geschieht z.B. so, dass wir für den "Content" des Schließen-Buttons folgenden Code einsetzen:

	{x:Static p:Resources.buttonClose}
	
Dies wird für alle Elemente gemacht:

![](/assets/uploads/2017/12/trans7.png)

Um der Anwendung zu sagen, welche Sprache genutzt werden soll, wird abschließend noch die Datei "App.xml.cs" bearbeitet:

    public partial class App : Application
    {
        App()
        {
            System.Threading.Thread.CurrentThread.CurrentUICulture 
            			= new System.Globalization.CultureInfo("de");
        }
    }
    
Starten wir die Anwendung, sollte diese in der gewählten Sprache, im Beispiel Deutsch erscheinen:

![](/assets/uploads/2017/12/trans8.png)

Wie man sieht lassen sich WPF-Anwendungen leicht übersetzen. Auch wenn im Gegensatz zu Windows-Forms-Anwendungen etwas mehr Gefummel notwendig ist. Manch einer wird dies auch als Vorteil ansehen. :-)

Texte im Quelltext können wie gehabt ebenfalls über die Resourcendateien übersetzt werden. Siehe dazu in den weiterführenden Links.

## Download des Beispiels

Das Beispielprojekt kann [hier heruntergeladen werden](/assets/wp-custom/wpflocexample.zip).


### Weiterführende Links

- [C#-Anwendungen (WinForms) mehrsprachig gestalten](http://andydunkel.net/coding/2015/07/04/c_sharp_anwendungen_mehrsprachig.html "")
- [C# Backgroundworker und Threads lokalisieren](http://andydunkel.net/coding/2016/11/22/c-sharp-mehrsprachig-backgroundworker.html)