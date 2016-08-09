<?php

namespace InternetRetailer\Inc\Taxonomies;

class Genre {
	protected $text_domain = 'internet-retailer';

	public function __construct() {
		add_action( 'init', [ $this, 'init_taxonomy' ] );
	}

	public function init_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = [
			'name'                       => _x( 'Genres', 'taxonomy general name' ),
			'singular_name'              => _x( 'Genre', 'taxonomy singular name' ),
			'search_items'               => __( 'Search Genres' ),
			'all_items'                  => __( 'All Genres' ),
			'popular_items'              => __( 'Popular Genres' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Genre' ),
			'update_item'                => __( 'Update Genre' ),
			'add_new_item'               => __( 'Add New Genre' ),
			'new_item_name'              => __( 'New Genre Name' ),
			'separate_items_with_commas' => __( 'Separate genres with commas' ),
			'add_or_remove_items'        => __( 'Add or remove genres' ),
			'choose_from_most_used'      => __( 'Choose from the most used genres' ),
			'not_found'                  => __( 'No genres found.' ),
			'menu_name'                  => __( 'Genre' ),
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
