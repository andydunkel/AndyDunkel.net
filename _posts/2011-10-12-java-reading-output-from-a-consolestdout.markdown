---
author: admin
comments: true
date: 2011-10-12 18:37:00+00:00
layout: post
slug: java-reading-output-from-a-consolestdout
title: 'Java: Reading output from the Console/StdOut'
wordpress_id: 1044
categories:
- Java
tags:
- cmd.exe
- Console
- Java
- read
- StdOut
---

Today I had a small problem. I wanted to start an external C++ console programm with some parameters and get the output back to my Java program.

Here is a code snippet that reads the output from a console program:
    
    import java.io.BufferedReader;
    import java.io.IOException;
    import java.io.InputStreamReader;
    
    public class Main {
    
      public static void main(String[] args) throws IOException {
            String cmd = "cmd.exe /c dir c:\\temp";
            
            String line;
            Process p = Runtime.getRuntime().exec(cmd);
            BufferedReader input = new BufferedReader(new InputStreamReader(p.getInputStream()));
            while ((line = input.readLine()) != null) {
              System.out.println(line);
            }
            input.close();
      }
    }
    







The snippet just outputs the received information.




![image](http://andydunkel.net/assets/uploads/2011/10/image5.png)
