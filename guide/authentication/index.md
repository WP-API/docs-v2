---
title: Authentication
---

There are several options for authenticating with the API. The basic choice boils
down to:

* Are you a plugin/theme running on the site? Use **cookie authentication**
* Are you a desktop/web/mobile client accessing the site externally? Use
  **OAuth authentication**, **application passwords**, or **basic authentication**.


Cookie Authentication
---------------------
Cookie authentication is the basic authentication method included with
WordPress. When you log in to your dashboard, this sets up the cookies correctly
for you, so plugin and theme developers need only to have a logged-in user.

However, the REST API includes a technique called [nonces][] to avoid [CSRF][] issues.
This prevents other sites from forcing you to perform actions without explicitly
intending to do so. This requires slightly special handling for the API.

For developers using the built-in Javascript API, this is handled automatically
for you. This is the recommended way to use the API for plugins and themes.
Custom data models can extend `wp.api.models.Base` to ensure this is sent
correctly for any custom requests.


For developers making manual Ajax requests, the nonce will need to be passed
with each request. The API uses nonces with the action set to `wp_rest`. These
can then be passed to the API via the `_wpnonce` data parameter (either POST
data or in the query for GET requests), or via the `X-WP-Nonce` header.

Note: Until recently, most software had spotty support for `DELETE` requests. For
instance, PHP doesn't transform the request body of a `DELETE` request into a super
global. As such, supplying the nonce as a header is the most reliable approach.

It is important to keep in mind that this authentication method relies on WordPress
cookies. As a result this method is only applicable when the REST API is used inside
of WordPress and the current user is logged in. In addition, the current user must
have the appropriate capability to perform the action being performed.

As an example, this is how the built-in Javascript client creates the nonce:

```php
<?php
wp_localize_script( 'wp-api', 'WP_API_Settings', array( 'root' => esc_url_raw( rest_url() ), 'nonce' => wp_create_nonce( 'wp_rest' ) ) );
```

This is then used in the base model:

```javascript
options.beforeSend = function(xhr) {
	xhr.setRequestHeader('X-WP-Nonce', WP_API_Settings.nonce);

	if (beforeSend) {
		return beforeSend.apply(this, arguments);
	}
};
```

Here is an example of editing the title of a post, using jQuery AJAX:

```javascript
$.ajax( {
    url: WP_API_Settings.root + 'wp/v2/posts/1',
    method: 'POST',
    beforeSend: function ( xhr ) {
        xhr.setRequestHeader( 'X-WP-Nonce', WP_API_Settings.nonce );
    },
    data:{
        'title' : 'Hello Moon'
    }
} ).done( function ( response ) {
    console.log( response );
} );
```

[nonces]: http://codex.wordpress.org/WordPress_Nonces
[CSRF]: http://en.wikipedia.org/wiki/Cross-site_request_forgery


OAuth Authentication
--------------------
OAuth authentication is the main authentication handler used for external
clients. With OAuth authentication, users still only ever log in via the normal
WP login form, and then authorize clients to act on their behalf. Clients are
then issued with OAuth tokens that enable them to access the API. This access
can be revoked by users at any point.

OAuth authentication uses the [OAuth 1.0a specification][oauth] (published as
RFC5849) and requires installing the [OAuth plugin][oauth-plugin] on the site.

Once you have WP API and the OAuth server plugins activated on your server,
you'll need to create a "consumer". This is an identifier for the application,
and includes a "key" and "secret", both needed to link to your site.

To create the consumer, run the following on your server:

```bash
$ wp oauth1 add

ID: 4
Key: sDc51JgH2mFu
Secret: LnUdIsyhPFnURkatekRIAUfYV7nmP4iF3AVxkS5PRHPXxgOW
```

This key and secret is your consumer key and secret, and needs to be used
throughout the authorization process. Currently no UI exists to manage this,
however this is planned for a future release.

For examples on how to use this, both the [CLI client][client-cli] and the
[API console][api-console] make use of the OAuth functionality, and are a great
starting point.

[oauth]: http://tools.ietf.org/html/rfc5849
[oauth-plugin]: https://github.com/WP-API/OAuth1
[client-cli]: https://github.com/WP-API/client-cli
[api-console]: https://github.com/WP-API/api-console

Application Passwords or Basic Authentication
---------------------------------------------
Basic authentication is an optional authentication handler for external clients.
Due to the complexity of OAuth authentication, basic authentication can be
useful during development. However, Basic authentication requires passing your
username and password on every request, as well as giving your credentials to
clients, so it is heavily discouraged for production use.

Application passwords are used similarly, however instead of providing your normal
account password, unique and easily revokable passwords are generated from your
edit profile screen in the WordPress admin.  These application passwords are valid
exclusively for the REST API and the legacy XML-RPC API and may not be used to log
in to WordPress.

Both basic authentication and application passwords use [HTTP Basic Authentication][http-basic]
(published as RFC2617) and requires installing either the [Basic Auth plugin][basic-auth-plugin] or
[Application Passwords plugin][application-passwords] respectively.

To use Basic authentication, simply pass the username and password with each
request through the `Authorization` header. This value should be encoded (using
base64 encoding) as per the HTTP Basic specification.

This is an example of how to update a post, using these authentications, via the
WordPress HTTP API:

```php
$headers = array (
	'Authorization' => 'Basic ' . base64_encode( 'admin' . ':' . '12345' ),
);
$url = rest_url( 'wp/v2/posts/1' );

$body = array(
	'title' => 'Hello Gaia' 
);

$response = wp_remote_post( $url, array (
    'method'  => 'POST',
    'headers' => $headers,
    'body'    =>  $data
) );
```
    

[http-basic]: https://tools.ietf.org/html/rfc2617
[basic-auth-plugin]: https://github.com/WP-API/Basic-Auth
[application-passwords]: https://github.com/georgestephanis/application-passwords