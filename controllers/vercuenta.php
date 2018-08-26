<?php
	//controllers/vercuenta.php

	require '../fw/fw.php';
	require '../models/Pedidos.php';
	require '../models/Mesas.php';
	require '../views/VerCuenta.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';



	//Model
	$m = new Pedidos;
	$ms = new Mesas;

	

	//View
	$v = new VerCuenta;

	$v->pedidos = $m->getDatosPedidosMesa($_GET['num_mesa'], $ms);

	$v->render();