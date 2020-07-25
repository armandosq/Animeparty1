
<?php 
function decode($string)
{
$output = false;
$encrypt_method = "AES-256-CBC";
$secret_key = 'Tu KEY secreta';
$secret_iv = 'Tu IV secreta';
$key = hash('sha256', $secret_key);
$iv = substr(hash('sha256', $secret_iv), 0, 16);
$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
return $output;
}
$url = decode($_GET['v']);
include("encode.php");

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
      <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
  </head>
<body>
	
          <video id="player" style="height: 100vh!important">
            <source src="<?php echo $url;  ?>" type="video/mp4"/>

        </video>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
<script src="https://gdurl.xyz/lib/script.js"></script>

<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>
<script>
   var controls =
[
    'play-large', // The large play button in the center
    'restart', // Restart playback
    'rewind', // Rewind by the seek time (default 10 seconds)
    'play', // Play/pause playback
    'fast-forward', // Fast forward by the seek time (default 10 seconds)
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'captions', // Toggle captions
    'settings', // Settings menu
    'pip', // Picture-in-picture (currently Safari only)
    'airplay', // Airplay (currently Safari only)
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
    'fullscreen' // Toggle fullscreen
];

var player = new Plyr('#player', { controls });

</script>

</body>
</html>
