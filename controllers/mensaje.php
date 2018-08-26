<?php
	//controllers/mensaje.php

	require '../fw/fw.php';
	require '../views/Mensaje.php';

	$v = new Mensaje;

	$v->render();