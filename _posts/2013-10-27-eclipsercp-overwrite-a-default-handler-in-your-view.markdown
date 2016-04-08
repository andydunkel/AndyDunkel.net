---
author: admin
comments: true
date: 2013-10-27 11:32:51+00:00
layout: post
slug: eclipsercp-overwrite-a-default-handler-in-your-view
title: 'Eclipse/RCP: Overwrite a default handler in your view'
wordpress_id: 1640
categories:
- Eclipse
tags:
- command
- Eclipse
- Handler
- RCP
- View
---

In my RCP application CTRL + S is assigned to the save function of the current editor. Addional I wanted to have the same shortcut for a save function in a view.




This can be achieved very easy (as always, if you know the steps). :-)




In the views plugin, add a handler to the org.eclipse.ui.handlers section of your plugin.xml:




![NewImage](http://andydunkel.net/assets/uploads/2013/10/NewImage.png)




This causes the command only to be active in our view. Next thing is to define the proper handler class which performs the operation:




![Handler2](http://andydunkel.net/assets/uploads/2013/10/handler2.png)




In XML it looks like that:




    
    
    <extension point="org.eclipse.ui.handlers">
      <handler class="com.my.awesome.SaveContentHandler" commandid="org.eclipse.ui.file.save">
    	 <activewhen>
    		<with variable="activePartId">
    		   <equals value="com.my.awesome.view">
    		   </equals>
    		</with>
    	 </activewhen>
      </handler>
    </extension>
    





Thats it!
