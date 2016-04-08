---
author: admin
comments: true
date: 2012-11-02 09:54:44+00:00
layout: post
slug: rcp-switch-to-perspective-via-code
title: 'RCP: Switch to perspective via code'
wordpress_id: 1479
categories:
- Coding
- Eclipse
---

A small snippet which switches to a certain perspective via code:



    
    IPerspectiveDescriptor[] perspectives =
    PlatformUI.getWorkbench().getPerspectiveRegistry().getPerspectives();
    
    IWorkbenchPage page =
    PlatformUI.getWorkbench().getActiveWorkbenchWindow().getActivePage();
        if(page != null) {
          for (IPerspectiveDescriptor des : perspectives) {
            if (des.getId().equals("my.perspective.id")) {
              page.setPerspective(des);
              break;
            }
          }
        }
    
    return null;
    
