<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Google Photos</title>
	<meta name="robots" content="noindex">
	<meta name="referrer" content="no-referrer"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<link href="https://stream.ksplayer.com/templates/jwplayer/skin/asset/css/kunamthemes.css" rel="stylesheet">
	<script type="text/javascript" src="https://ssl.p.jwpcdn.com/player/v/8.6.2/jwplayer.js"></script>
	<script type="text/javascript">jwplayer.key="cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";</script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#apicodes-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
</head>
<body>

<?php 
		error_reporting(0);

		$link = (isset($_GET['link'])) ? $_GET['link'] : '';

		$sub = (isset($_GET['sub'])) ? $_GET['sub'] : '';

		$poster = (isset($_GET['poster'])) ? $_GET['poster'] : '';

		if ($link != '') {

			include_once 'packer.php';

				include_once 'curl.php';

				$curl = new cURL();

				$getSource = $curl->get($link);

			    $deSource = rawurldecode($getSource);

			    preg_match_all('/https:\/\/(.*?)=m(22|18|37)/', $deSource, $matchSource);

				foreach ($matchSource[2] as $key => $value) {

					switch ($value) {
						case '37':
								$s[1080] = '{"file": "https://' . $matchSource[1][0] . '=m37", "type": "video\/mp4", "label": "1080p"}';
							break;

						case '22':
								$s[720] = '{"file": "https://' . $matchSource[1][0] . '=m22", "type": "video\/mp4", "label": "720p"}';
							break;
						
						case '18':
								$s[480] = '{"file": "https://' . $matchSource[1][0] . '=m18", "type": "video\/mp4", "label": "480p"}';
							break;
					}

				}
		
				krsort($s);
				
				$enJson = implode(',', $s);
				
				$sources = '['.$enJson.']';
				
				$sources = str_replace('lh3.googleusercontent.com', '3.bp.blogspot.com', $sources);
				
				$checkSource = preg_match('/\[\]/', $sources, $match);
				
				if($checkSource) {
					$sources = '[{"label":"undefined","type":"video\/mp4","file":"undefined"}]';
				}
			
				$result = '<div id="apicodes-player"></div>';

				$data = 'var player = jwplayer("apicodes-player");
							player.setup({
								sources: '.$sources.',
								aspectratio: "16:9",
								startparam: "start",
								primary: "html5",
							autostart: false,
								preload: "auto",
								image: "'.$poster.'",
							    captions: {
							        color: "#f3f368",
							        fontSize: 16,
							        backgroundOpacity: 0,
							        fontfamily: "Helvetica",
							        edgeStyle: "raised"
							    },
							    tracks: [{ 
							        file: "'.$sub.'", 
							        label: "English",
							        kind: "captions",
							        "default": true 
							    }]
							});
				            player.on("setupError", function() {
				              swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
				            });
							player.on("error" , function(){
								swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
							});';

				$packer = new Packer($data, 'Normal', true, false, true);

				$packed = $packer->pack();

				$result .= '<script type="text/javascript">' . $packed . '</script>';
			
				echo $result;

		} else echo 'Empty link!';
?>

</body>
</html>



