---
page: introduction
title: WP REST API version 2.0 Introduction
layout: default
---
<div class="routes">
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
