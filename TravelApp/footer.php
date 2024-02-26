<footer >
  <!-- <div class="container p-4">
    <?php
    if(is_active_sidebar('footer-1')){
      dynamic_sidebar('footer-1');
    }
    ?>
  </div> -->
  <div class="container-fluid">
    <div class="row  mx-5 align-items-baseline " >
        <div class="col-md-4  col-lg-4 text-center c1" >
           <a class="text-white" href="index.php"><?php bloginfo('name'); ?></a>
        </div>
        <div class="col-md-4 col-lg-4 text-center c2" >
          <a class="mx-2 text-white" href="">Events</a><a class="mx-2 text-white" href="">FAQs</a><a class="mx-2 text-white" href="">The Team</a>
        </div>
        <div class="col-md-4 col-lg-4 justify-content-center d-flex di" >
        <p class="mx-2" ><i class="bi bi-instagram text-white"></i></p> <p class="mx-2"><i class="bi bi-facebook text-white"></i></p><p class="mx-2"><i class="bi bi-youtube text-white"></i></p><p class="mx-2"><i class="bi bi-discord text-white"></i></p>
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
