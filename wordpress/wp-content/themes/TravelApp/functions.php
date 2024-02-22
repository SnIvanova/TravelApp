<?php

function theme_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'theme-text-domain' ),
        'footer'  => esc_html__( 'Footer Menu', 'theme-text-domain' ),
    ) );

   
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

   
    add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
}
add_action( 'after_setup_theme', 'theme_setup' );


function theme_scripts() {

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'theme-style', get_stylesheet_uri().'/style.css' );

   // wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/path/to/popper.min.js', array(), '1.16.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery', 'popper-js'), '4.5.0', true );

    //wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer', 'theme-text-domain' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'theme-text-domain' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );


require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

add_theme_support( 'customize-selective-refresh-widgets' );
