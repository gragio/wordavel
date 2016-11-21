<?php
// Remove Images pages WP
function sar_attachment_redirect() {
	global $post;
	if ( is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent != 0) ) {
		wp_redirect(get_permalink($post->post_parent), 301); // permanent redirect to post/page where image or document was uploaded
		exit;
	} elseif ( is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent < 1) ) {   // for some reason it doesnt works checking for 0, so checking lower than 1 instead...
		wp_redirect(get_bloginfo('wpurl'), 302); // temp redirect to home for image or document not associated to any post/page
		exit;
    } elseif(is_singular('franchising')) {
      wp_redirect(get_post_type_archive_link($post->post_type), 301); // permanent redirect to post/page where image or document was uploaded
    }
}

add_action('template_redirect', 'sar_attachment_redirect',1);

// Disable srcset in images WP for EDGE
function meks_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );
