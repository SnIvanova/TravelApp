<?php 
$page_id = get_the_ID(); // If you're inside the loop, or use a specific page ID.
?>
<?php
/*
Template Name: Gallery
*/

get_header(); ?>
<div>
        <div id="video-background-container" class="video-background-container"></div>
            <div class="content-overlay mx-auto text-center gallery">
                <!-- <div class="container-fluid gallery py-5 my-5">
                <div class="container text-center mb-5"> -->
                <h5 class="section-title px-3">Nostra Galleria</h5>
                <h1 class="mb-4">Galleria Turismo e Viaggi.</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.
                    </p>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#GalleryTab-1">
                            <span class="text-dark" style="width: 150px;">Tutti</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-2">
                            <span class="text-dark" style="width: 150px;">Tour dei pianeti</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-3">
                            <span class="text-dark" style="width: 150px;">Viaggio Oceanico</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-4">
                            <span class="text-dark" style="width: 150px;">Viaggio Estivo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#GalleryTab-5">
                            <span class="text-dark" style="width: 150px;">Viaggio Sportivo</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="GalleryTab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-2">
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                                <div class="gallery-item h-100">
                                <img src="<?php echo do_shortcode(get_field('gallery_image_1', $page_id)); $field = get_field_object('gallery_image_1', $page_id);
                                    print_r($field);?>" class="img-fluid w-100 h-100 rounded" alt="Image">
                                    <div class="gallery-content">
                                        <div class="gallery-info">
                                            <h5 class="text-white text-uppercase mb-2">Tour dei pianeti</h5>
                                            <a href="#" class="btn-hover text-white">Gurdare Tutti <i class="fa fa-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                    <div class="gallery-plus-icon">
                                        <a href="<?php echo get_field('gallery_image_1'); ?>" data-lightbox="gallery-1" class="my-auto"><i class="fas fa-plus fa-2x text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script>
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('video-background-container', {
      height: '100%',
      width: '100%',
      videoId: '-hNSIBD_2h0',
      playerVars: {
        'autoplay': 1,
        'controls': 0,
        'showinfo': 0,
        'modestbranding': 1,
        'loop': 1,
        'fs': 0,
        'cc_load_policy': 0,
        'iv_load_policy': 3,
        'autohide': 0,
        'playlist': '-hNSIBD_2h0',
        'mute': 1
      },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  function onPlayerReady(event) {
    event.target.playVideo();
    player.mute(); 
  }

  function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.ENDED) {
      player.playVideo(); 
    }
  }
</script>

<?php get_footer(); ?>
