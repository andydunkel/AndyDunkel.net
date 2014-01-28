---
author: admin
comments: true
date: 2014-01-28 17:00:00+00:00
layout: post
slug: code_signing_problems_with_delphi_xe4_mavericks
title: 'Code signing problems with Delphi XE4 Mavericks'
categories:
- Delphi
- Firemonkey
tags:
- XE4
- Firemonkey
- OSX
---

Some days ago I wrote a [blog post](http://andydunkel.net/delphi/firemonkey/2014/01/22/signing_delphi_xe_applications_for_osx.html) about signing a Firemonkey application manually with the developer ID.

For app store applications Delphi automatically runs the code signing procedure for you and creates a PKG file. Handy!

Since Apples new Mavericks release the code signing has changed a little bit and the command now needs an additional parameter: <code>--deep</code>. Delphi does not add the parameter, which results in an error building the application:

	[PAClient Error] Error: E0264 Unable to execute '"/usr/bin/
	codesign" --en "/Users/.../daform.app/Contents/Entitlements.plist" 
	-s "Mac Developer" -f "/Users/.../daform.app"' (Error 1)

	daform.app code object is not signed at all

OK what to do? The first problem is, that you cannot tell Delphi to add the parameter.

So I created a workaround for that. I wrote a small C++ command line tool, which replaces the original "codesign" program. When launched is parses all the parameters from the call and adds the <code>--deep</code> option if its not present.

Then it runs the original "codesign" tool. The project is [available on Github](https://github.com/andydunkel/DelphiXE4-Mavericks-Codesign-Helper).

## Installation ##

- Download the [binary](https://github.com/andydunkel/DelphiXE4-Mavericks-Codesign-Helper/blob/master/codesign?raw=true) or compile your own version with XCode
- Rename the original codesign tool in /usr/bin to codesign_original
- Copy the codesign binary to /usr/bin

![]({{ site.url }}/assets/uploads/2014/01/codesigning_app_store/files.png)

After that Delphi is able to run and build the application with code signing for the app store.



