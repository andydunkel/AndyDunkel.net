---
author: admin
comments: true
date: 2012-03-11 14:51:00+00:00
layout: post
slug: roomba-fehler-9reparaturanleitung
title: Roomba Fehler 9–Reparaturanleitung
wordpress_id: 1257
categories:
- Gadgets
- Sonstiges
tags:
- Error 9
- roomba
---

Wie ich erst berichtet hatte, stellte mein Roomba vor kurzem seinen Dienst mit Fehler 9 ein. Ärgerlich, nach 2.5 Jahren ist die Garantie natürlich abgelaufen und der Roomba auch recht teuer. Nach etwas Recherche im Internet fand ich heraus, dass es sich bei Fehler 9 um einen defekten Stoßsensor handelt.

Der Roomba denkt er fährt gegen eine Wand und dreht sich nur noch im Kreis. Die gute Nachricht, das Ganze lässt sich mit etwas Bastelei, ein paar Dioden und Lötkolben kostengünstig reparieren. Schuld sind ein paar Bauelemente die wohl nach ein paar Jahren an Leistungsfähigkeit nachlassen und dann tritt der Fehler auf.

Hier ist eine Anleitung wie ich meinen Roomba wieder flott bekommen habe.

Die Anleitung ist für einen Roomba 580. Sollte aber für alle Roomba 5xx Geräte analog sein. 

Fangen wir an. Im ersten Schritt finden wir erst mal heraus, ob und welcher Sensor kaputt ist. Der Roomba hat 2 Stoßsensoren. Auf der Herstellerseite wird geraten bei Fehler 9 zuerst die Stoßsensoren mehrmals von Hand zu betätigen, für den Fall, dass ein Fremdkörper diese verklemmt oder verunreinigt hat.

Wenn das nicht hilft, starten wir die Selbstdiagnose des Roomba. Der Roomba hat mehrere interne Diagnoseprogramme. So geht’s:

  * zuerst den Roomba ausschalten, Clean LED muss aus sein
  * Dock und Clean Button gleichzeitig drücken und gedrückt halten
  * nun den Spot Button 6 mal drucken
  * Dock und Clean Button loslassen
  * der Roomba spielt nun eine Melodie und ist im test-0 Modus, die LEDs fangen an zu blinken
  * nun den Dock Button 2 mal drücken, damit gelangen wir zum Bumper-Test (test-2)
  * Dirt detect blinkt nun blau und die Clean LED wird rot
  * nun können wir testen, betätigen wir den Bumper rechts, sollte die Dock LED leuchten bis der Bumper wieder losgelassen wird, leuchtet die LED nicht, ist der Sensor defekt (war bei mir so)
  * der linke Bumper sollte die Spot LED leuchten lassen, auch hier, leuchtet diese nicht, ist der linke Sensor defekt.
  * Dock und Spot für 10 Sekunden drücken um den Testmodus zu verlassen

Nachdem wir nun wissen welcher Sensor kaputt ist, geht es nun darum den Roomba zu zerlegen.

Folgende Ersatzteile werden benötigt:

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb.png)](http://andydunkel.net/assets/uploads/2012/03/image.png)

Diese gibt es bei Conrad (hier auch die Bestellnummern von Conrad). Kostet ca. 1 Euro pro Bauteil. Für jeden Sensor werden jeweils eine Diode und ein Fototransistor benötigt.

Nun geht es ans Zerlegen des Roomba. Kleiner Hinweis. Am besten die Schrauben nach Arbeitsschritt sortiert aufbewahren. Man kommt sonst sehr leicht auseinander.

Zuerst Dreckbehälter und die Bürsten entfernen. Anschließend die Bodenplatte abschrauben:

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb1.png)](http://andydunkel.net/assets/uploads/2012/03/image1.png)

Jetzt wird die Batterie entfernt und der Bumper abmontiert. Dieser ist mit 10 Schrauben befestigt.

 

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb2.png)](http://andydunkel.net/assets/uploads/2012/03/image2.png)

Um den Bumper komplett abzunehmen muss noch der Empfänger für die Basisstation gelöst werden:

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb3.png)](http://andydunkel.net/assets/uploads/2012/03/image3.png)

Bei der Gelegenheit können wir nun die Bumperschalter prüfen. 

Lassen sich diese betätigen oder hat sich eventuell ein Fremdkörper verhakt. Falls nichts auffällt, geht es nun weiter mit der oberen Abdeckung. Diese wird mit verschiedenen Plastiknasen fixiert Also vorsichtig von vorne die Abdeckung anheben und die Plastiknasen ggf. mit einem Schraubenzieher lösen. Dann kann die Abdeckung entfernt werden.

Die Abdeckung sitzt in der Mitte recht fest, man muss schon etwas Kraft aufwenden.

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb4.png)](http://andydunkel.net/assets/uploads/2012/03/image4.png)

Im nächsten Schritt sind nun wieder einige Schrauben zu lösen. Hinweis: Eine ist etwas kleiner.

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb5.png)](http://andydunkel.net/assets/uploads/2012/03/image5.png)

Nun kommt auch schon die Platine zum Vorschein. Jetzt entfernen wir den grauen Ring und Abdeckung in der Mitte.

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb6.png)](http://andydunkel.net/assets/uploads/2012/03/image6.png)

Es wird kaum überraschen, noch mehr Schrauben:

     

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb7.png)](http://andydunkel.net/assets/uploads/2012/03/image7.png)

Nun lösen wir die oberen Stecker der Platine:

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb8.png)](http://andydunkel.net/assets/uploads/2012/03/image8.png)

Die Platine nun vorsichtig nach oben ziehen und überklappen. Nun sieht man bereits die Bumpersensorbaugruppe. [![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb9.png)](http://andydunkel.net/assets/uploads/2012/03/image9.png)

Die Baugruppe ist mit 2 Schrauben fixiert. Diese lösen. Diese muss nun zerlegt werden. Vorsichtig die Plastikverbindung lösen. Achtung, drinnen ist eine Feder die bei der Gelegenheit gerne wegfliegt.

 

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb10.png)](http://andydunkel.net/assets/uploads/2012/03/image10.png)

Hat man den Bumperschalter zerlegt findet man auch schon die kleine Platine und die Übeltäter:

![image](http://andydunkel.net/assets/uploads/2012/03/image11.png)

Wie man sieht habe ich auch eine kleine Verletzung beim Zerlegen davongetragen. ![Smiley](http://andydunkel.net/assets/uploads/2012/03/wlEmoticon-smile.png)

Nun muss man zum Lötkolben greifen und den Fototransistor und die Diode ersetzen. Zuerst die alten auslöten und dann die neuen einlöten:

[![image](http://andydunkel.net/assets/uploads/2012/03/image_thumb11.png)](http://andydunkel.net/assets/uploads/2012/03/image12.png)

Der Fototransistor ist der obere bei den Kabel und ist oben etwas blau.

Anschließend alles wieder rückwärts zusammensetzen. Wenn nun alles geklappt hat und kein sonstiger Defekt der Elektronik vorlag, funktioniert der Roomba nun wieder. Am besten dazu das Diagnoseprogramm starten.

Ich empfehle das zu machen, bevor der Roomba komplett zusammengesetzt ist. 

# Spende 

Wem die Anleitung geholfen hat seinen Roomba wieder flott zu bekommen, kann, wenn er oder sie will, mir einen kleinen Betrag für die Kaffeekasse zukommen lassen. :-)

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="T5XFPN596APVJ">
<input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
</form>


-------------

# Alte Kommentare: #

Durch den Serverumzug, hier die alten Kommentare vom Blog:

### Jens says:
April 4, 2012 at 12:44	

Hi Andy,

sehr schönes ausführlicher Artikel ! Ich muss die Tage auch den Bumper (zum Glück nur diesen) meines Roomba 581 tauschen. Kannst du mir vielleicht kurz schildern, welche Schraubendrehergrößen du für das Zerlegen genutzt hast ? Das wäre sehr hilfreich für mich, da ich nicht alle Schraubendrehergrößen zu Hause habe. Ich habe gesehen man kann auch die Oberseite des Roomba abnehmen. Gibt es diese als Ersatzteil zu kaufen ? Viele Frage, aber ich habe die Hoffnung, dass du mir weiterhelfen kannst.

Danke + Grüße,
Jens
Reply	

### Andy says:	
    April 4, 2012 at 16:46	

    Hi Jens,

    erstmal viel Erfolg bei der Reparatur. Du brauchst Kreuzschraubenzieher verschiedener Größe. Würde sagen, groß, mittel und einen kleinen. Eigentlich nix spezielles. Uhrmacherwerkzeug kann für die kleinen nicht schaden.

    Wegen der Oberseite, weiß ich nicht. Habe aber nirgends Ersatzteile für den Roomba gesehen. Habe aber nur nach dem Bumpersensor geschaut, aber nix gefunden.

    Gruß
    Andy


### Jens says:	
April 5, 2012 at 07:22	

Hi Andy,

danke dir für deine Antwort. Ich habe mir ein Schraubendreherset mit unterschiedlichen Größen bestellt (Kreuz/Schlitz und Torx). Damit sollte es passen.

Ich habe noch etwas weiter recherchiert. Es gibt eine Ersatzblende für die obere große Abdeckung für ca. 10 EUR beim iRobot Distributor DE. Den Bumper selbst habe ich bei Klein Robotics nachbestellt. So lange es nur um die “Standardteile” geht, scheint das problemlos zu sein. Vielleicht hilft dir ja diese Info auch.

Grüße,
Jens

### Andy says:	
April 6, 2012 at 07:43	

Danke für die Info. Gut zu wissen, dass man im Zweifelsfall Ersatzteile bekommt. Hoffe zwar, dass erstmal keine weiteren Reparaturen notwendig sind. :-)


### Markus Cennodosy says:	
December 8, 2012 at 22:42	

Vielen Dank für die Information hier. Es funktioniert jetzt bei mir einwandfrei. Danke Danke

	
### Elke says:	
December 11, 2012 at 21:43	

Hallo Andi,
kannst du mir vielleicht weiterhelfen? Bei der Selbstdiagnose hat die Dock LED permanent geleuchtet. Ich habe daher vermutet, dass beim rechten Bumper vielleicht etwas klemmt. Ich habe den Roomba daher nach deiner tollen Anleitung zerlegt, aber da war nichts. Meinem Roomba hängen jetzt die Eingeweide raus. Was ist zu tun?
Viele Grüße,
Elke


### Elke says:	
December 11, 2012 at 21:59	

Sorry, wegen des falsch geschriebenen Namens.

	
### Andy says:	
December 12, 2012 at 00:28	

HI Elke,

genau, wenn die Dock LED dauerhaft an ist, dann sendet der Sensor ein dauerhaftes Signal. D.h. bei Dir ist auch der rechte Bumper defekt und muss ersetzt werden, bzw. die Ersatzteile eingelötet.

War bei mir auch so, beim ersten Bumper ging das Licht nicht an und beim Zweiten Dauerlicht. Ohne Löten geht es jetzt hier denke nicht weiter.

mfg
Andy
	
### bernhard says:	
December 21, 2012 at 17:52	

hallo
habe trotz der bumper rep. anleitung
fehler nachwievor
was könnte da noch schuld sein
Beim bumpertest leuchtet immer noch dock und spot dauernd auf
reset hilft auch keines
Bitte mail wenn wer eine idee hat
danke Bernhard


### Beni says:	
December 29, 2012 at 16:41	

Vielen Dank für die Anleitung. Bei meinem waren beide Bumpersensoren defekt. Im Conrad waren nicht die richtigen Dioden an Lager. Mit der 153692 IR-Diode Osram Components IRL 81 A Gehäuseart Kunststoffgehäuse Wellen-Länge 880 nm funktioniert es auch. Viele Grüsse! Beni


### Steffen says:	
January 4, 2013 at 15:07	

Hi Andy,
vielen vielen Dank für diese absolut geniale Anleitung!
Ich war schon der Meinung, dass ich meinen Roomba in Rente schicken muss! Dank dir hab ich ihn aber wieder flott bekommen.

Achja, noch ein Tipp:
Ich kenn das zb. bei den Glühbirnen im Auto: Wenn die linke kaput ist, geht ein paar Tage später die rechte kaput.
Bei mir war nur ein Sensor defekt, aber da der Versand bei Conrad das teuerste war hab ich beide Teile 2 mal bestellt, dann bin ich im Fall der Fälle gerüstet!

Grüße aus Esslingen a.N.


### Andy says:	
    January 5, 2013 at 09:56	

    Hi Steffen,

    danke für das Feedback. Kannn Dir nur recht geben, am Besten gleich beide Sensoren machen, wenn das Ding einmal aufgeschraubt ist. Der andere Sensor ging bei mir ein paar Monate später kaputt.

    Gruß
    Andy
 	

### Markus says:	
February 19, 2013 at 12:57	

Hallo Andy,

auch mein Roomba läuft wieder! Hatte ihn schon fast 6 Monate im Keller stehen und auch schon aufgegeben. Jetzt frisst er wieder Staub :-) Also, danke für die Anleitung !!

Gruß
Markus

	
### Peter Tschannen says:	
February 27, 2013 at 20:10	

Hallo Andy
Nachdem mein Roomba 560 unter den geschilderten Symptomen gelitten hatte, habe ich ihn an das CH-Repair-Center verbracht.
Von dort habe ich – sehr schnell mitgeteilt bekommen, dass ein NICHT ZU REPARIERBARER ELEKTRONIKSCHADEN vorläge. Man hat mir einen sogenannten Service-Roboter (gleiches, fabrikneues Gerät ohne Zubehör wie Accu, Netzteil etc) zum Preis von CHF 250.00 oder alternativ für
- CHF 399.00 Romba 770
- CHF 450.00 Romba 780
Habe dann meinen Roomba unrepariert zurückverlangt und bekommen.
Im Internet bin ich auf Deine Reparturanleitung gestossen.
Habe bei “Conrad” die benötigten Teile (gleich 2x für beide Seiten) bestellt und gestern erhalten (Materialkosten CHF 5.20, Transport, Verpackung und Kleinmengenzuschlag CHF 17.90 = total CHF 23.10).
Des Lötens unkundig, habe ich mich via Youtube diesbezüglich “weitergebildet”.
Heute nun habe ich unseren Roomba nach Deinen Vorgaben zerlegt, entlötet, gelötet und wieder zusammengesetzt und es hat alles geklappt. Roomba macht’s wieder, absolut SENSATONELL!!!!
Auch als Amateur (Buchhalter in Rente) ist diese Reparatur möglich.
Warum nur können (wollen) es die Profis nicht tun?????
Herzlichen Dank für Deine Super-Anleitung
	

###  Andy says:	
    February 27, 2013 at 20:17	

    Hallo Peter,

    super! Freut mich, dass Dir die Anleitung geholfen hat.
    Ja Du hast Recht, es wäre schade, das Gerät wegen so einer Kleinigkeit wegwerfen zu müssen.

    Gruß
    Andy
	

### Peter Tschannen says:	
February 28, 2013 at 13:30	

Hallo Andy
Ich bin’s nochmals. Habe meine frohe Botschaft dem Repair-Center auch gemailt und Antwort erhalten, die die Community vielleicht auch interessiert. Die Anschrift habe ich aus Diskretionsgründen weggelassen:

“Sehr geehrte Damen und Herren
Mein Roomba 560 läuft wieder.
Ich konnte ihn selbst mithilfe einer Internet-Reparatur-Anleitung instand stellen. Das Problem “Error 9″ scheint ja allgegenwärtig zu sein.
Die Materialkosten (CONRAD) dafür betrugen CHF 5.20. Die Arbeit für mich als Laien dauerte zwar etwas lang, musste ich mir doch auch noch das Löten (via Youtube) beibringen!
Für einen Profi mit ausgerüsteter Werkstatt jedoch innert maximal einer Stunde zu bewerkstelligen.
Für mich unverständlich, dass Sie die Reparatur nicht machen konnten/wollten. Mit der Bitte um Kenntnisnahme grüsse ich Sie freundlich.
Peter Tschannen”

Antwort:

“Guten Tag Herr Tschannen
Besten Dank für Ihre Bemerkungen. Natürlich ist es möglich die defekten Teile zu ersetzen, nur haben die wenigsten Personen (wir auch nicht) Zugriff auf das Kalibrierungsgerät welches erforderlich ist um die Sensoren mit dem Mainboard neu zu kalibrieren. Wenn dies nicht gemacht wird kann es zu Folgestörungen kommen. Aus diesem Grunde „verbietet“ uns der Hersteller eine Reparatur des Error 9 und wir können dies leider auch nicht anbieten.
Mit freundlichen Grüssen”

Nochmals besten Dank und viele Grüsse

Peter Tschannen


### Felix says:	
    August 25, 2013 at 18:55	

    Haha :) Sensoren Kalibrieren ^^ IR-Sensoren geben nur “Licht da” und “Licht nicht da” weiter. Da gibt es nichts zu kalibrieren.
 	

### Andy says:	
February 28, 2013 at 20:01	

Interessante Antwort. OK, dass der Fachhändler vielleicht nicht löten möchte, aber zumindest sollte es möglich sein, dass die Baugruppe als Ganzes ersetzt wird.

Um Folgeschäden mache ich mir keine Sorgen, ich denke nicht, dass es welche gibt und ohne die Reparatur wäre der Roomba schon im Elektroschrott. :-)

### hans says:	
March 11, 2013 at 22:35	

Hallo Andy,
es ist unglaublich. Vor drei Stunden wollten wir unseren geliebten wallE schon wegpacken. Mit einer Träne im Knopfloch dachte ich mir, wenn er eh schon hin ist, schraub ich ihn mal auf. Eigentlich wollte ich ja nur wissen, welche Schrauben die richtigen sind. Dass ich dann ne Komplettanleitung bekomme, hätte ich nicht erwartet. Mit meinem losbudenmultischraubendreher hab ich alles zerlegt, Unmengen Staub geschluckt, um dann endlich am defekten Sensor zu landen. Erstens hatte ich keine Lust zum Löten und zweitens keine Ersatzteile. Also hab ich mein Glück mit einem q-tip probiert und die beiden Teile gereinigt. Siehe da nach einigem Schwitzen ist wieder alles verschraubt, kein Teil übrig und er läuft wieder. Vielen Dank für die Anleitung.
Grüße
Hans


### Mathias says:	
April 7, 2013 at 14:22	

Danke für die tolle Anleitung, mein Roomba funktioniert jetzt wieder.
Super Service

	
### Dirk says:	
April 21, 2013 at 10:28	

Hi Andy,
Vielen dank für die Super-Anleitung! Ich habe auch ein ähnliches Problem. Bei der Selbstdiagnose kam heraus, dass der Spot-Led dauerhaft an war. Da ich keine Ersarzteile zur Hand hatte, habe ich gestern den Roomba einmal zur Übung auseinandergenommen. Und siehe, nach dem Zummensetzen hat der Roomba wieder eine halbe Stunde funktioniert ( auch Sensortest bestanden). Dann wieder das gleiche ( dreht sich nur noch im Kreis).
Meine Frage: Sind dann eindeutig Fototransistor und Diode defekt oder kann noch etwas anderes an der Bumpersensorbaugruppe defekt sein ? (weil es nach dem Zusammensetzen eine weile funktioniert hat)
Nochmals vielen Dank!
Gruß
Dirk
	

### Andy says:	
    April 21, 2013 at 11:04	

    Hi,

    kann natürlich keinen 100% Rat geben, aber nach allem was ich so ein Rückmeldungen bekommen habe, waren es bei diesem Fehler immer die Dioden.

    Bei mir hatte ich ein ähnliches Verhalten nach dem ersten Zerlegen und Zusammenbauen der Roomba auch erstmal wieder ging. Nach einer Weile dann wieder der gleiche Fehler.

    Ich vermute, dass die Bauteile auch etwas temperaturabhängig sind.

    Viel Erfolg!

    Andy
	

### Nadim says:	
July 7, 2013 at 13:57	

Hallo Andy, eine sehr tolle Anleitung zu dem beheben des Fehlers.

Bei meinem Roomba 560 habe ich den Test gemacht, und ergab das die Leuchte Spot dauerhaft leuchtet, also ist der Bumper auf der Linken Seite defekt ? Ich würde dann am liebsten beide seiten reparieren und die Sensoren neu rein löten.

Eine Frage habe ich noch, und zwar wenn ich mit einer Kamera vorne am Roomba die Sensoren schaue leuchten nicht alle? Wie sieht das bei dir aus ? Ich habe die Befürchtung, das noch mehr kaputt ist :-(

Ich habe auch noch 2 Sensoren gefunden, die vorne weiter hinten im Gerät sitzen, vorne mittig. Leuchten die bei dir auch ?

so das war es erstmal :-)

Hoffe auf eine Antwort. viele grüße und einen schönen Tag noch Nadim

### Andy says:	
    July 9, 2013 at 09:01	

    Hallo,

    ja ist denke auf jeden Fall sinnvoll gleich beide zu ersetzen. Bei mir ging auch die andere Seite ein paar Monate danach kaputt.

    Bzgl. der anderen Sensoren, weiß ich nicht genau. Ich dachte zuerst diese hätten was mit dem Bumper zu tun, haben sie aber nicht. Ich meine bei mir haben alle geleuchtet, bin mir aber nicht sicher. Aber wie gesagt, ich weiß leider nichts über deren genaue Funktion.

    Kann jetzt leider auch nicht nachschauen ohne das Ding zu zerlegen.

    Gruß
    Andy


### Dirk says:	
August 1, 2013 at 21:19	

Moin Andy. Auch ich habe , dank der super Anleitung, einen 560er der wieder tut was er soll. Dank auch an Benni, denn bei mir im Conrad waren auch die richtigen Dioden nicht am Lager. Mit der 153692 IR-Diode Osram hat es dann auch geklappt. Also noch mal DANKE für die Anleitung.

Gruß Dirk


### Jürgen says:	
October 12, 2013 at 07:23	

Hallo Andy,

SENSATIONELL!
Vielen vielen vielen vielen Dank für deine Anleitung hier.
Ich habe zwei Stunden geschraubt und gelötet; jetzt läuft er wieder, unser Robbie.
Aber man braucht schon ein wenig Fingerspitzengefühl…

	
### Maran says:	
November 10, 2013 at 22:31	

Hallo an alle,
auch ich (Ingenieur) habe mich nach ausführlichem Studium der Berichte an die Reparatur gewagt, obwohl ich unseren Putzi schon abgeschrieben habe. Die Dioden habe ich mir einfach von Conrad schicken lassen und eingebaut (das löten war noch das kniffeligste, weil ich zunächst nicht wusste, wie ich 2 Kontakte mit einem Lötkolben gleichzeitig auslöten soll, aber dank der Hilfe einer 3.Hand (meiner Frau) hat es geklappt). Ich hätte nicht gedacht, dass das alles funktioniert. Aber Putzi tut jetzt wieder ! Echt spitze ! Vielen Dank, besonders an Andy. Ist immer schön, den “Fachhändlern” ein Schnäppchen zu schlagen.

