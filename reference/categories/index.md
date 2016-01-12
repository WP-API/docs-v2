---
title: Categories API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/categories
resource: Category
---


<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.category.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.category.routes['/wp/v2/categories'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.category.routes['/wp/v2/categories'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/categories/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/categories'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/categories/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/categories/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
