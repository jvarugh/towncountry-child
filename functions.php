<?php 
/*
	Functions for Town and Country Gold Exchange
	Copyright 2013 Town and Country Gold Exchange
	
*/

//Theme Setup

/*This setup function attaches all of the site-wide functions 
 * to the correct actions and filters. All the functions themselves
 * are defined below this setup function.
*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 300, 200 ); // default Post Thumbnail dimensions   
}

function new_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
}

add_action('genesis_setup', 'child_theme_setup', 150);

function child_theme_setup() {
	
	add_action('gensis_header', 'tc_nav_menu');	
}

function tc_nav_menu() {
	echo '<nav>';
	wp_nav_menu(array('menu'=>'Primary'));	
	echo '</nav>';
}

add_theme_support( 'genesis-footer-widgets', 3 );

register_sidebar( array(
		'name' => 'Home Slider',
		'id' => 'home_slider',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
register_sidebar( array(
	'name' => 'Home Bottom Left',
	'id' => 'home_bottom_left',
	'before_widget' => '<div>',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="rounded">',
	'after_title' => '</h2><div class="divider"></div>',
));

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
   return '...&nbsp;<a href="' . get_permalink() . '" class="read-more"></a>';
};

/** Customize the next page link */
add_filter ( 'genesis_next_link_text' , 'custom_next_link_text' );
function custom_next_link_text ( $text ) {
    return __( 'Next', CHILD_DOMAIN ). g_ent( '&raquo; ' );
}

/** Customize the previous page link */
add_filter ( 'genesis_prev_link_text' , 'custom_prev_link_text' );
function custom_prev_link_text ( $text ) {
    return g_ent( '&laquo; ' ) . __( 'Previous', CHILD_DOMAIN );
}

// Get the Archive title and display on the respective page
add_action('genesis_before_loop', 'get_archive_title');
function get_archive_title() {
	$archive_title = post_type_archive_title();
	echo '<h1 class="archive-title">'.$archive_title.'</h1>';	
}

function exclude_stuff($query) {
if ( $query->is_date) {
        $query->set('cat', '-4');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_stuff');

?>