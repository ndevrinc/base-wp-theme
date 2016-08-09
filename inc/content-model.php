<?php

namespace InternetRetailer\Inc;

class ContentModel {
	private $post_types = [
		'InternetRetailer\Inc\PostTypes\Company'
	];

	private $taxonomies = [
		'InternetRetailer\Inc\Taxonomies\Genre'
	];

	private $widgets = [
		'InternetRetailer\Inc\Widgets\CustomWidget'
	];

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