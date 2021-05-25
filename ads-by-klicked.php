<?php
/*
Plugin Name: Ads by Klicked
Plugin URI: https://klicked.com
Description: Ad system for Klicked Media.
Version: 1.0.0
Author: Tyler Johnson
Author URI: http://tylerjohnsondesign.com/
Copyright: Tyler Johnson
Text Domain: adsklicked
Copyright © 2021 WP Developers. All Rights Reserved.
*/

/**
 * Disallow Direct Access to Plugin File
 */
if( !defined( 'WPINC' ) ) { die; }

/**
 * Constants 
 */
define( 'ADS_VERSION', '0.0.001' );
define( 'ADS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'ADS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Load.
 */
class klickedAds {

    /**
     * Construct.
     */
    public function __construct() {

        // Load.
        $this->load();

    }

    /** 
     * Load.
     */
    public function load() {

        // Classes.
        require_once( ADS_PATH . 'inc/class-api.php' );
        require_once( ADS_PATH . 'inc/class-cpt.php' );
        require_once( ADS_PATH . 'inc/class-meta.php' );

    }

}
new klickedAds;
