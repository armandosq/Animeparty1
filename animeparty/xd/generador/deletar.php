<?php
	include 'conn.php';
	include 'seguro.php';

	$vid = $_GET['id'];

	$ifs = "SELECT * FROM config WHERE id='1'";
	$sqs = mysqli_query($conn, $ifs);
	$sda = mysqli_fetch_assoc($sqs);

	$sql = "DELETE FROM player WHERE id='$vid'";
	$spl = mysqli_query($conn, $sql);
	$v = mysqli_fetch_assoc($spl);

	$_SESSION['post'] = 'Eliminado con exito!';

	header("Location: index.php");
	exit();
?>