---
author: admin
comments: true
date: 2011-10-04 17:20:00+00:00
layout: post
slug: eclipse-rcp-remove-tab-folder-from-view
title: 'Eclipse RCP: Remove tab folder from View'
wordpress_id: 1037
categories:
- Eclipse
- Java
- SWT
tags:
- folder
- RCP
- remove
- tab
---

If you create a new RCP application a view gets a tab like this:

![image](http://andydunkel.net/assets/uploads/2011/10/image3.png)

To remove the tab, use the “addStandaloneView” method in your perspective. Here is an example:
    
    public class Perspective implements IPerspectiveFactory {
      public void createInitialLayout(IPageLayout layout) {       
        String editorArea = layout.getEditorArea();
        layout.setEditorAreaVisible(false);
        
        layout.addStandaloneView(View.ID, false, IPageLayout.LEFT, 1.0f, editorArea);       
      }
    }
    




The result:




![image](http://andydunkel.net/assets/uploads/2011/10/image4.png)
