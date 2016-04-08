---
author: admin
comments: true
date: 2011-05-25 08:38:53+00:00
layout: post
slug: java-load-text-file-to-string
title: Java - Load text file to string
wordpress_id: 181
categories:
- Java
tags:
- Java
- load
- string
- text
---

Most common in programming is to load text files to a string. Since this usually involves some lines of code, here is a snippet for that:

    
    
    /**
     * Loads a file to String
     * @param fileName - file name for example "C:\\MeineFile.txt"
     * @return
     * @throws IOException 
     */
    private String loadFileToString(String fileName) throws IOException {
    	File file = new File(fileName);
    	StringBuffer content = new StringBuffer();
    	BufferedReader reader = null;
    
    	try {
    		reader = new BufferedReader(new FileReader(file));
    		String s = null;
    
    		while ((s = reader.readLine()) != null) {
    			content.append(s).append(System.getProperty("line.separator"));
    		}
    	} catch (FileNotFoundException e) {
    		throw e;
    	} catch (IOException e) {
    		throw e;
    	} finally {
    		try {
    			if (reader != null) {
    				reader.close();
    			}
    		} catch (IOException e) {
    			throw e;
    		}
    	}	
    	return content.toString();
    }
    
