---
author: admin
comments: true
date: 2013-12-15 17:00:00+00:00
layout: post
slug: git_the_remote_end_hung_up_unexpectedly
title: 'Git - The remote end hung up unexpectedly'
categories:
- Coding
tags:
- Git
- Github
---

Recently I tried to push a bigger repository to Github. At some stage of the upload process failed:

	fatal: The remote end hung up unexpectedly
	Everything up-to-date
	
Some research on the internet indicated that the https buffer was not big enough. The simplest fix to that was to increase the buffer size:

	git config http.postBuffer 524288000
	
That worked fairly well, however the upload was more like a black box thing now. The commit was compressed locally and there was no real upload progress information anymore. 

One other solution is to switch from https to SSH by the following command:

	git remote add origin git@github.com:username/project.git
	
In order to get SSH working you will have to create SSH Keys first, which is [described here](https://help.github.com/articles/generating-ssh-keys).




