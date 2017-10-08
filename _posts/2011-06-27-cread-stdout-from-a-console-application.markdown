---
author: admin
comments: true
date: 2011-06-27 20:38:00+00:00
layout: post
slug: cread-stdout-from-a-console-application
title: C#–Read STDOUT from a console application
wordpress_id: 572
categories:
- Coding
tags:
- C#
- Console
- Data
- read
- StdOut
---

Recently I needed to start a console application from C#, wait until the execution has finished and read the output back. Here is a simple way this can be done.

![image](https://andydunkel.net/assets/uploads/2011/06/image9.png)

The first thing is to run the process and attach an EventHandler for the finish of the process:

    
    Process process = new Process();
    process.StartInfo.FileName = @"ping.exe";
    process.StartInfo.Arguments = @"www.ekiwi.de";
    process.StartInfo.CreateNoWindow = true;
    process.StartInfo.UseShellExecute = false;
    process.StartInfo.RedirectStandardOutput = true;
    process.StartInfo.RedirectStandardInput = true;
    process.StartInfo.RedirectStandardError = true;
    
    process.EnableRaisingEvents = true;
    process.Exited += processHasFinished;
    process.Start();


<!-- more -->

Now we have to write the EventHandler, in the handler we have to use the “Invoke” command to execute the setting of the text in the GUI thread:

    
    private void processHasFinished(object sender, EventArgs e)
    {
        var process = (Process)sender;
        String output = process.StandardOutput.ReadToEnd();
        textOut.Invoke(new UpdateTextCallback(this.UpdateText),  output);
    }
    
    public delegate void UpdateTextCallback(string text);
    
    private void UpdateText(string text)
    {
        textOut.Text = text;
    }


That’s it!
