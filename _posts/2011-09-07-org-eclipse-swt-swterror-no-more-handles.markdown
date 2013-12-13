---
author: admin
comments: true
date: 2011-09-07 18:17:00+00:00
layout: post
slug: org-eclipse-swt-swterror-no-more-handles
title: 'org.eclipse.swt.SWTError: No more handles'
wordpress_id: 984
categories:
- Java
tags:
- Exception
- handle
- SWT
---

In our current project we came across the following error, when we opened multiple of our editors in a RCP application: 

![image](http://andydunkel.net/assets/uploads/2011/09/image5.png)

Never seen this one before. Most sources in the internet mentioned something about “not disposing SWT resources”. However this happened when we opened the editor. So a “not disposed” problem was very unlikely.

Strange enough, all other applications in the system started to behave strange. No new windows could be opened, the clipboard stopped working …

Well, what's the problem then? 

Simple enough, the only bad thing we did was creating too much controls in our editors. We have a “MultiPageEditor” in Eclipse with a lot of controls in it for configuring servo drives.

Each control in Windows uses a handle. Windows XP can manage 10000 user handles for each process and total 32000 for each desktop. 

Each of our editors added about 1100 handles to the list. After opening 4-5 editors on my machine, the exception occurred.

Here is some sample code to reproduce the problem, it just creates 10.000 buttons:
    
    import org.eclipse.swt.SWT;
    import org.eclipse.swt.layout.RowLayout;
    import org.eclipse.swt.widgets.Button;
    import org.eclipse.swt.widgets.Display;
    import org.eclipse.swt.widgets.Shell;
    
    public class SWTHandleTest {
    
    	/**
    	 * @param args
    	 */
    	public static void main(String[] args) {
    		Display display = new Display();
    		Shell shell = new Shell(display);
    		shell.setSize(300, 200);
    		shell.setText("Button Example");
    		shell.setLayout(new RowLayout());
    
    		for (int i = 0; i < 10000; i++) {
    			Button button = new Button(shell, SWT.PUSH);
    			button.setText("www.eKiwi.de");
    		}
    
    		shell.open();
    		while (!shell.isDisposed()) {
    			if (!display.readAndDispatch())
    				display.sleep();
    		}
    		display.dispose();
    	}
    }




You can check how many handles an application uses in the task manager. You must display the “User objects” column:




![image](http://andydunkel.net/assets/uploads/2011/09/image6.png)






**What is the solution? **




Well there is none. The limit is hard coded in Windows. So the only way is to change your application design. Only create elements that are visible and remove/dispose elements that no longer need to be visible.
