<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Lista de Menus</title>
	</head>
	<body>
		<div class="top">
			<h1>Menus:</h1>

			<form action="US_Ver-Platos.php" method="POST">
				<input type="hidden" name="num_mesa" value='<?= $_GET['num_mesa'] ?>' />
				<input type="hidden" name="id" value='2' />

				<table>
					<tr>
						<th>Descripcion</th> <th>Precio</th> <th>Cantidad</th>
					</tr>
					<?php foreach ($this->menus as $m) { ?>
							<input type="hidden" name="cod[]" value='<?= $m['cod_menu'] ?>' />

							<?php $enreposicion = false;
							foreach ($this->productos as $p) {
								if ($p['cod_menu'] == $m['cod_menu'])
									$enreposicion = true;
							} ?>

							<?php if ($enreposicion) { ?>
								<tr>
									<td><?= $m['nombre'] ?></td>
									<td colspan="2" class="reposicion">En reposición</td>
								</tr>
							<?php } else { ?>
								<tr>
									<td><?= $m['nombre'] ?></td>
									<td>$<?= $m['precio'] ?></td>
									<td>
										<select name='<?= $m['cod_menu'] ?>'>
											<?php for ($i = NULL; $i <= $this->cp['cant_personas'] ; $i++) { ?>
												<option value='<?= $i ?>'><?= $i ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
							<?php } ?>
					<?php } ?>
				</table>

				<input type="submit" class="boton" value="Pedir" />
				<a href='US_Ver-Platos-2-2.php' class="boton">Cancelar</a>
			</form>
		</div>
	</body>
</html>