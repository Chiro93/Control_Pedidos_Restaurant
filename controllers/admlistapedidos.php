<?php
	//	controllers/admlistapedidos.php

	require '../fw/fw.php';
	require '../models/Pedidos.php';
	require '../models/Menus.php';
	require '../models/Productos.php';
	require '../views/AdmListaPedidos.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';



	//Model
	$ped = new Pedidos;
	$p = $ped->getPendientes();
	$e = $ped->getEnviados();



	if(isset($_GET['cod_menu'])) {
		$prod = new Productos;
		$m = new Menus;

		$menu = $m->getMenusAReducir($_GET['cod_menu'], $_GET['cantidad']);

		foreach ($menu as $v)
			$prod->reduceStock($v['cod_producto'], $v['cantidad_productos']);

		$ped->changeEstadoPedido($_GET['cod_pedido']);

		header("location:ADM_Lista-Pedidos.php");
	}



	//View
	$v = new AdmListaPedidos;

	$v->pendientes = $p;

	$v->enviados = $e;

	$v->menuspedidos = $ped->getCantidadMenusPedido();

	$v->render();