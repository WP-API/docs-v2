---
title: Actions and Filters Reference for the WordPress REST API.
---

The REST API has a number of built in hooks that can be used to modify its functionality.  This section only details the hooks that are **NOT** in WordPress core currently.  To find more information about those hooks visit https://developer.wordpress.org.

### Hooks Reference.
Hooks are divided by the file they are in. The table consists of what line they occur on, what function they are present in, the hook name, and a description.  Line count and function name could vary depending on release cycle and this information could potentially be out of sync.  This currently matches Beta-13.

**extras.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:81|`apply_filters( 'rest_avatar_sizes', array( 24, 48, 96 ) );`|`rest_get_avatar_sizes()`| Used to control avatar sizes for avatars in the API.|
**lib/endpoints/class-wp-rest-attachments-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:152|`do_action( 'rest_insert_attachment', $attachment, $request, true );`|`create_item()`|Fires after a single attachment is created or updated via the REST API. Flag `$creating` set to `true` for create.|
|:186|`do_action( 'rest_insert_attachment', $data, $request, false );`|`update_item()`|Fires after a single attachment is created or updated via the REST API. Flag `$creating` set to `false` for update.|
|:288|`apply_filters( 'rest_prepare_attachment', $response, $post, $request );`|`prepare_item_for_response()`|Allows modification of the attachment right before it is returned.|
**lib/endpoints/class-wp-rest-comments-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:164|`apply_filters( 'rest_comment_query', $prepared_args, $request );`|`get_items()`|Filter arguments, before passing to WP_Comment_Query, when querying comments via the REST API.|
|:361|`apply_filters( 'rest_pre_insert_comment', $prepared_comment, $request );`|`create_item()`|Filter a comment before it is inserted via the REST API.
|:390|`do_action( 'rest_insert_comment', $comment, $request, true );`|`create_item()`|Fires after a single comment is created or updated via the REST API. Flag `$creating` set to `true` for create.|
|:460|`do_action( 'rest_insert_comment', $comment, $request, false );`|`update_item()`|Fires after a single comment is created or updated via the REST API. Flag `$creating` set to `false` for update.|
|:506|`apply_filters( 'rest_comment_trashable', ( EMPTY_TRASH_DAYS > 0 ), $comment );`|`delete_item()`|Filter whether a comment is trashable.|
|:537|`do_action( 'rest_delete_comment', $comment, $response, $request );`|`delete_item()`|Fires after a comment is deleted via the REST API.|
|:596|`apply_filters( 'rest_prepare_comment', $response, $comment, $request );`|`prepare_item_for_response()`|Allows modification of the comment right before it is returned.|
|:764|`apply_filters( 'rest_preprocess_comment', $prepared_comment, $request );`|`prepare_item_for_database()`|Filter a comment before it is inserted via the REST API.|
**lib/endpoints/class-wp-rest-post-statuses-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:172|`apply_filters( 'rest_prepare_status', $response, $status, $request );`|`prepare_item_for_response()`|Allows modification of the post status right before it is returned.|
**lib/endpoints/class-wp-rest-post-types-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:136|`apply_filters( 'rest_prepare_post_type', $response, $post_type, $request );`|`prepare_item_for_response()`|Allows modification of the post type right before it is returned.|
**lib/endpoints/class-wp-rest-posts-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:135|`apply_filters( "rest_{$this->post_type}_query", $args, $request );`|`get_items()`|Filter arguments, before passing to WP_Query, when querying comments via the REST API.|
|:346|`do_action( "rest_insert_{$this->post_type}", $post, $request, true );`|`create_item()`|Fires after a single post is created or updated via the REST API. Flag `$creating` set to `true` for create.|
|:447|`do_action( "rest_insert_{$this->post_type}", $post, $request, false );`|`update_item()`|Fires after a single post is created or updated via the REST API. Flag `$creating` set to `false` for update.|
|:500|`apply_filters( "rest_{$this->post_type}_trashable", $supports_trash, $post );`|`delete_item()`|Filter whether a post is trashable.|
|:539|`do_action( "rest_delete_{$this->post_type}", $post, $response, $request );`|`delete_item()`|Fires after a post is deleted via the REST API.|
|:566|`apply_filters( "rest_query_var-{$var}", $prepared_args[ $var ] );`|`prepare_items_query()`|Filter the query_vars used in `get_items` for the constructed query.|
|:613|`apply_filters( 'rest_private_query_vars', $wp->private_query_vars );`|`get_allowed_query_vars()`|Filter the allowed 'private' query vars for authorized users.|
|:646|`apply_filters( 'rest_query_vars', $valid_vars );`|`get_allowed_query_vars()`|Filter allowed query vars for the REST API.|
|:857|`apply_filters( "rest_pre_insert_{$this->post_type}", $prepared_post, $request );`|`prepare_item_for_database()`|Filter a post before it is inserted via the REST API.|
|:1197|`apply_filters( "rest_prepare_{$this->post_type}", $response, $post, $request );`|`prepare_item_for_response()`|Allows modification of the post right before it is returned.|
**lib/endpoints/class-wp-rest-revisions-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:165|`do_action( 'rest_delete_revision', $result, $request );`|`delete_item()`|Fires after a revision is deleted via the REST API.|
|:228|`apply_filters( 'rest_prepare_revision', $response, $post, $request );`|`prepare_item_for_response()`|Allows modification of the revision right before it is returned.|
**lib/endpoints/class-wp-rest-taxonomies-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:168|`apply_filters( 'rest_prepare_taxonomy', $response, $taxonomy, $request );`|`prepare_item_for_response()`|Allows modification of the taxonomy right before it is returned.|
**lib/endpoints/class-wp-rest-terms-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:137|`apply_filters( "rest_{$this->taxonomy}_query", $prepared_args, $request );`|`get_items()`|Filter the query arguments, before passing them to `get_terms()`.|
|:372|`do_action( "rest_insert_{$this->taxonomy}", $term, $request, true );`|`create_item()`|Fires after a single term is created or updated via the REST API. Flag `$creating` set to `true` for create.|
|:442|`do_action( "rest_insert_{$this->taxonomy}", $term, $request, false );`|`update_item()`|Fires after a single term is created or updated via the REST API. Flag `$creating` set to `false` for update.|
|:502|`do_action( "rest_delete_{$this->taxonomy}", $term, $response, $request );`|`delete_item()`|Fires after a term is deleted via the REST API.|
|:549|`apply_filters( "rest_pre_insert_{$this->taxonomy}", $prepared_term, $request );`|`prepare_item_for_database()`|Filter a term before it is inserted via the REST API.|
|:592|`apply_filters( "rest_prepare_{$this->taxonomy}", $response, $item, $request );`|`prepare_item_for_response()`|Allows modification of the term right before it is returned.|
**lib/endpoints/class-wp-rest-users-controller.php**

| Line | Filter | Function | Description |
|----|----|----|----|
|:137|`apply_filters( 'rest_user_query', $prepared_args, $request );`|`get_items()`|Filter arguments, before passing to WP_User_Query, when querying comments via the REST API.|
|:328|`do_action( 'rest_insert_user', $user, $request, true );`|`create_item()`|Fires after a single user is created or updated via the REST API. Flag `$creating` set to `true` for create.|
|:411|`do_action( 'rest_insert_user', $user, $request, false );`|`update_item()`|Fires after a single user is created or updated via the REST API. Flag `$creating` set to `false` for update.|
|:482|`do_action( 'rest_delete_user', $user, $response, $request );`|`delete_item()`|Fires after a user is deleted via the REST API.|
|:535|`apply_filters( 'rest_prepare_user', $response, $user, $request );`|`prepare_item_for_response()`|Allows modification of the user right before it is returned.|
|:615|`apply_filters( 'rest_pre_insert_user', $prepared_user, $request );`|`prepare_item_for_database()`|Filter a user before it is inserted via the REST API.|

If you are having trouble implementing any of these hooks, be sure that you are adding these hooks with a sufficiently high priority.
