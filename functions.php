<?php

add_action( 'wp_enqueue_scripts', 'myclassictheme_child_enqueue_styles' );

function myclassictheme_child_enqueue_styles() {
    wp_enqueue_style(
        'myclassic-theme-child-style',
        get_stylesheet_uri()
    );
}


/**
 * Show Welcome screen on activation
 */
if ( is_admin() ) {
   // require get_template_directory() . '/inc/admin/mychildtheme-welcome-screen.php';
  require get_stylesheet_directory() . '/inc/admin/mychildtheme-welcome-screen.php';
}

// Redirect to welcome page after activation theme
global $pagenow;

    if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) {
        wp_redirect(admin_url('themes.php?page=myclassiccchildtheme-welcome'));
    }
