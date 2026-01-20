<?php
require_once 'wp-load.php';

echo "Testing secure connection to WordPress.org API...\n";
$response = wp_remote_get( 'https://api.wordpress.org/plugins/info/1.0/' );

if ( is_wp_error( $response ) ) {
    echo "FAILED: " . $response->get_error_message() . "\n";
} else {
    $code = wp_remote_retrieve_response_code( $response );
    echo "SUCCESS: Received HTTP code $code\n";
}

echo "\nTesting secure connection to WordPress.org home...\n";
$response = wp_remote_get( 'https://wordpress.org/' );

if ( is_wp_error( $response ) ) {
    echo "FAILED: " . $response->get_error_message() . "\n";
} else {
    $code = wp_remote_retrieve_response_code( $response );
    echo "SUCCESS: Received HTTP code $code\n";
}
