---
title: Extending Internal Classes
canonical_url: https://developer.wordpress.org/rest-api/extending-the-rest-api/controller-classes/
redirect_to:
  - https://developer.wordpress.org/rest-api/extending-the-rest-api/controller-classes/
---

WP-API has a deliberate design pattern for its internal classes. They can be
categorized as either _infrastructure_ or _endpoints_.

Infrastructure classes support the endpoint classes. They handle the logic for
WP-API without performing any data transformation. Endpoint classes, on the
other hand, encapsulate the functional logic necessary to perform CRUD
operations on WordPress resources. More specifically, our infrastructure
classes include `WP_REST_Server` and `WP_REST_Request`, where our endpoint
classes include `WP_REST_Posts_Controller` and `WP_REST_Users_Controller`.

Let's dive into what each infrastructure class does:

* `WP_REST_Server`: The main controller for WP-API. Routes are registered to
  the server within WordPress. When `WP_REST_Server` is called upon to serve
  a request, it determines which route is to be called, and passes the route
  callback a `WP_REST_Request` object. `WP_REST_Server` also handles
  authentication, and can perform request validation and permissions checks.

* `WP_REST_Request`: An object to represent the nature of the request. This
  object includes request details like request headers, parameters, and
  method, as well as the route. It can also perform request validation and
  sanitization.

* `WP_REST_Response`: An object to represent the nature of the response. This
  class extends `WP_HTTP_Response`, which includes headers, body, and status,
  and provides helper methods like `add_link()` for adding linked media, and
  `query_navigation_headers()` for getting query navigtion headers.

All endpoint classes extend `WP_REST_Controller`. This class is designed to
represent a consistent pattern for manipulating WordPress resources.
`WP_REST_Controller` implements these methods:

* `register_routes()`: After instantiating the class for the first time, call
  `register_routes()` to register the resource's routes to the server.

* `get_items()`: Get a collection of existing entities.

* `get_item()`: Get an existing entity. If the entity doesn't exist, HTTP
  error code 404 should be returned. If the requester doesn't have permission
  to access the entity, a HTTP error code 403 should be returned.

* `create_item()`: Create a new entity, given a valid `WP_REST_Request`. If
  creation is successful, a `WP_REST_Response` should be returned with HTTP
  `status=201` and `location` header to the new resource. If creation is
  errored in some form, the appropriate HTTP error code and message should be
  returned.

* `update_item()`: Update an existing entity, given a valid `WP_REST_Request`.

* `delete_item()`: Delete an existing entity, given a valid `WP_REST_Request`.
  If deletion is errored in some way, the appropriate HTTP error code should
  be returned.

* `get_items_permissions_check()`: Before calling the callback, check whether
  a given request has permissions to a collection of a resource.

* `get_item_permissions_check()`: Before calling the callback, check whether a
  given request has permissions to get an individual resource.

* `create_item_permissions_check()`: Before calling the callback, check
  whether a given request has permissions to create an individual resource.

* `update_item_permissions_check()`: Before calling the callback, check
  whether a given request has permissions to update an individual resource.

* `delete_item_permissions_check()`: Before calling the callback, check
  whether a given request has permissions to delete an individual resource.

* `prepare_item_for_response()`: TK

* `prepare_response_for_collection()`: TK

* `filter_response_by_context()`: TK

* `get_item_schema()`: Get the resource's schema, conforming to JSON Schema.

When interacting with an endpoint that implements `WP_REST_Controller`, a HTTP
client can expect each endpoint to behave in a similar way.
