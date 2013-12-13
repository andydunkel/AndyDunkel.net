---
author: admin
comments: true
date: 2011-06-28 11:44:50+00:00
layout: post
slug: okpressed-in-jface-dialog
title: Java/RCP - okPressed in JFace dialog
wordpress_id: 577
categories:
- Eclipse
- Java
tags:
- cancelPressed
- Dialog
- JFace
- OK
- okPressed
---

Sometimes JFace and RCP are not straightforward. At least not for me. [![](http://andydunkel.net/assets/uploads/2011/06/wlEmoticon-smile5.png)](http://andydunkel.net/assets/uploads/2011/06/wlEmoticon-smile5.png)

For example the JFace dialog:

[![](http://andydunkel.net/assets/uploads/2011/06/rcp_jface_dlg.png)](http://andydunkel.net/assets/uploads/2011/06/rcp_jface_dlg.png)

It features an OK and Cancel button by default. If you want to do something when the user clicks the OK button, for example save the values from control elements to variables, you can overwrite the "okPressed" method:
    
    	@Override
    	protected void okPressed() {
    		nameString = textBoxName.getText();
    		super.okPressed();
    	}

When the OK button is pressed, the "okPressed" method is executed. The "open" method of the dialog returns _IDialogConstants.OK_ID_ in that case (instead of SWT.OK).

Of course there is also a "cancelPressed" method for the Cancel button
