<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <!-- Include Bootstrap CSS from a CDN or your local copy -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Optional: include a custom CSS file for further customization -->
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
</head>
<body <?php body_class(); ?>>
<!-- Top Bar -->
<div class="bg-dark text-white py-1 sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="phone"><?php echo get_theme_mod('phone_number', '+39 345 3324 56789'); ?></div>
                <div class="social d-flex">
                    <?php
                    $social_links = get_theme_mod('social_links', array());
                    foreach ($social_links as $link) {
                        if (!empty($link['url']) && !empty($link['icon'])) {
                            echo '<a href="' . esc_url($link['url']) . '" class="text-white me-2"><i class="fa ' . esc_attr($link['icon']) . '"></i></a>';
                        }
                    }
                    ?>
                </div>
                <div class="user-links">
                    <a href="#" class="text-white me-2">Login</a>
                    <a href="#" class="text-white">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- nav Bar -->
<header id="masthead" class="site-header sticky-top" role="banner">
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-opacity-25 p-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 2,
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page-contacts.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Articles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <div class="main-wrapper">
	    <!-- <header class="page-title theme-bg-light text-center gradient py-5">
			<h1 class="heading"><?php the_title(); ?></h1>
		</header> -->
 


    
    
