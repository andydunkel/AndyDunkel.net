---
author: admin
comments: true
date: 2014-12-08 17:00:00+00:00
layout: post
slug: delphi_xe7_startup_problems
title: 'Delphi XE7 - Startup problem'
categories:
- Delphi
tags:
- XE
---

I experienced a very annoying problem with after updating Delphi XE7 to update 1.

When Delphi was started, it just hangs. After some time at least an error message pops up informing the user about not enough stack memory.

![image](https://andydunkel.net/assets/uploads/2014/12/xe7_1.png)

<code>displayNotification: Nicht genügend Stackspeicher / noch enough stack memory </code>

Delphi would still not react after clicking "OK" in the error message and remained in an unuseable state.

Looks like some problem with the start page Delphi shows (bds://default.html) when started. Investigations on the internet brought up some information and hints how to solve the problem: clear the Internet Explorers cache, delete the cache folder of Internet Explorer manually. However non of that worked for me.

Another solution is do disable the start page completely. To do that open the explorer (with admin rights) and navigate to the following folder of your Delphi installation:

     c:\Program Files (x86)\Embarcadero\Studio\15.0\Welcomepage\

In that folder there are lot of subfolders. Open the one with your Delphi language and rename the original <code>default.htm</code> to <code>default_bak.htm</code>. Now create an empty <code>default.htm</code>. 

![image](https://andydunkel.net/assets/uploads/2014/12/xe7_2.png)

After that is done Delphi should start without any problems. The only downside is that you loose the functionality of the start page, like quick accessing your last projects.