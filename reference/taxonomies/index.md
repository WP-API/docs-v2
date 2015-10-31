---
title: Taxonomies API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/taxonomies
resource: Taxonomy
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.taxonomy.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.taxonomy.routes['/wp/v2/taxonomies'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.taxonomy.routes['/wp/v2/taxonomies'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.taxonomy.routes['/wp/v2/taxonomies/<taxonomy>'] %}
{% include reference-parts/get-item.html route=route %}
