---
author: admin
comments: true
date: 2011-05-16 19:14:00+00:00
layout: post
slug: remove-unwanted-actions-in-rcp-application
title: Remove unwanted actions in RCP application
wordpress_id: 41
categories:
- Eclipse
- Java
tags:
- RCP unwanted Actions Eclipse
---

In my current RCP application some unwanted Eclipse actions showed up in the toolbar and menubar:

![image](http://andydunkel.net/assets/uploads/2011/05/image4.png)

How to get rid of these?

The solution is “simple”. Add the following method and array to the “ApplicationActionBarAdvisor”  class:

    
    private static final String[] actionSetId = new String[] { "org.eclipse.ui.WorkingSetActionSet", //$NON-NLS-1$
        "org.eclipse.ui.edit.text.actionSet.navigation", //$NON-NLS-1$
        "org.eclipse.ui.edit.text.actionSet.convertLineDelimitersTo", //$NON-NLS-1$
        "org.eclipse.ui.actionSet.openFiles", //$NON-NLS-1$
        "org.eclipse.ui.edit.text.actionSet.annotationNavigation", //$NON-NLS-1$
        "org.eclipse.ui.NavigateActionSet", //$NON-NLS-1$
        "org.eclipse.search.searchActionSet"}; //$NON-NLS-1$



    
        private void removeUnWantedActions() {
           ActionSetRegistry asr = WorkbenchPlugin.getDefault().getActionSetRegistry();
           IActionSetDescriptor[] actionSets = asr.getActionSets();
    
           IExtension ext = null;
           for (IActionSetDescriptor actionSet : actionSets) {
              for (String element : actionSetId) {
            	  System.out.println(element);
    
                 if (element.equals(actionSet.getId())) {
                    ext = actionSet.getConfigurationElement().getDeclaringExtension();
                    asr.removeExtension(ext, new Object[] { actionSet });
                 }
              }
           }
        }



Call “removeUnWantedActions” from the constructor.

The unwanted actions should be gone now:

![image](http://andydunkel.net/assets/uploads/2011/05/image5.png)
