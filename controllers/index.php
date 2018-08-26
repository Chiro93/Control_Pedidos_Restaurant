<?php
	//controllers/index.php

	require '../fw/fw.php';
	require '../models/Pedidos.php';
	require '../models/Mesas.php';
	require '../models/Menus.php';
	require '../views/Index.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';



	//Models
	$p = new Pedidos;
	$m = new Mesas;



	if(isset($_GET['id'])) {
		if ($_GET['id'] == 2) {
			$cod = $p->getCodigoPedido($_GET['num_mesa'], $m);

			$p->deletePedido($cod['cod_pedido']);
		}
	}

	
	
	//Views
	$v = new Index;

	$v->inicio = $p->getDatosPedidosMesa($_GET['num_mesa'], $m);

	$v->render();