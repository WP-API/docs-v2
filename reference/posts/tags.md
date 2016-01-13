---
title: Post Tags API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts/<post_id>/tags
resource: Post Tag
---

{% assign route=site.data.tag.routes['/wp/v2/posts/<post_id>/tags'] %}
{% include reference-parts/list-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/posts/<post_id>/tags/<term_id>'] %}
{% include reference-parts/get-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/posts/<post_id>/tags'] %}
{% include reference-parts/create-item.html route=route %}

{% assign route=site.data.tag.routes['/wp/v2/posts/<post_id>/tags/<term_id>'] %}
{% include reference-parts/delete-item.html route=route %}
