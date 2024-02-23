<?php
/*
Template Name: Gallery
*/

get_header(); ?>

<div class="container gallery-page">
    <?php if( have_rows('gallery') ): ?>
        <div class="row">
            <?php while( have_rows('gallery') ): the_row(); 
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                ?>
                <div class="col-md-4 mb-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-3">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid w-100" style="min-height: 300px; object-fit: cover;">
                        <div class="gallery-content position-absolute w-100 h-100" style="bottom: 0; left: 0; padding: 15px; background: rgba(0, 0, 0, 0.3); display: flex; flex-direction: column; justify-content: end; transition: 0.5s;">
                            <div class="gallery-info" style="margin-bottom: -100%; opacity: 0; transition: 0.5s;">
                                <h5 class="text-white text-uppercase mb-2"><?php echo esc_html($title); ?></h5>
                                <p class="text-white"><?php echo esc_html($description); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No gallery images found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
