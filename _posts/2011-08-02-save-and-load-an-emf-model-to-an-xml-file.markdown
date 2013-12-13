---
author: admin
comments: true
date: 2011-08-02 19:54:38+00:00
layout: post
slug: save-and-load-an-emf-model-to-an-xml-file
title: Save and load an EMF model to an XML file
wordpress_id: 829
categories:
- Eclipse
- Java
tags:
- EMF
- load
- Save
- XML
---

Here are two code snippets which give you an example how to save and load an EMF model to an XML file.

Note that "Data" is my EMF model object.

Save EMF to XML file:

    
    
    public void saveData(String fileName, Data data) throws IOException {  
      Resource.Factory.Registry reg = Resource.Factory.Registry.INSTANCE;
      Map<String, Object> m = reg.getExtensionToFactoryMap();
      m.put("daform", new XMIResourceFactoryImpl());
    
      ResourceSet resSet = new ResourceSetImpl();
      Resource resource = resSet.createResource(URI.createFileURI(fileName));
      resource.getContents().add(data);
      resource.save(Collections.EMPTY_MAP);
    }



Load to EMF object:

    
    
    public Data loadData(String fileName) throws FileNotFoundException, IOException {
      XMIResourceImpl resource = new XMIResourceImpl();
      File source = new File(fileName);
      resource.load( new FileInputStream(source), new HashMap<Object,Object>());
      Data data = (Data)resource.getContents().get(0);  
      return data;
    }
    



