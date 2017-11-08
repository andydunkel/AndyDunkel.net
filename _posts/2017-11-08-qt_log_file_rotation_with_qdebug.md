---
author: admin
comments: true
date: 2017-11-08 10:00:00+00:00
layout: post
slug: qt_log_file_rotation_with_qdebug
title: 'QT and log rotation with qDebug'
categories:
- Programmierung
- QT
tags:
- QT
- Logging

---
<img src="/assets/logos/troll_logo.png" class="imagelogo">

The logging function if the QT framework, does not support log rotation. In one of my applications the log files where going to be very big and old files where kept wasting disk space.

So here is my solution: only the latest log files are kept. Also, once the current log file hits a certain size, a new log file is created.

<!--more-->

In order to set up logging for your application, you have to install a message handler:

	QtMessageHandler qInstallMessageHandler(QtMessageHandler handler)
	
This is done in the initLogging function:

	bool initLogging()
	{
	  // Create folder for logfiles if not exists
	  if(!QDir(logFolderName).exists())
	  {
	    QDir().mkdir(logFolderName);
	  }
	
	  deleteOldLogs(); //delete old log files
	  initLogFileName(); //create the logfile name
	
	  QFile outFile(logFileName);
	  if(outFile.open(QIODevice::WriteOnly | QIODevice::Append))
	  {
	    qInstallMessageHandler(LOGUTILS::myMessageHandler);
	    return true;
	  }
	  else
	  {
	    return false;
	  }
	}
	
I have put everything in the <code>logutils.cpp</code>. The full example can be downloaded at the end.

The function is called from the <code>main.cpp</code>

	#include "logutils.h"
	...
	LOGUTILS::initLogging();
	
This sets up the logging. Lets take a closer look to the <code>initLogging</code> function. In the first step we create the logging folder if it does not exist. Once this is done, we delete old logs, setup the current file name for the log and create the log file. If that is done the message handler is installed.

	void deleteOldLogs()
	{
		QDir dir;
		dir.setFilter(QDir::Files | QDir::Hidden | QDir::NoSymLinks);
		dir.setSorting(QDir::Time | QDir::Reversed);
		dir.setPath(logFolderName);
		
		QFileInfoList list = dir.entryInfoList();
		if (list.size() <= LOGFILES)
		{
		  return; //no files to delete
		} else
		{
		  for (int i = 0; i < (list.size() - LOGFILES); i++)
		  {
		    QString path = list.at(i).absoluteFilePath();
		    QFile file(path);
		    file.remove();
		  }
		}
	}
	
The <code>deleteOldLogs</code> functions removes the older log files if there are any. We list all files in the folder, sorted by date and delete the files. <code>LOGFILES</code> defines the number of old log files we want to keep, this is one of the two defines in the header file:

	#define LOGSIZE 1024 * 100 //log size in bytes
	#define LOGFILES 5

The next function to look at is <code>initLogFileName</code>:

	void initLogFileName()
	{
		logFileName = QString(logFolderName + "/Log_%1__%2.txt")
	              .arg(QDate::currentDate().toString("yyyy_MM_dd"))
	              .arg(QTime::currentTime().toString("hh_mm_ss_zzz"));
	}
	
Nothing fancy here, just the log file name with the current date and time.

The last thing is our message handler:

	void myMessageHandler(QtMsgType type, const QMessageLogContext &context, const QString& txt)
	{
		//check file size and if needed create new log!
		{
		  QFile outFileCheck(logFileName);
		  int size = outFileCheck.size();
		
		  if (size > LOGSIZE) //check current log size
		  {
		    deleteOldLogs();
		    initLogFileName();
		  }
		}
		
		QFile outFile(logFileName);
		outFile.open(QIODevice::WriteOnly | QIODevice::Append);
		QTextStream ts(&outFile);
		ts << txt << endl;
	}
	
The message handler is also very simple, it just takes the message and writes it to the file. Before that a file size check is performed. If the current log file is bigger than the defined limit old files are deleted and a new file is initialized. In a real word example you would format the log message according on the level, add time, date and other meta information as [described in the documentation](http://doc.qt.io/qt-5/qtglobal.html#qInstallMessageHandler).

The logs are now saved to the log folder and rotated:

![](/assets/uploads/2017/11/log_rotation.png)

**And thats it!**

[Download the example](/assets/uploads/2017/11/qt_loggingrotation_example.zip)

## Complete Source Code

### logutils.h

	#ifndef LOGUTILS_H
	#define LOGUTILS_H
	
	#define LOGSIZE 1024 * 100 //log size in bytes
	#define LOGFILES 5
	
	#include <QObject>
	#include <QString>
	#include <QDebug>
	#include <QDate>
	#include <QTime>
	
	namespace LOGUTILS
	{
		const QString logFolderName = "logs";
		
		bool initLogging();
		void myMessageHandler(QtMsgType type, const QMessageLogContext &context, const QString& msg);	
	}
	
	#endif // LOGUTILS_H
	
### logutils.cpp	

	#include "logutils.h"
	
	#include <QTime>
	#include <QFile>
	#include <QFileInfo>
	#include <QDebug>
	#include <QDir>
	#include <QFileInfoList>
	#include <iostream>
	
	namespace LOGUTILS
	{
	  static QString logFileName;
	
	  void initLogFileName()
	  {
	    logFileName = QString(logFolderName + "/Log_%1__%2.txt")
	                  .arg(QDate::currentDate().toString("yyyy_MM_dd"))
	                  .arg(QTime::currentTime().toString("hh_mm_ss_zzz"));
	  }
	
	  /**
	   * @brief deletes old log files, only the last ones are kept
	   */
	  void deleteOldLogs()
	  {
	    QDir dir;
	    dir.setFilter(QDir::Files | QDir::Hidden | QDir::NoSymLinks);
	    dir.setSorting(QDir::Time | QDir::Reversed);
	    dir.setPath(logFolderName);
	
	    QFileInfoList list = dir.entryInfoList();
	    if (list.size() <= LOGFILES)
	    {
	      return; //no files to delete
	    } else
	    {
	      for (int i = 0; i < (list.size() - LOGFILES); i++)
	      {
	        QString path = list.at(i).absoluteFilePath();
	        QFile file(path);
	        file.remove();
	      }
	    }
	  }
	
	  bool initLogging()
	  {
	      // Create folder for logfiles if not exists
	      if(!QDir(logFolderName).exists())
	      {
	        QDir().mkdir(logFolderName);
	      }
	
	      deleteOldLogs(); //delete old log files
	      initLogFileName(); //create the logfile name
	
	      QFile outFile(logFileName);
	      if(outFile.open(QIODevice::WriteOnly | QIODevice::Append))
	      {
	        qInstallMessageHandler(LOGUTILS::myMessageHandler);
	        return true;
	      }
	      else
	      {
	        return false;
	      }
	  }
	
	  void myMessageHandler(QtMsgType type, const QMessageLogContext &context, 
	  							const QString& txt)
	  {
	    //check file size and if needed create new log!
	    {
	      QFile outFileCheck(logFileName);
	      int size = outFileCheck.size();
	
	      if (size > LOGSIZE) //check current log size
	      {
	        deleteOldLogs();
	        initLogFileName();
	      }
	    }
	
	    QFile outFile(logFileName);
	    outFile.open(QIODevice::WriteOnly | QIODevice::Append);
	    QTextStream ts(&outFile);
	    ts << txt << endl;
	  }
	}

