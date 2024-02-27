<?php

 get_header(); ?>
 	<div id="main-content" class="main-content">
 		<div id="content" class="content-area" role="main">

    <div class='container my-5'>
        <?php the_content(); ?>
        
        <div class='my-5'>
        <?php
        if (have_posts()) :
            // Start the Loop.
            while (have_posts()) : the_post();
                get_template_part( 'content', get_post_format() );
                if ( comments_open() || get_comments_number() ) {?>
                    <div class=""><?=comments_template()?></div>
                    <?php }
            endwhile;
            else :
                get_template_part( 'content', 'none' );
            endif;
        ?>
        </div>

        <div class="container">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            <h4 class='my-3'><?php echo __('About ') . get_the_author_meta( 'display_name' ); ?></h4>
            <p>
                <?php the_author_meta( 'description' ); ?><br />
            </p>
        </div>
    </div>

<?php get_footer(); ?>