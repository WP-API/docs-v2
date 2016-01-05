---
title: JavaScript Client
---
The REST API includes a JavaScript/Backbone client library.

The library provides an interface for the WP REST API by providing Backbone Models and Collections for all endpoints exposed the API Schema.

## Using

Activate the WP-API plugin. Enqueue the script directly:

```php
wp_enqueue_script( 'wp-api' );
```

or as a dependency for your script:

```php
wp_enqueue_script( 'my_script', 'path_to_my_script', array( 'wp-api' ) );
```

The library parses the root endpoint (the 'Schema') and creates matching Backbone models and collections. You will now have two root objects available to you: `wp.api.models` and `wp-api.collections`.

These objects contain the following:

```
Models:
 * Categories
 * Comments
 * Media
 * Pages
 * PagesMeta
 * PagesRevisions
 * Posts
 * PostsCategories
 * PostsMeta
 * PostsRevisions
 * PostsTags
 * Schema
 * Statuses
 * Tags
 * Taxonomies
 * Types
 * Users

Collections:
 * Categories
 * Comments
 * Customposttype
 * Media
 * Meta
 * Pages
 * Posts
 * Revisions
 * Statuses
 * Tags
 * Taxonomies
 * Types
 * Users
```

You can use these endpoints as is to read, update, create and delete items using standard Backbone methods (fetch, sync, save & destroy for models, sync for collections). You can also extend these objects to make them your own, and build your views on top of them.

### Default values

Each model and collection includes a reference to its default values, for example:

```
wp.api.models.Posts.defaults
 * author: null
 * comment_status: null
 * content: null
 * date: null
 * date_gmt: null
 * excerpt: null
 * featured_image: null
 * format: null
 * modified: null
 * modified_gmt: null
 * password: null
 * ping_status: null
 * slug: null
 * status: null
 * sticky: null
 * title: null
```

### Available methods

Each model and collection contains a list of methods the corrosponding endpoint supports. For example, models created from `wp.api.models.Posts` have a method array of:

```
["GET", "POST", "PUT", "PATCH", "DELETE"]
```

### Accepted options

Each model and collection contains a list of options the corrosponding endpoint accepts (passed as a second parameter), for example:

```
wp.api.collections.Posts.options
 * author
 * context
 * filter
 * order
 * orderby
 * page
 * per_page
 * search
 * status
```
### Model example:

To create a post, make sure you are logged in, then:

```
var post = new wp.api.models.Posts( { title: 'This is a test post' } );
post.save();
```

### Collection examples:

to get the last 10 posts:

```
var postsCollection = new wp.api.collections.Posts();
postsCollection.fetch();
```

to get the last 25 posts:

```
postsCollection.fetch( { data: { per_page: 25 } } );
```

use filter to change the order & orderby options:

```
postsCollection.fetch( { data: { 'filter': { 'oderby': 'title', 'order': 'ASC' } } } );
```

All collections support pagination automatically, and you can get the next page of results using `more`:

```
postsCollection.more();
```

If you add custom endpoints to the api they will also become available as models/collections. For example, you will get new models and collections when you [add REST API support to your custom post type](http://v2.wp-api.org/extending/custom-content-types/). Note that you may need to open a new tab to get a new read of the Schema.

