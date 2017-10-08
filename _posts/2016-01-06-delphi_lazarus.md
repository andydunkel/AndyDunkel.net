---
author: admin
comments: true
date: 2016-01-06 17:00:00+00:00
layout: post
slug: moving_from_delphi_to_lazarus
title: 'Moving from Delphi to Lazarus'
categories:
- Delphi
- Lazarus
tags:
- Delphi
- Lazarus

---

Some time ago I wrote a blog post about [my experiences](https://andydunkel.net/delphi/firemonkey/2014/03/05/delphi_and_firemonkey_experience.html) migrating my Delphi VLC applications to Firemonkey. Firemonkey allows you to create multi platform applications. Multi platform means Windows and OSX here. In my blog post I was somehow optimistic about the way Delphi is moving. It was a lot of work to move from an VCL application to the Firemonkey framework. But in the end I decided to leave Delphi behind me and move to [Lazarus](http://www.lazarus-ide.org/). I used Delphi for about 15 years, so that was not an easy decision.

In this blog post I want to describe some of my thoughts to give some ideas, for people facing similar problems. My last Delphi experience is based on Delphi XE4 which is some years old. Newer versions sure will have many bugs fixed and will be more stable. This is mostly based on the Firemonkey part of Delphi. 

## Bugs and limitations

I faced a lot of bugs in Firemonkey. Basic stuff would not work and needed workarounds, like [not working tab order](https://andydunkel.net/delphi/coding/2013/11/23/firemonkey_xe_4_taborder_workaround.html) or [graphic problems](https://andydunkel.net/delphi/2015/02/04/firemonkey_switchable_graphics_problem.html) on some laptops.

Also the IDE was never free of bugs. I had [problems signing](https://andydunkel.net/delphi/firemonkey/2014/01/28/code_signing_problems_with_delphi_xe4_and_mavericks.html) my application for the app store. The IDE would sometimes show syntax errors in my code, but would compile the program just fine.

Nothing was a complete show stopper, there was always some sort of workaround. But workarounds take time to implement and you are never sure about any side effects. And things like tab order is really basic stuff, which you would expect to work.

I was also not able to debug OSX applications, as the remote debugger usually crashed. Since there is no Delphi IDE for OSX, you have to code on Windows and remote debug the application on OSX. In the end I found myself debugging the OSX application using <code>ShowMessage</code>. 

Embarcadero is of course working on these issues and I assume that most of that is fixed by now, but bugfixes only go into the new versions. Which means you will have to update and of course pay. My impression is also that the focus for Delphi is development of mobile applications nowadays and most of Embarcaderos effort goes in that direction.

Another limitation: Firemonkey draws its own UI. By not using native operating system widgets it always looks somehow alien on the target system. If Microsoft or Apple change the design of their controls, your application still looks the same old way unless you update. DPI awareness was also not possible. Not sure if possible with newer versions. There are now some [native controls](http://docwiki.embarcadero.com/RADStudio/Seattle/en/FireMonkey_Native_Windows_Controls) in Firemonkey now, but most of them are still rendered by themselves.


## Price and update cycle

Since bugs are only fixed in newer versions, this means that you will have to pay for each update. Last time I checked they put out two versions each year. I find this generally good, as it shows that they are working on there product and doing improvements. But buying each version becomes very expensive, at least for a small developer like me.

In that past I was happy to buy a new Delphi version every 3-5 years and was able to work with it. However currently Embarcadero seems to push their users to the update subscription model. Its maybe a good option for bigger companies, but becomes to expensive for me. I also find it very strange, that only the subscription grants you access to updates of your product. If you buy the regular version, you are stuck with probable bugs inside. Seriously? Updates and bug fixes should be free.


## Lazarus

In the end I decided to move my applications to Lazarus. Lazarus is free, Open Source and multi platform. It runs on Windows, Linux and OSX and I think also on the Raspberry Pi. This also means there is no need for remote debugging and other fancy stuff. Just install it on your platform and it runs natively. Since its free software, you are not bound to the 3 computer activation limit like with Delphi, which is especially annoying if you have more than one computer.

The Free Pascal compiler compiles code for almost every target platform out there, like Amiga or Atari.

Lazarus uses the LCL as UI framework. It uses native Widgets on Windows, on Linux QT is used by default, but GTK is also possible. On OSX there are some drawbacks, as it "only" uses the old Carbon framework, not Cocoa. But even with that, the application on OSX looks way more native that with Firemonkey. The Cocoa support is still work in progress. I was able to create a small Cocoa application on OSX. Probably just a matter of time and I can take my code and compile it for Cocoa without much changes.

The biggest advantage, the application uses a native framework and looks and behaves like an application should on the system. The LCL is also flexible, if you want to use QT instead in your Windows application, thats possible.


## Porting Delphi applications to Lazarus

Porting my applications was more a diliggent but routine piece of work. First you cannot convert a Firemonkey application into a Lazarus application. There is only an import wizard for VCL applications, so I had to start off with an older version of my application and backport all new functions. 

Before you do the import its a good idea to clean up the project in Delphi. Remove all third party components that are not available in Lazarus. I also used this to replace all Windows API calls with VCL calls. If you don't plan to port your application on any other operating system, this does not need to be done.

Once this was done I imported the appliction into Lazarus. There where some things to fix. Some functions need to be replaced, some units to not exist in Lazarus, INI files used a different encoding now. But in the end everything worked. There are some minor things to take care of, for example there are sometimes different encodings between the LCL and Free Pascal layer. I came across this using file system functions, there is a <code>FileExists</code> function and a <code>FileExistsUTF8</code> function. But this should get better in the future, when a newer version of the Free Pascal compiler is used.


## Conclusion

Currently I am more than happy that I did the switch. It was a lot of work doing the switch, but everything works now. There where no big problems in the porting and no workarounds where needed. Lazarus is stable and is constantly extended and developed. Process is a little bit slower though, then you could expect from a commercial product.

The documentation of the Lazarus / Free Pascal is very good. Most stuff you will find in the [Wiki](http://wiki.freepascal.org/) and the forums. The sources on the internet are somehow limited as Lazarus is not so wide spread, but the same goes for Delphi. Since Lazarus and the LCL is platform independant, I also ported my applications to Linux now. The same code base is now working on Windows, Linux and OSX with just a few IFDEFs. Most platform dependant things are handled by LCL functions.

On the down side, I am not sure if a Lazarus OSX application can be published on the Mac App Store right now. I have not found enough information if Carbon applications will be accepted. Looking at the wiki its seems possible to [sandbox the application](http://wiki.lazarus.freepascal.org/Code_Signing_for_Mac_OS_X), but I have not tried this yet.
