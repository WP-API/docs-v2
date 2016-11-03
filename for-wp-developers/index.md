---
title: For WordPress Developers
---

Already a WordPress developer? The REST API can help you build faster and write less code, so you can focus on building your awesome plugin or theme.

A lot of the REST API will be familiar to you, but there are some important differences in the data, and new terminology specific to the REST API.


## Terminology

controller
: Class containing everything needed for a route, including registration, sanitization callbacks, and the main callback.

endpoint
: Callback that responds to a HTTP request. Tied to a route and HTTP method.

route
: URL pattern, equivalent to a WordPress rewrite rule. Can have multiple endpoints to handle multiple HTTP methods.

resource
: Object stored in WordPress, such as a post or term.

schema
: Meta-object which describes what a resource looks like.


## Structure

The REST API is a whole new external API for WordPress installations. The API is designed around a concept called [REST, or Representation State Transfer](https://en.wikipedia.org/wiki/Representational_state_transfer), which uses HTTP requests to interact with data. If you've ever sent a HTTP request or used Ajax, you'll be right at home using the REST API.

The API lives under `/wp-json/` on WordPress sites (you can get this URL from `rest_url()`), and is broken down into a bunch of "routes". You can think of routes as rewrite rules that map your request to the internal API code used to handle the request.

<div class="note" markdown="1">
REST API routes are not directly registered as rewrite rules, as they follow a different style of internal rewriting. For information on how to add your own routes, see [the Adding Endpoints guide](http://localhost:4000/extending/adding/).
</div>

Each route in the REST API has a namespace, the route itself, and the endpoints registered for it. The namespace is similar to PHP namespaces or function prefixes; for WordPress core, the namespace is "wp/v2". The route is a regular expression to match against the URL, similar to a rewrite rule. This is matched by the API infrastructure to an endpoint, which is a callback function. Unlike rewrite rules, endpoints are tied to specific HTTP methods; a route can have both a `GET` endpoint **and** a `POST` endpoint.

Since the REST API is based on HTTP, working with it involves things you'll already know: `GET` and `POST` requests. REST also uses two other verbs, `PUT` and `DELETE`, and codifies exactly what they mean:

* `GET` - Retrieve a resource
* `POST` - Create a resource
* `PUT` - Update a resource
* `DELETE` - Delete a resource

Routes fall into one of two buckets: single resources, and collections. Resources are objects, like posts, while collections are arrays of resources.


### Resources

The REST API returns a bunch of different objects to the client. These objects are called "resources"; you can imagine them just like objects in PHP, where the object type is similar to the PHP class.

In WordPress, there are four fundamental data types: posts, comments, terms, and users. These types (excluding users) can have subtypes as well: custom post types, custom comment types, and taxonomies. The REST API contains full support for all of these types and subtypes.

Each of these subtypes has a "schema", which is similar to a PHP class, and describes "resources" of that type. Resources are the actual objects available through the API. For example, pages have a set schema, and a page called "About" would be a resource following the page schema.

<div class="note" markdown="1">
If you want to expose your custom resource (custom post type, etc) via the REST API, you need to [opt-in in your registration call](/extending/custom-content-types/). Exposing the resource via the REST API here will use the default controllers built into the REST API, which [you can subclass](/extending/internal-classes/) or you can [create your own endpoints instead](/extending/adding/). The schema for your type will be automatically generated from the internal WordPress registration data, such as `post_type_supports()`.
</div>

Resources returned through the API are similar to the internal PHP object, but typically use different names. The API intentionally changes these names to make them more consistent, but this means they differ from the internal names you might be used to. Generally, we use the user-facing terminology, rather than internal names; that means `title` instead of `post_title` and `featured_media` instead of `post_thumbnail`. The [API reference](/reference/) contains details about all properties available for every resource.

Resources are typically singular, and live at URLs like `/wp/v2/posts/42`; that is, `/wp/v2/{object}s/{id}`. They can be retrieved with `GET`, updated with `PUT`, and deleted with `DELETE`. You can also get information about the route and the resource schema by sending an `OPTIONS` request.


### Collections

Collections are an array of resources. They're similar to the query classes (`WP_Query` and friends) in WordPress.

Just like resources, the names are changed from the internal names to be more consistent. Typically, query parameters match the field you want to query by; to find posts with `status` set to `draft`, simply query `status=draft`. All collection query parameters are included in the `OPTIONS` response, and are also listed in the [API reference](/reference/).

Collections are typically plural, and live at URLs like `/wp/v2/posts`; that is `/wp/v2/{object}s`. They can be retrieved with `GET`, and new resources can be created with `POST`. You can also get information about the route and the schema for the resources it contains by sending an `OPTIONS` request.


## Requesting Data

To use the REST API, your code needs to send HTTP requests to the API endpoints you want to access. If you want to access protected data (`raw` fields for editing) or update data, you'll also need to a) be logged in, and b) send a nonce with your request. Nonces can be generated with `wp_create_nonce( 'wp_rest' )`, and should be sent as the `_wpnonce` parameter in the query string (i.e. `/wp-json/?_wpnonce=abcd123`).

The API also bundles [a Backbone library](/extending/javascript-client/) including models and collections, which can be used to format and send requests for you, automatically handling authentication and encoding. This library can be used even if you're not using Backbone in your own code. Simply declare `wp-api` as a dependency of your script when you enqueue it. Further information on how to use the library is available [on the JavaScript Client page](http://localhost:4000/extending/javascript-client/).
