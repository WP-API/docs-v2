---
title: Internal Reuse
---

If you're writing code to work with the REST API, but still want things handled in PHP, you might notice that you need to duplicate code to handle differences between the API and internal functions. The REST API provides an internal, PHP-based API that you can use to do everything you do through the external, HTTP-based API.

The key function for performing internal requests is [`rest_do_request()`](https://developer.wordpress.org/reference/functions/rest_do_request/). This function takes a [`WP_REST_Request` object](https://developer.wordpress.org/reference/classes/wp_rest_request/) and returns a [`WP_REST_Response` object](https://developer.wordpress.org/reference/classes/wp_rest_response/). You can use these to 

For example, you may have code that renders a post into HTML, and want to use this on the server as well. Let's say your frontend code looks something like this:

```js
$.ajax( '/wp/v2/posts/42', {
	error: function () {
		handleError();
	},
	success: function (data) {
		render( data );
	}
})
```

You could do the same request inside your PHP code with the following:

```php
$request = new WP_REST_Request( 'GET', '/wp/v2/posts/42' );
$response = rest_do_request( $request );
if ( $response->is_error() ) {
	return handleError();
}

$data = $response->get_data();
render( $data );
```
