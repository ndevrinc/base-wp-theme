<?php

namespace BaseTheme\Inc\Sidebars;

/**
 * Class CustomSidebar
 * @package BaseTheme\Inc\Sidebars
 */
class CustomSidebar {

	/**
	 * CustomSidebar constructor.
	 */
	public function __construct() {
		/**
		 * Attaching the callback to the widget_init action hook
		 */
		add_action( 'widgets_init', [ $this, 'sidebar_init' ] );
	}

	/**
	 * Register our sidebars and widgetized areas.
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
