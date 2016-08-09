<?php

class MyTheme_Customize {
	/**
	 * This hooks into 'customize_register' (available as of WP 3.4) and allows
	 * you to add new sections and controls to the Theme Customize screen.
	 *
	 * Note: To enable instant preview, we have to actually write a bit of custom
	 * javascript. See live_preview() for more.
	 *
	 * @see add_action('customize_register',$func)
	 * @param \WP_Customize_Manager $wp_customize
	 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 * @since MyTheme 1.0
	 */
	public static function register ( $wp_customize ) {
		//1. Define a new section (if desired) to the Theme Customizer
		$wp_customize->add_section( 'mytheme_options',
			array(
				'title' => __( 'MyTheme Options', 'mytheme' ), //Visible title of section
				'priority' => 35, //Determines what order this appears in
				'capability' => 'edit_theme_options', //Capability needed to tweak
				'description' => __('Allows you to customize some example settings for MyTheme.', 'mytheme'), //Descriptive tooltip
			)
		);

		//2. Register new settings to the WP database...
		$wp_customize->add_setting( 'link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
			array(
				'default' => '#2BA6CB', //Default setting/value to save
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			)
		);

		//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
			$wp_customize, //Pass the $wp_customize object (required)
			'mytheme_link_textcolor', //Set a unique ID for the control
			array(
				'label' => __( 'Link Color', 'mytheme' ), //Admin-visible name of the control
				'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'settings' => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
				'priority' => 10, //Determines the order this control appears in for the specified section
			)
		) );

		//4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	}


	/**
	 * This outputs the javascript needed to automate the live settings preview.
	 * Also keep in mind that this function isn't necessary unless your settings
	 * are using 'transport'=>'postMessage' instead of the default 'transport'
	 * => 'refresh'
	 *
	 * Used by hook: 'customize_preview_init'
	 *
	 * @see add_action('customize_preview_init',$func)
	 * @since MyTheme 1.0
	 */
	public static function live_preview() {
		wp_enqueue_script(
			'mytheme-themecustomizer', // Give the script a unique ID
			get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
			array(  'jquery', 'customize-preview' ), // Define dependencies
			'', // Define a version (optional)
			true // Specify whether to put in footer (leave this true)
		);
	}

}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );