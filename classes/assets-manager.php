<?php
namespace MyElementorAddons\Elementor;

defined( 'ABSPATH' ) || die();

class MYEA_Assets_Manager {

    public function __construct() {
        $this->init();
    }

    public function init() {
        add_action( "elementor/frontend/after_enqueue_styles", [$this, 'enqueue_styles'] );
        // add_action( "elementor/frontend/after_enqueue_scripts", [$this, 'enqueue_scripts'] );
    }

    public function enqueue_styles() {
        wp_enqueue_style( 'my-addon', MYEA_ASSETS . 'css/my-addon.css', null, MYEA_VERSION );
    }

}

new MYEA_Assets_Manager();