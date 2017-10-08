---
author: admin
comments: true
date: 2011-10-01 09:38:00+00:00
layout: post
slug: emf-setting-an-empty-string-as-default-value
title: 'EMF: Setting an empty string as default value'
wordpress_id: 1033
categories:
- Eclipse
- Java
tags:
- default
- EMF
- 'null'
- string
- value
---

If you create a string in an EMF model, its null by default:

[![image](https://andydunkel.net/assets/uploads/2011/10/image_thumb.png)](https://andydunkel.net/assets/uploads/2011/10/image.png)

If you want to have an empty string, instead of null, you have to enter a “Default Value Literal”. For an empty string, just click on the value and hit enter (very obvious):

![image](https://andydunkel.net/assets/uploads/2011/10/image1.png)

To get the null value back, just click on “Restore Default Value” in the toolbar of the properties view. 

![image](https://andydunkel.net/assets/uploads/2011/10/image2.png)
