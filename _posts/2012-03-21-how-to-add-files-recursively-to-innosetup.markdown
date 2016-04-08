---
author: admin
comments: true
date: 2012-03-21 09:41:00+00:00
layout: post
slug: how-to-add-files-recursively-to-innosetup
title: How to add files recursively to InnoSetup
wordpress_id: 1261
categories:
- Coding
tags:
- InnoSetup
---

Especially with my current RCP applications I had the problem how to add all these files to the installer. 

Here is an example how to add a complete folder recursively to your InnoSetup: 

> [Files]  
DestDir: {app}; Source: ..\files\*; Flags: recursesubdirs

Another hint, if you want to delete the application folder after uninstall (even if there are other files that are not uninstalled by default), add this to your setup:

> [UninstallDelete]  
Name: {app}; Type: filesandordirs
