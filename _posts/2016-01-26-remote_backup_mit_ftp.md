---
author: admin
comments: true
date: 2016-01-21 17:00:00+00:00
layout: post
slug: jekyll_related_posts
title: 'Jekyll - Related Posts / Verwandte Artikel'
categories:
- Jekyll
- Webdesign
tags:
- Jekyll
- Webdesign

---

Jekyll bietet über das die Variable <code>site.related_posts</code> eine Funktion um "Verwandte Artikel" zu einem Blogpost anzuzeigen. Standardmäßig ist die Funktion jedoch eher eingeschränkt und enthält nur die letzten 10 Artikel.

Das Ganze wird z.B. so verwendet:

	{{ "{% for post in site.related_posts "}}%}
	   <li><a href="{{ "{{ site.url "}}}}{{ "{{ post.url "}}}}" title="{{ "{{ post.title "}}}}>{{ "{{ post.title "}}}}</a></li>
	{{ "{% endfor "}}%}

Da jeweils immer nur die letzten 10 Artikel angezeigt werden, ist das nicht wirklich "related". Immerhin wird noch die Option angeboten das Ganze über einen Index etwas schlauer zu machen. Mit der Option <code>--lsi</code> wird beim Generieren der Seite ein Index angelegt und die Funktion arbeitet semantisch etwas schlauer. Bei mir hat das jedoch auch nicht funktioniert. Hier kam es leider nur zu einer Fehlermeldung. Außerdem wollte ich nicht stupide immer 10 Artikel angezeigt bekommen, obs passt oder nicht.

Auf der Suche nach einer besseren Lösung bin ich auf [ein Github-Projekt](https://github.com/jumanji27/related-posts-jekyll-plugin) gestoßen. Das Plugin kopiert man einfach in das Plugin-Verzeichnis von Jekyll. Es ersetzt die Standardfunktion von Jekyll. Die Zuordnung der verwandten Artikel erfolgt beim Plugin über die Tags, gleicher Tag == verwandt.

Zur Einbindung habe ich folgenden Code verwendet.

	{{ "{% if site.related_posts.size > 0 "}}%}
	 <div class="panel panel-default">
	 	<div class="panel-heading">Verwandte Artikel:</div>
		<div class="panel-body">
		{{ "{% for post in site.related_posts "}}%}
		   <li><a href="{{ "{{ site.url "}}}}{{ "{{ post.url "}}}}" title="{{ "{{ post.title "}}}}>{{ "{{ post.title "}}}}</a></li>
		{{ "{% endfor "}}%}
		</div>
	</div>
	{{ "{% endif "}}%}

Das Ergebnis sieht dann z.B. so aus:

![](/assets/uploads/2016/1/related_posts.png)

Der Code stellt die Box zudem nur dar, wenn es verwandte Artikel gibt. 

----------

Beim Schreiben dieses Artikels ist es mir aufgefallen, dass es gar nicht so leicht ist "Liquid code" in Jekyll als Code darzustellen. Wie das geht, [ist hier erklärt](https://truongtx.me/2013/01/09/display-liquid-code-in-jekyll/).