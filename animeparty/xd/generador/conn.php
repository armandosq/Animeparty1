<?php

	$_SESSION['fl_user_id'] = '1';
	$site['url'] = 'http://noticias.xyz/';

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$basename = "muviko";

	$conn = mysqli_connect($servidor, $usuario, $senha, $basename);

	if (!isset($_SESSION['fl_user_id'])) {
		echo "<h1>tienes que estar connectado</h1>";
		exit();
	}

	mysqli_set_charset($conn, 'utf8');
	
	
?>