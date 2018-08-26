<!DOCTYPE html>
<html>
	<head>
		<title>Menu Principal</title>
	</head>
	<body>
		<?php if (isset($_GET['id'])) { 
			if ($_GET['id'] == 1) 
				header('location:Index.php'); 
			else { ?>
				<div class="bottom"></br></br>
					<a href="ADM_Lista-Pedidos.php" class="boton">Listado de Pedidos</a></br></br></br></br>
					<a href="principal-1.php" class="boton">Menú de Informes</a>
				</div>
			<?php }
		} else { ?>
			<div class="bottom"></br></br>
				<a href="Principal-1.php" class="boton">Menú Usuario</a></br></br></br></br>
				<a href="Principal-2.php" class="boton">Menú Administración</a>
			</div>
		<?php } ?>
	</body>
</html>