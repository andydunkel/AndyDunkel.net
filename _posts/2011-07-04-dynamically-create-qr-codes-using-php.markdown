---
author: admin
comments: true
date: 2011-07-04 18:41:31+00:00
layout: post
slug: dynamically-create-qr-codes-using-php
title: Dynamically create QR codes using PHP
wordpress_id: 685
categories:
- Coding
tags:
- Code
- PHP
- QR
---

Today I wrote a blog entry [about QR codes](http://blog.ekiwi.de/?p=542) in our [eKiwi.de](http://www.ekiwi.de) blog. There we where using an online tool to create the QR code. 

If you want to create QR codes dynamically on your website, you can use the class from [http://phpqrcode.sourceforge.net/](http://phpqrcode.sourceforge.net/)

The usage is pretty simple. In this example I created an image php file:




    
    
    





This outputs date and time into a QR code and outputs a PNG file. In the HTML file we only have to show the image:



    
    
    <img src="img.php">




The QR code looks like that (if you do a refresh in the browser the code will change):

![](https://andydunkel.net/assets/wp-custom/qrcode/img.php)

And that’s it. ![Smiley](https://andydunkel.net/assets/uploads/2011/07/wlEmoticon-smile.png) More documentation can be found on the projects homepage.

Here is the complete [example as download](https://andydunkel.net/assets/wp-custom/qrcode/qrcode.zip).
