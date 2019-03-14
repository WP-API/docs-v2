---
title: Posts API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts
resource: Post
canonical_url: https://developer.wordpress.org/rest-api/reference/posts/
redirect_to:
  - https://developer.wordpress.org/rest-api/reference/posts/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.post.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.post.routes['/wp/v2/posts'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.post.routes['/wp/v2/posts'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.post.routes['/wp/v2/posts/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.post.routes['/wp/v2/posts'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.post.routes['/wp/v2/posts/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.post.routes['/wp/v2/posts/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
