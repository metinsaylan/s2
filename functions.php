<?php 

add_action('wp_head', 'inline_css');
function inline_css() {
  ?><style><?php include_once( 'inline.css' ); ?></style><?php
}


/* Unpress */
remove_action ('wp_head', 'rsd_link');
function unpress_remove_version() {
	return '';
} add_filter('the_generator', 'unpress_remove_version');

remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
function unpress_cleanup_query_string( $src ){
	
	if( strpos( $src, 'fonts.googleapis.com' ) !== false || strpos( $src, '?' ) === false )
		return $src;

	$parts = explode( '?', $src ); 
	return $parts[0];
	
} 
add_filter( 'script_loader_src', 'unpress_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'unpress_cleanup_query_string', 15, 1 );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'template_redirect', 'rest_output_link_header' );

function unpress_prevent_login_error(){
  return 'Huh?';
} add_filter( 'login_errors', 'unpress_prevent_login_error' );

add_filter('show_admin_bar', '__return_false');
add_filter( 'pre_comment_content', 'esc_html' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'wp_resource_hints', 2 );

add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );
function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
} 





