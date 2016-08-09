<?php

namespace InternetRetailer\Inc\Sidebars;

class CustomSidebar {

	public function __construct() {
		add_action( 'widgets_init', [ $this, 'sidebar_init' ] );
	}

	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	public function sidebar_init() {

		register_sidebar( array(
			'name'          => 'Custom sidebar',
			'id'            => 'custom_sidebar_1',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		) );

	}
}
