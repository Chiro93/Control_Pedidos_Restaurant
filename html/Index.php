<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Restaurante Inicio</title>
	</head>
	<body>
		<div class="top">
			<h1>Elija su Opción</h1>

			<a href="US_Ver-Platos-2-1.php" class='boton'>Realizar Pedido</a>
			
			<a href="US_Ver-Cuenta.php" class='boton'>Solicitar Cuenta</a>		
		</div>

		<div class="bottom">
			<h1>Pedidos</h1>


			<table border='1'>
				<tr>
					<th>Numero Pedido</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Estado</th>
				</tr>

				<?php foreach ($this->inicio as $pedido) { 
					if (!($pedido['nombre'] == NULL)) { ?>
						<tr>
							<td><?= $pedido['numero'] ?></td>
							<td><?= $pedido['nombre'] ?></td>
							<td><?= $pedido['cantidad'] ?></td>
							<td>$<?= $pedido['total'] ?></td>
							<td><?= $pedido['estado'] ?></td>
						</tr>
					<?php }
				} ?>
			</table>
		</div>
	</body>
</html>