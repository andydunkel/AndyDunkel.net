---
author: admin
comments: true
date: 2012-07-09 21:21:25+00:00
layout: post
slug: remove-unwanted-preference-pages-from-your-rcp-app
title: Remove unwanted preference pages from your RCP app
wordpress_id: 1402
categories:
- Coding
- Eclipse
tags:
- PreferencePage
- RCP
---

In my recent RCP app some unwanted preferences, contributed from other plugins showed up:




![NewImage](http://andydunkel.net/assets/uploads/2012/07/RCP_preferences1.png)




To remove them, just add the following code to your WorkbenchAdvisor class:







> 

> 
> public void postStartup(){
> 
> 

> 
>   PreferenceManagerpm=PlatformUI.getWorkbench().getPreferenceManager();
> 
> 

> 
>   pm.remove( "org.eclipse.help.ui.browsersPreferencePage" ); //remove single contribution
> 
> 

> 
>   pm.removeAll(); //just remove all
> 
> 

> 
> }
> 
> 

