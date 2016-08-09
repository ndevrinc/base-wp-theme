<?php

namespace InternetRetailer\Inc\PostTypes;

class Company {
	protected $text_domain = 'internet-retailer';

	public function __construct() {
		add_action( 'init', [ $this, 'init_post_type' ] );
		add_action( 'wp', [ $this, 'prepare_data' ] );
	}

	public function init_post_type() {
		$labels = [
			'name'               => _x( 'Companies', 'post type general name', $this->text_domain ),
			'singular_name'      => _x( 'Company', 'post type singular name', $this->text_domain ),
			'menu_name'          => _x( 'Companies', 'admin menu', $this->text_domain ),
			'name_admin_bar'     => _x( 'Company', 'add new on admin bar', $this->text_domain ),
			'add_new'            => _x( 'Add New', 'company', $this->text_domain ),
			'add_new_item'       => __( 'Add New Company', $this->text_domain ),
			'new_item'           => __( 'New Company', $this->text_domain ),
			'edit_item'          => __( 'Edit Company', $this->text_domain ),
			'view_item'          => __( 'View Company', $this->text_domain ),
			'all_items'          => __( 'All Companies', $this->text_domain ),
			'search_items'       => __( 'Search Companies', $this->text_domain ),
			'parent_item_colon'  => __( 'Parent Companies:', $this->text_domain ),
			'not_found'          => __( 'No companies found.', $this->text_domain ),
			'not_found_in_trash' => __( 'No companies found in Trash.', $this->text_domain )
		];

		$args = [
			'labels'          => $labels,
			'description'     => __( 'Description.', $this->text_domain ),
			'public'          => true,
			'rewrite'         => [ 'slug' => 'company' ],
			'capability_type' => 'post',
			'has_archive'     => false,
			'hierarchical'    => false,
			'menu_position'   => null,
			'supports'        => [ 'title', 'author' ]
		];

		register_post_type( 'company', $args );
	}

	public function add_query_vars( $qvars ) {
		$qvars[] = 'custom_var';
		return $qvars;
	}

	public function prepare_data( $wp ) {
		//You can add your custom vars in here like so : set_query_var( 'custom_var', 'andrea' );
		//This var can be retrieved in the theme with the get_query_var( 'custom_var' );
	}
}
