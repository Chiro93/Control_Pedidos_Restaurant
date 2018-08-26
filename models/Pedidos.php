<?php
	//	models/Pedidos.php

	/**
	* Clase del Modelo Pedidos
	*
	* Contiene un conjunto de métodos que son utilizados cuando se necesitan funcionalidades que involucran pedidos.
	*
	* @package ProyectoFinal
	* @author Lucas Duré
	* @version 0.1
	*/
	class Pedidos extends Model {




		/**
		* Función que recibe 3 enteros y una instanciación y agrega un registro a la base de datos
		*
		* Agrega el detalle de un pedido
		*
		* @param integer $pedido un entero que representa el código de pedido
		* @param integer $codmenu un entero que representa el código del plato pedido
		* @param integer $cantidad un entero que representa la cantidad de platos pedidos
		* @param object $instamenus una instanciación de la Clase Menus para poder validar el código del plato recibido
		*/
		public function addDetallePedido ($pedido, $codmenu, $cantidad, $instamenus) {
			if(!$instamenus->checkMenus($codmenu)) throw new Exception;

			if(!$this->checkPedidos($pedido)) throw new Exception;

			if(!$this->db->isinteger($cantidad)) throw new Exception;

			$this->db->query("INSERT INTO detalle_pedido
							  (cod_pedido, cod_menu, cantidad)
							  VALUES
							  ($pedido, $codmenu, $cantidad)");
		}




		/**
		* Función que recibe un entero y actualiza la base de datos
		*
		* Cambia el estado de un pedido de Pendiente a Enviado
		*
		* @param integer $codpedido un entero que representa el código del pedido
		*/
		public function changeEstadoPedido($codpedido) {
			if(!$this->checkPedidos($codpedido)) throw new Exception;
			
			$this->db->query("UPDATE pedidos
							  SET id_estado_pedido = 4
							  WHERE cod_pedido = $codpedido");
		}




		/**
		* Función que recibe un entero y devuelve verdadero o falso
		*
		* Chequea la existencia del código de pedido recibido
		*
		* @param integer $pedido un entero que representa el código de pedido
		* @return bool retorna verdadero en caso de que el pedido exista, o falso en caso contrario
		*/
		private function checkPedidos($pedido) {
			if(!$this->db->isinteger($pedido)) throw new Exception;

			$this->db->query("SELECT *
					  		  FROM pedidos
					  		  WHERE cod_pedido = $pedido");

			return $this->db->hasResults();
		}




		/**
		* Función que recibe un entero y retorna verdadero o falso
		*
		* Verifica la cantidad de platos solicitados de un pedido
		*
		* @param integer $codpedido un entero que representa el código del pedido
		* @return bool retorna verdadero en caso de que haya por lo menos un plato pedido, o falso en caso contrario
		*/
		public function contarPlatos($codpedido) {
			$this->db->query("SELECT *
							  FROM detalle_pedido
							  WHERE cod_pedido = $codpedido");

			return $this->db->hasResults();
		}




		/**
		* Función que recibe un entero y una instanciación y crea un nuevo registro en la base de datos
		*
		* Crea un nuevo pedido correspondiente al número de mesa recibida
		*
		* @param integer $mesa un entero que representa el número de mesa
		* @param object $instamesa una instanciación de la Clase Mesa para validar el número de mesa recibido
		*/
		public function CreatePedido($mesa, $instamesa) {
			if (!$instamesa->checkMesas($mesa)) throw new Exception;

			$this->db->query("INSERT INTO pedidos
							  (num_mesa,fecha_pedido, id_estado_pedido)
							  VALUES
							  ($mesa,NOW(),3)");
		}




		/**
		* Función que recibe un entero y elimina un registro de la base de datos
		*
		* Elimina el detalle de un pedido correspondiente al código de pedido recibido
		*
		* @param integer $codpedido un entero que representa el código de pedido
		*/
		private function deleteDetallePedido($codpedido) {
			if(!$this->checkPedidos($codpedido)) throw new Exception;

			$this->db->query("DELETE FROM detalle_pedido
							  WHERE cod_pedido = $codpedido");
		}
		



		/**
		* Función que recibe un entero y elimina un registro de la base de datos
		*
		* Elimina un pedido correspondiente al código de pedido recibido
		*
		* @param integer $codpedido un entero que representa el código de pedido
		*/
		public function deletePedido($codpedido) {
			if(!$this->checkPedidos($codpedido)) throw new Exception;
			
			$this->deleteDetallePedido($codpedido);

			$this->db->query("DELETE FROM pedidos
							  WHERE cod_pedido = $codpedido AND
							  id_estado_pedido <> 5");
		}




		/**
		* Función que retorna un array con registros
		*
		* Devuelve la cantidad de platos solicitados de todos los pedidos
		*
		* @return array retorna un array con la cantidad de platos solicitados de cada pedido
		*/
		public function getCantidadMenusPedido() {
			$this->db->query("SELECT cod_pedido, COUNT(cod_menu) as 'cantidad'
							  FROM detalle_pedido
							  GROUP BY cod_pedido");

			return $this->db->fetchAll();
		}




		/**
		* Función que recibe un entero y una instanciación y retorna un array
		*
		* Devuelve el último pedido realizado del número de mesa recibido
		*
		* @param integer $mesa un entero que representa el número de mesa
		* @param object $instamesa una instanciación de la Clase Mesa para validar el número de mesa recibido
		* @return array retorna un array con el código de pedido
		*/
		public function getCodigoPedido($mesa, $instamesa) {
			if (!$instamesa->checkMesas($mesa)) throw new Exception;

			$this->db->query("SELECT cod_pedido
							  FROM pedidos
							  WHERE num_mesa = $mesa AND
							  id_estado_pedido <> 5
							  ORDER BY cod_pedido DESC
							  LIMIT 1");

			return $this->db->fetch();
		}




		/**
		* Función que recibe un entero y una instanciación y retorna un array con registros
		*
		* Devuelve los pedidos de una mesa
		*
		* @param integer $mesa un entero que representa el número de la mesa
		* @param object $instamesa una instanciación de la Clase Mesa para validar el número de mesa recibida
		* @return array retorna un array con los pedidos del número de mesa recibida
		*/
		public function getDatosPedidosMesa($mesa, $instamesa) {
			if (!$instamesa->checkMesas($mesa)) throw new Exception;

			$this->db->query("SELECT p.cod_pedido as 'numero', m.nombre as 'nombre', dp.cantidad as 'cantidad', ep.descripcion as 'estado', m.precio as 'precio',
							  (dp.cantidad * m.precio) as 'total', m.cod_menu as 'cod_menu'
							  FROM pedidos p LEFT JOIN detalle_pedido dp ON
							  		p.cod_pedido = dp.cod_pedido
							  LEFT JOIN menus m ON
							  		dp.cod_menu = m.cod_menu
							  LEFT JOIN estado_pedido ep ON
							  		p.id_estado_pedido = ep.id_estado_pedido
							  WHERE p.num_mesa = $mesa AND p.id_estado_pedido <> 5");

			return $this->db->fetchAll();
		}




		/**
		* Función que recibe un entero y retorna verdadero o falso
		*
		* Devuelve verdadero en el caso de que un pedido tenga platos o falso en caso contrario
		*
		* @param integer $codped un entero que representa el código de pedido
		* @return bool retorna verdadero si existen platos en el pedido o falso en caso contrario
		*/
		public function getDetallePedido($codped) {
			if(!$this->checkPedidos($codped)) throw new Exception;

			$this->db->query("SELECT *
							  FROM detalle_pedido
							  WHERE cod_pedido = $codped");

			return $this->db->hasResults();
		}




		/**
		* Función que devuelve un array con registros
		*
		* Devuelve los pedidos que tengan el estado Enviado
		*
		* @return array retorna un array con registros de pedidos de estado Enviado
		*/
		public function getEnviados() {
			$this->db->query("SELECT p.cod_pedido, p.num_mesa, ep.descripcion, m.nombre
							  FROM pedidos p LEFT JOIN estado_pedido ep ON
							  		p.id_estado_pedido = ep.id_estado_pedido
							  	LEFT JOIN detalle_pedido dp ON
							  		p.cod_pedido = dp.cod_pedido
							  	LEFT JOIN menus m ON
							  		dp.cod_menu = m.cod_menu
							  WHERE p.id_estado_pedido = 4
							  ORDER BY p.fecha_pedido ASC");

			return $this->db->fetchAll();
		}




		/**
		* Función que retorna un array con registros
		*
		* Devuelve todos los pedidos realizados
		*
		* @return array retorna un array con los registros de todos los pedidos realizados
		*/
		public function getPedidos() {
			$this->db->query("SELECT *
							   FROM pedidos");

			return $this->db->fetchAll();
		}


		

		/**
		* Función que retorna un array con registros
		*
		* Devuelve todos los pedidos de estado Pendiente
		*
		* @return array retorna un array con registros de los pedidos de estado Pendiente
		*/
		public function getPendientes() {
			$this->db->query("SELECT p.cod_pedido, p.num_mesa, p.fecha_pedido, ep.descripcion, dp.cod_menu, dp.cantidad, m.nombre
							  FROM pedidos p LEFT JOIN estado_pedido ep ON
							  		p.id_estado_pedido = ep.id_estado_pedido
							  	LEFT JOIN detalle_pedido dp ON
							  		p.cod_pedido = dp.cod_pedido
							  	LEFT JOIN menus m ON
							  		dp.cod_menu = m.cod_menu
							  WHERE p.id_estado_pedido = 3
							  ORDER BY p.fecha_pedido ASC");

			return $this->db->fetchAll();
		}		
	}