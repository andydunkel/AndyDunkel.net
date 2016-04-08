---
author: admin
comments: true
date: 2015-11-01 17:00:00+00:00
layout: post
slug: inno_setup_ipersistfile_save_schlug_fehl
title: 'InnoSetup - IPersistFile error 0x80070003'
categories:
- Coding
tags:
- InnoSetup

---

I use [InnoSetup](http://www.jrsoftware.org/isinfo.php) to ship my [software](http://da-software.de/). Years everything went without any problems. Recently I got feedback from customers, saying that there where errors during the setup. I tried it myself serveral times and sometimes I got this error message:

![](/assets/uploads/2015/11/innosetup.png)	

	IPersistFile::Save schlug fehl; Code 0x80070003.
	Das System kann den angegebenen Pfad nicht finden.

It always happened when the setup tried to create the first shortcut in the users start menu.

What went wrong? After some investigation it turned out, that the uninstall routine of my setup was to blame. When my software is installed, the old version is removed automatically. This is done by some Pascal Script code in the setup.

When this routine was removed, everything went fine. The problem seems to be, that there is timing issue. The uninstallation was finished, but the old shortcut was still "in use". So the setup could not recreate it.

The solution was to add a small wait time after the uninstallation call in the setup script:

	procedure CurStepChanged(CurStep: TSetupStep);
	begin
	  if (CurStep=ssInstall) then
	  begin
	    if (IsUpgrade()) then
	    begin
	      UnInstallOldVersion();
	      Sleep(2000); //wait two seconds here
	    end;
	  end;
	end;

After that the problem was gone.