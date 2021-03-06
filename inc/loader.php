<?php
namespace BaseTheme\Inc;

/**
 * Class Loader
 * @package BaseTheme\Inc
 */
class Loader {
	/**
	 * @var \BaseTheme\Inc\Loader
	 */
	private static $instance;

	/**
	 * Project text domain
	 */
	const TEXT_DOMAIN = 'BaseTheme';

	/**
	 * Loader constructor.
	 */
	public function __construct() {
		$this->register_autoloader();
		$this->init();
	}

	/**
	 * Static method for the object instance
	 * @return Loader
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new Loader();
		}

		return self::$instance;

	}

	/**
	 * Registering the new autoloader
	 */
	protected function register_autoloader() {
		/**
		 * Registering PSR-4 compliant namespaces
		 *
		 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
		 *
		 * @param string $class The fully-qualified class name.
		 *
		 * @return void
		 */
		spl_autoload_register( function ( $class ) {

			// project-specific namespace prefix and inc folder
			$prefix = 'BaseTheme\\Inc\\';

			// base directory for the namespace prefix
			$base_dir = get_template_directory() . '/inc/';

			// does the class use the namespace prefix?
			$len = strlen( $prefix );
			if ( strncmp( $prefix, $class, $len ) !== 0 ) {
				// no, move to the next registered autoloader
				return;
			}

			// get the relative class name
			$relative_class = ltrim( strtolower( preg_replace( '/\B[A-Z]/', '-$0', substr( $class, $len ) ) ), '-' );

			// replace the namespace prefix with the base directory, replace namespace
			// separators with directory separators in the relative class name, append
			// with .php
			$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

			// if the file exists, require it
			if ( file_exists( $file ) ) {
				require $file;
			}

			return;
		} );
	}

	/**
	 * Initializes the object
	 */
	public function init() {
		$this->setup_actions();
		$this->setup_filters();
		$this->setup_content_model();
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function init_scripts() {
		//Enqueueing style.css
		wp_enqueue_style( 'basetheme-style', get_stylesheet_uri() );

		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
	}

	/**
	 * This method is used to setup any WordPress actions
	 */
	public function setup_actions() {
		add_action( 'wp_enqueue_scripts', [ $this, 'init_scripts' ] );
	}

	/**
	 * This method is used to setup any WordPress filters
	 */
	public function setup_filters() {
	}

	/**
	 * Fetches content model and intializes its content
	 */
	public function setup_content_model() {
		$content_model = new ContentModel();

		$objects_to_load = array_merge(
			$content_model->getPostTypes(),
			$content_model->getTaxonomies(),
			$content_model->getSidebars(),
			$content_model->getWidgets()
		);

		foreach ( $objects_to_load as $object ) {
			new $object;
		}
	}
}
