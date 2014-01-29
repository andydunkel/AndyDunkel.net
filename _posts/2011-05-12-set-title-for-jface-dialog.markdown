---
author: admin
comments: true
date: 2011-05-12 20:28:00+00:00
layout: post
slug: set-title-for-jface-dialog
title: Set title for JFace dialog
wordpress_id: 33
categories:
- Eclipse
- Java
tags:
- JFace Dialog Set Title SetTitle
- setTitle
---

The following snippet sets the title for a JFace dialog:


	@Override
	protected void configureShell(Shell shell) {
		super.configureShell(shell);
		shell.setText("My Dialog Title");
	}


However the following error might occur:

[![image](http://andydunkel.net/assets/uploads/2011/05/image_thumb1.png)](http://andydunkel.net/assets/uploads/2011/05/image1.png)

This can be resolved if you change the setting from “error” to “warning” in the [Eclipse](http://eclipse.org/) preferences.

[![image](http://andydunkel.net/assets/uploads/2011/05/image_thumb2.png)](http://andydunkel.net/assets/uploads/2011/05/image2.png)
