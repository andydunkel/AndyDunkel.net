---
author: admin
comments: true
date: 2015-04-15 17:00:00+00:00
layout: post
slug: code_signing_problems_with_delphi_xe_entitlemens
title: 'Code signing problems with Delphi: Entitlements.plist'
categories:
- Delphi
- OSX
tags:
- OSX
- CodeSigning
- Delphi
- Pascal
---

Sometimes Apple changes things in the code signing process. Some weeks ago I had trouble signing my Delphi XE 4 application for the app store. Since I documented my steps from last time I was very sure I did everything as before.

The code signing was successful and no error was shown on the console. However during the upload to the app store it told me that  the "code object not signed at all". Hmm...

After some investigations (see bug report at [Embarcaderos website](http://qc.embarcadero.com/wc/qcmain.aspx?d=127441)) it turned out that the "Entitlements.plist" file is no longer allowed in the bundle. But it is still needed for the signing.

![](/assets/uploads/2015/4/delphi.png)

So I moved the file away from the the bundle to the same folder where the bundle was located and signed the app bundle like that:

     codesign -f -s "3rd Party Mac Developer Application" -v "DA-FormMaker.app" —-deep --entitlements Entitlements.plist

After that the upload was successful and the review went fine.



