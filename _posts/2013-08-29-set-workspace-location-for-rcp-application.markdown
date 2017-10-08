---
author: admin
comments: true
date: 2013-08-29 18:51:42+00:00
layout: post
slug: set-workspace-location-for-rcp-application
title: Set workspace location for RCP application
wordpress_id: 1630
categories:
- Eclipse
tags:
- appdata
- RCP
- Workspace
---

In my Eclipse / RCP application the .metadata directory was always created in the working directory. This worked fine when I was opening the application normally.




However, I needed file associations, so the user can just double click on file somewhere on his computer and open the file.




If you do this, the working directory is set to the directory where the file is located. This resulted in the creation of a .metadata directy at the same location. Brrr...




Since I dont like the creation of .metadata in the working directory either, because thats usually the application folder and not writeable, this needed to be addressed anyway.




So I looked for a solution to change the workspace location for the application.




To achieve this, two steps are neccessary. First we add an additional parameter in the Run configuration:




![Working dir1](https://andydunkel.net/assets/uploads/2013/08/working_dir1.png)




 




The paramater is _-data @noDefault_ and makes it possible for us to set up our own location.




Which we do in the *Application class of our application:




![Working dir2](https://andydunkel.net/assets/uploads/2013/08/working_dir2.png)




 




Here is the example code for copy and paste:




    
    
    try {
    	Location instanceLoc = Platform.getInstanceLocation();
    
    	// set location to c:\temp
    	instanceLoc.set(new URL("file", null, "c:\\temp"), false);
    }
    catch (Exception err) {
    	System.out.println(err.getMessage());
    }
    





In the example we just use c:\temp, but you usually might want to set this path to the [application data](http://codedump.ekiwi.de/?p=46) folder on the system.
