<?php get_header(); // hook di WP per elaborare ed includere il file header.php ?>


      

            <div class="container-fluid bg-black"> 
                <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.53/build/spline-viewer.js"></script>
                <spline-viewer url="https://prod.spline.design/UaSUm-MX2mReSaO8/scene.splinecode"></spline-viewer>
            </div>
            <div class="container-fluid text-center bg-black">                
                <h1 class="text-center text-white">404 Page: Not Found</h1>
                <div class="page-wrapper">

				
					<h2 class="text-white"><?php _e( 'Sembra imbarazzante... non sei riuscito a trovare ciò che stai cercando?', 'TravelApp' ); ?></h2>
					<p class="text-white"><?php _e( 'Sembra che non sia stata trovata la pagina che stavi cercando, perché non provi a ricercare?', 'TravellApp' ); ?></p>
                    
					<?php get_search_form(); ?>
				
			

            
           
        
</div>

<div class="container-fluid mt-5 footer text-center p-5">
        <p class="text-white">&copy; 2024 TraveApp. All rights reserved.</p>
<div>