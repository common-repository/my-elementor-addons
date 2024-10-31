<?php
namespace MyElementorAddons\Elementor;

use MyElementorAddons\Elementor\Widget\Accordion;
use MyElementorAddons\Elementor\Widget\Card;
use MyElementorAddons\Elementor\Widget\Dual_Button;
use MyElementorAddons\Elementor\Widget\Flip_Box;
use MyElementorAddons\Elementor\Widget\Image_Compare;
use MyElementorAddons\Elementor\Widget\Info_Box;
use MyElementorAddons\Elementor\Widget\Pricing_Table;
use MyElementorAddons\Elementor\Widget\Review;
use MyElementorAddons\Elementor\Widget\Team_Member;
use MyElementorAddons\Elementor\Widget\Testimonial_Carousel;

/**
 * Class MYEA_Plugin
 *
 * Main MYEA_Plugin class
 * @since 1.2.0
 */
class MYEA_Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var MYEA_Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return MYEA_Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_styles
	 *
	 * Load required CSS files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles() {
		wp_register_style( 'bootstrap', MYEA_ASSETS . 'vendor/bootstrap/css/bootstrap.min.css', null, MYEA_VERSION );
		wp_register_style( 'card', MYEA_ASSETS . 'css/widgets/card.css', null, MYEA_VERSION );
		wp_register_style( 'accordion', MYEA_ASSETS . 'css/widgets/accordion.css', null, MYEA_VERSION );
		wp_register_style( 'dual-button', MYEA_ASSETS . 'css/widgets/dual-button.css', null, MYEA_VERSION );
		wp_register_style( 'info-box', MYEA_ASSETS . 'css/widgets/info-box.css', null, MYEA_VERSION );
		wp_register_style( 'flip-box', MYEA_ASSETS . 'css/widgets/flip-box.css', null, MYEA_VERSION );
		wp_register_style( 'owl-theme-default', MYEA_ASSETS . 'vendor/owl/css/owl.theme.default.css', null, MYEA_VERSION );
		wp_register_style( 'owl-carousel', MYEA_ASSETS . 'vendor/owl/css/owl.carousel.min.css', null, MYEA_VERSION );
		wp_register_style( 'owl', MYEA_ASSETS . 'vendor/owl/css/owl.css', null, MYEA_VERSION );
		wp_register_style( 'images-compare', MYEA_ASSETS . 'vendor/image-compare/css/images-compare.css', null, MYEA_VERSION );
		wp_register_style( 'team-member', MYEA_ASSETS . 'css/widgets/team-member.css', null, MYEA_VERSION );
		wp_register_style( 'review', MYEA_ASSETS . 'css/widgets/review.css', null, MYEA_VERSION );
		wp_register_style( 'pricing-table', MYEA_ASSETS . 'css/widgets/pricing-table.css', null, MYEA_VERSION );
	}

	/**
	 * widget_scripts
	 *
	 * Load required JS files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'bootstrap', MYEA_ASSETS . 'vendor/bootstrap/js/bootstrap.min.js', null, MYEA_VERSION, true );
		wp_register_script( 'owl-carousel', MYEA_ASSETS . 'vendor/owl/js/owl.carousel.min.js', [ 'jquery' ], MYEA_VERSION, true );
		wp_register_script( 'testimonial-carousel', MYEA_ASSETS . 'js/testimonial-carousel.js', [ 'jquery' ], MYEA_VERSION, true );
		wp_register_script( 'hammer', MYEA_ASSETS . 'vendor/image-compare/js/hammer.min.js', [ 'jquery' ], MYEA_VERSION, true );
		wp_register_script( 'jquery-image-compare', MYEA_ASSETS . 'vendor/image-compare/js/jquery.images-compare.min.js', [ 'jquery' ], MYEA_VERSION, true );
		wp_register_script( 'image-compare', MYEA_ASSETS . 'js/image-compare.js', [ 'jquery' ], MYEA_VERSION, true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/base/widget-base.php' );
		require_once( __DIR__ . '/widgets/card.php' );
		require_once( __DIR__ . '/widgets/accordion.php' );
		require_once( __DIR__ . '/widgets/dual-button.php' );
		require_once( __DIR__ . '/widgets/info-box.php' );
		require_once( __DIR__ . '/widgets/flip-box.php' );
		require_once( __DIR__ . '/widgets/testimonial-carousel.php' );
		require_once( __DIR__ . '/widgets/image-compare.php' );
		require_once( __DIR__ . '/widgets/team-member.php' );
		require_once( __DIR__ . '/widgets/review.php' );
		require_once( __DIR__ . '/widgets/pricing-table.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Accordion() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Dual_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Info_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Flip_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Testimonial_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Image_Compare() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Team_Member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Review() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pricing_Table() );
	}

	/**
	 *  MYEA_Plugin class constructor
	 *
	 * Register MYEA_plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		// Register widget Assets
		add_action( 'elementor/frontend/before_register_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate MYEA_Plugin Class
MYEA_Plugin::instance();
