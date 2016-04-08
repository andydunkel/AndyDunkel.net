---
author: admin
comments: true
date: 2011-09-16 06:00:00+00:00
layout: post
slug: setacceleratorswt-ctrl-o-not-working
title: setAccelerator(SWT.CTRL | 'O'); //not working!
wordpress_id: 994
categories:
- Java
tags:
- binding
- Key
- menu
- Problem
- RCP
---

In my current RCP application I had a problem that the menu key shortcuts did not work correctly:

![image](http://andydunkel.net/assets/uploads/2011/09/image8.png)

When I started the application and pressed the shortcut, nothing happened. After I opened the menu once, suddenly everything worked! ![Nachdenkliches Smiley](http://andydunkel.net/assets/uploads/2011/09/wlEmoticon-thinkingsmile.png)

I created the menu item in the “ApplicationActionBarAdvisor”:





> actionOpen.setAccelerator(SWT.CTRL | 'O');





So what is the problem? It came up, that in an RCP application the menu and the items are loaded, when the user opens it for the first time. There is not really a solution for that, just a workaround: I had to call “updateAll(true)” on the menu manager:




    
    IWorkbenchWindow window = Workbench.getInstance().getActiveWorkbenchWindow();
    
    if(window instanceof WorkbenchWindow) {
        MenuManager menuManager = ((WorkbenchWindow)window).getMenuManager();
        menuManager.updateAll(true);
    }
    




I called this from my main application window. After that the key bindings worked correctly.
