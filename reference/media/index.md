---
title: Media API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/media
resource: Media
canonical_url: https://developer.wordpress.org/rest-api/reference/media/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.attachment.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.attachment.routes['/wp/v2/media'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.attachment.routes['/wp/v2/media'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.attachment.routes['/wp/v2/media/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.attachment.routes['/wp/v2/media'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.attachment.routes['/wp/v2/media/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.attachment.routes['/wp/v2/media/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
