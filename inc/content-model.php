<?php

namespace InternetRetailer\Inc;

/**
 * Class ContentModel
 * Content is going to be pulled and instantiate from within the Loader class
 *
 * @package InternetRetailer\Inc
 */
class ContentModel {
	/**
	 * List of custom post types
	 * @var array
	 */
	private $post_types = [
		'InternetRetailer\Inc\PostTypes\Company'
	];

	/**
	 * List of custom taxonomies
	 * @var array
	 */
	private $taxonomies = [
		'InternetRetailer\Inc\Taxonomies\Genre'
	];

	/**
	 * List of custom widgets
	 * @var array
	 */
	private $widgets = [
		'InternetRetailer\Inc\Widgets\CustomWidget'
	];

	/**
	 * List of custom sidebars
	 * @var array
	 */
	private $sidebars = [
		'InternetRetailer\Inc\Sidebars\CustomSidebar'
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