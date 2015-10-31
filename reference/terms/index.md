---
title: Terms API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/terms
resource: Term
---


<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.term.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ site.data.term.routes['/wp/v2/terms/category'].nicename }}
	</div>
</section>

{% assign route=site.data.term.routes['/wp/v2/terms/category'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/terms/category/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/terms/category'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/terms/category/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/terms/category/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
