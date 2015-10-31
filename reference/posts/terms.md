---
title: Post terms API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts/<post_id>/terms/category
resource: Post Term
---

{% assign route=site.data.term.routes['/wp/v2/posts/<post_id>/terms/category'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/posts/<post_id>/terms/category/<term_id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/posts/<post_id>/terms/category'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/posts/<post_id>/terms/category/<term_id>'] %}
{% include reference-parts/update-item.html route=route %}

{% assign route=site.data.term.routes['/wp/v2/posts/<post_id>/terms/category/<term_id>'] %}
{% include reference-parts/delete-item.html route=route %}
