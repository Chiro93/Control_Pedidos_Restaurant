<?php
	//controllers/verplatos.php

	require '../fw/fw.php';
	require '../models/Pedidos.php';
	require '../models/Menus.php';
	require '../models/Mesas.php';
	require '../views/VerPlatos.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';



	//Models
	$p = new Pedidos;
	$m = new Menus;
	$ms = new Mesas;



	if (isset($_GET['num_mesa']))
		$mesa = $_GET['num_mesa'];

	if (isset($_POST['cod'])) {
		if (!isset($_POST['num_mesa'])) throw new Exception;

		$codped = $p->getCodigoPedido($_POST['num_mesa'], $ms);

		$mesa = $_POST['num_mesa'];

		foreach ($_POST['cod'] as $k => $v) {
			if (isset($_POST[$v]))
				if (!($_POST[$v] == NULL))
					$p->addDetallePedido($codped['cod_pedido'], $v, $_POST[$v], $m);
		}
	}

	if (isset($_GET['id'])) {
		if($_GET['id'] == 1) {			
			$p->CreatePedido($_GET['num_mesa'], $ms);

			$mesa = $_GET['num_mesa'];
		} else {
			$codped = $p->getCodigoPedido($_GET['num_mesa'], $ms);

			$mesa = $_GET['num_mesa'];
		}
	}



	//Views
	$v = new VerPlatos;

	if (isset($codped))
		$v->existedetalle = $p->getDetallePedido($codped['cod_pedido']);

	$v->pedido = $p->getDatosPedidosMesa($mesa, $ms);

	$v->codped = $p->getCodigoPedido($mesa, $ms);

	$v->render();