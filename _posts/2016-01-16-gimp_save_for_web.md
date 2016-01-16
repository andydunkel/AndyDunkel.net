---
author: admin
comments: true
date: 2016-01-16 17:00:00+00:00
layout: post
slug: gimp_save_for_web
title: 'Gimp - save for web plugin'
categories:
- Linux
- OpenSource
tags:
- Gimp

---

*Note: German versions of this article can be found [here](http://ekiwi-blog.de/?p=2507) and [here](http://ekiwi-blog.de/?p=2524).*

One of my favorite features of Photoshop if the feature "Save for web". Its a nice tool to optimize your image for the web. You can basically choose file format, compression, number of colors and see the results of the optimization in a preview image.

In [Gimp](http://www.gimp.org) there is no such feature by default yet. But there is a plugin that implements the feature. You can [download it here](http://registry.gimp.org/node/33).

After installation the plugin becomes available in the file menu. The plugin offers the same functions as the Photoshop one:

![](/assets/uploads/2016/1/save_for_web_linux.png)

![](/assets/uploads/2016/1/save_for_web_linux_main.png)

## Installation on Windows

On Windows you just extract the .exe file of the plugin into the plugin directory of Gimp: <code>c:\Users\username\.gimp-2.8\plug-ins</code>.

## Installation on Linux

After extraction of the archive on Linux the installation is done in three simple steps:

    ./configure
    make
    make install
    
However there where a few problems with that. The <code>configure</code> script exited with an error message:

    configure: error: Package requirements (gimp-2.0 >= 2.3.0 gimpui-2.0 >= 2.3.0) were not met:
    
    No package 'gimp-2.0' found
    No package 'gimpui-2.0' found
    
This looks like Gimp could not be found, but thats not true. Actually you need the <code>gimp2.0-dev</code> package installed:

    sudo apt-get install gimp2.0-dev intltool
    
In my case it also needed the package <code>intltool</code>. After that the installation steps went without no further errors.