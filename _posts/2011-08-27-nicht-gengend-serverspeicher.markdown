---
author: admin
comments: true
date: 2011-08-27 16:33:00+00:00
layout: post
slug: nicht-gengend-serverspeicher
title: Nicht genügend Serverspeicher
wordpress_id: 963
categories:
- Sonstiges
- Tools
tags:
- Acronis
- Netzwerkfreigaben
- Serverspeicher
---

Momentan ziehe ich Windows Probleme magisch an. Heute habe ich auf meinem Server (eigentlich nur eine Windows XP Kiste mit ein paar Freigaben) Acronis True Image installiert. Backups sind ja wichtig und so…

Nicht nur, dass es hierbei schon [zu Problemen kam](http://blog.ekiwi.de/?p=733), nein, ich konnte anschließend auch nicht mehr auf meine Netzwerkfreigaben zugreifen. Fehlermeldung: “Nicht genügend Serverspeicher”. Super! ![Weinendes Smiley](http://andydunkel.net/assets/uploads/2011/08/wlEmoticon-cryingface.png)

![image](http://andydunkel.net/assets/uploads/2011/08/image21.png)

Nach etwas Internetrecherche kam ich zu folgendem Lösungsvorschlag. In der Registry unter   
“HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services  
\lanmanserver\parameters”

den Parameter “IRPStackSize” abändern. 32 hex, bzw. 50 ist das Maximum.

![image](http://andydunkel.net/assets/uploads/2011/08/image22.png)

 

Bei mir war der Eintrag nicht vorhanden, also anlegen mit Rechtsklick:

![image](http://andydunkel.net/assets/uploads/2011/08/image23.png)

Anschließend den Wert eingeben:

![image](http://andydunkel.net/assets/uploads/2011/08/image24.png)

Nun noch neustarten und schon ging wieder alles. Easy oder? ![Smiley](http://andydunkel.net/assets/uploads/2011/08/wlEmoticon-smile2.png)
