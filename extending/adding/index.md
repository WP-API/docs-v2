---
title: Adding Custom Endpoints
---

The WordPress REST API is more than just a set of default routes. It is also a tool for creating custom routes and endpoints. The WordPress front-end provides a default set of URL mappings, but the tools used to create them (e.g. the Rewrites API, as well as the query classes: `WP_Query`, `WP_User`, etc) are also available for creating your own URL mappings, or custom queries.

This document details how to create a totally custom route, with its own endpoints. It is recommended that you read "Extending Internal Classes" before reading this document. Doing so will familiarize you with the patterns used by the default routes, which is the best practice.

While it is not required that the class you use to process your request extends the `WP_REST_Controller` class or a class that extends it, doing so allows you to inherit work done in those classes. In addition when you do so, you are forced to follow many of the patterns of the core API.


Registering a Route
-------------------

A custom route is created by using the function `register_rest_route()` and then instantiating the class containing it inside of a function hooked to rest_api_init and calling that method.

Each route can have any number of endpoints, and for each endpoint, you can define the HTTP transport methods allowed, a callback function for responding to the request and  a permissions callback for creating custom permissions. In addition you are able to define allowed fields in this request and for each field specify a default value, a sanitization callback, a validation callback, and to specify the field as required.


Namespacing
-----------

Namespaces are the first part of the url for the endpoint, after `wp-json` they should be used as a vendor/package prefix to prevent clashes between custom routes. Namespaces allows for two plugins to add a route of the same name, with different functionality.

The above scenario, two routes with the same name, from two different plugins, requires all vendors to use a unique namespace. Failing to do so is analagous to a failure to use a vendor function prefix, class prefix and/ or class namespace in a theme or plugin, which is very `_doing_it_wrong`.


The Permissions Callback
------------------------

The permissions check callback should return a boolean or a WP_Error. If this function returns true, the response will be procccesed. If it returns false, a default error message will be returned and the request will not proceed with processing. If it returns a `WP_Error`, that error will be returned.

The permissions callback is run after remote authentication, which sets the current user. This means you can use current_user_can to check if the user that has been authenticated has the appropriate capability for the action, or any other check based on current user ID.


Define Transport Method
-----------------------

When defining transport methods, the constants of the WP_REST_Server class should be used. Note that a single transport method, or a list of transport methods can be used here.


Setting Up Fields
-----------------

Fields are defined in an array in the key 'args' of the array passed to the second argument of `register_rest_route()`. Each field should be a multi-demensional array, where the key is the name of the field. That array can contain a key for `default`, `required`, `sanitize_callback` and `validate_callback`.

If the `required` key is defined as true, and no value is passed for that field, an error will be returned. If the field is not required and a default is set, that default will be passed.

The `validate_callback` key is optional. It can be used to pass a function that will be passed the value of the field. That function should return true if the value is valid, and false if not. The `sanitize_callback` key is optional as well. It can be used to pass a function that is used to sanatize the value of the field before passing it to the main callback.

Using `sanitize_callback` and `validate_callback` allows the main callback to act only to process the request, and prepare data to be returned using the `WP_REST_Response` class. By using these two callbacks, you will be able to safely assume your inputs are valid and safe when processing.

All field parameters can be retirved by using the method `get_params` of the `WP_REST_Request` object passed to the callback for the endpoint.


Examples
--------

The following is a "starter" custom route:

```php
<?php

class Slug_Custom_Route extends WP_REST_Controller {

	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		$version = '1';
		$namespace = 'vendor/v' . $version;
		$base = 'route';
		register_rest_route( $namespace, '/' . $base, array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_items' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
			array(
				'methods'         => WP_REST_Server::CREATABLE,
				'callback'        => array( $this, 'create_item' ),
				'permission_callback' => array( $this, 'create_item_permissions_check' ),
				'args'            => $this->get_endpoint_args_for_item_schema( true ),
			),
		) );
		register_rest_route( $namespace, '/' . $base . '/(?P<id>[\d]+)', array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'get_item_permissions_check' ),
				'args'            => array(
					'context'          => array(
						'default'      => 'view',
					),
				),
			),
			array(
				'methods'         => WP_REST_Server::EDITABLE,
				'callback'        => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'update_item_permissions_check' ),
				'args'            => $this->get_endpoint_args_for_item_schema( false ),
			),
			array(
				'methods'  => WP_REST_Server::DELETABLE,
				'callback' => array( $this, 'delete_item' ),
				'permission_callback' => array( $this, 'delete_item_permissions_check' ),
				'args'     => array(
					'force'    => array(
						'default'      => false,
					),
				),
			),
		) );
		register_rest_route( $namespace, '/' . $base . '/schema', array(
			'methods'         => WP_REST_Server::READABLE,
			'callback'        => array( $this, 'get_public_item_schema' ),
		) );
	}

	/**
	 * Get a collection of items
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {
		$items = array(); //do a query, call another class, etc
		$data = array();
		foreach( $items as $item ) {
			$itemdata = $this->prepare_item_for_response( $item, $request );
			$data[] = $this->prepare_response_for_collection( $itemdata );
		}

		return new WP_REST_Response( $data, 200 );
	}

	/**
	 * Get one item from the collection
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_item( $request ) {
		//get parameters from request
		$params = $request->get_params();
		$item = array();//do a query, call another class, etc
		$data = $this->prepare_item_for_response( $item, $request );

		//return a response or error based on some conditional
		if ( 1 == 1 ) {
			return new WP_REST_Response( $data, 200 );
		}else{
			return new WP_Error( 'code', __( 'message', 'text-domain' ) );
		}
	}

	/**
	 * Create one item from the collection
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Request
	 */
	public function create_item( $request ) {

		$item = $this->prepare_item_for_database( $request );

		if ( function_exists( 'slug_some_function_to_create_item')  ) {
			$data = slug_some_function_to_create_item( $item );
			if ( is_array( $data ) ) {
				return new WP_REST_Response( $data, 200 );
			}
		}

		return new WP_Error( 'cant-create', __( 'message', 'text-domain'), array( 'status' => 500 ) );


	}

	/**
	 * Update one item from the collection
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Request
	 */
	public function update_item( $request ) {
		$item = $this->prepare_item_for_database( $request );

		if ( function_exists( 'slug_some_function_to_update_item')  ) {
			$data = slug_some_function_to_update_item( $item );
			if ( is_array( $data ) ) {
				return new WP_REST_Response( $data, 200 );
			}
		}

		return new WP_Error( 'cant-update', __( 'message', 'text-domain'), array( 'status' => 500 ) );

	}

	/**
	 * Delete one item from the collection
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|WP_REST_Request
	 */
	public function delete_item( $request ) {
		$item = $this->prepare_item_for_database( $request );

		if ( function_exists( 'slug_some_function_to_delete_item')  ) {
			$deleted = slug_some_function_to_delete_item( $item );
			if (  $deleted  ) {
				return new WP_REST_Response( true, 200 );
			}
		}

		return new WP_Error( 'cant-delete', __( 'message', 'text-domain'), array( 'status' => 500 ) );
	}

	/**
	 * Check if a given request has access to get items
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function get_items_permissions_check( $request ) {
		//return true; <--use to make readable by all
		return current_user_can( 'edit_something' );
	}

	/**
	 * Check if a given request has access to get a specific item
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function get_item_permissions_check( $request ) {
		return $this->get_items_permissions_check( $request );
	}

	/**
	 * Check if a given request has access to create items
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function create_item_permissions_check( $request ) {
		return current_user_can( 'edit_something' );
	}

	/**
	 * Check if a given request has access to update a specific item
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function update_item_permissions_check( $request ) {
		return $this->create_item_permissions_check( $request );
	}

	/**
	 * Check if a given request has access to delete a specific item
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function delete_item_permissions_check( $request ) {
		return $this->create_item_permissions_check( $request );
	}

	/**
	 * Prepare the item for create or update operation
	 *
	 * @param WP_REST_Request $request Request object
	 * @return WP_Error|object $prepared_item
	 */
	protected function prepare_item_for_database( $request ) {
		return array();
	}

	/**
	 * Prepare the item for the REST response
	 *
	 * @param mixed $item WordPress representation of the item.
	 * @param WP_REST_Request $request Request object.
	 * @return mixed
	 */
	public function prepare_item_for_response( $item, $request ) {
		return array();
	}

	/**
	 * Get the query params for collections
	 *
	 * @return array
	 */
	public function get_collection_params() {
		return array(
			'page'                   => array(
				'description'        => 'Current page of the collection.',
				'type'               => 'integer',
				'default'            => 1,
				'sanitize_callback'  => 'absint',
			),
			'per_page'               => array(
				'description'        => 'Maximum number of items to be returned in result set.',
				'type'               => 'integer',
				'default'            => 10,
				'sanitize_callback'  => 'absint',
			),
			'search'                 => array(
				'description'        => 'Limit results to those matching a string.',
				'type'               => 'string',
				'sanitize_callback'  => 'sanitize_text_field',
			),
		);
	}
}
```
