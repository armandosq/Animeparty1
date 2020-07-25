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
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title></title>
  <link rel="stylesheet" href="https://gdurl.xyz/lib/style.css">
    <script src="https://gdurl.xyz/lib/adsbygoogle.js?v=081501"></script> <meta name="referrer" content="no-referrer">
    <meta name="description" content="FREE Google Drive Direct Download Link Generator (Button, Countdown, Direct) and Embed Player (JwPlayer, Plyr), API Supported.">
  <link rel="shortcut icon" type="image/png" href="https://gdurl.xyz/img/favicon.png"/>
  <meta name="robots" content="index,follow" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://gdurl.xyz/lib/plyr.css" />
  </head>
<body>
          <video id="player" style="height: 100vh!important">
            <source src="<?php echo $pagina_inicio;  ?>" type="video/mp4"/>
        </video>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
<script src="https://gdurl.xyz/lib/script.js"></script>

<script src="https://gdurl.xyz/lib/plyr.js"></script>
<script>
    var player = new Plyr('#player', {
        settings: ""
    });
</script>

</body>
</html>