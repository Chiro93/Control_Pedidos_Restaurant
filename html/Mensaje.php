<!DOCTYPE html>
<html>
	<head>
		<title>Mensaje</title>
	</head>
	<body>
	<?php switch ($_GET['id']) {
		case '1':
			?><p>Pedido realizado con éxito!</p><?php
			break;
		
		case '2':
			?><p>Mensaje asdf</p><?php
			break;

		default:
			?><p>ERROR</p><?php
			break;
	} ?>
		

		<a href="Index.php">Volver al Inicio</a>
	</body>
</html>