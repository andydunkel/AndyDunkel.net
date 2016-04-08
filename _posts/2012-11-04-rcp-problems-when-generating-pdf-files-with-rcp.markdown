---
author: admin
comments: true
date: 2012-11-04 09:57:36+00:00
layout: post
slug: rcp-problems-when-generating-pdf-files-with-rcp
title: 'RCP: Problems when generating PDF files with RCP'
wordpress_id: 1493
categories:
- Coding
- Eclipse
tags:
- birt
- RCP
---

Recently I ran into a problem in my RCP application during the generation of a PDF file from a [BIRT](http://www.eclipse.org/birt/phoenix/) report. This only happened when trying to run the export from the exported product:




![1](http://andydunkel.net/assets/uploads/2012/11/11.png)




The first problem was an "Error.OutputFormatNotSupported".




This was a little bit strange, since I would have expected some syntax errors in my project trying to use stuff from another plugin that is referenced to my project.




Anyway, I was able to fix this by adding "org.eclipse.birt.engine.emitter.pdf" to my run configuration. After that I got another error:




> 

> 
> org.eclipse.birt.report.engine.api.engineexception cant create data engine
> 
> 





Remembering that I am using JavaScript in my BIRT report, the approach was similar. Just a missing reference to "org.eclipse.birt.report.engine.script.javascript".




![2](http://andydunkel.net/assets/uploads/2012/11/21.png)




After that, the report was working from Eclipse as well as from the exported project. 




Here is a kitten:




![3](http://andydunkel.net/assets/uploads/2012/11/31.png)
