---
author: admin
comments: true
date: 2011-07-30 14:26:00+00:00
layout: post
slug: drehung-eines-vektors-im-r2
title: Drehung eines Vektors im R2
wordpress_id: 818
categories:
- Sonstiges
tags:
- Drehung
- Vektor
---

Heute mal ein wenig Mathematik. Braucht man ja mal ab und zu. Konkretes Problem: Drehung eines Punktes um den Koordinatenursprung. Brauchte ich konkret für eine Visualisierungskomponente (Anzeige des aktuellen Winkels).

Fangen wir an, zuerst benötigen wir die [Drehmatrix](http://de.wikipedia.org/wiki/Drehmatrix) (auf die Herleitung verzichte ich an dieser Stelle ![Smiley](http://andydunkel.net/assets/uploads/2011/07/wlEmoticon-smile7.png)), diese sieht wie folgt aus:

![image](http://andydunkel.net/assets/uploads/2011/07/image22.png)

Mit dieser wird der Vektor multipliziert:

![image](http://andydunkel.net/assets/uploads/2011/07/image23.png)

Hier gilt zu beachten, dass Matrixmultiplikationen im Allgemeinen nicht kommutativ sind. Die Drehung erfolgt im mathematisch positiven Sinn, also gegen den Uhrzeiger. Ausmultipliziert ergeben sich folgende Formeln:

![image](http://andydunkel.net/assets/uploads/2011/07/image24.png)

Ein kleines Beispiel, wir drehen den Punkt (2,2) um den Koordinatenursprung:

![image](http://andydunkel.net/assets/uploads/2011/07/image25.png)

Im Koordinatensystem sieht das ganze so aus:

![image](http://andydunkel.net/assets/uploads/2011/07/image26.png)

Das war’s auch schon. In diesem Sinne:
