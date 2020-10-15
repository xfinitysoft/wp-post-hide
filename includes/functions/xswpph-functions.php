<?php
/*
 * functions of Wordpress Hide Post
 *
 */
// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
* check options table value exit or not
* @param string   $xswpph_value
* @param string    $xswpph_name
*/
function xswpph_check_options($xswpph_value,$xswpph_name)
{
    $xswpph_options = get_option($xswpph_name);
    if( isset( $xswpph_options) && is_array($xswpph_options) ) {
        if( in_array( $xswpph_value , $xswpph_options) ) {
            echo "checked";
        }
    }
}

/**
* Get The Meta data from Post meta
* @param int $post_id;
* @return array $meta_value;
*/

function xswpph_meta_data($post_id) {
    $meta_value = array();
    if( 'page' == get_post_type($post_id) ){
        $meta_key = array(  "_xswpph_all_hidden" , "_xswpph_front_page" ,  "_xswpph_always" , "_xswpph_keep_search"
        );

    } else {
        $meta_key = array(  "_xswpph_all_hidden" , "_xswpph_front_page" , "_xswpph_category_page" ,
         "_xswpph_search" 
        );
    }
    foreach($meta_key as $mkey){
        $meta_value[$mkey] = get_post_meta($post_id , $mkey , true ); 
    }
    return $meta_value;
}
/**
* Setting link plugin
* @param array $xswpph_link
* @return array $xswpph_link
*/
function xswpph_plugin_link($xswpph_link)
{
    $setting_link = '<a href="admin.php?page=xswpph_page">Setting</a>';
    array_unshift( $xswpph_link , $setting_link );
    return $xswpph_link;
}
?>