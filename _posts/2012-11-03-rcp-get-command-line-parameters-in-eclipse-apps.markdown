---
author: admin
comments: true
date: 2012-11-03 09:55:57+00:00
layout: post
slug: rcp-get-command-line-parameters-in-eclipse-apps
title: 'RCP: Get command line parameters in Eclipse Apps'
wordpress_id: 1485
categories:
- Coding
- Eclipse
---

You can easily access the command line parameters of your RCP application via the Platform object, here is an example:

    
    String args[] = Platform.getCommandLineArgs();
    int i = 0;
    while(i < args.length) {
      System.out.println(args[i]);
      i++;
    }
