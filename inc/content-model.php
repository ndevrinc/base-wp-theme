<?php

namespace BaseTheme\Inc;

/**
 * Class ContentModel
 * Content is going to be pulled and instantiate from within the Loader class
 *
 * @package BaseTheme\Inc
 */
class ContentModel {
	/**
	 * List of custom post types
	 * @var array
	 */
	private $post_types = [
		'BaseTheme\Inc\PostTypes\Company'
	];

	/**
	 * List of custom taxonomies
	 * @var array
	 */
	private $taxonomies = [
		'BaseTheme\Inc\Taxonomies\Genre'
	];

	/**
	 * List of custom widgets
	 * @var array
	 */
	private $widgets = [
		'BaseTheme\Inc\Widgets\CustomWidget'
	];

	/**
	 * List of custom sidebars
	 * @var array
	 */
	private $sidebars = [
		'BaseTheme\Inc\Sidebars\CustomSidebar'
	];

	/**
	 * @return array
	 */
	public function getPostTypes() {
		return $this->post_types;
	}

	/**
	 * @return array
	 */
	public function getTaxonomies() {
		return $this->taxonomies;
	}

	/**
	 * @return array
	 */
	public function getWidgets() {
		return $this->widgets;
	}

	/**
	 * @return array
	 */
	public function getSidebars() {
		return $this->sidebars;
	}

}