---
title: Comments API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/comments
resource: Comment
canonical_url: https://developer.wordpress.org/rest-api/reference/comments/
redirect_to:
  - https://developer.wordpress.org/rest-api/reference/comments/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.comment.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.comment.routes['/wp/v2/comments'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.comment.routes['/wp/v2/comments'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.comment.routes['/wp/v2/comments/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.comment.routes['/wp/v2/comments'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.comment.routes['/wp/v2/comments/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.comment.routes['/wp/v2/comments/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
