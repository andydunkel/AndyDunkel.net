---
author: admin
comments: true
date: 2014-01-14 17:00:00+00:00
layout: post
slug: checkout_git_repository_into_existing_folder
title: 'Checkout GIT repository into existing folder'
categories:
- Coding
- Tools
tags:
- GIT
---

I usually create my project first, tinker around and then at some point I want to use version control, like GIT. So I create the repository and want to check it out and merge it with my existing project folder.

This can be done with the following commands:

	git init
	git remote add origin PATH_TO_REPOSITORY
	git fetch
	git checkout -t origin/master
