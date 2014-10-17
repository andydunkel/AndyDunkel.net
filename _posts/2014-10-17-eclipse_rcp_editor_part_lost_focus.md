---
author: admin
comments: true
date: 2014-10-17 17:00:00+00:00
layout: post
slug: eclipse_rcp_editor_part_lost_focus
title: 'Eclipse RCP: lost focus event for Editor Part'
categories:
- Eclipse
- Java
tags:
- Events
---

Problem: how you can get notified when an editor part loses his focus. For getting the focus there is a simple solution to just overwrite the <code>setFocus</code> method of the editor part. Losing the focus is a little bit more difficult and not that obvious.

The solution is to add a part listener, namely <code>IPartListener2</code> to the page:

	public class MyEditor extends EditorPart
	{
	 	...

		@Override
		public void createPartControl(Composite parent) 
		{
	   		...

			getSite().getPage().addPartListener(new org.eclipse.ui.IPartListener2()
			 {
				@Override
				public void partActivated(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partBroughtToTop(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partClosed(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partDeactivated(IWorkbenchPartReference partRef) {
					System.out.println("Editor Focus lost");
					
				}
				@Override
				public void partOpened(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partHidden(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partVisible(IWorkbenchPartReference partRef) {
					
				}
				@Override
				public void partInputChanged(IWorkbenchPartReference partRef) {
					
				}
			}); 

			...
		}
	}

As you can see the listener interface also provides more interesting methods which might be useful.