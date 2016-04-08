---
author: admin
comments: true
date: 2011-05-17 16:55:27+00:00
layout: post
slug: javaswt-gui-access-from-thread
title: Java/SWT GUI Access from Thread
wordpress_id: 47
categories:
- Java
- SWT
tags:
- Java
- SWT
- Thread
---

A thread in Java cannot directly access the GUI. With the following snippet the access is possible:

Call from the thread:

    
    
    @Override
    public void run() {
    	html = "<h1>Huhu</h1>";
    	dlg.setSomeStuffToGui(html);	
    }
    



Method in the GUI:

    
    
    public void setSomeStuffToGui(final String html) {
    	Display display = getDisplay();
    	
    	display.asyncExec(new Runnable() {
            public void run() {
            	//your stuff goes here:
            	textField.setText(html);
            }
          });			
    }
    
