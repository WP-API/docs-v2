<?php
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( ! getenv( 'WP_API_DEV_DOMAIN' ) ) {
	echo "`WP_API_DEV_DOMAIN` environment variable must be set to build the site.";
	exit(1);
}

function render( $path, $binding ) {
	$m = new Mustache_Engine;
	$template = file_get_contents( __DIR__ . "/templates/$path" );
	return $m->render( $template, $binding );
}

desc( 'Build the endpoint documentation.' );
task( 'endpoint-list', function( $app ){

	$endpoints = array(
		'comments'           => array(
			'plural_name'    => 'Comments',
			'singular_name'  => 'Comment',
			'schema_route'   => '/wp-json/wp/v2/comments/schema',
			),
		'media'              => array(
			'plural_name'    => 'Media',
			'singular_name'  => 'Attachment',
			'schema_route'   => '/wp-json/wp/v2/media/schema',
			),
		'pages'              => array(
			'plural_name'    => 'Pages',
			'singular_name'  => 'Page',
			'schema_route'   => '/wp-json/wp/v2/pages/schema',
			),
		'posts'              => array(
			'plural_name'    => 'Posts',
			'singular_name'  => 'Post',
			'schema_route'   => '/wp-json/wp/v2/posts/schema',
			),
		'post_meta'          => array(
			'plural_name'    => 'Meta for a Post',
			'singular_name'  => 'Meta for a Post',
			'schema_route'   => '/wp-json/wp/v2/posts/meta/schema',
			),
		'post_revisions'     => array(
			'plural_name'    => 'Revisions for a Post',
			'singular_name'  => 'Revision for a Post',
			'schema_route'   => '/wp-json/wp/v2/posts/revisions/schema',
			),
		'taxonomies'         => array(
			'plural_name'    => 'Taxonomies',
			'singular_name'  => 'Taxonomy',
			'schema_route'   => '/wp-json/wp/v2/taxonomies/schema',
			),
		'terms'              => array(
			'plural_name'    => 'Terms',
			'singular_name'  => 'Term',
			'schema_route'   => '/wp-json/wp/v2/terms/categories/schema',
			),
		'users'              => array(
			'plural_name'    => 'Users',
			'singular_name'  => 'User',
			'schema_route'   => '/wp-json/wp/v2/users/schema',
			),
		);

	$dev_domain = rtrim( getenv( 'WP_API_DEV_DOMAIN' ), '/' );

	foreach( $endpoints as $file_name => $attributes ) {

		$response = Requests::get( $dev_domain . $attributes['schema_route'] );
		if ( 200 !== $response->status_code ) {
			echo "Error fetching schema: {$attributes['schema_route']} (HTTP code {$response->status_code})";
			exit(1);
		}

		$response_data = json_decode( $response->body );
		// Prepare the data because Mustache is opinionated
		$properties = array();
		if ( ! empty( $response_data->properties ) ) {
			foreach( $response_data->properties as $name => $args ) {
				$property = array(
					'name'          => $name,
					'description'   => ! empty( $args->description ) ? $args->description : '',
					'type'          => ! empty( $args->type ) ? $args->type : '',
					'context'       => ! empty( $args->context ) ? implode( $args->context, ', ' ) : '',
					);
				if ( ! empty( $args->format ) ) {
					$property['type'] = $args->format;
				}
				$properties[] = $property;
			}
		}

		$attributes['schema_properties'] = $properties;
		file_put_contents( dirname( __FILE__ ) . '/_includes/routes/' . $file_name . '.md', render( 'endpoint.mustache', $attributes ) );
	}

});

desc( 'Build the site.' );
task( 'default', 'endpoint-list' );
