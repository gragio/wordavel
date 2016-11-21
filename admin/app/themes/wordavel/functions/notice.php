<?php
function html5blank_admin_notice__success() {
    $notice = "<p><strong>Configure html5blank Themes!</strong></p>
     <ul class='notice_conf'>
        <li>Google Tag Manager, <a href='/wp-admin/customize.php'>click here</a></li>
     </ul>";

    ?>
    <style>
    .notice_conf {
        list-style: circle;
        margin-left: 3em;
    }
    </style>
    <div class="notice notice-info is-dismissible">
        <p><?php _e($notice, 'html5blank' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'html5blank_admin_notice__success' );
