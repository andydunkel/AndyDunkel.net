---
author: admin
comments: true
date: 2011-07-07 19:47:38+00:00
layout: post
slug: java-handle-exceptions-from-threads
title: 'Java: Handle Exceptions from Threads'
wordpress_id: 691
categories:
- Coding
- Java
tags:
- Exception
- Handling
- Java
- Thread
- ThreadGroup
---

In this post I want to describe handling exceptions from threads with the ThreadGroup class and the uncaughtExceptionHandler.

First we create a Thread which does useful stuff and throws an exception at some time:


    
    
    public class PfostenThread implements Runnable {	
    	@Override
    	public void run() {
    		for (int i = 0; i < 1000000; i++) {
    			System.out.println("Pfosten: " + i);
    			
    			if (i == 31456) {
    				//Cause an exception
    				i = i / 0;
    			}
    		}
    	}
    }
    



No we will start our thread from the main method of our Java program:
<!-- more -->

    
    
    import java.lang.Thread.UncaughtExceptionHandler;
    
    public class Main {
    	public static void main(String[] args) {
    		PfostenThreadGroup group = new PfostenThreadGroup("PfostenGruppe");
    		Thread t = new Thread(new PfostenThread(), "Pfosten");
    		t.start();		
    	}
    }
    



This thread will throw a divide by zero exception:

![](http://andydunkel.net/assets/uploads/2011/07/java_exception1.png)

To catch the exception we will now extend the ThreadGroup class:

    
    
    public class PfostenThreadGroup extends ThreadGroup {
    
    	public PfostenThreadGroup(String name) {
    		super(name);
    	}
    	
    	@Override
    	public void uncaughtException(Thread t, Throwable e) {
    			System.out.println("Error: " + e.getMessage());
    	}
    }
    



If we start our Thread with this group, the exception will be caught by the "uncaugtException" method in our ThreadGroup:


    
    
    PfostenThreadGroup group = new PfostenThreadGroup("PfostenGruppe");
    Thread t = new Thread(new PfostenThread(), "Pfosten");
    t.start();	
    



[![](http://andydunkel.net/assets/uploads/2011/07/java_exception2.png)](http://andydunkel.net/assets/uploads/2011/07/java_exception2.png)

