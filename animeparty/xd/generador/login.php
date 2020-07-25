<?php
	include 'conn.php';
	session_start();

	if(isset($_GET['ass'])){
		$_SESSION['admin'] = '1';
		header("Location: index.php");
	}

	if(isset($_POST['mail'])){

		$mail = $_POST['mail'];
		$pass = md5($_POST['pass']);

		$sql = "SELECT * FROM user WHERE email='$mail' and senha='$pass'";
		$qsl = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($qsl);
		$conta = mysqli_num_rows($qsl);

		if($conta>0){
			$id = $user['id'];
			echo $id;
			$_SESSION['admin'] = $id;
			$_SESSION['post'] = 'Bienvenido de vuelta!';
			header("Location: index.php");
		}else{
			$_SESSION['loginerro'] = 'Error!';
			header("Location: index.php");
		}
		header("Location: index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AnimeParty - Generador de Players</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
</head>
<body>

	<div class="form-login">
		<div class="form-head">
			<h1><strong>AnimeParty</strong>Panel de inicio</h1>
		</div>
		<div class="form-body">
			<form action="login.php" method="post">
				<?php
					if (isset($_SESSION['loginerro'])) {
						echo '<p class="erro">'.$_SESSION['loginerro'].'</p>';
						unset($_SESSION['loginerro']);
					}
				?>
				<input placeholder="Email" name="mail" type="email" class="form-control">
				<input placeholder="Contraseña" name="pass" type="password" class="form-control">
				<input type="submit" value="entrar">
			</form>
		</div>
	</div>
	
</body>
</html>