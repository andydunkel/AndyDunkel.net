---
author: admin
comments: true
date: 2014-03-05 17:00:00+00:00
layout: post
slug: delphi_and_firemonkey_experiences
title: 'My experiences with Delphi XE and Firemonkey'
categories:
- Delphi
- Firemonkey
tags:
- Delphi
- Firemonkey
---

In that posting I want to write a little bit about my experience with the new Delphi and the Firemonkey Framework.

I am using Delphi for over 10 years now, mostly in my own [small business](http://www.da-software.de). The two main applications are over 10 years old now, the code base is very outdated. To be frank, most of the code was developed when I had not the experience as today. But the applications are working.

I tried to rewrite everything in Java with Eclipse RCP. Clean, shiny and platform independent, even with support for Linux!
I rewrote about 80% of the application, then I decided to throw it away and use the old code base instead, because I got the feeling the the remaining 20% would take me more time than the first 80% of the application. It was a big waste of time, but also a very good lesson learned. [Never rewrite everything from scratch](http://joelonsoftware.com/articles/fog0000000069.html). :-)


There are more issues with Java. You have to ship the JRE with the application if you don’t want to have your users install them by themselves. The JRE is about 100MB, getting bigger in each new version.

This might seem to not be be an issue today, but thats not true. It still makes a difference if the user has to download 100 megabytes or just 10. Especially if the users uses a mobile connection.

And Apple won’t let you in the Mac App Store if you use Java. 

Don’t get me wrong, Java is great. In my main job I am writing Java / Eclipse RCP applications most of the day. Its great for big applications, with plugins, there are lot of components you can use. And you can find a lot of information on the internet. But if you are a small company and want to get stuff done fast and sell your software on the App Store, then Delphi can be a very good choice. Even if it costs money.

So I decided to return to Delphi. During the last releases of Delphi the Firemonkey framework was added. Firemonkey allows the creation of applications both for Windows and MacOS (no Linux). In the ads this all looks very shiny and when you ran the demo version it all looks good, it compiles and it runs on Windows and on the Mac.

And you can publish your apps to the App Store!!! Hooray.

Delphi still only runs on Windows. But you need a Mac to debug and deploy your applications on OSX. 

To summarise, I don’t regret switching back to Delphi and Firemonkey. The code base is still a mess, but I plan to refactor each part at a time in the future. By the time the first application is ported, working and approved on the app store.

## Converting to Firemonkey

Converting to a new Delphi version was never really a problem. I started with Delphi 6, moved to 7 and some years later to Delphi 2010. Usually upgrading a project means just open it. And if all components are installed the project is opened, you click the compile button and you are done. Its still true if you stay with the VCL, which is of course still part of Delphi. But the VCL only works on Windows.

If you want to switch to Firemonkey, well then … you have to start from scratch. Create a new project, recreate the GUI, copy over the code, wire it up and there you go. There is no converter shipped with Delphi itself. 

But there is at least some hope: the Mida Converter. A third party tool which tries to convert the application to Firemonkey. It costs about 100 Dollars. It saves you a lot of work, as it converts all your VLC forms to Firemonkey forms. It works like 90%, there is still some manual work to do. Like there are now two combo boxes, one editable and one thats not. All of my combo boxes got replaced by the non editable one. You have to clean that up by yourself.

Before you start converting your application, I recommend to get rid of all third party components like Jedi VCL. These are not available for Firemonkey and are only causing trouble.


## Platforms

Once you have created and converted your application to Firemonkey and it opens without any errors in the IDE, you are not done yet. I found out how many functions are platform dependant. You have to replace all calls to the WinApi. In my case these where mostly “ShellExecute”, “MessageBox", things that used the Windows registry, drag and drop and Windows specific functions, like getting the temporary directory.

For some things Firemonkey provides equivalents in the framework, which will work on both platforms. For some others you will have to write your own functions, with IFDEF commands for each platform. Its not much, but in the beginning it takes a lot time to find that out. The second application of mine was converted much quicker than the first. 

You should also be aware of the fact, that Firemonkey does the rendering of its controls completely on its own. If a new version of OSX has a different look and feel, your application will look the same. That is not completely bad, you can change the look and feel of your app. Want to have some part of your application look like on Windows? No problem! But that also means that a Firemonkey application will always look some sort on alien.


## Bugs and Issues

While the VCL is stable, aged and mature, Firemonkey is very new, with a lot of bugs. For example I found out, that Firemonkeys message dialogs where always displaying in english language on OSX. On Windows they worked perfectly. There are workarounds, so I wrote a class which just displays the native message box with my own internatioliziation. But all of that takes time. You need to find out that you are having an issue. Then find a workaround.

There are also sometimes glitches in the GUI and I had trouble get my application code signed as Apple changed the procedure in Mavericks.

Debugging OSX applications from the Windows machine over the network does not work most of the time. Thats a pain if you want to debug platform specific code.

Embarcadero is closing the issues, but usually they are fixed in the next version of Delphi. Which means that you will have to pay the update price to benefit from them. Depending on the amount of money you are making with your applications its not always worth the price.

## Missing stuff

There are also components missing and not yet available. For example, there is no browser control, no HTML edit control. If you want to display and edit HTML content in your app, well thats not possible. 

Want to display and edit rich text in your application. Not possible. Hopefully the situation will improve over time.

One big thing missing is the online help. Back in the good old days of Delphi 7, the online help system was really good. For every class, method and function there was a description in the help. Usually with examples how to use it.

With Firemonkey a lot of classes are still not documented. There is an online wiki where often no content is shown at all, instead you get a message that you should extend the topic so others can benefit. Not my job I'd say.

Unfortunately it seems that not many people are using Delphi today. So its much harder to find information online. 

## Conclusion

Did I regret switching back to Delphi and Firemonkey? In short no. At first I had some trouble converting the application to Firemonkey and rewriting the platform dependant parts. There where also issues with bugs in Firemonkey which did cost me some time. But in the end I was able to solve most of the things. The update policy could also be improved. If bugs are fixed in the Firemonkey framework, they should be made available for older versions too. Paying hundread of Euros for a new release every year is too much for most small companies. 

In the end I got the application working and its now approved for the app store and its selling. The application is a native application and the compiled version is not too big in size (around 10 MB for my normal application).

The second application was converted in several weeks. Once you know how to do it, you are getting things done very fast. In the end its still the good old delphi where you create your application, drop the controls onto your forms and implement the logic and get results very fast. 

So I would also use Delphi and Firemonkey for new applications.
