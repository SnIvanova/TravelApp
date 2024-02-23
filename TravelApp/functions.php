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

    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );
    wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/style.css');

   // wp_enqueue_style( 'theme-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css", array(), '1.11.3' );
   // wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/path/to/popper.min.js', array(), '1.16.0', true );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery', 'popper-js'), '5.3.0', true );

    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom-script.js'); 
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth > 0) {
            return;
        }
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }
        elseif (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }

        if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }
        elseif (strcasecmp($item->title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }

        parent::start_el($output, $item, $depth, $args);
    }
}

// Funzione che serve per registrare i menu diponibili per il template
function register_menus() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'your-theme-domain'),
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu'  => __( 'Footer Menu'),
            'sidebar-menu'  => __( 'Sidebar Menu'),
        )
    );
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}

add_action('init', 'register_menus');

// Ability to add classes to wp_nav_menu LI tags

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class))
    {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
 
// A tags

add_filter( 'nav_menu_link_attributes', 'add_link_atts');

function add_link_atts($atts) 
{ 
     $atts['class'] = "nav-link"; 
     return $atts;
}


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



function theme_customize_register($wp_customize) {
    //contact info
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Contact Info', 'your-theme-domain'),
        'priority' => 30,
    ));

    // setting for phone number
    $wp_customize->add_setting('phone_number', array(
        'default'   => '+39 345 3324 56789',
        'transport' => 'refresh',
    ));

    // control for phone number
    $wp_customize->add_control('phone_number', array(
        'label'    => __('Phone Number', 'your-theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'phone_number',
        'type'     => 'text',
    ));

     
    $wp_customize->add_setting('social_links[0][url]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('social_links[0][icon]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

   
    $wp_customize->add_control('social_links[0][url]', array(
        'label'    => __('Social Link URL', 'TravelApp'),
        'section'  => 'contact_info',
        'settings' => 'social_links[0][url]',
        'type'     => 'url',
    ));
    $wp_customize->add_control('social_links[0][icon]', array(
        'label'    => __('Social Link Icon (bi bi-linkedin,  bi bi-facebook, bi bi-instagram, bi bi-whatsapp)', 'TravelApp'),
        'section'  => 'contact_info',
        'settings' => 'social_links[0][icon]',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'theme_customize_register');



