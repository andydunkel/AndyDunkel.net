---
author: admin
comments: true
date: 2013-08-20 15:50:08+00:00
layout: post
slug: eclipse-rcp-remove-quick-access-from-toolbar
title: 'Eclipse / RCP: Remove Quick Access from toolbar'
wordpress_id: 1617
categories:
- Eclipse
- Java
tags:
- e4
- eclipse4
- Kepler
- RCP
---

After updating my RCP application from Eclipse 3.7 to Eclipse 4.x the toolbar always showed the quick access toolbar:




 




![Quick access](https://andydunkel.net/assets/uploads/2013/08/quick_access.png)




How to get rid of that? The workaround is to hide the item with some CSS code.




First create a CSS file in your plugins root folder, for example "default.css":



    
    #SearchField {
    	visibility: hidden;	
    }




Then add a property in the plugin.xml to your product extension point:




![Property](https://andydunkel.net/assets/uploads/2013/08/property.png)




![Property2](https://andydunkel.net/assets/uploads/2013/08/property2.png)




The name for the property is "applicationCSS" and in the value field link to your CSS file.




The quick access should be gone next time you run your application with the product configuration.
