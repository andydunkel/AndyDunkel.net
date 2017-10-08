---
author: admin
comments: true
date: 2011-09-17 16:38:00+00:00
layout: post
slug: emf-object-is-not-contained-in-a-resource
title: 'EMF: Object is not contained in a resource'
wordpress_id: 1006
categories:
- Eclipse
- Java
tags:
- EMF
- Problem
- Recource
- Save
---

I had a small problem [saving my EMF model to XML](https://andydunkel.net/eclipse/java/2011/08/02/save-and-load-an-emf-model-to-an-xml-file.html). I got the error message “The object … is not contained in a resource”.

![image](https://andydunkel.net/assets/uploads/2011/09/image9.png)

The solution is simple. In the EMF editor just set containment to true for the reference:

![image](https://andydunkel.net/assets/uploads/2011/09/image10.png)

Done! After that, the object was saved correctly in the XML file. 
