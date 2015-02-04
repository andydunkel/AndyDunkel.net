---
author: admin
comments: true
date: 2015-12-08 17:00:00+00:00
layout: post
slug: delphi_firemonkey_problem_with_switchable_graphic_card
title: 'Delphi XE / Firemonkey - Problem with switchable graphic card'
categories:
- Delphi
tags:
- Firemonkey
---

I got a new Windows laptop and found out that there is an issue with my Firemonkey applications. 
The laptop has two graphic cards. An Intel and a dedicated ATI chip.

When the laptop is using the dedicated graphics card the application starts flickering, turned windows black and became more or less unuseable. 

Forcing to use the internal graphic card solved the problem. However its not a solution a customer would have any understanding for. 

I do not really know the root cause, as this could be a bug in Firemonkey or some driver issue. I assume its a bug in Firemonkey as I have only seen it in FM applications. I was able to reproduce it with Delphi XE 4 and XE 7 on my computer.

## Video

I made a small video which shows the issue. As you can see its more then small glitches:

<iframe width="750" height="422" src="https://www.youtube.com/embed/erBkqWToKag" frameborder="0" allowfullscreen></iframe>

## Code and solution

Since Firemonkey uses the graphic card for rendering the UI, deactivating the acceleration should hopefully solve the problem. Its more a workaround, as it deactivates the hardware acceleration. Since I am not using any special effects it has now visible speed impact on the application.

To disable the hardware foo in your application open the <code>*.dpr</code> file in Delphi. Add the two showed units to your uses clause:

	uses
	  FMX.Forms,
	  FMX.Types,
	  ...

In the code add the following <code>{code}</code> section:

	begin
	  Application.Initialize;
	  {code}
	  fmx.types.GlobalUseHWEffects:=false;
	  FMX.Types.GlobalDisableFocusEffect:=false;
	  FMX.Types.GlobalUseDirect2D:=false;
	  FMX.Types.GlobalUseDX10Software:=false;
	  {code}
	  
	  ...
	  Application.Run;
	end.
	
After a compile the problem was gone. I also tested the application on OSX after that, there was also no negative effect.