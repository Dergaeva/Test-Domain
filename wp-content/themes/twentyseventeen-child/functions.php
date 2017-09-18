<?php

//add style
function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/assets/js/app.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

//change Product page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 45);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );

/**
 * Change text strings
 */
function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Product' :
			$translated_text = __( 'Product<br>Name', 'woocommerce' );
			break;
		case 'Total' :
			$translated_text = __( 'Total<br>Price', 'woocommerce' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

// Custom post type function
add_action( 'init', 'true_register_post_type_init' );

function true_register_post_type_init() {
	$labels = array(
		'name' => 'All Books',
		'singular_name' => 'book',
		'add_new' => 'Add book',
		'add_new_item' => 'Add new book',
		'edit_item' => 'Edit book',
		'new_item' => 'New book',
		'all_items' => 'All books',
		'view_item' => 'Show all books',
		'search_items' => 'Find books',
		'not_found' =>  'Books not find',
		'not_found_in_trash' => 'Books not find',
		'menu_name' => 'Books'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	);
	register_post_type('books', $args);

	$taxlabrl = array(
    'name' => 'Genre',
    'singular_name' => 'Genre',
    'search_items' => 'find Genre',
    'all_items' => 'All Genres',
    'add_new_item' => 'Add new Genre',
    'new_item_name' => 'Name of new Genre',
    'edit_item'=> 'Edit Genre',
    'add_or_remove_items' => 'Add or Delete Genre',
    );

    $taxargs = array(
    'labels' => $taxlabrl,
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'show_tagcloud' => true,
    'rewrite' => array('slug' => 'Genre', 'with_front' => false),
    'query_var' => true
    );
    register_taxonomy('Genre', 'books', $taxargs);
}