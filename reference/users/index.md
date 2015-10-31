---
title: Users API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/users
resource: User
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.user.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ site.data.user.routes['/wp/v2/users'].nicename }}
	</div>
</section>

{% assign route=site.data.user.routes['/wp/v2/users'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.user.routes['/wp/v2/users/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.user.routes['/wp/v2/users'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.user.routes['/wp/v2/users/<id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.user.routes['/wp/v2/users/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
