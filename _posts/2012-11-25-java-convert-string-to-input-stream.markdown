---
author: admin
comments: true
date: 2012-11-25 14:15:51+00:00
layout: post
slug: java-convert-string-to-input-stream
title: 'Java: Convert String to InputStream'
wordpress_id: 1526
categories:
- Java
---

Some methods want an InputStream, converting a String into an InputStream is very easy:


    
    /**
     * Converts a string into an inputstream
     * @param s
     * @return
     */
    private InputStream convertStringToInputStream(String s) {
      ByteArrayInputStream in = new ByteArrayInputStream(s.getBytes());
      return in;
    }
    
