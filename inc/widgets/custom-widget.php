<?php
namespace BaseTheme\Inc\Widgets;

/**
 * Class CustomWidget
 * @package BaseTheme\Inc\Widgets
 */
class CustomWidget extends \WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'My New Widget Title' );

		add_action( 'widgets_init',
			create_function( '', 'return register_widget("' . get_class( $this ) . '");' )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		// Widget output
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Output admin widget options form
	}
}
