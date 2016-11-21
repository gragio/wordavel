<?php

function wordavel_header_scripts() {
    $path = path('js');
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', $path . "/main.js", array(), '1.0.0', true); // Main JS Themes + Lib jquery
    }
}

add_action('init', 'wordavel_header_scripts'); // Add Custom Scripts to wp_head

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( &$scripts) {
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}
