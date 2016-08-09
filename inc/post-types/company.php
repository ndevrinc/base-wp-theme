<?php

namespace InternetRetailer\Inc\PostTypes;

/**
 * Class Company
 * @package InternetRetailer\Inc\PostTypes
 */
class Company {

	/**
	 * Company constructor.
	 */
	public function __construct() {
		/**
		 * Attaching the custom post type callback to the init action hook
		 */
		add_action( 'init', [ $this, 'init_post_type' ] );

		/**
		 * The purpose of this is to have properties/vars accessible from within templates without fetching the data there.
		 * The concept is to add a method in the custom post type declaration class to add such var.
		 * I am currently using the set_query_var( 'custom_var', 'ndevr' ); inside the action hook wp .
		 * Since it runs after the query but before the template.
		 */
		add_action( 'wp', [ $this, 'prepare_data' ] );
	}

	/**
	 * Init the custom post type
	 */
	public function init_post_type() {
		$labels = [
			'name'               => _x( 'Companies', 'post type general name', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'singular_name'      => _x( 'Company', 'post type singular name', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'menu_name'          => _x( 'Companies', 'admin menu', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'name_admin_bar'     => _x( 'Company', 'add new on admin bar', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'add_new'            => _x( 'Add New', 'company', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'add_new_item'       => __( 'Add New Company', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'new_item'           => __( 'New Company', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'edit_item'          => __( 'Edit Company', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'view_item'          => __( 'View Company', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'all_items'          => __( 'All Companies', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'search_items'       => __( 'Search Companies', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'parent_item_colon'  => __( 'Parent Companies:', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'not_found'          => __( 'No companies found.', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
			'not_found_in_trash' => __( 'No companies found in Trash.', \InternetRetailer\Inc\Loader::TEXT_DOMAIN )
		];

		$args = [
			'labels'          => $labels,
			'description'     => __( 'Description.', \InternetRetailer\Inc\Loader::TEXT_DOMAIN ),
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

	/**
	 * Callback for the hook action wp.
	 * You can add your custom vars in here like so : set_query_var( 'custom_var', 'andrea' );
	 * This var can be retrieved in the theme with the get_query_var( 'custom_var' );
	 * @param $wp
	 */
	public function prepare_data( $wp ) {
	}
}
