<?php
// Exit if directly access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/*
* Template of Wordpress Hide Post
*
*/
function xswpph_support() {
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'report';
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
       <nav class="nav-tab-wrapper wp-clearfix" aria-label="Secondary menu">
            <a class="nav-tab <?php  if($tab =='report' ){ echo 'nav-tab-active'; } ?>" href="?page=xswpph_support&tab=report" class="nav-tab">
                    <?php esc_html_e( 'Report a bug' , 'xswpph-domain' ); ?>
            </a>
            <a class="nav-tab <?php  if($tab =='request' ){ echo 'nav-tab-active'; } ?>" href="?page=xswpph_support&tab=request" class="nav-tab">
                    <?php esc_html_e( 'Request a Feature' , 'xswpph-domain' ); ?>
            </a>
            <a class="nav-tab <?php  if($tab =='hire' ){ echo 'nav-tab-active'; } ?>" href="?page=xswpph_support&tab=hire" class="nav-tab">
                    <?php esc_html_e( 'Hire US' , 'xswpph-domain' ); ?>
            </a>
            <a class="nav-tab <?php  if($tab =='review' ){ echo 'nav-tab-active'; } ?>" href="?page=xswpph_support&tab=review" class="nav-tab">
                    <?php esc_html_e( 'Review' , 'xswpph-domain' ); ?>
            </a>

        </nav>
        <div class="tab-content">
            <?php switch ($tab) {
                case 'report':
                    ?>
                    <div class="xs-send-email-notice xswpph-top-margin">
                        <p></p>
                        <button type="button" class="notice-dismiss xs-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e('Dismiss this notice.','xswpph-domain');?></span></button>
                    </div>
                    <form method="post" class="xswpph_support_form">
                        <input type="hidden" name="type" value="report">
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th>
                                        <label for='xswpph_name'><?php esc_html_e('Your Name:', 'xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="text" id="xswpph_name" name="xswpph_name" required="required">
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_email"><?php esc_html_e('Your Email:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="email" id="xswpph_email" name="xswpph_email" required="required">
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_message"><?php esc_html_e('Message:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <textarea id="xswpph_message" name="xswpph_message" rows="12", cols="47" required="required"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="input-group">
                            <?php submit_button(__( 'Send', 'xswpph-domain' ), 'primary xswpph-send-mail'); ?>
                            <span class="spinner xswpph-mail-spinner"></span> 
                        </div>
                    </form>
                    <?php
                    break;
                case 'request':
                    ?>
                    <div class="xs-send-email-notice xswpph-top-margin">
                        <p></p>
                        <button type="button" class="notice-dismiss xs-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e('Dismiss this notice.','xswpph-domain');?></span></button>
                    </div>
                    <form method="post" class="xswpph_support_form">
                        <input type="hidden" name="type" value="request">
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th>
                                        <label for='xswpph_name'><?php esc_html_e('Your Name:', 'xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="text" id="xswpph_name" name="xswpph_name" required>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_email"><?php esc_html_e('Your Email:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="email" id="xswpph_email" name="xswpph_email" required>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_message"><?php esc_html_e('Message:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <textarea id="xswpph_message" name="xswpph_message" rows="12", cols="47" required></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="input-group">
                            <?php submit_button(__( 'Send', 'xswpph-domain' ), 'primary xswpph-send-mail'); ?>
                            <span class="spinner xswpph-mail-spinner"></span> 
                        </div>
                    </form>
                    <?php
                    break;
                case 'hire':
                    ?>
                    <h2 class="xswpph-top-margin"><?php esc_html_e("Hire us for Customization and Development of WordPress Plugins and Themes." , 'xswpph-domain') ?></h2>
                    <div class="xs-send-email-notice">
                        <p></p>
                        <button type="button" class="notice-dismiss xs-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e('Dismiss this notice.','xswpph-domain');?></span></button>
                    </div>
                    <form method="post" class="xswpph_support_form">
                        <input type="hidden" name="type" value="hire">
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th>
                                        <label for='xswpph_name'><?php esc_html_e('Your Name:', 'xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="text" id="xswpph_name" name="xswpph_name" required="required">
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_email"><?php esc_html_e('Your Email:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <input type="email" id="xswpph_email" name="xswpph_email" required="required">
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <th>
                                        <label for="xswpph_message"><?php esc_html_e('Message:','xswpph-domain'); ?></label>
                                    </th>
                                    <td>
                                        <textarea id="xswpph_message" name="xswpph_message" rows="12", cols="47" required="required"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="input-group">
                            <?php submit_button(__( 'Send', 'xswpph-domain' ), 'primary xswpph-send-mail'); ?>
                            <span class="spinner xswpph-mail-spinner"></span> 
                        </div>
                    </form>
                    <?php
                    break;
                case 'review':
                ?>
                    <p class="about-description xswpph-top-margin"><?php esc_html_e("If you like our plugin and support than kindly share your  " , 'xswpph-domain') ?> <a href="https://wordpress.org/plugins/wp-post-hide/#reviews" target="_blank"> <?php esc_html_e("feedback" , 'xswpph-domain') ?> </a><?php esc_html_e("Your feedback is valuable." , 'xswpph-domain') ?> </p>
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
