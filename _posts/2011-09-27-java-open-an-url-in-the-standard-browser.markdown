---
author: admin
comments: true
date: 2011-09-27 19:19:47+00:00
layout: post
slug: java-open-an-url-in-the-standard-browser
title: 'Java: Open an URL in the standard browser'
wordpress_id: 1026
categories:
- Eclipse
- Java
tags:
- brower
- open
- standard
- system
---

Here is short code snippet to open an URL with the systems standard browser:


    
    
    public void openUrl(String url) throws IOException, URISyntaxException {
      if(java.awt.Desktop.isDesktopSupported() ) {
            java.awt.Desktop desktop = java.awt.Desktop.getDesktop();
    
            if(desktop.isSupported(java.awt.Desktop.Action.BROWSE) ) {
              java.net.URI uri = new java.net.URI(url);
                  desktop.browse(uri);
            }
          } 
    }
    



java.awt.Desktop is supported as of Java 6.


