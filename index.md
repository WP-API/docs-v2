---
page: introduction
title: WP REST API version 2.0 Introduction
include_title: No
---

<div class="hero">

	<img src="{{ site.baseurl }}assets/images/banner.jpg" class="banner" />

	<p class="subtitle">Access your WordPress site's data through an easy-to-use HTTP REST API.</p>

	<a href="https://wordpress.org/plugins/rest-api/" class="download button radius">
		Download the Plugin
		<span>(Version 2.0 beta 11, for WordPress 4.4.1+)</span>
	</a>

	<p class="status">
		<a href="https://github.com/WP-API/WP-API">View on GitHub</a><br />
		<a href="https://travis-ci.org/WP-API/WP-API">
			<img alt="Build Status" src="https://travis-ci.org/WP-API/WP-API.svg?branch=develop" />
		</a>
	</p>

</div>

About
-----

WordPress is moving towards becoming a fully-fledged application framework, and we need new APIs. This project was born to create an easy-to-use, easy-to-understand and well-tested framework for creating these APIs, plus creating APIs for core.

This plugin provides an easy to use REST API, available via HTTP. Grab your site's data in simple JSON format, including users, posts, taxonomies and more. Retrieving or updating data is as simple as sending a HTTP request.

Want to get your site's posts? Simply send a `GET` request to `/wp-json/wp/v2/posts`. Update user with ID 4? Send a `POST` request to `/wp-json/wp/v2/users/4`. Get all posts with the search term "awesome"? `GET /wp-json/wp/v2/posts?search=awesome`. It's that easy.

The API exposes a simple yet easy interface to WP Query, the posts API, post meta API, users API, revisions API and many more. Chances are, if you can do it with WordPress, WP API will let you do it.
