<?php
/**
 * WP Post Hide Setup 
 * @package Wordpress Hide Post lite Setup
 * @since 0.0.1
*/

// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main Class of Wordpress Hide Post  lite
 * @class XSWPPH_Main
 * @since 0.0.1
 */
class XSWPPH_Main {
	// The single instance of class

    protected static $xswpph_instance = null;

    /**
    * main instance function of /**
    * @return object
    */

    public static function xswpph_instance() {
        if ( is_null( self::$xswpph_instance ) ) {
            self::$xswpph_instance = new self();
        }
        return self::$xswpph_instance;
    }

    /**
    * Wphplite Constructor
    */
    public function __construct() {
        $this->xswpph_define_constants();
        $this->xswpph_init_hooks();
		$this->xswpph_includes();
    }

    /**
    * Define the plugin constants
    */
    function xswpph_define_constants() {
    	define( 'XSWPPH_ABSPATH' , dirname( XSWPPH_PLUGIN_FILE ) );
        define( 'XSWPPH_BASENAME' , plugin_basename( XSWPPH_PLUGIN_FILE ) );
    }

    /**
    * Hooks into actions and filters
    *
    */
    function xswpph_init_hooks() {
    	
    	add_action( 'admin_menu' , array( 'XSWPPH_Init' , 'xswpph_admin_menu') );
        add_action( 'admin_init' , array( 'XSWPPH_Init' , 'xswpph_register_settings') );
        add_action( 'init' , array( 'XSWPPH_Init' , 'xswpph_load_textdomain') );
        add_action( 'admin_enqueue_scripts' , array( 'XSWPPH_Init' , 'xswpph_load_css_js' ) );
        add_filter( 'plugin_action_links_' . XSWPPH_BASENAME , 'xswpph_plugin_link');
        add_action( 'add_meta_boxes', array( 'XSWPPH_Init' , 'xswpph_add_meta_box' ) );
        add_action( 'save_post' , array( 'XSWPPH_Init' , 'xswpph_save_meta_data'), 10,3  );
        add_action( 'pre_get_posts' , array( 'XSWPPH_Init' , 'xswpph_hidden_posts_pages') );
        add_action( 'wp_ajax_xswpph_send_mail' ,array('XSWPPH_Init','xswpph_send_mail'));
    }

    /**
    * Includes the files
    */
    function xswpph_includes() {
        include_once XSWPPH_ABSPATH . '/templates/views/xswpph-metaboxes.php';
        include_once XSWPPH_ABSPATH . '/includes/functions/xswpph-functions.php';
    	include_once XSWPPH_ABSPATH . '/includes/classes/class-xswpph-init.php';
        include_once XSWPPH_ABSPATH . '/templates/xswpph-page.php';
        include_once XSWPPH_ABSPATH . '/templates/xswpph-support.php';
        
    }
    
}
?>