---
title: Tags API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/tags
resource: Tag
canonical_url: https://developer.wordpress.org/rest-api/reference/tags/
---


<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.tag.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.tag.routes['/wp/v2/tags'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.tag.routes['/wp/v2/tags'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/tags/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/tags'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/tags/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/tags/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
