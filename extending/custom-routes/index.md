---
title: Custom Routes
---

The WP-API is built to support custom routes as first class extentions. All of the _default_ routes in the WP-API are built on the same system that allows you to create your own routes and endpoints.

Depending on the use case, there is typically two paths to take when creating custom routes.

Path one (dubbed **Controller Routes**) are a high level abstraction aimed to provide a typical CRUD interface to a custom object type. For example, a custom object type of "Hotels" may allow API clients to list, add and delete hotels.

Path two (directory using `register_rest_route`) is a lower-level API that allows a lot more flexibility for custom interfaces. A custom action such as a webhook callback may not fit into the typical REST pattern or you may want to create "one off" routes for more bespoke interactions.


### Controller Routes

Creating routes for a custom object type (which could be a custom post type, or entirely different object class) involves creating a subclass of `WP_REST_Controller` (or any of it's subclasses), implementing any methods you want to allow for you objects (such as listing, updating and deleting) and registering the routes on the `api_init` WordPress action.

#### Step 1 - Subclass `WP_REST_Controller`

#### Step 2 - Implement Methods

#### Step 3 - Register Routes

#### Step 4 - Add Hooks


### Use `register_rest_route` Directly