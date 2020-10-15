<?php
// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
* Initialization of WP Post Hide
* @class XSWPPH_Init
* @since 1.0.0
*
*/
class XSWPPH_Init {

	/**
	* Add menu page of  WP Post Hide  
	* @param NULL
	* @return NULL
	*/
	public static function xswpph_admin_menu() {
		add_menu_page( 
			esc_html__( 'WP Post Hide' , 'xswpph-domain' ), 
			esc_html__( 'WP Post Hide' , 'xswpph-domain'  ), 
			'manage_options' ,
			'xswpph_page' ,
			'xswpph_page' ,
			'dashicons-admin-settings',
			40
		);
	}

	/**
	* Load The Css and jQuery
	* @param NULL
	* @return NULL
	*/
	public static function xswpph_load_css_js() {
		wp_register_style( 'xswpph-styles' , plugins_url( "xs-wp-post-hide/assets/css/xswpph-style.css" ) ) ;
		wp_register_script( 'xswpph-scripts' , plugins_url( "xs-wp-post-hide/assets/js/xswpph-script.js" ) ) ;
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'xswpph-styles' );
		wp_enqueue_script('xswpph-scripts');
	}

	/**
    * Register the setting Fields options
    * @param NULL
	* @return NULL
    **/
    public static function xswpph_register_settings() {
        register_setting( 'xswpph_options' , 'xswpph_post_types' );
        register_setting( 'xswpph_options' , 'xswpph_enable' );
    }

    /**
    * Load the text domain
    *
    */
    public static function xswpph_load_textdomain() {
        load_plugin_textdomain( 'xswpph-domain' , false , dirname( XSWPPH_BASENAME ) . '/languages' );
    }

    /**
    * add meta box
    * @param NULL
	* @return NULL
    * 
    */
    public static function xswpph_add_meta_box(){
    	$xs_options = get_option('xswpph_post_types');
    	if( isset($xs_options) && !empty($xs_options) ) {
    		foreach( $xs_options as $xs_key) {
    			if( $xs_key == 'page'){
    				$xswpph_callback =  "xswpph_pagebox_callback";
    			}else{ 
    				$xswpph_callback =	 "xswpph_postbox_callback";
    			} 

    			add_meta_box(
    				"xswpph_meta_box" ,
    				esc_html__( "Post Visibility" , 'xswpph-domain'  ),
    				$xswpph_callback,
    				$xs_key ,
    				"side"
    			);
    		}
    	}
    }


    /**
    * Save the Meta Box data
    * @param integer $post_id
    * @return Null
    */
    public static function xswpph_save_meta_data( $post_id ,$post) {
    	// Do nothing during a bulk edit
    	if (isset($_REQUEST['bulk_edit']))
        return;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
			return;
		}
    	if( 'page' == $post->post_type ){
    		$meta_key = array(  "_xswpph_all_hidden" , "_xswpph_front_page" ,  "_xswpph_always" , "_xswpph_keep_search"
	    	);

    	} else {
	    	$meta_key = array(  "_xswpph_all_hidden" , "_xswpph_front_page" , "_xswpph_category_page" ,
	    		"_xswpph_search" 
	    	);
    	}

    	foreach( $meta_key as $mkey ) {
    		if( isset( $_POST["xswpph"][$mkey] ) ) {
    			$val = sanitize_text_field($_POST["xswpph"][$mkey]);
    			update_post_meta( $post_id , $mkey , $val );
    		} else {
    			update_post_meta( $post_id , $mkey , '' );
    		}
    	}

	    
	}

	/**
	* Method For front end hidden
	*
	*
	*/
	public static function xswpph_hidden_posts_pages( $query ) {

		if( !is_admin() ) {
		
			if( ( function_exists( 'is_home' ) && is_home() ) || ( function_exists( 'is_front_page' ) && is_front_page() ) ) {
				$xswpph_posts = self::xswpph_database_query( "_xswpph_front_page" , "Front Page" );
				$xswpph_pages = self::xswpph_database_query( "_xswpph_always","Always" ) ;
				$wphp_hidden  = array_merge( $xswpph_posts , $xswpph_pages );

				$xswpph_pages = self::xswpph_database_query( "_xswpph_keep_search" , "_xswpph_keep_search" );
				$wphp_hidden = array_merge( $wphp_hidden , $xswpph_pages );

				$query->set('post__not_in', $wphp_hidden);
		  	}

		  	if ( $query->is_search() ) {
				$xswpph_posts = self::xswpph_database_query( "_xswpph_search" , "Search Results" );
				$xswpph_pages = self::xswpph_database_query( "_xswpph_always" , "Always" ) ;
				$wphp_hidden  = array_merge( $xswpph_posts, $xswpph_pages );
				$query->set('post__not_in', $wphp_hidden);
		  	}

		  	if ( $query->is_category() ) {
				$xswpph_posts = self::xswpph_database_query( "_xswpph_category_page" , "Category Pages");
				$xswpph_pages = self::xswpph_database_query( "_xswpph_always","Always" ) ;
				$wphp_hidden  = array_merge( $xswpph_posts , $xswpph_pages );

				$xswpph_pages = self::xswpph_database_query( "_xswpph_keep_search" , "_xswpph_keep_search" );
				$wphp_hidden = array_merge( $wphp_hidden , $xswpph_pages );

				$query->set('post__not_in', $wphp_hidden);
		  	}
		}

	}

	/**
	*Get The hidden Ids by meta key and meta Value
	* @param String $meta_key 
	* @param string $meta_value
	* @return array $ids
	*/
	public static function xswpph_database_query( $meta_key , $meta_value ) {
		global $wpdb;
		$post_ids = array();
		$xswpph_query = $wpdb->get_results("select post_id from $wpdb->postmeta where meta_key='".$meta_key."' AND meta_value = '".$meta_value."'" );
				foreach( $xswpph_query as $xswpph_val ) {
					$post_ids[] = $xswpph_val->post_id;
				}
		return $post_ids;
	}
	
}
?>