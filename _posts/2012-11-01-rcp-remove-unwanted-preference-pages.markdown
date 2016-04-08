---
author: admin
comments: true
date: 2012-11-01 11:18:12+00:00
layout: post
slug: rcp-remove-unwanted-preference-pages
title: 'RCP: Remove unwanted preference pages'
wordpress_id: 1497
categories:
- Coding
- Eclipse
tags:
- Eclipse
- plugin
- preferences
- RCP
---

In my RCP application some unwanted sections in the preferences showed up:




![Unwanted Preferences](http://andydunkel.net/assets/uploads/2012/11/UnwantedPreferences.png)




How to get rid of them? Thats easy, in the "ApplicationWorkbenchAdvisor" class, override the "postStartup" method:



    
    @Override
    public void postStartup(){
    	  PreferenceManager pm = PlatformUI.getWorkbench().getPreferenceManager();
    	  pm.remove("org.eclipse.help.ui.browsersPreferencePage"); //$NON-NLS-1$
    	  pm.remove("org.eclipse.help.ui.contentPreferencePage"); //$NON-NLS-1$
    }
    




What if you don't know the id of the preference page? No problem, you can output those with the following code snippet:



    
    
    @Override
    public void postStartup(){
    	  PreferenceManager pm = PlatformUI.getWorkbench().getPreferenceManager();
    	  IPreferenceNode[] arr = pm.getRootSubNodes();
    	          
    	  for(IPreferenceNode pn:arr){
    	      System.out.println("Label:" + pn.getLabelText() + " ID:" + pn.getId());
    	  }
    }
    
