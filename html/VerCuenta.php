<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cuenta</title>
	</head>
	<body>
		<div class="top">
			<h1>Resumen</h1>

			<table>
				<tr>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Total</th>
				</tr>

				<?php foreach ($this->pedidos as $r) { ?>
					<tr>
						<td><?= $r['nombre'] ?></td>
						<td><?= $r['cantidad'] ?></td>
						<td>$<?= $r['precio'] ?></td>
						<td>$<?= $r['total'] ?></td>
					</tr>

					<?php $this->total = $this->total + $r['total'];
				} ?>
			</table>

			<p>Total a Pagar: $<?= $this->total ?></p>

			<a href="Index-1.php" class="boton">Volver</a>
		</div>
	</body>
</html>