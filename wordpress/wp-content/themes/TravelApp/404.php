<?php get_header(); // hook di WP per elaborare ed includere il file header.php ?>

<div class="container text-center">
        <div class="row">
            <div class="col-8">

                <img src="https://app.spline.design/community/file/87abfd99-25df-4ee2-95c2-c2fd347da678">
                <h1 class="text-center mt-5">404 Page: Not Found</h1>
                <div class="page-wrapper">

				<div class="page-content">
					<h2><?php _e( 'Sembra imbarazzante... non sei riuscito a trovare ciò che stai cercando?', 'TravelApp' ); ?></h2>
					<p><?php _e( 'Sembra che non sia stata trovata la pagina che stavi cercando, perché non provi a ricercare?', 'TravellApp' ); ?></p>
                    
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

            </div>
            <div class="col-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
</div>


<?php get_footer(); // hook di WP per elaborare ed includere il file footer.php ?>