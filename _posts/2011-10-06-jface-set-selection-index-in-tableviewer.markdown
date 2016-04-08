---
author: admin
comments: true
date: 2011-10-06 18:53:51+00:00
layout: post
slug: jface-set-selection-index-in-tableviewer
title: 'JFace: Set selection index in TableViewer'
wordpress_id: 1040
categories:
- Eclipse
- Java
- SWT
tags:
- JFace
- RCP
- tableViewer
---

Selecting a row by index in a table viewer isn't very straightforward. There is no method like tableViewer.setSelectionIndex.

Here is a snippet how its done:

    
    
    
    int selection = 5; //row we want to select
    tableViewer.setSelection(new StructuredSelection(tableViewer.getElementAt(selection)),true);
    
