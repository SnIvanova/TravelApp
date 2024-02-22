<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
    <div class="container">
      
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'theme-text-domain'); ?>">
          <span class="navbar-toggler-icon"></span>
      </button>
      <?php
      wp_nav_menu(array(
          'theme_location'  => 'primary',
          'depth'           => 2, 
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'nav navbar-nav',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
      ));
      ?>
    </div>
  </nav>
</header>
