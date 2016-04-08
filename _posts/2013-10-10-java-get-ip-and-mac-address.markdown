---
author: admin
comments: true
date: 2013-10-10 09:34:00+00:00
layout: post
slug: java-get-ip-and-mac-address
title: 'Java: Get IP and Mac address'
wordpress_id: 1635
categories:
- Java
tags:
- ip
- Java
- Mac
---

A small code snippet that reads the computers IP and MAC address:    
   
    try {
    	InetAddress ip = InetAddress.getLocalHost();
    	NetworkInterface network;
    	network = NetworkInterface.getByInetAddress(ip);
    	byte[] macaddr = network.getHardwareAddress();
    	
    	String mac = "";
    	
    	for (int i = 0; i < macaddr.length; i++) {
    		mac += String.format("%02X%s", macaddr[i], (i < macaddr.length - 1) ? "-" : "");	
    	}
    	
    	System.out.println("IP-Address: " + ip.toString());
    	System.out.println("Mac-Address: " + mac);
    	
    } catch (SocketException | UnknownHostException e) {
    	e.printStackTrace();
    }		
