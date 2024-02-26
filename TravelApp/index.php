<?php get_header(); ?>

<div class="container imageBG">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
          the_post_thumbnail();
          the_title('<h1 class="card-body text-center my-3">','</h1>');
          the_content();
        endwhile;
      else :
        _e('Sorry, no posts matched your criteria.', 'textdomain');
      endif;
      ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
