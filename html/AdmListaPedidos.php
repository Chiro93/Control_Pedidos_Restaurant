<!DOCTYPE html>

<!-- html/AdmListaPedidos.php -->

<html>
	<head>
		<meta charset='utf-8' />
		<title>Lista Pedidos Pendientes</title>
	</head>
	<body class="adm">
		<div class="top">
			<h1>Lista Pedidos Pendientes</h1>

			<table>
				<tr>
					<th>N° Pedido</th>
					<th>Platos</th>
					<th>Cantidad</th>
					<th>Mesa</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Estado</th>
					<th>Preparado</th>
				</tr>

				<?php  foreach ($this->menuspedidos as $pedidos) {
						$i = 1;
						$cod = $pedidos['cod_pedido'];

						foreach ($this->pendientes as $p) {
							if ($cod == $p['cod_pedido']) {
								$dt = new DateTime($p['fecha_pedido']);
								$date = $dt->format('d/m/Y');
								$time = $dt->format('H:i:s');

								if ($p['nombre'] != NULL) {
									if ($i == 1) { ?>
										<tr>
											<td rowspan='<?= $pedidos['cantidad'] ?>'><?= $p['cod_pedido'] ?></td>
											<td><?= $p['nombre'] ?></td>
											<td><?= $p['cantidad'] ?></td>
											<td><?= $p['num_mesa'] ?></td>
											<td><?= $date ?></td>
											<td><?= $time ?></td>
											<td><?= $p['descripcion'] ?></td>
											<td rowspan='<?= $pedidos['cantidad'] ?>'><a href='ADM_Lista-Pedidos-<?= $p['cod_pedido'] ?>_<?= $p['cod_menu'] ?>-<?= $p['cantidad'] ?>.php' class="botontabla">Listo!</a></td>
										</tr>
								<?php $i = 0;
									} else { ?>
										<tr>
											<td><?= $p['nombre'] ?></td>
											<td><?= $p['cantidad'] ?></td>
											<td><?= $p['num_mesa'] ?></td>
											<td><?= $date ?></td>
											<td><?= $time ?></td>
											<td><?= $p['descripcion'] ?></td>
										</tr>
									<?php }
								} 
							}
						} 
				} ?>
			</table>
		</div>


		<div class="bottom">
			<h1>Lista Pedidos Enviados</h1>

			<table>
				<tr>
					<th>N° Pedido</th><th>Nombre</th><th>Mesa</th><th>Estado</th>
				</tr>

				<?php  foreach ($this->menuspedidos as $pedidos) {
						$i = 1;
						$cod = $pedidos['cod_pedido'];

						foreach ($this->enviados as $e) {
							if ($cod == $e['cod_pedido']) {
								if ($e['nombre'] != NULL) {
									if ($i == 1) { ?>
										<tr>
											<td rowspan='<?= $pedidos['cantidad'] ?>'><?= $e['cod_pedido'] ?></td>
											<td><?= $e['nombre'] ?></td>
											<td><?= $e['num_mesa'] ?></td>
											<td><?= $e['descripcion'] ?></td>
										</tr>
									<?php $i = 0;
									} else { ?>
										<tr>
											<td><?= $e['nombre'] ?></td>
											<td><?= $e['num_mesa'] ?></td>
											<td><?= $e['descripcion'] ?></td>
										</tr>
									<?php }
								} 
							}
						} 
				} ?>
			</table>
		</div>
	</body>
</html>