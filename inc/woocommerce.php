<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function _s_wrapper_start() {
	echo '&lt;div id="primary" class="content-area"&gt;'; //Those will need to be adapted to out design/classes
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', '_s_wrapper_start', 10 );

function _s_wrapper_end() {
	echo '&lt;/div&gt;';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', '_s_wrapper_end', 10 );
