---
author: admin
comments: true
date: 2012-11-02 09:55:10+00:00
layout: post
slug: easy-logging-for-rcp-applications
title: Easy logging for RCP applications
wordpress_id: 1482
categories:
- Coding
- Eclipse
---

A small class for easy logging in RCP applications by using the Activators logging functions. This class mainly wraps the need of creating an IStatus object each time we want to log something.



    
    import org.eclipse.core.runtime.IStatus;
    import org.eclipse.core.runtime.Status;
    
    public class LoggerUtil {
        public static void info(String message){
            IStatus status = new Status(IStatus.INFO,Activator.PLUGIN_ID, message);
            Activator.getDefault().getLog().log(status);
        }
    
        public static void error(String message){
            IStatus status = new Status(IStatus.ERROR, Activator.PLUGIN_ID, message);
            Activator.getDefault().getLog().log(status);
        }
    
        public static void warning(String message){
            IStatus status = new Status(IStatus.WARNING,.PLUGIN_ID, message);
            Activator.getDefault().getLog().log(status);
        }
    }
    
    
