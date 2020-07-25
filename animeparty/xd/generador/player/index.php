<?php
  include '../conn.php';

  if(isset($_GET['v'])){
    $video = $_GET['v'];
    $sql = "SELECT * FROM player WHERE token='$video'";
    $psql = mysqli_query($conn, $sql);
    $vid = mysqli_fetch_assoc($psql);
  }else{ ?>

<style>
body {
    background-color: #333;
    color: white;
    font-family: monospace;
    text-align: center;
    padding: 12%;
    padding-left: 0;
    padding-right: 0;
}

h1.herr {
    font-size: 80px;
    margin-bottom: 0;
    color: #fff;
}

p {
    margin: 0;
    font-size: 20px;
}
</style>
<h1 class="herr">404</h1>
<p>No existe!</p>

<?php
  exit();

  }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>PLAY</title>  
  <link rel="stylesheet" type="js.css" href="">
<script src="//vjs.zencdn.net/7.8.2/video.min.js"></script> <style>
    @font-face {
      font-family: nf-icon;
      src: url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-86.eot);
      src: url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-86.eot?#iefix) format("embedded-opentype"), url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-86.woff) format("woff"), url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-86.ttf) format("truetype"), url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-86.svg#nf-icon-v1-86) format("svg");
      font-weight: 400;
      font-style: normal;
    }
    .video-js {
      /* The base font size controls the size of everything, not just text.
         All dimensions use em-based sizes so that the scale along with the font size.
         Try increasing it to 15px and see what happens. */
      font-size: 16px;
      /* The main font color changes the ICON COLORS as well as the text */
      color: #cacaca;
    }

    /* The "Big Play Button" is the play button that shows before the video plays.
       To center it set the align values to center and middle. The typical location
       of the button is the center, but there is trend towards moving it to a corner
       where it gets out of the way of valuable content in the poster image.*/
    .vjs-default-skin .vjs-big-play-button {
      /* The font size is what makes the big play button...big. 
         All width/height values use ems, which are a multiple of the font size.
         If the .video-js font-size is 10px, then 3em equals 30px.*/
      font-size: 1zem;
      /* We're using SCSS vars here because the values are used in multiple places.
         Now that font size is set, the following em values will be a multiple of the
         new font size. If the font-size is 3em (30px), then setting any of
         the following values to 3em would equal 30px. 3 * font-size. */
      /* 1.5em = 45px default */
      line-height: 1.5em;
      height: 1.5em;
      width: 1.5em;
      /* 0.06666em = 2px default */
      border: 0.06666em solid #b7090b;
      /* 0.3em = 9px default */
      border-radius: 50%;
      display: none;
      /* Align center */
      left: 50%;
      top: 40%;
      margin-left: -0.75em;
      margin-top: -0.75em;
    }

    .video-js .vjs-play-control,
    .video-js .vjs-remaining-time,
    .video-js .vjs-volume-menu-button {
      border-right: 1px solid #323232;
    }

    .video-js .vjs-volume-menu-button .vjs-menu-content:before {
      content: "";
      display: inline-block;
      vertical-align: middle;
      height: 100%;
    }
    .video-js .vjs-volume-menu-button .vjs-menu-content .vjs-volume-bar {
      display: inline-block;
      vertical-align: middle;
    }

    /* The default color of control backgrounds is mostly black but with a little
       bit of blue so it can still be seen on all-black video frames, which are common. */
    .video-js .vjs-control:before {
      font-family: nf-icon;
    }
    .video-js .vjs-control.vjs-play-control:before {
      content: '\e646';
    }
    .video-js .vjs-control.vjs-play-control.vjs-playing:before {
      content: '\e645';
    }
    .video-js .vjs-control.vjs-fullscreen-control:before {
      content: '\e642';
    }
    .video-js .vjs-control.vjs-volume-menu-button:before {
      content: '\e630';
    }
    .video-js .vjs-control.vjs-captions-button:before {
      content: '\e650';
    }
    

    .video-js .vjs-control-bar,
    .video-js .vjs-big-play-button,
    .video-js .vjs-menu-button .vjs-menu-content {
      /* IE8 - has no alpha support */
      background-color: #262626;
      /* Opacity: 1.0 = 100%, 0.0 = 0% */
      background-color: rgba(38, 38, 38, 0.9);

    }

    .video-js .vjs-control-bar {
      background-color: rgba(38, 38, 38, 0.9);
      width: auto;
      left: 4em;
      right: 4em;
      bottom: 2em;
      border-radius: 0.5em;
    }
    .video-js .vjs-control-bar:hover .vjs-progress-control {
      opacity: 1;
      top: -2.5em;
    }
    .video-js .vjs-control-bar .vjs-menu {
      z-index: 2;
      height: 100%;
    }

    .video-js.vjs-fullscreen .vjs-control-bar {
      bottom: 4em;
    }

    .video-js .vjs-current-time {
      display: block;
      position: absolute;
      right: 0;
      top: -2.5em;
    }

    /* Slider - used for Volume bar and Progress bar */
    .video-js .vjs-slider {
      background-color: #2e2e2e;
      background-color: rgba(46, 46, 46, 0.8);
      border-radius: 1em;
      margin: 0;
    }

    .video-js .vjs-remaining-time {
      flex: 1;
      text-align: left;
    }

    /* The slider bar color is used for the progress bar and the volume bar
       (the first two can be removed after a fix that's coming) */
    .video-js .vjs-volume-level,
    .video-js .vjs-play-progress,
    .video-js .vjs-slider-bar {
      background: #cacaca;
      border-radius: 1em;
    }

    .video-js .vjs-play-progress {
      color: #b7090b;
      background: #b7090b;
      font-size: 1.3em;
    }
    .video-js .vjs-play-progress:before {
      transition: width .1s ease-out, height .1s ease-out;
      content: "";
      top: -0.2em;
      border: 0;
      background: radial-gradient(#b7090b 33%, #830607);
      width: 1em;
      height: 1em;
      border-radius: 50%;
      box-shadow: #000 0 0 2px;
    }
    .video-js .vjs-play-progress:hover:before {
      width: 1.1em;
      height: 1.1em;
      border: 2px solid transparent;
    }

    .video-js .vjs-progress-control {
      position: absolute;
      left: 0;
      right: 0;
      width: 100%;
      padding: 0 4em 0 0.4em;
      top: -2.3em;
      border-radius: 1em;
      transition: top 150ms linear, opacity 150ms linear, transform 150ms linear, -webkit-transform 150ms linear, -moz-transform 150ms linear, -o-transform 150ms linear;
      z-index: 1;
      opacity: 0;
    }
    .video-js .vjs-progress-control:hover .vjs-progress-holder {
      font-size: inherit;
    }
    .video-js .vjs-progress-control .vjs-mouse-display {
      background: #cacaca;
    }
    .video-js .vjs-progress-control .vjs-mouse-display:before {
      top: 100%;
      border: solid transparent;
      content: " ";
      height: 0;
      width: 0;
      position: absolute;
      border-top-color: #262626;
      border-width: .8em;
      right: 25%;
      margin-left: -.8em;
    }

    .video-js .vjs-time-tooltip {
      background: #cacaca !important;
      color: #b7090b;
    }
    .video-js .vjs-time-tooltip:before {
      top: 100%;
      border: solid transparent;
      content: " ";
      height: 0;
      width: 0;
      position: absolute;
      border-top-color: #262626;
      border-width: .8em;
      right: 25%;
      margin-left: -.8em;
    }

    .video-js .vjs-play-progress,
    .video-js .vjs-load-progress {
      height: 0.7em !important;
    }

    .video-js .vjs-progress-holder {
      height: 0.9em;
    }

    /* The main progress bar also has a bar that shows how much has been loaded. */
    .video-js .vjs-load-progress {
      /* For IE8 we'll lighten the color */
      background: #3a3a3a;
      /* Otherwise we'll rely on stacked opacities */
      background: rgba(46, 46, 46, 0.5);
      border-radius: 1em;
      height: 0.9em !important;
    }

    /* The load progress bar also has internal divs that represent
       smaller disconnected loaded time ranges */
    .video-js .vjs-load-progress div {
      /* For IE8 we'll lighten the color */
      background: #3a3a3a;
      /* Otherwise we'll rely on stacked opacities */
      background: rgba(46, 46, 46, 0.75);
      border-radius: 1em;
      height: 0.9em !important;
    }

    .vjs-loading-spinner {
      border: none;
      opacity: 0;
      visibility: hidden;
      animation: vjs-spinner-fade-out 2s linear 1;
      animation-delay: 2s;
    }
    .vjs-loading-spinner:before, .vjs-loading-spinner:after {
      border: none;
    }
    .vjs-loading-spinner:after {
      background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/site-spinner.png);
      background-repeat: no-repeat;
      background-position-x: 50%;
      background-position-y: 50%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
    }

    .vjs-seeking .vjs-loading-spinner:after,
    .vjs-waiting .vjs-loading-spinner:after {
      animation: vjs-spinner-spin 1.1s linear infinite, vjs-spinner-fade 1.1s linear 1 !important;
      animation-delay: 2s;
    }

    .vjs-seeking .vjs-loading-spinner,
    .vjs-waiting .vjs-loading-spinner {
      opacity: 1;
      visibility: visible;
      animation: vjs-spinner-fade-in 2s linear 1;
      animation-delay: 2s;
    }

    @keyframes vjs-spinner-fade-in {
      0% {
        opacity: 0;
        visibility: visible;
      }
      100% {
        opacity: 1;
        visibility: visible;
      }
    }
    @keyframes vjs-spinner-fade-out {
      0% {
        opacity: 1;
        visibility: visible;
      }
      100% {
        opacity: 0;
        visibility: visible;
      }
    }

    </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <!-- <script>if (self != top) { top.location.replace(window.location.href) }</script> -->
</head>
<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='..message perso .. '; return true;" >
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <div class="sobrepoin">
    <div class="sobrepoin">
      <div class="sobrepoin">
      </div>
    </div>    
  </div>
  <video id="my_video_1" class="video-js vjs-default-skin" data-setup ='{}' controls preload="none" poster='../img/<?php echo $vid['thumb']; ?>' data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
    <source src="<?php echo $vid['video']; ?>" type="video/mp4">
  </video>
<div></div>
  
<style>
  #instructions { max-width: 640px; text-align: left; margin: 30px auto; }
  #instructions textarea { width: 100%; height: 100px; }
  
  /* Show the controls (hidden at the start by default) */
  .video-js .vjs-control-bar { 
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }
  div#my_video_1 {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
  }

  .sobrepoin {
    width: 100%;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 2;
    background: transparent;
}

.vjs-poster {
    z-index: 3;
}

.vjs-text-track-display {
    z-index: 3;
}

.vjs-loading-spinner {
    z-index: 3;
}

button.vjs-big-play-button {
    z-index: 3;
}

.vjs-control-bar {
    z-index: 3;
}

.vjs-error-display.vjs-modal-dialog.vjs-hidden {
    z-index: 3;
}

.vjs-caption-settings.vjs-modal-overlay.vjs-hidden {
    z-index: 3;
}

div {
    z-index: 3;
}

  /* Make the demo a little prettier */
  body {
    margin-top: 20px;
    background: #222;
    text-align: center; 
    color: #aaa;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    background: radial-gradient(#333, hsl(200,30%,6%) );
  }

  a, a:hover, a:visited { color: #76DAFF; }
</style>
 <link rel="stylesheet" type="text/css" href="js.css">
<script src="https://unpkg.com/video.js@7.8.2/dist/video.min.js"></script>

    <script src="js/index.js"></script>

</body>
</html>
