---
page: links
title: Linking and Embedding
layout: reference
---

<section class="route">
<div class="primary" markdown="1">

# {{ page.title }}

The WP REST API incorporates hyperlinking throughout the API to allow discoverability and browsability. We use the [HAL standard][] for linking, as well as embedding other resources.

Links are provided in the `_links` property of the response object, which contains a map of "relation" to a list of the links themselves. The relation specifies how the linked resource relates to the primary resource you're accessing. The relation is either a [standardised relation][iana-link-relation], a URI relation (like `https://api.w.org/term`) or a Compact URI relation (like `wp:term`). (Compact URI relations can be normalised to full URI relations to ensure full compatibility if required.) This is similar to HTML `<link>` tags, or `<a rel="">` links.

The links are an object containing a `href` property with an absolute URL to the resource, as well as other optional properties. These include content types, disambiguation information, and data on actions that can be taken with the link.

For collection responses (those that return a list of objects rather than a top-level object), each item contains links, and the top-level response includes links via the `Link` header instead.

<div class="note" markdown="1">
If your client library does not allow accessing headers, you can use the [`_envelope`](global.html#envelope) parameter to include the headers as body data instead.
</div>

[iana-link-relation]: http://www.iana.org/assignments/link-relations/link-relations.xhtml#link-relations-1
[HAL standard]: http://stateless.co/hal_specification.html

</div>
<div class="secondary" markdown="1">

### Example Response

A typical single post request (`/wp/v2/posts/42`):

```json
{
	"id": 42,
	"_links": {
		"collection": [
			{
				"href": "https://demo.wp-api.org/wp-json/wp/v2/posts"
			}
		],
		"author": [
			{
				"href": "https://demo.wp-api.org/wp-json/wp/v2/users/1",
				"embeddable": true
			}
		]
	}
}
```

</div>
</section>

<section class="route">
<div class="primary" markdown="1">

### Embedding

Optionally, some linked resources may be included in the response to reduce the number of HTTP requests required. These resources are "embedded" into the main response.

Embedding is triggered by setting the [`_embed` query parameter](global.html#embed) on the request. This will then include embedded resources under the `_embedded` key adjacent to the `_links` key. The layout of this object mirrors the `_links` object, but includes the embedded resource in place of the link properties.

Only links with the `embedded` flag set to `true` can be embedded, and `_embed` will cause all embeddable links to be embedded. Only relations containing embedded responses are included in `_embedded`, however relations with mixed embeddable and unembeddable links will contain dummy responses for the unembeddable links to ensure numeric indexes match those in `_links`.

</div>
<div class="secondary" markdown="1">

```json
{
	"id": 42,
	"_links": {
		"collection": [
			{
				"href": "https://demo.wp-api.org/wp-json/wp/v2/posts"
			}
		],
		"author": [
			{
				"href": "https://demo.wp-api.org/wp-json/wp/v2/users/1",
				"embeddable": true
			}
		]
	},
	"_embedded": {
		"author": {
			"id": 1,
			"name": "admin",
			"description": "Site administrator"
		}
	}
}
```
</div>
</section>
