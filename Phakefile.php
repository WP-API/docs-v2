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
		'comments'         => array(
			'name'         => 'Comments',
			'schema_path'  => '/wp-json/wp/v2/comments/schema',
			),
		);

	$dev_domain = rtrim( getenv( 'WP_API_DEV_DOMAIN' ), '/' );

	foreach( $endpoints as $file_name => $attributes ) {

		$response = Requests::get( $dev_domain . $attributes['schema_path'] );
		if ( 200 !== $response->status_code ) {
			echo "Error fetching schema (HTTP code {$response->status_code})";
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

		$data = array(
			'name'                => $attributes['name'],
			'schema_properties'   => $properties,
			);
		file_put_contents( dirname( __FILE__ ) . '/_includes/routes/' . $file_name . '.md', render( 'endpoint.mustache', $data ) );
	}

});

desc( 'Build the site.' );
task( 'default', 'endpoint-list' );
