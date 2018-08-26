<?php
	//controllers/menus.php

	require '../fw/fw.php';
	require '../models/Menus.php';
	require '../models/Mesas.php';
	require '../models/Pedidos.php';
	require '../models/Productos.php';
	require '../views/VerMenus.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';



	if (!isset($_GET['menu'])) throw new Exception;



	//Model
	$m = new Menus;
	$ms = new Mesas;
	$p = new Productos;



	//View
	$v = new VerMenus;
		
	$v->cp= $ms->getCantidadPersonas($_GET['num_mesa']);

	$v->menus = $m->getMenus($_GET['menu']);

	$v->productos = $p->checkStock();

	$v->render();	