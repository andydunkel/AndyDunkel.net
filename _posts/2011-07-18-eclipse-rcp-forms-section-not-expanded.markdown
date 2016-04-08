---
author: admin
comments: true
date: 2011-07-18 20:14:00+00:00
layout: post
slug: eclipse-rcp-forms-section-not-expanded
title: 'Eclipse RCP: Forms Section not expanded'
wordpress_id: 792
categories:
- Java
tags:
- API
- expanded
- Forms
- Section
- setExpanded
- WindowBuilder
---

Sometimes strange things happen in Eclipse. Like this one in [WindowBuilder](http://www.eclipse.org/windowbuilder/), the best tool for designing GUIs in Eclipse ([via](http://twitter.com/#!/hrb79/status/92941011923374080)). 

I created a Forms API section in the program, but when I executed the program, the section was not expanded, not content was shown:

![image](http://andydunkel.net/assets/uploads/2011/07/image15.png)

In the properties editor, expanded was set to true. What to do??

<!-- more -->

The solution is simple, it appears that the order of commands in the source code has some importance. The setExpanded Method must be called after the setClient method of the Section.

![image](http://andydunkel.net/assets/uploads/2011/07/image16.png)

After that, the section is expanded properly:

![image](http://andydunkel.net/assets/uploads/2011/07/image17.png)
