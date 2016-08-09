<?php

namespace InternetRetailer\Inc\Taxonomies;

/**
 * Class Genre
 * @package InternetRetailer\Inc\Taxonomies
 */
class Genre {

	/**
	 * Genre constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init_taxonomy' ] );
	}

	/**
	 * Registering the custom taxonomy
	 */
	public function init_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = [
			'name'                       => _x( 'Genres', 'taxonomy general name', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'singular_name'              => _x( 'Genre', 'taxonomy singular name', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'search_items'               => __( 'Search Genres', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'all_items'                  => __( 'All Genres', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'popular_items'              => __( 'Popular Genres', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Genre', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'update_item'                => __( 'Update Genre', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'add_new_item'               => __( 'Add New Genre', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'new_item_name'              => __( 'New Genre Name', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'separate_items_with_commas' => __( 'Separate genres with commas', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove genres', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used genres', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'not_found'                  => __( 'No genres found.', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'menu_name'                  => __( 'Genre', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
		];

		$args = [
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'genre' ),
		];

		register_taxonomy( 'genre', array( 'post', 'company' ), $args );

	}

}
