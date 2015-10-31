---
title: Post Types API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/types
resource: Type
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.type.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ site.data.type.routes['/wp/v2/types'].nicename }}
	</div>
</section>

{% assign route=site.data.type.routes['/wp/v2/types'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.type.routes['/wp/v2/types/<type>'] %}
{% include reference-parts/get-item.html route=route %}
