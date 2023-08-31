<?php
// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/*
* Template of Wordpress Hide Post
*
*/
function xswpph_page() {
    $tab = isset($_GET['tab'])? $_GET['tab'] : 'settings';
?>
    <div class="warp">
	    <div id="icon-options-general" class="icon32"></div>
	    <h1>
            <?php esc_html_e('WP Post Hide' , 'xswpph-domain') ?>
            <a class="xswpph-pro-link" href="https://codecanyon.net/item/wordpress-hide-post/24141817?s_rank=2" target="_blank">
                <div class="xswpph-button-main">
                    <?php submit_button(esc_html__("Pro Version" , 'xswpph-domain' ), 'secondary' , "xswpph-button"); ?>
                </div>
            </a>
        </h1>
        
        <?php settings_errors(); ?>
        <nav class="nav-tab-wrapper wp-clearfix" aria-label="Secondary menu">
	        <a class="nav-tab <?php  if($tab =='settings' ){ echo 'nav-tab-active'; } ?>" href="?page=xswpph_page&tab=settings" class="nav-tab">
                    <?php esc_html_e( 'Settings' , 'xswpph-domain' ); ?>
            </a>
   		</nav>
        <div class="tab-content">
            <?php switch ($tab) {
                case 'settings':
                    ?>
                    <form method="post" action="options.php">
                    	<?php 
                    	settings_fields('xswpph_options') ;
                        do_settings_sections('xswpph_options') ;
                        ?>
                        <div class="xswpph-col">
                        	<h3>
                        		<?php
                        		 esc_html_e( 'Please Check the Post Types you include this functonality' , 'xswpph-domain' ); 
                        		?> 
                        	</h3>
                        	<table class="form-table xswpph-form">
                                <tbody>
                                    <input type="checkbox" class="xswpph-posts">&nbsp;<?php esc_html_e( 'All Check/Uncheck' , 'xswpph-domain' ); ?>
                                        <tr valign="top">
                                            <td>
                                                <input type="checkbox" name="xswpph_post_types[]" class="xswpph-post"
                                                value="post"
                                                <?php xswpph_check_options( 'post' , 'xswpph_post_types'); ?>
                                                >&nbsp; <?php esc_html_e( 'Posts' , 'xswpph-domain' ) ?>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td>
                                                <input type="checkbox" name="xswpph_post_types[]" class="xswpph-post"
                                                value="page"
                                                <?php xswpph_check_options( 'page' , 'xswpph_post_types'); ?>
                                                >&nbsp;<?php esc_html_e( 'Pages' , 'xswpph-domain' ) ?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="xswpph-col">
                            <table class="form-table">
                                <tbody>
                                    <tr valign="top">
                                        <td>
                                            <?php submit_button(); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    	</div>
                    </form>
                    <?php
                break;
                default:
                break;
            }
            ?>
        </div>
    </div>
<?php
}
?>