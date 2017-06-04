---
author: admin
comments: true
date: 2013-11-23 17:00:00+00:00
layout: post
slug: firemonkey_xe_4_taborder_workaround
title: 'Delphi XE4/Firemonkey - Taborder not working + Workaround'
categories:
- Delphi
- Coding
tags:
- firemonkey
- taborder
---

Firemonkey, the framework for cross plattform development, still seems to have some problems and bugs. :-( One of the problems I came across was that the TabOrder property was not working:

<iframe width="640" height="360" src="//www.youtube.com/embed/adnmXK3xzyE" frameborder="0" allowfullscreen></iframe>

The problem starts with the inability to set the TabOrder correctly in the designer. They are reset all the time to their defaults. When the application is running, the TabOrder works for some basic dialogs. In others dialogs nothing happens, or the tab key focuses the wrong control.

Looking up the bug database from Embarcadero, this is a known problem / bug. Some people in the internet suggest to set the TabOrder property programmatically during runtime, but that also did not work for me.

After a lot of trying, I found a workaround, that at least works for me. Since I could not set the TabOrder property, I used the HelpContext property (which I dont use in my application) to define the order of the controls:

![]({{ site.url }}/assets/uploads/2013/11/taborder/1.png)

*Note: You can also use the Tag value, but I am using that one for my translation logic.*

Next step was to create a class helper for TForm:

	unit FormHelper;
	
	interface
	
	type
	  TFormHelper = class helper for TForm
	    procedure DoTabHandlingXE(comp : TForm; tabOrder : Integer);
	  end;
	
	implementation
	
	//Workaround for Tab-Bug in Firemonkey
	procedure TFormHelper.DoTabHandlingXE(comp: TForm; tabOrder : Integer);
	var
	  i, c :integer;
	  current : TComponent;
	  currentNext : integer;
	  focus : TStyledControl;
	begin
	  c := Self.ComponentCount - 1;
	  currentNext := 9999;
	  focus := nil;
	
	  for i := 0 to c do begin
	      current := Self.Components[i];
	      if (current is TStyledControl) then begin
	          if ((current as TStyledControl).HelpContext < currentNext) and 
			  ((current as TStyledControl).HelpContext > tabOrder) then begin
	            currentNext := (current as TStyledControl).HelpContext;
	          end;
	      end;
	  end;	
	
	  for i := 0 to c do begin
	      current := Self.Components[i];
	      if (current is TStyledControl) then begin
	        if (currentNext = (current as TStyledControl).HelpContext) then begin
	          focus := (current as TStyledControl);
	        end;
	      end;
	  end;
	
	  if focus <> nil then begin
	    focus.SetFocus;
	  end;
	end;
	end.
	
I am sure there could be some optimizations done with that code, but it works. What we are doing here is to iterate over all controls of a given form and find the next higher value of the HelpContext. Thats the control we want to set focus, when the user hits the tab key.

Of course the code does nothing to far, since the method is not called yet. So the next step is to implement the KeyDown event in the form:

	procedure TfrmEinzField.KeyDown(var Key: Word; var KeyChar: Char;
	  Shift: TShiftState);
	var
	  control : TStyledControl;
	begin
	  if Key = vkTab then
	  begin
	    //custom handling
	    if (Self.GetFocused is TStyledControl) then begin
	      control := (Self.GetFocused as TStyledControl);
	      DoTabHandlingXE(Self, control.HelpContext);
	    end;
	  end else
	    inherited; //do default handling
	end;

In the code, we get the currently focused control. Then we call the method we wrote before with the current Form variable and the controls HelpContext value.
With that workaround the tab key is now working as expected, jumping to the next control. 