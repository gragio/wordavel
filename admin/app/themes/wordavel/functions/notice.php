<?php
function wordavel_admin_notice__success() {
    $notice = "<p><strong>Configure Wordavel Themes!</strong></p>
     <ul class='notice_conf'>
        <li>Google Tag Manager, <a href='customize.php'>click here</a></li>
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
add_action( 'admin_notices', 'wordavel_admin_notice__success' );
