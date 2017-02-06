---
title: Common Problems
---

<div class="warning">
This documentation has moved to <a href="https://developer.wordpress.org/rest-api/using-the-rest-api/frequently-asked-questions/">The WordPress REST API Handbook</a>. The below may be out of date.
</div>

We try and make the REST API as easy as possible, but APIs are hard. Here's a collection of common issues we run into.

* TOC
{:toc}


Query Parameters are ignored
----------------------------

If you find that you cannot use `?filter[]=`, `?page=` or any other query parameters, your server may not be properly configured to detect them. If you are using Nginx to serve your website, look for a `try_files` line in your site configuration. If it looks like this:

```
try_files $uri $uri/ /index.php$args;
```

change it to this:

```
try_files $uri $uri/ /index.php$is_args$args;
```

Adding `$is_args` (which will print a `?` character if query arguments are found) will allow WordPress to properly receive and interpret the query parameters.

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
