---
author: admin
comments: true
date: 2015-11-13 17:00:00+00:00
layout: post
slug: visual_studio_startup_problems
title: 'Visual Studio 2015 startup: problem occurred when loading the menu'
categories:
- Coding
tags:
- VisualStudio

---

This morning I had a strange error message, when I tried to start Visual Studio (version 2015, but it seems this also affects older versions):

	A problem occurred when loading the Microsoft Visual Studio menu. To fix this problem, run 'devenv.exe /resetsettings' from the command prompt. Note: this command resets your environment settings.

![](/assets/uploads/2015/11/vs1.png)	

Needless to say that the proposed command did not do the trick. After some digging in the internet I found the solution. Turned out that Visual Studio has problems, when the <code>PATH</code> variable becomes bigger than 2048 character. 

The solution was to remove some items from the <code>PATH</code> variable:

![](/assets/uploads/2015/11/vs2.png)

Doing this and restarting the computer brought Visual Studio back to life.
