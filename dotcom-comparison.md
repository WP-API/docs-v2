---
title: WordPress.com Comparison
layout: empty
---
# Compared to WordPress.com

## Structure

<table style="width: 100%">
	<thead>
		<tr>
			<th></th>
			<th>WP.com</th>
			<th>WP REST API</th>
		</tr>
	</thead>
	<tr>
		<th colspan="3"><h3>Posts</h3></th>
	</tr>
	<tr>
		<th scope="row">List recent posts</th>
		<td markdown="span">`GET /sites/{site}/posts`</td>
		<td markdown="span">`GET /wp/v2/posts`</td>
	</tr>
	<tr>
		<th scope="row">Get single post</th>
		<td markdown="span">`GET /sites/{site}/posts/{id}`</td>
		<td markdown="span">`GET /wp/v2/posts/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Edit a post</th>
		<td markdown="span">`POST /sites/{site}/posts/{id}`</td>
		<td markdown="span">`PUT /wp/v2/posts/{id}` (POST accepted for compatibility)</td>
	</tr>
	<tr>
		<th scope="row">Get post by slug</th>
		<td markdown="span">`GET /sites/{site}/posts/slug:{slug}`</td>
		<td markdown="span">`GET /wp/v2/posts?slug={slug}`</td>
	</tr>
	<tr>
		<th scope="row">Create a post</th>
		<td markdown="span">`POST /sites/{site}/posts/new`</td>
		<td markdown="span">`POST /wp/v2/posts`</td>
	</tr>
	<tr>
		<th scope="row">Trash a post</th>
		<td markdown="span">`POST /sites/{site}/posts/{id}/delete`</td>
		<td markdown="span">`DELETE /wp/v2/posts/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Permanently delete a post</th>
		<td markdown="span">`POST /sites/{site}/posts/{id}/delete` twice</td>
		<td markdown="span">`DELETE /wp/v2/posts/{id}?force=true`</td>
	</tr>

	<tr>
		<th colspan="3"><h3>Comments</h3></th>
	</tr>
	<tr>
		<th scope="row">List recent comments</th>
		<td markdown="span">`GET /sites/{site}/comments`</td>
		<td markdown="span">`GET /wp/v2/comments`</td>
	</tr>
	<tr>
		<th scope="row">Get comments for a post</th>
		<td markdown="span">`GET /sites/{site}/posts/{id}/replies`</td>
		<td markdown="span">`GET /wp/v2/comments?post={id}`</td>
	</tr>
	<tr>
		<th scope="row">Get a single comment</th>
		<td markdown="span">`GET /sites/{site}/comments/{id}`</td>
		<td markdown="span">`GET /wp/v2/comments/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Edit a comment</th>
		<td markdown="span">`POST /sites/{site}/comments/{id}`</td>
		<td markdown="span">`PUT /wp/v2/comments/{id}` (POST accepted for compatibility)</td>
	</tr>
	<tr>
		<th scope="row">Create a comment on a post</th>
		<td markdown="span">`POST /sites/{site}/posts/{id}/replies/new`</td>
		<td markdown="span">`POST /wp/v2/comments` with `{ post: <id> }`</td>
	</tr>
	<tr>
		<th scope="row">Create a comment as a reply</th>
		<td markdown="span">`POST /sites/{site}/comments/{id}/replies/new`</td>
		<td markdown="span">`POST /wp/v2/comments` with `{ post: <post>, parent: <id> }`</td>
	</tr>
	<tr>
		<th scope="row">Delete a comment</th>
		<td markdown="span">`POST /sites/{site}/comments/{id}/delete`</td>
		<td markdown="span">`DELETE /wp/v2/comments/{id}`</td>
	</tr>
	<tr>
		<th colspan="3"><h3>Taxonomies</h3></th>
	</tr>
	<tr>
		<th scope="row">List taxonomies for a post type</th>
		<td markdown="span">`GET /sites/{site}/post-types/{type}/taxonomies`</td>
		<td markdown="span">`GET /wp/v2/taxonomies?type={type}`</td>
	</tr>
	<tr>
		<th scope="row">Get a list of categories</th>
		<td markdown="span">`GET /sites/{site}/categories`</td>
		<td markdown="span">`GET /wp/v2/categories`</td>
	</tr>
	<tr>
		<th scope="row">Get category by ID</th>
		<td markdown="span">`GET /sites/{site}/categories/{id}`</td>
		<td markdown="span">`GET /wp/v2/categories/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Get category by slug</th>
		<td markdown="span">`GET /sites/{site}/categories/slug:{slug}`</td>
		<td markdown="span">`GET /wp/v2/categories?slug={slug}`</td>
	</tr>
	<tr>
		<th scope="row">Edit a category</th>
		<td markdown="span">`POST /sites/{site}/categories/{id}`</td>
		<td markdown="span">`PUT /wp/v2/categories/{id}` (POST accepted for compatibility)</td>
	</tr>
	<tr>
		<th scope="row">Create a category</th>
		<td markdown="span">`POST /sites/{site/categories/new`</td>
		<td markdown="span">`POST /wp/v2/categories`</td>
	</tr>
	<tr>
		<th scope="row">Delete a category</th>
		<td markdown="span">`POST /sites/{site}/categories/{id}/delete`</td>
		<td markdown="span">`DELETE /wp/v2/categories/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Get a list of tags</th>
		<td markdown="span">`GET /sites/{site}/tags`</td>
		<td markdown="span">`GET /wp/v2/tags`</td>
	</tr>
	<tr>
		<th scope="row">Get a tag by ID</th>
		<td markdown="span">`GET /sites/{site}/tags/{id}`</td>
		<td markdown="span">`GET /wp/v2/tags/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Get a tag by slug</th>
		<td markdown="span">`GET /sites/{site}/tags/slug:{slug}`</td>
		<td markdown="span">`GET /wp/v2/tags?slug={slug}`</td>
	</tr>
	<tr>
		<th scope="row">Create a tag</th>
		<td markdown="span">`POST /sites/{site}/tags/new`</td>
		<td markdown="span">`POST /wp/v2/tags`</td>
	</tr>
	<tr>
		<th scope="row">Edit a tag</th>
		<td markdown="span">`POST /sites/{site}/tags/{id}`</td>
		<td markdown="span">`PUT /wp/v2/tags/{id}` (POST accepted for compatibility)</td>
	</tr>
	<tr>
		<th scope="row">Delete a tag</th>
		<td markdown="span">`POST /sites/{site}/tags/{id}/delete`</td>
		<td markdown="span">`DELETE /wp/v2/tags/{id}`</td>
	</tr>
	<tr>
		<th colspan="3"><h3>Users</h3></th>
	</tr>
	<tr>
		<th scope="row">List users</th>
		<td markdown="span">`GET /sites/{site}/users`</td>
		<td markdown="span">`GET /wp/v2/users`</td>
	</tr>
	<tr>
		<th scope="row">Get a user's details</th>
		<td markdown="span">`GET /sites/{site}/users/{id}`</td>
		<td markdown="span">`GET /wp/v2/users/{id}`</td>
	</tr>
	<tr>
		<th scope="row">Get the current user's details</th>
		<td markdown="span">`GET /me`</td>
		<td markdown="span">`GET /wp/v2/users/me`</td>
	</tr>
	<tr>
		<th scope="row">Create a new user</th>
		<td markdown="span">n/a</td>
		<td markdown="span">`POST /wp/v2/users`</td>
	</tr>
	<tr>
		<th scope="row">Edit a user</th>
		<td markdown="span">`POST /sites/{site}/users/{id}`</td>
		<td markdown="span">`PUT /wp/v2/users/{id}` (POST accepted for compatibility)</td>
	</tr>
	<tr>
		<th scope="row">Delete a user</th>
		<td markdown="span">`POST /sites/{site}/users/{id}/delete`</td>
		<td markdown="span">`DELETE /wp/v2/users/{id}`</td>
	</tr>
	<tr>
		<th colspan="3"><h3>Site</h3></th>
	</tr>
	<tr>
		<th scope="row">Get post types</th>
		<td markdown="span">`GET /sites/{site}/post-types`</td>
		<td markdown="span">`GET /wp/v2/types`</td>
	</tr>
	<tr>
		<th scope="row">Get page templates</th>
		<td markdown="span">`GET /site/{site}/post-templates`</td>
		<td markdown="span">`OPTIONS /wp/v2/posts`, check valid values in schema</td>
	</tr>
</table>

## Responses

<table style="width: 100%">
	<thead>
		<tr>
			<th></th>
			<th>WP.com</th>
			<th>WP REST API</th>
		</tr>
	</thead>
	<tr>
		<th colspan="3">
			<h3>Post</h3>
		</th>
	</tr>
	<tr>
		<th scope="row">Post ID</th>
		<td markdown="span">`ID`</td>
		<td markdown="span">`id`</td>
	</tr>
	<tr>
		<th scope="row">Date</th>
		<td markdown="span">`date`</td>
		<td markdown="span">`date` &amp; `date_gmt`</td>
	</tr>
	<tr>
		<th scope="row">Modified Date</th>
		<td markdown="span">`modified`</td>
		<td markdown="span">`modified` &amp; `modified_gmt`</td>
	</tr>
	<tr>
		<th scope="row">Title (for display)</th>
		<td markdown="span">`title` with `context=display` (default)</td>
		<td markdown="span">`title.rendered` with `context=view` (default)</td>
	</tr>
	<tr>
		<th scope="row">Title (for editing)</th>
		<td markdown="span">`title` with `context=edit`</td>
		<td markdown="span">`title.raw` with `context=edit`</td>
	</tr>
	<tr>
		<th scope="row">Content (for display)</th>
		<td markdown="span">`content` with `context=display` (default)</td>
		<td markdown="span">`content.rendered` with `context=view` (default)</td>
	</tr>
	<tr>
		<th scope="row">Content (for editing)</th>
		<td markdown="span">`content` with `context=edit`</td>
		<td markdown="span">`content.raw` with `context=edit`</td>
	</tr>
	<tr>
		<th scope="row">Excerpt (for display)</th>
		<td markdown="span">`excerpt` with `context=display` (default)</td>
		<td markdown="span">`excerpt.rendered` with `context=view` (default)</td>
	</tr>
	<tr>
		<th scope="row">Excerpt (for editing)</th>
		<td markdown="span">`excerpt` with `context=edit`</td>
		<td markdown="span">`excerpt.raw` with `context=edit`</td>
	</tr>
	<tr>
		<th scope="row">GUID (for display)</th>
		<td markdown="span">`guid`</td>
		<td markdown="span">`guid.rendered` with `context=view` (default)</td>
	</tr>
	<tr>
		<th scope="row">GUID (for editing)</th>
		<td markdown="span">n/a</td>
		<td markdown="span">`guid.raw` with `context=edit`</td>
	</tr>
	<tr>
		<th scope="row">Permalink</th>
		<td markdown="span">`URL`</td>
		<td markdown="span">`link`</td>
	</tr>
	<tr>
		<th scope="row">Post name (slug)</th>
		<td markdown="span">`slug`</td>
		<td markdown="span">`slug`</td>
	</tr>
	<tr>
		<th scope="row">Post type</th>
		<td markdown="span">`type`</td>
		<td markdown="span">`type`</td>
	</tr>
	<tr>
		<th scope="row">Post status</th>
		<td markdown="span">`status`</td>
		<td markdown="span">`status`</td>
	</tr>
	<tr>
		<th scope="row">Author ID</th>
		<td markdown="span">`author.ID`</td>
		<td markdown="span">`author`</td>
	</tr>
	<tr>
		<th scope="row">Author details</th>
		<td markdown="span">`author`</td>
		<td markdown="span">`_embedded.author[0]` with `_embed=true`</td>
	</tr>
	<tr>
		<th scope="row">Sticky?</th>
		<td markdown="span">`sticky`</td>
		<td markdown="span">`sticky`</td>
	</tr>
	<tr>
		<th scope="row">Post password</th>
		<td markdown="span">`password`</td>
		<td markdown="span">`password` (`context=edit` only)</td>
	</tr>
	<tr>
		<th scope="row">Post format</th>
		<td markdown="span">`format`</td>
		<td markdown="span">`format`</td>
	</tr>
	<tr>
		<th scope="row">Comments open?</th>
		<td markdown="span">`discussion.comments_open`</td>
		<td markdown="span">`comments_open === "open"`</td>
	</tr>
	<tr>
		<th scope="row">Comment status</th>
		<td markdown="span">`discussion.comment_status`</td>
		<td markdown="span">`comments_open`</td>
	</tr>
	<tr>
		<th scope="row">Pings open?</th>
		<td markdown="span">`discussion.pings_open` (boolean)</td>
		<td markdown="span">`pings_open === "open"`</td>
	</tr>
	<tr>
		<th scope="row">Ping status</th>
		<td markdown="span">`discussion.ping_status`</td>
		<td markdown="span">`pings_open`</td>
	</tr>
	<tr>
		<th scope="row">Parent</th>
		<td markdown="span">`parent` (`false` if none)</td>
		<td markdown="span">`parent` (`0` if none, only exists if type is hierarchical)</td>
	</tr>
	<tr>
		<th scope="row">Menu order</th>
		<td markdown="span">`menu_order`</td>
		<td markdown="span">`menu_order` (only exists if type is hierarchical)</td>
	</tr>
	<tr>
		<th scope="row">Page template</th>
		<td markdown="span">`page_template`</td>
		<td markdown="span">`template` (only exists if type supports templates)</td>
	</tr>
	<tr>
		<th scope="row">Featured image ID</th>
		<td markdown="span">`post_thumbnail.ID`</td>
		<td markdown="span">`featured_media` (only exists if type supports featured images)</td>
	</tr>
	<tr>
		<th scope="row">Featured image details</th>
		<td markdown="span">`post_thumbnail`</td>
		<td markdown="span">`_embedded[wp:featuredmedia]`</td>
	</tr>
	<tr>
		<th scope="row">Featured image URL</th>
		<td markdown="span">`featured_image` (`""` if none)</td>
		<td markdown="span">`_embedded[wp:featuredmedia].source_url`</td>
	</tr>
	<tr>
		<th scope="row">Category IDs</th>
		<td markdown="span">`terms.category[].ID`</td>
		<td markdown="span">`categories`</td>
	</tr>
	<tr>
		<th scope="row">Category details</th>
		<td markdown="span">`terms.category[]`</td>
		<td markdown="span">`_embedded[wp:term][0][]`</td>
	</tr>
	<tr>
		<th scope="row">Tag IDs</th>
		<td markdown="span">`terms.post_tag[].ID`</td>
		<td markdown="span">`tags`</td>
	</tr>
	<tr>
		<th scope="row">Tag details</th>
		<td markdown="span">`terms.post_tag[]`</td>
		<td markdown="span">`_embedded[wp:term][1][]`</td>
	</tr>
	<tr>
		<th scope="row">Post meta</th>
		<td markdown="span">`metadata`</td>
		<td markdown="span">`meta`</td>
	</tr>
	<tr>
		<th scope="row">Capabilities for the post</th>
		<td markdown="span">`capabilities`</td>
		<td markdown="span">`Allow` header</td>
	</tr>
</table>
