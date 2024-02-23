<footer >
  <!-- <div class="container p-4">
    <?php
    if(is_active_sidebar('footer-1')){
      dynamic_sidebar('footer-1');
    }
    ?>
  </div> -->
  
    <div class="position-relative" >
    <img class="hi" src="wp-content\themes\TravelApp\TravelApp\assets\img\Fimg.png" alt="">
      <div class="position-absolute top-0 start-50 translate-middle-x" >
        <p class="text-white" >
          Il tuo viaggio virtuale inizia qui
        </p>
      </div>
    </div>

  <div class=" container-fluid">
    <div class="row mx-5 align-items-baseline " >
        <div class="col-md-4 col-lg-4 text-center c1" >
           <a href="index.php"><?php bloginfo('name'); ?></a>
        </div>
        <div class="col-md-4 col-lg-4 text-center c2" >
          <a class="mx-2" href="">Events</a><a class="mx-2" href="">FAQs</a><a class="mx-2" href="">The Team</a>
        </div>
        <div class="col-md-4 col-lg-4 justify-content-center d-flex di" >
        <p class="mx-2" ><i class="bi bi-instagram"></i></p> <p class="mx-2"><i class="bi bi-facebook"></i></p><p class="mx-2"><i class="bi bi-youtube"></i></p><p class="mx-2"><i class="bi bi-discord"></i></p>
        </div>
    </div>
</div>


  <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </div> -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
