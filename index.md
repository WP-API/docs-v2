---
page: introduction
title: WP REST API version 2.0 Introduction
layout: default
---
<div class="toc">
	<h2>Table of Contents</h2>

	<h3><a href="{{ HOME_PATH }}#endpoints">Endpoints</a></h3>
	<ul>
		<li><a href="{{ HOME_PATH }}#posts">Posts</a></li>
		<li><a href="{{ HOME_PATH }}#pages">Pages</a></li>
		<li><a href="{{ HOME_PATH }}#media">Media</a></li>
		<li><a href="{{ HOME_PATH }}#post_meta">Post Meta</a></li>
		<li><a href="{{ HOME_PATH }}#post_revisions">Post Revisions</a></li>
		<li><a href="{{ HOME_PATH }}#comments">Comments</a></li>
		<li><a href="{{ HOME_PATH }}#taxonomies">Taxonomies</a></li>
		<li><a href="{{ HOME_PATH }}#terms">Terms</a></li>
		<li><a href="{{ HOME_PATH }}#media">Users</a></li>
	</ul>
</div>

<div class="routes">
	<h1 id="endpoints">Endpoints</h1>
	{% capture posts %}{% include routes/posts.md %}{% endcapture %}
	{{ posts | markdownify }}
	{% capture pages %}{% include routes/pages.md %}{% endcapture %}
	{{ pages | markdownify }}
	{% capture media %}{% include routes/media.md %}{% endcapture %}
	{{ media | markdownify }}
	{% capture post_meta %}{% include routes/post_meta.md %}{% endcapture %}
	{{ post_meta | markdownify }}
	{% capture post_revisions %}{% include routes/post_revisions.md %}{% endcapture %}
	{{ post_revisions | markdownify }}
	{% capture comments %}{% include routes/comments.md %}{% endcapture %}
	{{ comments | markdownify }}
	{% capture taxonomies %}{% include routes/taxonomies.md %}{% endcapture %}
	{{ taxonomies | markdownify }}
	{% capture terms %}{% include routes/terms.md %}{% endcapture %}
	{{ terms | markdownify }}
	{% capture users %}{% include routes/users.md %}{% endcapture %}
	{{ users | markdownify }}
</div>
