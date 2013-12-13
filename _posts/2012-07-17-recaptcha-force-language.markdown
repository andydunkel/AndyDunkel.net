---
author: admin
comments: true
date: 2012-07-17 20:30:32+00:00
layout: post
slug: recaptcha-force-language
title: 'Recaptcha: Force Language'
wordpress_id: 1409
tags:
- audio
- deutsch
- german
- language
- Recaptcha
- sprache
---

Recent problem: customer wanted his [reCatpcha](http://www.google.com/recaptcha) forced to german language. First attempt was to set the setting via the RecaptchaOption Script variable. Howewer, for some reason this did not work.




Here is the solution:



    
    <script type="text/javascript" 
    src="http://api.recaptcha.net/challenge?k=apiKey<strong>&hl=de</strong>"> 




By adding &hl=de to the "src" URL the language was forced to german.
