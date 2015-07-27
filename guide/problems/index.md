---
title: Common Problems
---
We try and make the REST API as easy as possible, but APIs are hard. Here's a collection of common issues we run into.


Authentication Errors with `/users/me`
--------------------------------------
The current user endpoint redirects to `/users/{id}` with the current user's information, using a 302 status with a Location header.

One particularly prevelant place this occurs is in browser requests. Browsers automatically follow HTTP requests when using XMLHttpRequest, and you cannot disable this behaviour.

The reason why this happens is different for each authentication type:

* **OAuth 1** requires each request to be signed, and the signature is unique to the request being sent. A redirect can cause the same authentication headers to be sent, but with different request data, causing the signature to fail.
* **Cookie authentication** sends a nonce with the request. When sending this in the URL, this data won't be passed along to the redirected URL.

Although the redirection can be annoying, it's intended behaviour. The Location header indicates that the current route (`/users/me`) is not the canonical source for the data, just a pointer to it.

To work around the problems with untrustworthy clients like browsers, the API provides the ability to "envelope" a request. This takes the normal status code and headers, and moves the data into the response body instead. This will cause the API to also return a status code of 200, and no extra headers.

For example, with a response that looks like this:

```
HTTP/1.1 302 Found
Location: http://example.com/wp-json/wp/v2/users/42

{
	"id": 42,
	...
}
```

To trigger enveloping, we can append a `_envelope` parameter to the request URL (i.e. `/users/me?_envelope`). Enveloping would change this to the following response instead:

```
HTTP/1.1 200 OK

{
	"status": 200,
	"headers": {
		"Location": "http://example.com/wp-json/wp/v2/users/42",
	},
	"body": {
		"id": 42,
		...
	}
}
```


Meta Accessibility
------------------

If you try and access post meta via the API, you may run into problems accessing it. This is because we have some semi-complicated rules around how you can access meta. Here's the run down.

(Note: we're [considering changing how this works](https://github.com/WP-API/WP-API/issues/1425). Let us know if you have an opinion on this!)

### Serialized Meta

Any form of serialized data is not allowed through the API. This includes reading meta which has stored serislized data, creating or updating meta with serialized data, or even updating meta which currently has a serialized value.

There are a few reasons for this:

1. **JSON is lossy** - JSON cannot hold all formats of data that can be safely stored by PHP. In particular, custom objects cannot be represented, and there is no difference between an associative array and an object.
2. **Serialized data can expose private data** - Serialized data includes protected and private properties of objects, which may be unsafe to expose over an API. It can also expose internal class structure and parts of private codebases that may need to remain private.
3. **Serialized data has security problems** - Allowing serialized data allows input of any custom object, which causes the object to be created on the server. This is essentially a Remote Code Execution vulnerability, one of the worst classes of security bug.

For these reasons, serialized data is not allowed in any form.

### Protected Meta

Protected meta is any meta item where the key begins with an `_` character, or has been otherwise marked as protected (i.e. via a filter). These meta fields are typically intended for internal use only, and hence, cannot be exposed via the API automatically.

### Other Meta

For meta that does not fit one of the above criteria, the data is available via the API. However, this data is only available when authenticated with permission to edit the post that the meta is attached to.

This may seem counterintuitive (since we've already eliminated "private" meta), but the main reason for this is because the WordPress admin has the Custom Fields metabox. This allows anyone to add custom meta to the post without registering it, and is often used by power users for internal notes as part of their editing process. Being essentially a freeform text field, this would breach user privacy to expose.

For these reasons, meta is locked down tight currently. We are however [considering changing this](https://github.com/WP-API/WP-API/issues/1425) to make it easier for plugins and themes to work with, so this may change in the future.
