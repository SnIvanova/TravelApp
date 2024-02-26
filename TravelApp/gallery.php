<?php 
$page_id = get_the_ID(); 
?>
<?php
/*
Template Name: Gallery
*/

get_header(); ?>
<div>
        <div id="video-background-container" class="video-background-container"></div>
            <div class="content-overlay mx-auto text-center gallery">
                <h5 class="section-title px-3">Nostra Galleria</h5>
                <h1 class="mb-4">Galleria Turismo e Viaggi.</h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum tempore nam, architecto doloremque velit explicabo? Voluptate sunt eveniet fuga eligendi! Expedita laudantium fugiat corrupti eum cum repellat a laborum quasi.
                    </p>
            </div>

            <div class="tab-class text-center">
            <?php the_content(); ?>
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
      }, 
    });
  }

  function onPlayerReady(event) {
    event.target.playVideo();
    player.mute(); 
    scrolling="yes"
  }

  function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.ENDED) {
      player.playVideo(); 
    }
  }
</script>

<?php get_footer(); ?>
