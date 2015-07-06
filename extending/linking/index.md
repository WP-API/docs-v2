---
title: Linking
---

The WP REST API heavily incorporates hypermedia concepts, including linking. At the core, this relies on hyperlinking between resources, similar to how normal web pages link between related pages. This allows the API to be discoverable to new users and clients.

The linking system we use is based on [HAL][] (Hypertext Markup Language).

[HAL]: http://stateless.co/hal_specification.html


The Basics
----------
Let's pretend you're building your own API from scratch. You start out with just the raw data for an object being output. You might add some extra meta information into the data. You then realise that you want to indicate what's related, so you add a `related` field with a URL pointing to another object.

This works fine for a bit, but now you need multiple links, and you realise this probably isn't a scalable system. Instead, you create a `_links` property (prefixed with an `_` because it's a "meta" property, not part of the data). Underneath this, you add in your previous `related` link. Rather than just the URL this time though, you use an object so you can add custom properties. You also add an `author` property next to it, following the same format. To future-proof it, you make it possible to add multiple of the same type.

It looks something like this:

```json
{
	"_links": {
		"related": [
			{
				"href": "http://api.example.com/custom/otherobject",
			}
		],
		"author": [
			{
				"href": "http://api.example.com/wp/v2/user/42",
			}
		]
	}
}
```

By some magic, you've managed to independently invent HAL. Congratulations! :)

HAL uses the `_links` property to indicate links from the current resource to other resources. The keys are always link relations (specifying the type of relationship), and the values are lists of link objects. (HAL allows singular objects as well as lists, but this can cause problems if more links need to be added later, so we stick to lists in the WP REST API.)

You can add these links into your returned data manually if you'd like, but the recommended way to add them is to use the helpers on Response objects. The `add_link` method on `WP_REST_Response` takes a relation, a URL HTTP reference, and optional attributes:

```php
$response = new WP_REST_Response( $data );
$response->add_link( 'author', rest_url( '/wp/v2/users/42' ) );
```

You can also add multiple using the `add_links` method by structuring them similar to the output format:

```php
$response = new WP_REST_Response( $data );
$response->add_links( array(
	'author' => array(
		'href' => rest_url( '/wp/v2/users/42' ),
	),
	'related' => array(
		array(
			'href' => rest_url( '/wp/v2/custom/firstobject' ),
		),
		array(
			'href' => rest_url( '/wp/v2/custom/secondobject' ),
			'customattr' => true,
		)
	),
) );
```


Link Relations
--------------

Whenever you have two objects related in some way, you need to specify what the relationship is. For example, if you link from a post to a user, you need to specify if that user is the author of the post, or someone who commented on the post, or if the post is about that user. We do this through link relations, which you're probably already familiar with.

If you've ever typed `<link rel="stylesheet" />`, then you've used the `stylesheet` link relation. Favicons use this too with `<link rel="shortcut icon" />`, as well as Atom/RSS feeds with `<link rel="alternate" />`

These link relations are a standardised system of categorising relationships between multiple objects. They fall into one of two types:

1. **Standard Link Relations**

	Standard link relations are well-known strings for common relations between objects. These relations are defined by IANA and stored in [a common registry][registry].

	Commonly used standard link relations include some of the following:
	* `author`: Refers to the author of the current resource.
	* `collection`: Refers to the main collection that the resource belongs to.
	* `enclosure`: Refers to a large file (typically a raw media file) related to the resource.
	* `related`: Refers to a related resource. (Generic relation.)
	* `replies`: Refers to a resource that replies to the current one (such as a comment).
	* `up`: Refers to a parent resource.

[registry]: http://www.iana.org/assignments/link-relations/link-relations.xhtml

2. **Custom Link Relations**

	For any relations which don't fit a normal standard relation, custom link relations can be used. These custom relations are URIs, which ensures they are unique. Note though that these are still describing the *relationship*, not the resource you're linking to.

	For example, the core API uses the `http://v2.wp-api.org/term` relation to specify terms on a post, but the terms themselves are at `/wp-json/wp/v2/terms/tag` on your own site. This indicates that the link is a term on the current resource, and the `taxonomy` key can be used to disambiguate it from others:

	```json
	{
		"_links": {
			"http://v2.wp-api.org/term": [
				{
					"href": "http://example.com/wp-json/wp/v2/terms/category",
					"taxonomy": "category",
					"embeddable": true
				}
			]
		}
	}
	```

	You can pick any URI you'd like for the relation, but keep them constant across sites and versions when the relationship doesn't change.

	The core REST API uses the following custom link relations:
	* `http://v2.wp-api.org/attachment`: Refers to a resource attached to the current post (such as a featured image or video).
	* `http://v2.wp-api.org/meta`: Refers to metadata attached to the current post.
	* `http://v2.wp-api.org/term`: Refers to a term categorising the current resource.


Embedding
---------

One added benefit of linking between resources is that the REST API can automatically support embedding linked resources. This internally fetches the resource and includes it inline with the data.

Embedding can reduce the number of HTTP requests that clients need to make, which is especially useful for mobile clients over limited bandwidth and high latency connections. For example, fetching a post resource with embeds reduces the number of requests from 5 (post, author user, comments, attachments, categories, and tags) to 1 (post with embeds).

Enabling links to be embedded is super simple, simply add `'embeddable' => true` to your link attributes. The URL needs to be "local", that is, pointing to an internal REST API route. When a client requests the resource, they can then add `_embed` to the parameters (i.e. `?_embed`), and the API infrastructure will automatically embed these links into the returned data. The `_embedded` key in the returned data will then contain the content of the embedded resources, in the same order as the `_links` values.

```php
$response->add_link( 'author', rest_url( '/wp/v2/users/42' ), array( 'embeddable' => true ) );
```

This is all handled internally by the API infrastructure for you. Internally, a GET request is created and routed to the endpoint, then embedded into the data. The `context` parameter to the requests will also be set to `embed` if you want to differentiate embedded requests from full requests.
