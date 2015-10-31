---
title: Post Meta API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts/<parent_id>/meta
resource: Post Meta
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.meta.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.meta.routes['/wp/v2/posts/<parent_id>/meta'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.meta.routes['/wp/v2/posts/<parent_id>/meta'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.meta.routes['/wp/v2/posts/<parent_id>/meta/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.meta.routes['/wp/v2/posts/<parent_id>/meta'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.meta.routes['/wp/v2/posts/<parent_id>/meta/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.meta.routes['/wp/v2/posts/<parent_id>/meta/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
