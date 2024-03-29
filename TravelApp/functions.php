<?php

function theme_setup() {
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    add_image_size('gallery-thumbnail', 600, 400, true);

    add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    add_theme_support('custom-logo', array(
        'height'      => 250, 'width'       => 250,
        'flex-width'  => true, 'flex-height' => true,
    ));

    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'),
        'footer-menu'  => __('Footer Menu'),
        'sidebar-menu' => __('Sidebar Menu'),
    ));
}
add_action( 'after_setup_theme', 'theme_setup' );


function theme_scripts() {
    // Enqueue styles
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );

  
    wp_enqueue_style( 'bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css", array(), '1.11.3' );
   
    // Enqueue scripts
    wp_enqueue_script( 'popper-js', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js', array(), '2.5.2', true );
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery', 'popper-js'), '5.3.0', true );
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom-script.js'); 

    if (is_front_page()) {wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/style/index.css');};
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');
    wp_enqueue_style( 'theme-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'styleGallery', get_template_directory_uri().'/assets/style/gallery.css' );
    wp_enqueue_style( 'styleFooter', get_template_directory_uri().'/assets/style/styleFooter.css' );
    wp_enqueue_style( 'styleContact', get_template_directory_uri().'/assets/style/styleContact.css' );
  
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

//contact page
function register_background_image_field() {
    add_meta_box(
        'background_image_meta_box', // ID del meta box
        'Immagine di sfondo', // Titolo del meta box
        'show_background_image_meta_box', // Funzione per visualizzare il meta box
        'page', // Post type dove mostrare il meta box
        'side', // Posizione del meta box
        'default' // Priorità del meta box
    );
}
add_action('add_meta_boxes', 'register_background_image_field');

function show_background_image_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'background_image_meta_box_nonce');
    $background_image = get_post_meta($post->ID, 'background_image', true);
    
    // Elenco delle immagini predefinite
    $default_images = array(
        get_stylesheet_directory_uri() . '/assets/img/background1.webp',
        get_stylesheet_directory_uri() . '/assets/img/background2.jpg',
        get_stylesheet_directory_uri() . '/assets/img/background3.jpg'
    );
    
    // Mostra l'opzione per caricare un'immagine personalizzata
    echo '<input type="file" name="background_image" value="' . $background_image . '">';

    // Mostra l'elenco delle immagini predefinite
    foreach ($default_images as $image_url) {
        echo '<input type="radio" name="default_background_image" value="' . $image_url . '">';
        echo '<img src="' . $image_url . '" style="width: 200px; height: auto;">';
    }
}


function save_background_image_field($post_id) {
    if (!isset($_POST['background_image_meta_box_nonce']) || !wp_verify_nonce($_POST['background_image_meta_box_nonce'], basename(__FILE__))) {
        return;
    }
    if (isset($_FILES['background_image']) && $_FILES['background_image']['size'] > 0) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $overrides = array('test_form' => false);
        $file = wp_handle_upload($_FILES['background_image'], $overrides);
        if (isset($file['error'])) {
            wp_die('Errore durante il caricamento dell\'immagine: ' . $file['error']);
        } else {
            update_post_meta($post_id, 'background_image', $file['url']);
        }
    }
    
    // Salva l'URL dell'immagine predefinita scelta dall'utente
    if (isset($_POST['default_background_image'])) {
        update_post_meta($post_id, 'background_image', $_POST['default_background_image']);
    }
}

add_action('save_post', 'save_background_image_field');

function theme_customize_register($wp_customize) {
    //contact info
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Contact Info', 'theme-domain'),
        'priority' => 30,
    ));

    // setting for phone number
    $wp_customize->add_setting('phone_number', array(
        'default'   => '+39 345 3324 56789',
        'transport' => 'refresh',
    ));

    // control for phone number
    $wp_customize->add_control('phone_number', array(
        'label'    => __('Phone Number', 'theme-domain'),
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
    $wp_customize->add_setting('social_links[1][url]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('social_links[1][icon]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));    $wp_customize->add_setting('social_links[2][url]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('social_links[2][icon]', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

   
    $wp_customize->add_control('social_links[0][url]', array(
        'label'    => __('Social Link URL', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[0][url]',
        'type'     => 'url',
    ));
    $wp_customize->add_control('social_links[0][icon]', array(
        'label'    => __('Social Link Icon (bi bi-linkedin,  bi bi-facebook, bi bi-instagram, bi bi-whatsapp)', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[0][icon]',
        'type'     => 'text',
    ));
    $wp_customize->add_control('social_links[1][url]', array(
        'label'    => __('Social Link URL', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[1][url]',
        'type'     => 'url',
    ));
    $wp_customize->add_control('social_links[1][icon]', array(
        'label'    => __('Social Link Icon (bi bi-linkedin,  bi bi-facebook, bi bi-instagram, bi bi-whatsapp)', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[1][icon]',
        'type'     => 'text',
    ));
    $wp_customize->add_control('social_links[2][url]', array(
        'label'    => __('Social Link URL', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[2][url]',
        'type'     => 'url',
    ));
    $wp_customize->add_control('social_links[2][icon]', array(
        'label'    => __('Social Link Icon (bi bi-linkedin,  bi bi-facebook, bi bi-instagram, bi bi-whatsapp)', 'theme-domain'),
        'section'  => 'contact_info',
        'settings' => 'social_links[2][icon]',
        'type'     => 'text',
    ));

}

add_action('customize_register', 'theme_customize_register');

function fallback() {
                    echo '<ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Articles</a>
                            </li>
                        </ul>';
                    }     
                    

                    function mytheme_customize_register($wp_customize) {
                        
                        $wp_customize->add_section('gallery_settings', array(
                            'title' => __('Gallery Settings', 'mytheme'),
                            'priority' => 30,
                        ));
                    
                        
                        $wp_customize->add_setting('section_title', array(
                            'default' => __('Nostra Galleria', 'mytheme'),
                            'sanitize_callback' => 'sanitize_text_field',
                        ));
                    
                        $wp_customize->add_control('section_title', array(
                            'label' => __('Section Title', 'mytheme'),
                            'section' => 'gallery_settings',
                            'type' => 'text',
                        ));
                    
                        $wp_customize->add_setting('gallery_title', array(
                            'default' => __('Galleria Turismo e Viaggi.', 'mytheme'),
                            'sanitize_callback' => 'sanitize_text_field',
                        ));
                    
                        $wp_customize->add_control('gallery_title', array(
                            'label' => __('Gallery Title', 'mytheme'),
                            'section' => 'gallery_settings',
                            'type' => 'text',
                        ));
                    
                        $wp_customize->add_setting('gallery_description', array(
                            'default' => __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.', 'mytheme'),
                            'sanitize_callback' => 'sanitize_textarea_field',
                        ));
                    
                        $wp_customize->add_control('gallery_description', array(
                            'label' => __('Gallery Description', 'mytheme'),
                            'section' => 'gallery_settings',
                            'type' => 'textarea',
                        ));
                    }
                    add_action('customize_register', 'mytheme_customize_register');
                    
