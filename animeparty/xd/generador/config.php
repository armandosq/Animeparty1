<?php
	include 'conn.php';
	include 'seguro.php';

	$ifs = "SELECT * FROM config WHERE id='1'";
	$sqs = mysqli_query($conn, $ifs);
	$sda = mysqli_fetch_assoc($sqs);

	if(isset($_POST['url'])){
	
		$Link = $_POST['url'];

		$sql = "UPDATE `config` SET `url` = '$Link' WHERE `id` = 1";
		$ssl = mysqli_query($conn, $sql);

		$_SESSION['post'] = 'Hecho!';
		header("Location: config.php");

		exit();

	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AnimeParty Generador de Players</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="animate.css">
</head>
<body>
<?php if(isset($_SESSION['post'])){ ?>
	<p id="nt" class="notify animated fadeInRight"><?php echo $_SESSION['post']; ?> <button class="close-i" onclick="getElementById('nt').style.display = 'none';">x</button></p>
<?php unset($_SESSION['post']); } ?>
<div class="site">
	<div class="side-nav">
		<?php include 'side.php'; ?>
	</div>

	<div class="content">
		<?php include 'nav.php'; ?>
		<div class="container">
			<h1 class="head-txt">Configurar Generador</h1>

			<form class="itemss" action="" method="post">
				<label>Url do site ['http://animeparty.net/']</label>
				<input required name="url" class="form-control" type="url" placeholder="Digite a url do site" value="<?php echo $sda['url']; ?>">		
				<input type="submit" value="Criar player">
			</form>
		</div>
	</div>
</div>
	
</body>
</html>