---
title: Compatible Plugins & Tools
---
The following is a list of plugins that utilize and are compatible with the WordPress REST API v2.
Some plugins may be more intended for development purposes and others for production environments. Code quality is also highly variant.
While [WordPress REST API v2](https://wordpress.org/plugins/rest-api/) is still in plugin form, most of these plugins use it as a dependency,
as opposed to the core infrastructure introduced in WordPress 4.4, so make sure you have it installed and activated.

_The list may not represent every plugin and extension for the WP REST API v2
if you would like something to be added [please notify us](https://github.com/WP-API/docs-v2/issues/).
If you see a plugin you have authored here and we are not representing it correctly or would like it removed, feel free to make a GitHub issue as well._

**Disclaimer:** _Plugins and extensions found on this page are not condoned or endorsed by the WP REST API team._ This is a list for you to explore!

Compatible Plugins on the WordPress.org Plugin Repository.
--------------------------------------
NOTE: If you know of a plugin in the WordPress.org Plugin Repository not seen on this list which utilizes the WP REST API v2,
please [contact the docs team](https://github.com/WP-API/docs-v2/issues/) and open an issue.

| Name/Link | Description |
| --- | --- |
| [ACF to REST API](https://wordpress.org/plugins/acf-to-rest-api/) | Exposes Advanced Custom Fields Endpoints in the WP REST API v2 |
| [ACF to WP API](https://wordpress.org/plugins/acf-to-wp-api/) | Version 1.3.0 and higher put ACF data into endpoints for the WP REST API v2. |
| [BE REST Endpoints](https://wordpress.org/plugins/be-rest-endpoints/) | Custom endpoints for WP REST API v2. Currently adds sidebars and widgets endpoints. For monkeying around! |
| [Custom Contact Forms](https://wordpress.org/plugins/custom-contact-forms) | Build beautiful custom forms and manage submissions the WordPress way. View live previews of your forms while you build them. |
| [Dashboard Directory Size](https://wordpress.org/plugins/dashboard-directory-size/) | A dashboard widget that displays a list of common WordPress directories and their sizes. Handy if you need to keep an eye on the size of your WordPress install. Custom directories can also be configured. |
| [Easy Student Results](https://wordpress.org/plugins/easy-student-results/) | Result Management System for School, College and University. Used to display and manage education related data. |
| [Invitations for Slack](https://wordpress.org/plugins/invitations-for-slack/) | Build a Slack community by allowing your visitors (or registered users) to invite themselves to your Slack team. |
| [JSON REST API Subscriptions](https://wordpress.org/plugins/json-rest-api-subscriptions/) | Enable subscriptions to posts, pages, and custom post types. Users can securely subscribe via simple API routes to created/updated/deleted content. |
| [JWT Auth for WP REST API](https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/) | Extends the WP REST API using JSON Web Tokens Authentication as an authentication method. |
| [Prayers](https://wordpress.org/plugins/prayers/) | Lets an organization share, update, and manage prayer requests via their website w/ WP REST API v2 support |
| [REST API Console](https://wordpress.org/plugins/rest-api-console/) | A console for your site's REST API that lives in your WordPress admin. |
| [REST API Post Embeds](https://wordpress.org/plugins/rest-api-post-embeds/) | Embed posts from your site or others' into your posts and pages. |
| [REST Routes](https://wordpress.org/plugins/rest-routes/) | Build endpoints from inside of the wp-admin. |
| [Rest API Widgets](https://wordpress.org/plugins/rest-api-widgets/) | Use a few different widgets through the REST API |
| [SearchWP API](https://wordpress.org/plugins/searchwp-api/) | Run advanced searches via the WordPress REST API and SearchWP. |
| [Maps by Store Locator Plus](https://wordpress.org/plugins/store-locator-le/) | Add a location finder or directory to your site in minutes. |
| [Tabulate](https://wordpress.org/plugins/tabulate/) | Manage relational tabular data within the WP admin area, using the full power of your MySQL database. |
| [WP API Categories and Tags](https://wordpress.org/plugins/wp-api-categoriestags/) | This plugin allows users to post, submit, and view tags and categories in the WordPress REST API (v2) |
| [WP API Menus](https://wordpress.org/plugins/wp-api-menus/) | Extends WordPress WP REST API with new routes pointing to WordPress menus. |
| [WP API Shortcodes](https://wordpress.org/plugins/wpapi-shortcode-and-widgets/) | Simple Shortcode Plugin to get WordPress data from WP REST API |
| [WP REST API Log](https://wordpress.org/plugins/wp-rest-api-log/) | WordPress plugin to log WP REST API requests and responses |
| [WP REST API Sidebars](https://wordpress.org/plugins/wp-rest-api-sidebars/) | An extension for the WP REST API that exposes endpoints for sidebars and widgets. |
| [WP REST API Extensions](https://wordpress.org/plugins/wprestapiextensions/) | Extends the WP-REST API with custom read only endpoints. |

Other Compatible Plugins.
------------------
__If you would like a plugin added that is not on the WordPress.org Plugin Repository, then [contact the docs team](https://github.com/WP-API/docs-v2/issues/) and open an issue.__

**Note:** _Some of these are in early stages of development and do not actually provide any of the functionality they are supposed to (i.e. A lot of the endpoint related ones).
Get involved if you would like to see more progress on these endpoints!!!_

| Name/Link | Description |
| --- | --- |
| [Basic Auth](https://github.com/WP-API/Basic-Auth) | Adds Basic Authentication to a WordPress site; should only be used for development and testing. |
| [WP API Menus and Widgets Endpoints](https://github.com/WP-API/wp-api-menus-widgets-endpoints) | WP REST API menus and widgets endpoints. |
| [WP API Meta Endpoints](https://github.com/WP-API/wp-api-meta-endpoints) | WP REST API post meta endpoints. |
| [WP API Oauth1.0a](https://github.com/WP-API/OAuth1) | Connect applications to your WordPress site without ever giving away your password. |
| [WP API Plugins and Themes Endpoints](https://github.com/WP-API/wp-api-plugins-themes-endpoints) | Add plugins and themes endpoints to the WP REST API. |
| [WP API Site Endpoints](https://github.com/WP-API/wp-api-site-endpoints) | Add site endpoints to the WP REST API for multisite installs. |

Other Tools & Extensions that are **NOT** WordPress Plugins.
==================

Tools
----------------
| Name/Link | Description |
| --- | --- |
| [JP REST API CACHE](https://github.com/Shelob9/jp-rest-cache) | Composer Library for soft-expiring, server-side cache for the WordPress REST API (WP REST). |
| [RESTful WP-CLI](http://wp-cli.org/restful/) | A command line interface aiming to be the fastest interface for developers to manage WordPress. |

Client Libraries
----------------

Client libraries serve as a resource to easily access and utilize the WP REST API.

* [Backbone.js client][]
* [Node.js client][]
* [Golang client][]

[Backbone.js client]: https://github.com/WP-API/client-js
[Node.js client]: https://github.com/kadamwhite/wordpress-rest-api
[Golang client]: https://github.com/sogko/go-wordpress
