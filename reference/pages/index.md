---
title: Pages API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/pages
resource: Page
canonical_url: https://developer.wordpress.org/rest-api/reference/pages/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.page.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.page.routes['/wp/v2/pages'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.page.routes['/wp/v2/pages'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.page.routes['/wp/v2/pages/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.page.routes['/wp/v2/pages'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.page.routes['/wp/v2/pages/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.page.routes['/wp/v2/pages/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
