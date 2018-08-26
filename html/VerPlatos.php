<!DOCTYPE html>
	<!--  //html/VerPlatos.php  -->
<html>
	<head>
		<!--<script type="text/javascript" src="/eliminarplato.js"></script>-->
		<meta charset="utf-8" />
		<title>Restaurante Platos</title>
	</head>
	<body>
		<div class="top">
			<h1>Elija su Plato Deseado</h1>

			<a href='US_Ver-Menus-2-1.php' class='boton'>Entrada</a><br/><br/>
			<a href='US_Ver-Menus-2-2.php' class='boton'>Plato Principal</a><br/><br/>
			<a href='US_Ver-Menus-2-3.php' class='boton'>Postre</a><br/><br/>
			<a href='US_Ver-Menus-2-4.php' class='boton'>Bebida</a><br/><br/>

			<?php if (isset($this->existedetalle)) { 
				if ($this->existedetalle) { ?>
					<a href="Index-1.php" class='boton'>Finalizar Pedido</a>
				<?php } 
			} ?>

			<a href="Index-2.php" class='boton' id='cancelar'>Cancelar Pedido</a>
		</div>

		<div class="bottom">
			<h1>Pedido hasta ahora</h1>

			<table>
				<tr>
					<th>Numero Pedido</th>
					<th>Nombre</th>
					<th>Cantidad</th>
				</tr>

				<?php foreach ($this->pedido as $p) { 
					if ($p['nombre'] != NULL) { ?>
						<tr>
							<td><?= $p['numero'] ?></td>
							<td><?= $p['nombre'] ?></td>
							<td><?= $p['cantidad'] ?></td>
						</tr>
					<?php } 
				} ?>
			</table>
		</div>

		<script type="text/javascript">
			document.getElementById('cancelar').onclick = function() {
				if(!confirm("¿Esta seguro que desea cancelar su pedido?"))
					return false;
			}
		</script>
	</body>
</html>