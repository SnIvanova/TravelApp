
<?php
/*
Template Name: Home
*/
?>


<div id='home'>
<?php get_header(); ?>
<style>
#home {
    background: url('<?php echo get_post_meta(get_the_ID(), 'background_image', true); ?>'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    height: auto;

}

</style>

<div class="container imageBG">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <?php
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
          the_post_thumbnail();
          the_title('<h1 class="card-body text-center text-white my-3">','</h1>');
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
</div>


