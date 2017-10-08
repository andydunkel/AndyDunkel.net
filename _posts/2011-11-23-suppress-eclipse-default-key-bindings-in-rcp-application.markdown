---
author: admin
comments: true
date: 2011-11-23 21:04:00+00:00
layout: post
slug: suppress-eclipse-default-key-bindings-in-rcp-application
title: Suppress Eclipse default key bindings in RCP application
wordpress_id: 1119
categories:
- Eclipse
- SWT
tags:
- bindings
- Eclipse
- Key
- overwrite
---

In my current project, the default key bindings from Eclipse where active. When I hit CTRL + N (CMD +N on a MAC) for a new file the “New Wizard” showed up. I defined my own key bindings, but the Eclipse key bindings seemed to overrule them. ![Trauriges Smiley](https://andydunkel.net/assets/uploads/2011/11/wlEmoticon-sadsmile.png)

![image](https://andydunkel.net/assets/uploads/2011/11/image2.png)

Not what I had in mind. And who knows what other key bindings are waiting in the background, just showing up and scaring my customers.

But how to get rid of these?

In your plugin XML, add a new extension point, enter id and name:

![image](https://andydunkel.net/assets/uploads/2011/11/image3.png)

Next step, create a “plugin_customization.ini” file in the directory where your plugin.xml file is, with the following content:

![image](https://andydunkel.net/assets/uploads/2011/11/image4.png)

Now we need to create a product that uses this ini file:

![image](https://andydunkel.net/assets/uploads/2011/11/image5.png)

**Warning: **After the product was created, the ini file was a little bit mixed up, because Eclipse added 2 lines. So correct the file if needed, otherwise the key bindings will not work.

Now start your product, the key bindings should be correct now:

![image](https://andydunkel.net/assets/uploads/2011/11/image6.png)

If not, clear the workspace of your application first.
