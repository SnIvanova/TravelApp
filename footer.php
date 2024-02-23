<footer class="bg-light text-center text-lg-start">
  <!-- <div class="container p-4">
    <?php
    if(is_active_sidebar('footer-1')){
      dynamic_sidebar('footer-1');
    }
    ?>
  </div> -->
  <div class="container-fluid">
    <div class="row" >
        <div class="col" >
            <p><?php bloginfo('name'); ?></p>
        </div>
        <div class="col" >

        </div>
        <div class="col" >
        <i class="bi bi-instagram"></i>
        </div>
    </div>
</div>


  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
