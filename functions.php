<?php

/* Theme Setup */
/* --------------------------------------------- */
if (!function_exists( 'latodolce_setup' )){
    function latodolce_setup() {

        add_theme_support( 'title-tag' );

        // Enable automatic feed links
        add_theme_support( 'automatic-feed_link' );

        // Enable featured images
        add_theme_support( 'post-thumbnails' );
        
        // Thumbnail sizes
        add_image_size( 'latodolce-single', 800, 493, true );
        add_image_size( 'latodolce-big', 1400, 928, true );

        // Custom menu areas
        register_nav_menus( array(
            'header' => esc_html__( 'Header', 'latodolce' )
        ) );

        // Load theme languages
        load_theme_textdomain( 'latodolce', get_template_directory(  ).'/languages' );
    }
}
add_action( 'after_setup_theme', 'latodolce_setup' );

/* Register sidebars */
/* --------------------------------------------- */
if (!function_exists( 'latodolce_sidebars' )) {
    function latodolce_sidebars() {
        register_sidebar( array( 
            'name' => esc_html__( 'Primary', 'latodolce' ),
            'id' => 'primary',
            'description' => esc_html__( 'Full sidebar', 'latodolce' ),
            'before_widget' => '<div id="%1$s" class="widget  %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        ) );
    }
}
add_action( 'widgets_init', 'latodolce_sidebars' );

/* Include styles and script */
/* --------------------------------------------- */
if (!function_exists( 'latodolce_styles_scripts' )) {
    function latodolce_styles_scripts() {

        // Custom scripts
        wp_enqueue_script( 'latodolce-scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'), '', true );

        // Font
        wp_enqueue_style( 'latodolce-sourcesanspro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' );

        // Reset css
        wp_enqueue_style( 'latodolce-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css' );
        // Custom styles
        wp_enqueue_style( 'latodolce', get_template_directory_uri().'/style.css' );

    }
}
add_action( 'wp_enqueue_scripts', 'latodolce_styles_scripts' );

/* Oembed responsive */
/* --------------------------------------------- */
add_filter( 'embed_oembed_html', 'latodolce_oembed_filter', 10, 4 );
function latodolce_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<figure class="video-container"'.$html.'</figure>';
    return $return;
}

?>