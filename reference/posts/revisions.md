---
title: Post Revisions API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts/<parent_id>/revisions
resource: Post Revision
canonical_url: https://developer.wordpress.org/rest-api/reference/post-revisions/
---

<section class="route">
	<div class="primary">
		{% assign schema = site.data['posts-revision'].schema %}
		{% include reference-parts/schema.html schema=schema %}
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/wp-json{{ site.data.meta.routes['/wp/v2/posts/<parent_id>/revisions'].nicename }}</code>
	</div>
</section>

{% assign route=site.data['posts-revision'].routes['/wp/v2/posts/<parent_id>/revisions'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data['posts-revision'].routes['/wp/v2/posts/<parent_id>/revisions/<id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data['posts-revision'].routes['/wp/v2/posts/<parent_id>/revisions/<id>'] %}
{% include reference-parts/delete-item.html route=route %}
