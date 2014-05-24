---
author: admin
comments: true
date: 2014-05-24 17:00:00+00:00
layout: post
slug: introduction_to_the_common_navigator_framework
title: 'Introduction to the common navigator framework'
categories:
- Eclipse
- RCP
tags:
- CNF
---

The common navigator framework is one of the more complex things in Eclipse RCP. This article describes how to get started with the common navigator framework (CNF). So its just the basic stuff to get started and play around more on your own.

Enough [chitchat](http://youtu.be/oHoeXFbc1PA?t=10s), lets get started.

## Creating the view

The first step is to create a demo application where you can put the CNF view. Use the RCP sample application with a view. After you created the demo project, add the <code>org.eclipse.ui.navigator</code> plugin to the manifest.

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf1.png)

The next step is to add the view to the project by adding it to the <code>org.eclipse.ui.views</code> extension point.

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf2.png)

Enter the ID, a name and create a new class, subclassing the <code>CommonNavigator</code> class. In the example this class is named <code>MyNavigator</code>.

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf3.png)

After thats done, add the view to the perspective, either by plugin.xml or in code.

## Data classes

To show something in the tree, create some data classes: The first is our node we want to show. Also create a new bean class, named [ParentNode](https://github.com/andydunkel/RCP-Demo-Application/blob/master/com.da.editor/src/com/da/editor/cnf/ParentNode.java)  with a "name" attribute.

After that, create a class named [NavigatorRoot](https://github.com/andydunkel/RCP-Demo-Application/blob/master/com.da.editor/src/com/da/editor/cnf/NavigatorRoot.java). This will serve as root node in the navigator. The root does not appear in the view itself. The class must implement the IAdaptable interface. To achieve that easily, just extend the <code>PlatformObject</code> class.

After that, add the following method to the <code>NavigatorRoot</code> class:

	public Set<ParentNode> getParentNodes() {					
		ParentNode node = new ParentNode();
		node.setName("Hello World");
				
		ParentNode node2 = new ParentNode();
		node2.setName("Hallo Welt");
		
		Set<ParentNode> list = new HashSet<ParentNode>();
		list.add(node);		
		list.add(node2);		
		return list;
	}	

This just creates and returns two nodes, which should show up in the navigator later.

The last step is to add the data to the MyNavigator class we created before:

	@Override
	protected Object getInitialInput() {
		return new NavigatorRoot();
	}

Usually you would not statically set the input like in the example, but thats just an example to get it working.

## Plugin.xml

Now there are some things to do in the <code>plugin.xml</code> file. The first thing is to add an <code>org.eclipse.ui.navigator.navigatorContent</code> extension point.

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf4.png)

Enter an ID and a name and create a contentProvider and labelProvider for the extension point, by clicking on the links in the plugin.xml editor.

The label and content providers need some basic coding now. The content provider takes a <code>NavigatorRoot</code> object as input and should return an array ouf our <code>ParentNode</code> objects. The label provider takes the <code>ParentNode</code> as input and return its name property ([see here for code](https://github.com/andydunkel/RCP-Demo-Application/tree/master/com.da.editor/src/com/da/editor/cnf)). 

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf5.png)

In the next step, define the triggerPoints which define when the content should appear. Add a <code>triggerPoints</code> to the <code>navigatorContent</code> extension point we created before. When done add a <code>instanceof</code> element and enter the name of the <code>NavigatorRoot</code> class. The result should look like that: 

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf6.png)

In the last step, add an <code>org.eclipse.ui.navigator.viewer</code> extension point:

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf7.png)

The extension point registers the view as the navigator view and binds the content to it. First create the <code>viewer</code> element, then the <code>viewerContentBinding</code>. Enter the view id here again. Add an <code>includes</code> element, which well, includes the <code>navigatorContent</code> as <code>contentExtension.</code> In the pattern field, enter the id of the <code>navigatorContent</code> we created above.

## Launching the application

Once all is done and the application is launched, you should now see the content in the navigator tree:

![](http://andydunkel.net/assets/uploads/2014/05/cnf/cnf8.png)

Since a lot of steps are required, especially in the <code>plugin.xml</code>, its most likely that the content will not show up. In that case check your code and the xml files for typos. 

Well thats it. As you can see its a lot of work to get even that basic example working. In my personal opinion: think before using the CNF framework and only use it when you really need all the functionality.

## Code

The code for the example can be found on [GitHub](https://github.com/andydunkel/RCP-Demo-Application).