---
title: Post Categories API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts/<post_id>/categories
resource: Post Category
---

{% assign route=site.data.category.routes['/wp/v2/posts/<post_id>/categories'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/posts/<post_id>/categories/<term_id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/posts/<post_id>/categories'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.category.routes['/wp/v2/posts/<post_id>/categories/<term_id>'] %}
{% include reference-parts/delete-item.html route=route %}
