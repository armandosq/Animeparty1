<?php
$enlace =  $_GET["media"] ;

$pagina_inicio = file_get_contents('http://www.mediafire.com/file/' . $enlace. '/');
$start = strpos($pagina_inicio, 'http://download');
$end = strpos($pagina_inicio, "'",$start);

//echo "$start \n $end \n"  ;
    $pagina_inicio = substr($pagina_inicio, $start,$end - $start);
//echo $pagina_inicio;

?>
<!DOCTYPE html>

<html>
<!-- Copied from https://demo.apicodes.com/mediafire/ by Cyotek WebCopy 1.8.0.652, jueves, 18 de junio de 2020, 21:25:23 -->
<head>
	<title>Mediafire Video Player - API Codes</title>
	<meta name="robots" content="noindex">
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<script type="text/javascript" src="../ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="../ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script type="text/javascript" src="../player/v/8.6.2/jwplayer.js"></script>
	<script type="text/javascript">jwplayer.key="cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";</script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#apicodes-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
</head>
<body>

<center>
  <video id="my-video" class="video-js" controls preload="auto" width="720" height="480"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="<?php echo $pagina_inicio;  ?>" type='video/mp4'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>

  <script src="http://vjs.zencdn.net/6.2.8/video.js"></script>
  </center>
</body>
<!-- Copied from https://demo.apicodes.com/mediafire/ by Cyotek WebCopy 1.8.0.652, jueves, 18 de junio de 2020, 21:25:23 -->
</html>




