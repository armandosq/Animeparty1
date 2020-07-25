<?php
	include 'conn.php';
	include 'seguro.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MGPAINEL - gerador de players</title>
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
			<h1 class="head-txt">Todos os players Creados</h1>
			<div class="plays">
			<table>
				<tr class="heads">
					<td width="30">ID</td>
					<td>Nombre</td>
					<td width="100">Ver</td>
				</tr>

				<?php
					$usl = "SELECT * FROM `player` ORDER BY `player`.`id` DESC";
					$sal = mysqli_query($conn, $usl);
					while ($rw=mysqli_fetch_assoc($sal)){
				?>

				<tr class="sss">
					<td><?php echo $rw['id']; ?></td>
					<td><?php echo $rw['nome']; ?></td>
					<td>
						<a target="_blank" href="ver.php?i=<?php echo $rw['id']; ?>">
							<button class="fun">Ver</button>
						</a>
					</td>
				</tr>

				<?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>
	
</body>
</html>