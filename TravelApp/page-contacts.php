<?php
/*
Template Name: Contacts
*/
?>
<div id='contenitore'>
<style>
#contenitore {
    background: url('<?php echo get_post_meta(get_the_ID(), 'background_image', true); ?>'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100vh;
}

</style>
<?php get_header(); ?>
<div id="content" class="widecolumn">
    <!-- <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2> -->
    <div class="entrytext">
    <div class="form-main">
    <div class="main-wrapper">
        <h2 class="form-head my-5">GET IN TOUCH!</h2>
        <form class="form-wrapper">
            <div class="form-card row">
                <div class="col">
                    <input class="form-input" type="text" name="full_name" required="required" placeholder="Full Name">
                </div>
                <div class="col">
                    <input class="form-input" type="email" name="email" required="required" placeholder="Email">
                </div>
            </div>

            <div class="form-card">
                <input class="form-input" type="text" name="subject" required="required" placeholder="Subject">
            </div>

            <div class="form-card">
                <textarea class="form-textarea my-4" style="height: 20vh;" maxlength="1000" rows="5" name="message" required="required" placeholder="Message"></textarea>
            </div>
            <div class="btn-wrap mt-4 text-center">
                <button class="btn rounded-pill">SEND MESSAGE <i class="bi bi-cursor-fill"></i></button>
            </div>
        </form>
    </div>
</div>

        <?php the_content(); ?>
    </div>
</div>
</div>



