---
page: introduction
title: WP REST API version 2.0 Introduction
include_title: No
---

<div class="hero">

	<img src="{{ site.baseurl }}assets/images/banner.jpg" class="banner" />

	<p class="subtitle">Access your WordPress site's data through an easy-to-use HTTP REST API.</p>

	<a href="https://developer.wordpress.org/rest-api" class="download button">
		Read the REST API Developer Handbook
	</a>

	<p class="status">
		The REST API is <a href="https://wordpress.org/news/2016/12/vaughan/">included in WordPress 4.7!</a> Plugins are no longer required, just install the latest version of WordPress and you're ready to go.
	</p>

	<a href="https://wordpress.org/plugins/rest-api/" class="download button radius">
		<span>Download the legacy v2.0 plugin Beta 15 (for WordPress 4.4 and later)</span>
	</a>

	<p class="status">
		<a href="https://github.com/WP-API/WP-API">View the v2.0 beta plugin on GitHub</a><br />
	</p>

	<p class="status">
		<em>Using Version 1 of the API?</em>
		<a href="http://wp-api.org/index-deprecated.html">
			View the legacy documentation
		</a>
	</p>

</div>

About the WordPress REST API
----------------------------

WordPress is moving towards becoming a fully-fledged application framework, and we needed new APIs. This project was born to create an easy-to-use, easy-to-understand and well-tested framework for creating these APIs, plus creating APIs for core.

The WordPress REST API provides an easy-to-use set of HTTP endpoints that let you access your site's data in simple JSON format, including users, posts, taxonomies and more. Retrieving or updating data is as simple as sending a HTTP request.

Want to get your site's posts? Simply send a `GET` request to `/wp-json/wp/v2/posts`. Update user with ID 4? Send a `POST` request to `/wp-json/wp/v2/users/4`. Get all posts with the search term "awesome"? `GET /wp-json/wp/v2/posts?search=awesome`. It's that easy.

The API exposes a simple yet powerful interface to WP Query, the posts API, post meta API, users API, revisions API and many more. Chances are, if you can do it with WordPress, WP API will let you do it.
