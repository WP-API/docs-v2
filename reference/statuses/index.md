---
title: Post Statuses API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/statuses
resource: Status
canonical_url: https://developer.wordpress.org/rest-api/reference/post-statuses/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.status.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.status.routes['/wp/v2/statuses'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.status.routes['/wp/v2/statuses'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.status.routes['/wp/v2/statuses/<status>'] %}
{% include reference-parts/get-item.html route=route %}
