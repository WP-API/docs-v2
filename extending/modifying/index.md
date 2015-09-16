---
title: Modifying Responses
---
The default endpoints of the WordPress REST API are designed to be sensible defaults in terms of what data is returned. This fits the 80/20 rule by providing for 80% of sites and uses, but these default collections of data cannot always fulfill the needs of every one of the millions of sites.

The REST API is designed to be highly extensible, like the rest (no pun intended) of WordPress. This document details how to add additional data, including but not limited to post or user meta data to the responses of default endpoints, using the function `register_api_field`; a helper function designed to add fields to the response for a specific option.

`register_api_field` provides a single way for modifying all responses for an object. For example, if it is used to add a field to the posts object, this field will be included in all responses, whether they are for single or multiple items.

In addition, it allows you to update that value from the endpoints the field is registered on.

It is important to note that in the context of this document, the term "field" refers to a field in the object returned by the API. It does not refer to a meta field of a post, comment or user. While it `register_api_field` can be used to add meta fields to a response, it can be used to add any data.


Important Note about Changing Responses
---------------------------------------

The API exposes many fields on API responses, including things you might not need, or might not fit into how your site works. While it's tempting to modify or remove fields from responses, this **will** cause problems with API clients that expect standard responses. This includes things like mobile clients, or third party tools to help you manage your site.

You may only need a small amount of data, but it's important to keep in mind that the API is about exposing an interface to all clients, not just the feature you're working on. Changing responses is dangerous.

Adding fields is not dangerous, so if you need to modify data, it's much better to duplicate the field instead with your modified data. Removing fields is never encouraged; if you need to get back a smaller subset of data, work with contexts instead, and consider making your own context.

Note that the API cannot prevent you from changing responses, but the code is structured to strongly discourage this. Internally, field registration is powered by filters, and these can be used if you absolutely have no other choice.


What `register_api_field` Does
------------------------------

In the infrastructure for responses, the global variable $wp_rest_additional_fields, is used for holding the fields, by object name to be added to the responses to those objects. The REST API provides `register_api_field` as a utility function for adding to this global variable. Adding to it directly should be avoided to ensure maximum forward-compatibility.

For each object -- a post type, or users, terms, comments, meta, etc, $wp_rest_additional_fields contains an array of fields, each of which can have a value for callbacks used to retrieve the value, update the value using any endpoint that field is added to that can be used for updating.


How To Use `register_api_field`
-------------------------------

The function `register_api_field` field accepts three parameters:

1. `$object_type`: The name of the object, as a string, or an array of the names of objects the field is being registered to. When adding to posts type endpoints, the name of the post type(s) should be used. Alternatively "terms", "meta", "user" or "comments" may be used.

2. `$attribute`: The name of the field. This name will be used to define the key in the response object.

3. `$args`: An array with keys that define the callback functions used to retrieve the value of the field, to update the value of the field and define its schema. Each of these keys are optional, but if not used, that capability will not be added.

This means that if you specify a callback function for reading the value, but not a callback for updating then it will be readable, but not updatable. This may be desired in many situations.

Fields should be registered at the `rest_api_init` action. Using this action rather than `init` will prevent the field registration from happening during requests to WordPress that do not use the REST API.


Examples
--------

### Show a post meta field in post responses

```php
<?php
add_action( 'rest_api_init', 'slug_register_starship' );
function slug_register_starship() {
    register_api_field( 'post',
        'starship',
        array(
            'get_callback'    => 'slug_get_starship',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Get the value of the "starship" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_starship( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
```

This example illustrates adding the post meta field "starship" to the response for posts. Note that the field name corresponds to the post meta field name to simplify the code. It does not have to.

### Read and write a post meta field in post responses

```php
<?php
/**
 * Add the field "spaceship" to REST API responses for posts read and write
 */
add_action( 'rest_api_init', 'slug_register_spaceship' );
function slug_register_spaceship() {
    register_api_field( 'post',
        'starship',
        array(
            'get_callback'    => 'slug_get_spaceship',
            'update_callback' => 'slug_update_spaceship',
            'schema'          => null,
        )
    );
}
/**
 * Handler for getting custom field data.
 *
 * @since 0.1.0
 *
 * @param array $object The object from the response
 * @param string $field_name Name of field
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_spaceship( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name );
}

/**
 * Handler for updating custom field data.
 *
 * @since 0.1.0
 *
 * @param mixed $value The value of the field
 * @param object $object The object from the response
 * @param string $field_name Name of field
 *
 * @return bool|int
 */
function slug_update_spaceship( $value, $object, $field_name ) {
    if ( ! $value || ! is_string( $value ) ) {
        return;
    }

    return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );

}
```

This example shows how to allow reading and writing of a post meta field. This will allow the spaceship field to be updated via a POST request to `wp-json/wp/v2/posts/<post-id>` or created along with a post via a POST request to ``wp-json/wp/v2/posts/`

### Return an arbitrary function

```php
<?php
/**
 * Use arbitrary functions to add a field
 */
add_action( 'rest_api_init', 'slug_register_something_random' );
function slug_register_starship() {
    register_api_field( 'post',
        'something',
        array(
            'get_callback'    => 'slug_get_something',
            'update_callback' => 'slug_update_something',
            'schema'          => null,
        )
    );
}
```

In the previous examples, helper functions were used to align the arguments passed by the API to `get_post_meta` and `update_post_meta`. In this example, an arbitrary function is called, which presumably accepts arguments in a compatible fashion.
