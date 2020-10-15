<?php
// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
* For Post meta Box callback
* @param object $post
* @return Null
*/
function xswpph_postbox_callback($post){
	$xswpph = xswpph_meta_data($post->ID ) ;
	?>
	<fieldset class="inline-edit-col-left xswpph-col-quick">
		<div class="inline-edit-group">
			<label>
				<input class ="xswpph-posts" type="checkbox" name="xswpph[_xswpph_all_hidden]" value="All Hidden" <?php esc_html_e ( ( isset($xswpph["_xswpph_all_hidden"] ) && ( $xswpph["_xswpph_all_hidden"] != '' ) ) ? "Checked" : '' ); ?> />
				<span><?php esc_html_e( "All Check/Uncheck" , 'xswpph-domain' ); ?></span>
			</label><br>
			<label class="alignleft">
				<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_front_page]" value="Front Page" <?php esc_html_e( ( isset($xswpph["_xswpph_front_page"] ) && ( $xswpph["_xswpph_front_page"] != '' ) ) ? "Checked" : '' ); ?> />
		    	<span class="xswpph-quick-span">
		    		<?php esc_html_e( "Hide from Front Page" , 'xswpph-domain' ); ?>
		    	</span>
	    	</label>
	    	<label class="alignleft">
		    	<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_category_page]" value="Category Pages" <?php esc_html_e( ( isset($xswpph["_xswpph_category_page"] ) && ( $xswpph["_xswpph_category_page"] != '' ) ) ? "Checked" : '' ); ?> />
		    	<span class="xswpph-quick-span">
		    		<?php esc_html_e( "Hide from Category Pages" , 'xswpph-domain' ); ?>
		    	</span>
	    	</label>
	    	<label class="alignleft">
		    	<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_search]" value="Search Results" <?php esc_html_e( ( isset($xswpph["_xswpph_search"] ) && ( $xswpph["_xswpph_search"] != '' ) ) ? "Checked" : '' ); ?> />
		    	<span class="xswpph-quick-span">
		    		<?php esc_html_e( "Hide from Search Pages" , 'xswpph-domain' ); ?>
		    	</span>
	    	</label>
    	</div>
	</fieldset>
	<?php
}

/**
* For page metabox callback
* @param object $post
* @return Null
*/
function xswpph_pagebox_callback($post){
	$xswpph = xswpph_meta_data($post->ID );
	?>
	<h3>
		<input class ="xswpph-posts" type="checkbox" name="xswpph[_xswpph_all_hidden]" value="All Hidden" <?php esc_html_e( ( isset($xswpph["_xswpph_all_hidden"] ) && ( $xswpph["_xswpph_all_hidden"] != '' ) ) ? "Checked" : ''); ?> />
		<label><?php esc_html_e( "All Check/Uncheck" , 'xswpph-domain' ); ?></label>
	</h3>
	<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_front_page]" value="Front Page" <?php esc_html_e( ( isset($xswpph["_xswpph_front_page"] ) && ( $xswpph["_xswpph_front_page"] != '' ) ) ? "Checked" : ''); ?> />
	<label>
		<?php esc_html_e( "Hide from listing of pages in Front Page" , 'xswpph-domain' ); ?>
	</label><br>
	<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_always]" value="Always" <?php esc_html_e ( ( isset($xswpph["_xswpph_always"] ) && ( $xswpph["_xswpph_always"] != '' ) ) ? "Checked" : '' ); ?> />
	<label>
		<?php esc_html_e( "Hide form pages list everywhere" , 'xswpph-domain' ); ?>
	</label><br>
	<input class="xswpph-post" type="checkbox" name="xswpph[_xswpph_keep_search]" value="Hide but keep in Search" <?php esc_html_e( ( isset($xswpph["_xswpph_keep_search"] ) && ( $xswpph["_xswpph_keep_search"] != '' ) ) ? "Checked" : '' ); ?> />
	<label>
		<?php esc_html_e( "Hide but keep in Search" , 'xswpph-domain' ); ?>
	</label><br>
    <?php
}
?>