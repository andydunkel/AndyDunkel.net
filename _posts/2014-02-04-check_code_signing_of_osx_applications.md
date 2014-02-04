---
author: admin
comments: true
date: 2014-01-28 17:00:00+00:00
layout: post
slug: check_code_signing_of_applications_on_osx
title: 'Check code signing of applications on OSX'
categories:
- Coding
- Tools
tags:
- Code Signing
- OSX
---

The last days I was busy signing my Delphi applications on my Mac. One version was signed with my Developer ID, the other one with the third party developer ID for the Mac App Store.

Maybe its all very easy if you use XCode for that, but I had my issues with Delphi, where I had to do many steps manually on the command line.

After the signing you usually want to check if the signature of the application is correct.

You can of course do that on the command line (if you have XCode installed):

	codesign -dv /Applications/Awesome.app

but I also found a tool with a neat GUI: [RB App Checker](http://brockerhoff.net/RB/AppCheckerLite/).  

Its available for free on the [Mac App Store](https://itunes.apple.com/us/app/rb-app-checker-lite/id519421117?mt=12). 

You just drag and drop the application on the tool and it shows you very detailed information of the signature.

It also checks entitlements, application receipts and requirements.

![]({{ site.url }}/assets/uploads/2014/02/rbappchecker/1.png)




