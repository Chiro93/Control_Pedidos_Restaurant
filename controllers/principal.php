<?php
	//controllers/principal.php

	require '../fw/fw.php';
	require '../views/Principal.php';
	include '../static/css/botones.css';
	include '../static/css/background.css';
	include '../static/css/esquema.css';
	include '../static/css/estilotexto.css';

	$v = new Principal;

	$v->render();