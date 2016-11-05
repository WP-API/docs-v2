---
title: Best Practices
---

## Display Formatting

WordPress includes a number of formatting utilities along with configuration, which aren't available via the API directly. While WordPress has traditionally being a large monolithic program, the API separates concerns into either backend or frontend, with the API handling backend interactions while your app handles the frontend display. This means that you need to handle formatting output yourself.

### Date & Time Formatting

Date & time formatting is not handled in the API. All API datetimes are provided in ISO 8601 (RFC 3339, `date('r')`) format; that is: `YYYY-MM-DDThh:mm:ssZ`. This datetime then needs to be formatted as appropriate for display to users.

If you want to follow the site date/time formatting settings in JavaScript, you need to pass the `date_format` and `time_format` settings to your script, then translate these into their equivalents for the relevant library you're using. These options can be passed via `wp_localize_script`:

```php
wp_enqueue_script( 'my-plugin-script', plugins_url( 'my-script', __FILE__ ), array( 'wp-api' ) );
wp_localize_script( 'my-plugin-script', 'MyPluginScriptVars', array(
	'date_format' => get_option( 'date_format' ),
	'time_format' => get_option( 'time_format' ),

	// You may also need the timezone:
	'timezone' => get_option( 'timezone_string' ),

	// If you are displaying a calendar, you may need the "Week Starts On" setting:
	'start_of_week' => get_option( 'start_of_week' ),
));
```

Note that unlike PHP, JavaScript doesn't include date formatting utilities, so a library is required. There are a number of libraries that can take PHP formats directly:

* [php-date-formatter](https://github.com/kartik-v/php-date-formatter)
* [Locutus](http://locutus.io/php/datetime/date/) (previously php.js)

There are also libraries which can format dates, but take other formats, so will need a translation layer:

* [Moment.js](http://momentjs.com/)
* [dateformat](https://github.com/felixge/node-dateformat)


### Localization

Similar to date and time formatting, localization and translation are considered a frontend concern. If you have user-facing text, you may need to translate this yourself. You can use `wp_localize_script` to handle this, which allows passing translations to your plugin:

```php
wp_localize_script( 'my-plugin-script', 'MyPluginScriptTranslations', array(
	'name' => __( 'My Plugin', 'my-plugin' ),
	'select_post' => __( 'Select a post...', 'my-plugin' ),
));
```

You can then pull these out into your display code through `MyPluginScriptTranslations.select_post`. This also allows you to use the relevant text domain for your plugin, rather than WordPress core's text domain, ensuring your plugin consistently displays text in a single language.

Some translations are available in the API's schema. This typically applies to field descriptions, which are included in the API, are human-readable, and fully translated by the API. These descriptions are intended mainly for developers, so may not always be suitable for users.


## Backwards Compatibility

Filters.


## Server-Side Rendering

For performance, accessibility, or caching purposes, you might want to render your code on the server-side as well as on the frontend.
