<?php
require_once('mega.class.php');
$megafile = new MEGA('https://mega.nz/file/'.$_GET['id']);
//$megafile->download();
// OR
$megafile->stream_download(); // to download using streams
?>