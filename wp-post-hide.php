<?php
/**
 * Plugin Name: WP Post Hide
 * Description: Control the visibility of post type items like pages and posts .Hidden in specific part.But other part still visible.
 * Plugin URI:http://www.xfinitysoft.com/wordpress-post-hide/
 * Version: 1.0.8
 * Author:Xfinity Soft
 * Author URI:http://www.xfinitysoft.com/
 * Text Domain:xswpph-domain
 * Domain Path: /languages
*/

// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Define  XSWPPH_PLUGIN_FILE
if ( ! defined( 'XSWPPH_PLUGIN_FILE' ) ) {
    define( 'XSWPPH_PLUGIN_FILE' , __FILE__ );
}

// Includes main class of wphp
if ( ! class_exists( 'XSWPPH_Main' ) ) {
    include_once dirname( __FILE__ ) . '/includes/classes/class-xswpph-main.php';
}

/**
 * Main instance of XSWPPH_Main.
 *
 * Returns the main instance of XSWPPH_Main to prevent the need to use globals.
 *
 *
 * @return XSWPPH_Main
 */
function xswpph_main() {
	return XSWPPH_Main::xswpph_instance();
}

// Global for backwards compatibility.
$GLOBALS['xs-wp-post-hide'] = xswpph_main();
?>
