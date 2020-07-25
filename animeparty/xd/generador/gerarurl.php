<?php
	include 'conn.php';
	include 'seguro.php';

	if(isset($_POST['titulo'])){
	
		$ext=".png";
		$exts=".mp4";
		$n = date('y-d h:m:s');
		$img = md5(sha1($n.$_FILES["thumb"]["name"])).$ext;
		$vid = $_POST['video'];

		move_uploaded_file($_FILES['thumb']['tmp_name'], "img/".$img);

		$nome = $_POST['titulo'];
		$data = date('d/m/y');
		$token = md5(sha1($n.$img.$vid.$n.$img.$vid.$n));

		$vsl = "INSERT INTO `player` (`id`, `video`, `thumb`, `nome`, `data`, `token`)VALUES(NULL, '$vid', '$img', '$nome', '$data', '$token')";
		$rsl = mysqli_query($conn, $vsl);

		$_SESSION['post'] = 'Player criado com sucesso!';
		header("Location: gerarurl.php");

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
			<h1 class="head-txt">Crear nuevo player</h1>

			<form class="itemss" action="" method="post" enctype="multipart/form-data">
				<label for="titulo">Nombre</label>
				<input required name="titulo" class="form-control" type="Nome do player" placeholder="titulo do player">
				<label for="thumb">Seleccione  thumbnail</label>
				<input  name="thumb" type="file">
				<label for="video">URL del video [.mp4]</label>
				<input required class="form-control" name="video" type="url">
				<input type="submit" value="Criar player">
			</form>
		</div>
	</div>
</div>
	
</body>
</html>