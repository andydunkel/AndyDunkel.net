---
author: admin
comments: true
date: 2014-10-10 17:00:00+00:00
layout: post
slug: php_debugging_vm_to_debug_and_develip_php
title: 'Virtual Machine to debug and develop PHP'
categories:
- Projects
tags:
- PHP
- Projects
---

I used PHP a lot in the past for our websites. I think its not the best programming language, but its simple enough to get things done very quickly. And it runs on the most servers of web hosters.

Today most likely I would choose another language, but I still have to maintain and debug PHP scripts once in a while. 

Usually its very painfull, since most of the times I don't have a running webserver on my local machine. Just makes no sense to have a webserver running all the times. Not to mention a running instance of MySQL.

So I ended up using a simple text editor and uploading the files to my webserver for testing. 
Of course without debugger thats a very painfull and slow process. I am still puzzled how many PHP developers use <code>echo</code> commands to debug there code.

In the past I used a commercial Zend Studio license. I still have that running on my Mac. However I also wanted a simple solution I can use easily on my Linux notebook.

So I [created a virtual machine for PHP debugging](/projects/php-debugging-vm/index.html). It runs an Apache webserver with, MySQL + phpMyAdmin and Netbeans as IDE. Xdebug is configured in PHP. 

I am publishing it here with the hope it might be useful for other:

![image](/projects/php-debugging-vm/vm1_small.png)

[Click here to get to the project page.](/projects/php-debugging-vm/index.html)




