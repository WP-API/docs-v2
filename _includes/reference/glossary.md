## Glossary

New to REST APIs? Get up to speed with phrases used throughout our documentation.

### Controller

[Model-View-Controller](http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) is a standard pattern in software development. If you aren't already familiar it, you should do a bit of reading to get up to speed.

Within WP-API, we've adopted the controller concept to have a standard pattern for the classes representing our resource endpoints. All resource endpoints extend `WP_JSON_Controller` to ensure they implement common methods.

### HEAD, GET, POST, PUT, and DELETE Requests

These "HTTP verbs" represent the _type_ of action a HTTP client might perform against a resource. For instance, `GET` requests are used to fetch a Post's data, whereas `DELETE` requests are used to delete a Post. They're collectively called "HTTP verbs" because they're standardized across the web.

If you're familiar with WordPress functions, a `GET` request is the equivalent of `wp_remote_get()`, and a `POST` request is the same as `wp_remote_post()`.

### HTTP Client

The phrase "HTTP Client" refers to the tool you use to interact with WP-API. You might use [Postman](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm?hl=en) to test requests in your browser, or [httpie](https://github.com/jakubroztocil/httpie) to test requests at the commandline. WordPress itself represents a HTTP Client in that you can use the `WP_HTTP` class of functions (e.g. `wp_remote_get()`) to make HTTP requests.

### Resource

A "Resource" is a _discrete entity_ within WordPress. You may know these resources already as Posts, Pages, Comments, Users, Terms, Plugins, and so on. WP-API permits HTTP clients to perform CRUD operations against resources (CRUD stands for Create, Read, Update, and Delete).

Pragmatically, here's how you'd typically interact with WP-API resources:

* `GET /wp-json/wp/v2/posts` to get a collection of Posts. This is roughly equivalent to using `WP_Query`.
* `GET /wp-json/wp/v2/posts/123` to get a single Post with ID 123. This is roughly equivalent to using `get_post()`.
* `POST /wp-json/wp/v2/posts` to create a new Post. This is roughly equivalent to using `wp_insert_post()`.
* `DELETE /wp-json/wp/v2/posts/123` to delete Post with ID 123. This is roughly equivalent to `wp_delete_post()`.

### Routes / Endpoints

"Routes" and "Endpoints" are synonymous. These words essentially mean everything after the domain in a URL. For instance, with the URL `http://wordpress-develop.dev/wp-json/wp/v2/posts/123`, the route is `wp/v2/posts/123`. The route doesn't include `wp-json` because `wp-json` is the base path for our API. All other URLs are handled by WordPress' default request handling.

### Schema

A "schema" is a representation of the format for WP-API's response data. For instance, the Post schema communicates that a request to get a Post will return `id`, `title`, `content`, `author`, and other fields. Our schemas also indicate the type each field is, provide a human-readable description, and show which contexts the field will be returned in.
