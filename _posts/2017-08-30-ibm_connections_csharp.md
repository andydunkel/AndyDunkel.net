---
author: admin
comments: true
date: 2017-08-30 10:00:00+00:00
layout: post
slug: ibm_connections_csharp
title: 'Use C# to post to IBM connections blogs and wikis'
categories:
- Programmierung
- Coding

tags:
- IBM
- Csharp
- RestSharp

---
<img src="/assets/uploads/2017/8/connection_logo.jpg" class="imagelogo">

The [Rest API](https://www-10.lotus.com/ldd/lcwiki.nsf/xpAPIViewer.xsp?lookupName=IBM+Connections+6.0+API+Documentation#action=openDocument&content=catcontent&ct=api) of <a href="https://www.ibm.com/software/products/de/conn" target="_blank">IBM Connections</a> can be used to access information in Connections, as well as to publish contents without accessing the site manually. 

The documentation of each function is quite complete. However there are only a few examples. In this blog post I will give some examples how blog posts and wiki pages can be posted with C#. I am using the [RestSharp](http://restsharp.org/) library for that.

<!--more-->

## Accessing the Rest API

For accessing the Rest Api, you need to authenticate with Connections. I am using the following helper method to instantiate the <code>RestClient</code> and set the authentification: 

	private static RestClient getClient()
	{
	    var client = new RestClient();
	    client.BaseUrl = new Uri("https://connections.yourdomain.com");
	    client.Authenticator = new HttpBasicAuthenticator("username", "password");
	    return client;
	}

## Posting blog posts

Posting blog posts is very easy, here is an example:

	var request = new RestRequest();
	request.Method = Method.POST;
	
	request.Resource = "/blogs/{blogid}/api/entries";
	
	//load blog post xml file
	string xml = File.ReadAllText("blog.xml");
	
	request.AddParameter("application/atom+xml", xml, ParameterType.RequestBody);
	
	//post the blog item
	IRestResponse response = getClient().Execute(request);
	
To get the <code>blogid</code>, you have to navigate to your Connections blog and copy the id from the URL:

![](/assets/uploads/2017/8/connections_1.png)
	
The blog post is encapsulated in XML. The content of the post in XML format looks like that:

	<?xml version="1.0" encoding="utf-8"?>
	<entry
	 xmlns="http://www.w3.org/2005/Atom"
	 xmlns:app="http://www.w3.org/2007/app"
	 xmlns:snx="http://www.ibm.com/xmlns/prod/sn">
	  <title type="text">Entry to Blog test</title>
	  <summary type="html">
	    Test Entry - BLOG
	  </summary>
	  <content type="html">
	    Test Entry - BLOG
	  </content>
	</entry>

The possible items of the XML file can be found in the <a href="https://www-10.lotus.com/ldd/lcwiki.nsf/xpAPIViewer.xsp?lookupName=IBM+Connections+6.0+API+Documentation#action=openDocument&res_title=Blog_posting_content_ic60&content=apicontent" target="_blank">Connections documentation</a>.

If everything works, the blog post should be posted to your Connections blog, when the code is run.

----------

## Requesting wiki pages

The first example is reading a wiki page from Connections:

    RestClient client = getClient();

    var request = new RestRequest();
    request.Method = Method.GET;
    request.Resource = "/wikis/basic/api/wiki/{wiki-label}/page/{page-label}/entry";
    IRestResponse response = client.Execute(request);

    textBox.Text = response.Content;

The wiki and page label can be found in the URL of the wiki page:

![](/assets/uploads/2017/8/connection_2.png)

This returns XML content of the wiki page which can be processed by your application.


----------


## Posting wiki pages

Posting wiki pages is a little bit different to posting blog items. Here is an example:

	var request = new RestRequest();
	request.Method = Method.POST;
	
	string nonce = GetNonce();
	request.AddHeader("X-Update-Nonce", nonce);
	request.Resource = "/wikis/basic/api/wiki/{wiki-label}/feed";
	
	string xml = File.ReadAllText("example.xml");
	
	request.AddParameter("application/atom+xml", xml, ParameterType.RequestBody);
	IRestResponse response = getClient().Execute(request);

The code looks a little bit like the code for posting the blog post. However there is a difference. For posting a wiki page, you need a <a href="https://en.wikipedia.org/wiki/Cryptographic_nonce" target="_blank">nonce</a>.

### Getting a nonce for writing

	private String GetNonce()
	{
	    RestClient client = getClient();
	    var request = new RestRequest();
	    request.Method = Method.GET;
	    request.Resource = "/wikis/basic/api/nonce";
	    IRestResponse response = client.Execute(request);
	
	    string nonce = response.Content;
	    return nonce;
	}

This code returns a nonce value, which can be used for posting the article:

	string nonce = GetNonce();
	request.AddHeader("X-Update-Nonce", nonce);

### Wiki page xml file

The basic XML content for posting to the wiki looks like that:

	<entry xmlns="http://www.w3.org/2005/Atom">
	<category term="page" label="page" scheme="tag:ibm.com,2006:td/type"></category>
	<title>test</title>
	<label xmlns="urn:ibm.com/td">my wiki page</label>
	<visibility xmlns="urn:ibm.com/td">public</visibility>
	<propagation xmlns="urn:ibm.com/td">false</propagation>
	<summary>edited via API</summary>
	<content type="text/html"><![CDATA[<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html [<!ENTITY amp
	"&#38;#38;"><!ENTITY lt "&#60;#60;"><!ENTITY gt
	"&#62;#62;"><!ENTITY nbsp "&#160;"><!ENTITY apos
	"&#39;"><!ENTITY quot "&#34;">]><div>Hello Word</div>]]></content>
	</entry>
	
A complete documentation can also be found <a href="https://www-10.lotus.com/ldd/lcwiki.nsf/xpAPIViewer.xsp?lookupName=IBM+Connections+6.0+API+Documentation#action=openDocument&res_title=Wiki_defintion_content_ic60&content=apicontent" target="_blank">in the documentation</a>.	

### Problems with wiki pages

Posting a wiki page turned out to be a little bit cumbersome. In my first approaches complete invalid content seemed to be posted to the wiki. The page was created, but empty. Also editing in the browser was not possible. One problem was, that a was missing the label tag in the XML content: 

	<label xmlns="urn:ibm.com/td">my wiki page</label>
	
Another problem was the request body, which contains the XML content. I tried to use the <code>request.AddXmlBody(xml);</code> method. But the correct approach is to add the body like that: <code>request.AddParameter("application/atom+xml", xml, ParameterType.RequestBody);</code>.
	
After that was solved, sometimes the page still remained empty after creation. However editing was now possible. I am not 100% sure what the problem is or was. But there where cases that the HTML content was invalid for example:

	<h1>Heading</h2>
	
So maybe there is some validation on the server side for valid HTML code. If you edit the page in the browser, those errors are automatically corrected by connections. Since there is a big chance for small errors in user generated HTML code is this not good, as you I did not get an error. The page was created but without any content.

You also need to encapsultate the HTML content with the <code><![CDATA[</code> and <code>]]></code> tags.


## Well thats it

These where only some examples how to access Connections content from C#. The documentation from IBM about the rest api is complete but very abstract. I mostly struggled to contruct the correct API requests and request bodys. I was not able to completely solve the empty page issues with the wiki api.