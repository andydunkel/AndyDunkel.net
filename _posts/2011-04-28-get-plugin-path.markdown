---
author: admin
comments: true
date: 2011-04-28 20:59:35+00:00
layout: post
slug: get-plugin-path
title: 'Get plugin path '
wordpress_id: 12
categories:
- Eclipse
- Java
tags:
- Plugin folder eclipse
---

This snippets gets the local folder for a plugin:


    
    
    public static File getPluginFolder() {
    	if(pluginFolder == null) {
    	    URL url = Platform.getBundle("my.plugin.id").getEntry("/");
    	    try {
    	        url = Platform.resolve(url);
    	    }
    	    catch(IOException ex) {
    	        ex.printStackTrace();
    	    }
    	    pluginFolder = new File(url.getPath());
    	}
    	
    	return pluginFolder;
    }
    
