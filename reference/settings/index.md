---
title: Users API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/settings
resource: Setting
canonical_url: https://developer.wordpress.org/rest-api/reference/settings/
redirect_to:
  - https://developer.wordpress.org/rest-api/reference/settings/
---

<section class="route">
	<div class="primary">
		{% include reference-parts/schema.html schema=site.data.settings.schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.settings.routes['/wp/v2/settings'].nicename }}</code>
	</div>
</section>

{% assign route=site.data.settings.routes['/wp/v2/settings'] %}
{% include reference-parts/update-settings.html route=route %}
