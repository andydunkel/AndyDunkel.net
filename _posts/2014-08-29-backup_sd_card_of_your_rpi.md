---
author: admin
comments: true
date: 2014-08-29 17:00:00+00:00
layout: post
slug: backup_of_an_sd_card_on_osx
title: 'Backup of an SD card on OSX'
categories:
- Raspberry
tags:
- Backup
---


I own a RaspberryPi which I mainly use for [Owncloud](https://owncloud.org/) and [Seafile](http://seafile.com) as my personal Cloud-Storage. One of my concern is the backup. Lets face it, its a cheap device and it holds all its data on a cheap SD-Card.

In the past I was using a backup script which backups all the data and puts it into a ZIP file. However if something happens to the device or SD card, this means that I have to reinstall everything from scratch.

So I my idea was to buy another RPI and SD card and make an image of the original one every week. If the card in the RPI fails, I just have to plug in the backup card. 

# Creating the image

## Windows

On Windows the easiest way to do a complete backup/image of your SD card is the "Win 32 Disk Imager" tool. Its free and you can [download it here](http://sourceforge.net/projects/win32diskimager/).

The usage is very simple: put the SD card into your card reader, select folder and filename for the image file and select the correct drive number from the list.

![image](http://andydunkel.net/assets/uploads/2014/08/win_disk_imager.png)

To start the backup just click the "Read" button. The process takes some time, depending on the size and speed of your SD card.

The restore is also very simple. Insert the new SD card, select the drive number and hit the "Write" button.

**Done!**


## OSX and Linux

On OSX creating an image of the SD card is also very simple. Just open the "Disk Utility", select the SD card on the left and click "New Image". The system prompts you for a location of the image.

![image](http://andydunkel.net/assets/uploads/2014/08/backup_osx.png)

![image](http://andydunkel.net/assets/uploads/2014/08/sdcard1.png)

On Linux (and OSX too), you can also backup from the command line using the DD command.

	sudo dd if=/dev/rdisk1 of=~/Desktop/pi.img bs=1m
	
To find the correct device, you can use the <code>diskutil</code> command (OSX only):

	diskutil list
	
This will output something like that:

![image](http://andydunkel.net/assets/uploads/2014/08/backup_osx_1.png)

You can find the correct device by looking for a Linux partition.

Note: There is no output of the DD command during the process. Also the image has the same size as the original SD card. So it makes sense to compress the image with ZIP or GZIP.

### Restore

The restore is similar:

	sudo dd if=/path/to/backup.img of=/dev/rdisk1 bs=1m

Once the restore is done to the new SD card, just put it into your Raspberry Pi and the system should boot as nothing happened.


