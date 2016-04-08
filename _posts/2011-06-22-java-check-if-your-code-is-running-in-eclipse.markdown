---
author: admin
comments: true
date: 2011-06-22 19:02:00+00:00
layout: post
slug: java-check-if-your-code-is-running-in-eclipse
title: 'Java: Check if your code is running in Eclipse'
wordpress_id: 510
categories:
- Java
tags:
- Check
- Command Line
- Debugging
- Eclipse
- Java
- Running
---

Sometimes, for example during debugging, it is useful to check if your code is running from the [Eclipse](http://eclipse.org/) IDE to exclude certain code from execution.

How can this be done? Here is an example:

    
    
    public class mainClass {
    
    	public static void main(String[] args) {
    		String inEclipse = System.getProperty("ineclipse");
    		
    		if ((inEclipse == null) || (!inEclipse.equals("true"))) {
    			System.out.println("Not running from Eclipse");
    			System.out.println(inEclipse);			
    		} else {
    			System.out.println("Running from Eclipse");
    			System.out.println(inEclipse);
    		}			
    	}
    }


<!-- more -->

The other thing we need to do here is to set the VM argument “ineclipse” in the “Run Configurations”:

[![image](http://andydunkel.net/assets/uploads/2011/06/image_thumb.png)](http://andydunkel.net/assets/uploads/2011/06/image5.png)

Here is the output from the example from within Eclipse and from the command line:

![compare_output](http://andydunkel.net/assets/uploads/2011/06/compare_output.png)
