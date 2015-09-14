---
title: What Is A REST API?
---
The addition of a REST API to WordPress opens up exciting new possibilities for WordPress developers. For many of us, it may be our first time using a REST API, or really considering what a REST API is, even if we have used one. This document is designed to be a "mildly technical" to what a REST API is, in general and in the context of WordPress. It is not an exaustive guide to what a REST API is or the WordPress REST API. The goal of this document is to provide background for those exploring REST APIs for the first time, by familiarizing themeselves with the WordPress REST API.

In the simplest terms, REST APIs use JSON to exchange information, using HTTP transfers. For example, when you create a tweet from a thrid-party application, that is accomplished by making an HTTP request to Twitter's REST API. The WordPress REST API provides a way to handle CRUD (create/read/update/delete) operations for WordPress posts (includig posts, pages, media and custom post types,) taxonomy terms, users and comments.

Important Technologies
----------------------
### JSON
RESTful APIs use JavaScript Object Notation (JSON) to represent data in a structured manner. JSON, which is the notation used in JavaScript to write an object, has very limited meta information -- commas, quotes, brackets and curly brackets. This makes JSON strings smaller and easier to parse by other languages then other exchange formats, such as XML. It is on the otherhand signifigantly less human-readbale than XML.

Most programming languages provide functions for translating arrays or objects to JSON, and JSON to an array or an object. In PHP, `json_decode()` and `json_encode()` are provided for this task. WordPress provides `wp_json_encode()` to ensure that the text encoding is correct when creating JSON strings.

### HTTP Verbs
We are all familar with the process of loading a website via a browser. When we do so, our web browser makes a GET request for an HTML document. Based on the content of that document, additional GET requests, are made to load CSS, JavaScript, images and other resources. When we submit a form, that request is, in general a POST request.

GET and POST are two of the HTTP "verbs" that clients can use. GET requests retrive data from a server. POST requests send new data to a server. REST APIs make use of these two transfer methods regurally, along with PUT, to create new data and DELETE to remove data.

In the context of the WordPress REST API, we make a GET request to list posts, a POST request to update posts, a PUT request to create a post, and a DELETE request to remove a post.

### Clients


Principles
---------
### Discoverable

### Stateless

### Descriptive

Further Reading
--------------
* http://roy.gbiv.com/untangled/2008/rest-apis-must-be-hypertext-driven

