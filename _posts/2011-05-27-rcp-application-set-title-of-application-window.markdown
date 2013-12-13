---
author: admin
comments: true
date: 2011-05-27 16:14:00+00:00
layout: post
slug: rcp-application-set-title-of-application-window
title: RCP Application Set Title of Application Window
wordpress_id: 208
categories:
- Eclipse
tags:
- ApplicationWorkbenchAdvisor
- Eclipse
- IWorkbenchWindowConfigurer
- RCP
- title
- Window
---

To dynamically set the title of a RCP application, the following code snippet is useful:

    
    
    private String fileName = "unknown.daf";
    	
    public WorkbenchWindowAdvisor createWorkbenchWindowAdvisor(IWorkbenchWindowConfigurer configurer) {
    	IWorkbenchWindowConfigurer windowConfigurer = configurer;
    	String title = "DA-FormMaker - " + fileName;
    	windowConfigurer.setTitle(title);
    	
      return new ApplicationWorkbenchWindowAdvisor(configurer);
    }


The window title can be set via the “_IWorkbenchWindowConfigurer_”. You can get a reference to it in the “_ApplicationWorkbenchAdvisor_”. The result looks like this (obviously ![Erstauntes Smiley](http://andydunkel.net/assets/uploads/2011/05/wlEmoticon-surprisedsmile.png)):

![image](http://andydunkel.net/assets/uploads/2011/05/image10.png)
