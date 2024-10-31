<?php
/**
 * My Addons widget base
 *
 * @package My_Addons
 */
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

abstract class Base extends Widget_Base {

    /**
     * Get widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        /**
         * Automatically generate widget name from class
         *
         * Card will be card
         * Blog_Card will be blog-card
         */
        $name = str_replace( strtolower(__NAMESPACE__), '', strtolower($this->get_class_name()) );
        $name = str_replace( '_', '-', $name );
        $name = ltrim( $name, '\\' );

        return 'my-' . $name;
    }

    /**
     * Get widget categories.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'my_addons_category' ];
    }

    /**
     * Override from addon to add custom wrapper class.
     *
     * @return string
     */
    protected function get_custom_wrapper_class() {
        return '';
    }

    /**
     * Overriding default function to add custom html class.
     *
     * @return string
     */
    public function get_html_wrapper_class() {
        $html_class = parent::get_html_wrapper_class();
        $html_class .= ' my-addon';
        $html_class .= ' ' . $this->get_name();
        $html_class .= ' ' . $this->get_custom_wrapper_class();
        return rtrim( $html_class );
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {
        do_action( 'myaddons_start_register_controls', $this );

        $this->register_content_controls();

        $this->register_style_controls();

        do_action( 'myaddons_end_register_controls', $this );
	}

    /**
     * Register content controls
     *
     * @return void
     */
    abstract protected function register_content_controls();

    /**
     * Register style controls
     *
     * @return void
     */
    abstract protected function register_style_controls();

}
