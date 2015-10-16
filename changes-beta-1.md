---
title: "What's Changed: v2 Beta 1"
---

This document is a summary of what we've changed in the REST API between
versions 1 and 2. The key changes to the API are listed below, along with an
example of migrating an endpoint to version 2.

**Important note:** Beta 1 does not guarantee forwards compatibility with
future betas. While we believe the API is now stable enough for public
testing, we may continue to break the API in the future as we improve it
further. Only use the API in development, and do not use version 2 in
production environments.

As always, we'd love your feedback on what we're doing right, or what we're
doing wrong. If there's changes in here that make you think "what were they
thinking", let us know. If something's missing that needs further changing,
then we'd also love to know that. :)

# Key Changes

## Internals

* Changed: Endpoints now take a single parameter of type `WP_REST_Request`.
  Argument registration has been moved to the route registration. You can now
  set whether arguments are required with the `required` option, and a default
  value with `default`. (A corresponding `rest_ensure_request` function has
  been added to coerce array data to a request object.)

* Added: Route registration can now be done via `register_rest_route`. This
  function requires using a namespace. We recommend plugin and theme authors
  use the plugin slug, followed by a version in the form of `/v1`; the core
  API endpoints use the namespace `wp/v2`

* Changed:  All built-in endpoints now use a common Controller base class with
  a standardised pattern. This is part of the public API for developers, and
  we recommend you use this when working with most use cases. This simply
  codifies the best practices in the API core, but is not required in
  custom code.

* Added: Permission callbacks can now be registered separately to the response
  callback. This allows us to return richer errors and capability assertions
  for clients. Use the `permission_callback` option when registering a route,
  and return either `true` if the user has permission to access the API,
  `false` or `null` if the user doesn't have permission, or a `WP_Error` for a
  custom error to pass back to the user.

* Added: The server can now validate and sanitize arguments for you, using the
  `validate_callback` and `sanitize_callback` options when registering
  arguments. The validation callback can return a truthy value for valid
  parameters, `false` for invalid parameters, or a `WP_Error` for a custom
  error to pass back to the user.


## External API

* **Changed**: Built-in WordPress core routes have moved to the `wp/v2`
  namespace. For example, the posts collection endpoint is now at
  `/wp-json/wp/v2/posts`

* **Changed**: Hypermedia links have changed from `meta.links` to 
  `_links` to follow the HAL standard. In custom endpoints, you can either
  return `_links` in your data, or use `WP_REST_Response->add_link`

* **Added**: Links can now have an embeddable attribute that indicates they
  can be "embedded" in the response. Pass the `&_embed` parameter to get
  back those objects in your response as well.

* **Added**: Defined content types now also have a schema endpoint, following
  the JSON Schema standard.

* **Changed**: Comments have been moved to a top-level endpoint at
  `/wp/v2/comments`. To fetch comments belonging to a post, use
  `/wp/v2/comments?post=<id>`


## Future Changes

We have the following on our mind for further evolution of the API as we progress through to beta 2 and beyond:

* Links from collections
* Schema auto-validation, and further evolution of how we use schemas internally and externally
* User meta access
* Public access to public user data (name, URI, etc) for authors
* Better handling of trashing/permanently deleting


# Migrating endpoints from v1 to v2

Migrating endpoints from version 1 code to version 2 is pretty simple, and the
easiest way to see this is by example. Let's take an example API:

```php
<?php
add_filter( 'json_endpoints', 'tsla_register_routes' );

function tsla_register_routes( $routes ) {
    $routes[ '/tsla/honk_horn' ] = array( 'tsla_add_horn_honks', WP_JSON_Server::READABLE );
    return $routes;
}

function tsla_add_horn_honks( $honks = 1 ) {
    if ( ! is_numeric( $honks ) ) {
        return new WP_Error( 'tsla_honks_invalid', 'Honks must be a number', array( 'status' => 400 ) );
    }
    $count = get_option( 'wc-heartbeat-honk', 0 );
    update_option( 'wc-heartbeat-honk', $count + $honks );
    $response = new WP_JSON_Response( array( 'result' => true ) );
    $response->header( 'X-Prev-Honks', $count );
    return $response;
}
```

This is a nice simple API for us to deal with, but has a bit of complexity: it
takes (optional) arguments, has error handling, and also has some custom
headers. There are a few key changes we need to make here:

* API prefixes have changed from `WP_JSON` to `WP_REST` (and filters from
  `json_` to `rest_`)

* Arguments have changed from mapping to function parameters to taking a
  single `WP_REST_Request` object

* Route registration now takes place via a helper function rather than directly
  via the filter

Here's what the new API looks like:

```php
<?php
add_filter( 'rest_api_init', 'tsla_register_routes' );

function tsla_register_routes( $routes ) {
    register_rest_route( 'tsla', '/honk_horn', array(
        'callback' => 'tsla_add_horn_honks',
        'methods'  => WP_REST_Server::READABLE,
        'args'     => array(
            'honks' => array(
                'required'          => false,
                'validate_callback' => 'is_numeric',
            ),
        )
    ) );
}

function tsla_add_horn_honks( WP_REST_Response $request ) {
    $honks = $request['honks'];
    $count = get_option( 'wc-heartbeat-honk', 0 );
    update_option( 'wc-heartbeat-honk', $count + $honks );
    $response = new WP_REST_Response( array( 'result' => true ) );
    $response->header( 'X-Prev-Honks', $count );
    return $response;
}
```

You'll notice that a lot of this looks pretty much the same! We've moved our
validation check out, and renamed a few things, but otherwise our callback is
mostly the same. The route registration has expanded to use the function for
registration instead.
