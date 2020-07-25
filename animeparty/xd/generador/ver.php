<?php
	include 'conn.php';
	include 'seguro.php';

	$vid = $_GET['i'];

	$ifs = "SELECT * FROM config WHERE id='1'";
	$sqs = mysqli_query($conn, $ifs);
	$sda = mysqli_fetch_assoc($sqs);

	$sql = "SELECT * FROM player WHERE id='$vid'";
	$spl = mysqli_query($conn, $sql);
	$v = mysqli_fetch_assoc($spl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Generador de player</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
</head>
<body>

<div class="site">
	<div class="side-nav">
		<?php include 'side.php'; ?>
	</div>

	<div class="content">
		<?php include 'nav.php'; ?>
		<div class="container">
			<div class="card-view">
				<h1><strong>Player: </strong><?php echo $v['nome']; ?> <a href="deletar.php?id=<?php echo $v['id'] ?>"><button class="brs">Eliminar</button></a></h1>
				<iframe class="player" src="player/?v=<?php echo $v['token'] ?>" frameborder="0"></iframe>

				<h1 class="asas">Código Iframe</h1>
				<textarea class="distext" disabled><iframe class="player" src="<?php echo $sda['url'] ?>player/?v=<?php echo $v['token'] ?>" frameborder="0"></iframe></textarea>
			</div>
		</div>
	</div>
</div>
	
</body>
</html>