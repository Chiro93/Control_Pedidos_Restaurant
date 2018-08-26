<?php
	//models/Menus.php

	/**
	* Clase del Modelo Menus
	*
	* Contiene un conjunto de métodos que son utilizados cuando se necesitan funcionalidades que involucran platos
	*
	* @package ProyectoFinal
	* @author Lucas Duré
	* @version 0.1
	*/
	class Menus extends Model {




		/**
		* Función que recibe un entero y retorna verdadero o false
		*
		* Chequea la existencia del plato
		*
		* @param integer $cod un entero que contiene el código del plato
		* @return bool retorna verdadero si existe, o falso en caso contrario
		*/
		public function checkMenus($cod) {
			if(!$this->db->isinteger($cod)) throw new Exception;

			$this->db->query("SELECT *
							  FROM menus
							  WHERE cod_menu = $cod");

			return $this->db->hasResults();
		}




		/**
		* Función que recibe un entero y elimina un registro de la base de datos
		*
		* Elimina el plato correspondiente al código del plato recibido
		*
		* @param integer $codmenu un entero que contiene el código del plato
		*/
		public function deleteMenuPedido($codmenu) {
			if(!$this->checkMenus($codmenu)) throw new Exception;

			$this->db->query("DELETE FROM detalle_pedido
							  WHERE cod_menu = $codmenu");
		}




		/**
		* Función que retorna registros
		*
		* Devuelve las Bebidas
		*
		* @return array|NULL retorna un array con todos los registros correspondientes a Bebidas o NULL en caso de que no exista
		*/
		public function getBebidas() {
			$this->db->query("SELECT *
							  FROM menus
							  WHERE cod_tipo = 4");

			return $this->db->fetchAll();
		}




		/**
		* Función que retorna registros
		*
		* Devuelve los platos de tipo Entrada
		*
		* @return array|NULL retorna un array con todos los registros correspondientes a Entradas o NULL en caso de que no exista
		*/
		public function getEntradas() {
			$this->db->query("SELECT *
							  FROM menus
							  WHERE cod_tipo = 1");

			return $this->db->fetchAll();
		}




		/**
		* Función que recibe un entero y retorna registros, o hace un echo
		*
		* Devuelve los platos correspondientes al dato recibido
		*
		* @param integer $id un entero que identifica el plato
		* @return array|NULL retorna un array con todos los registros de la opción seleccionada, NULL en caso de que no exista tales registros o hace un echo
		* en caso de que el dato enviado no corresponda a ninguna opción
		*/
		public function getMenus($id) {
			if(!$this->db->isinteger($id)) throw new Exception;

			switch ($id) {
				case '1':
					return $this->getEntradas();
				
				case '2':
					return $this->getPlatosPrincipales();

				case '3':
					return $this->getPostres();

				case '4':
					return $this->getBebidas();

				default:
					echo "error";
					break;
			}
		}




		/**
		* Función que recibe 2 enteros y retorna registros
		*
		* Devuelve la cantidad de stock que se le debe reducir a un plato
		*
		* @param integer $cod entero que representa el código del plato
		* @param integer $cantidad entero que representa la cantidad de platos pedidos
		* @return array|NULL retorna un array con los códigos de los platos a los que se le debe reducir el stock y la cantidad de productos utilizados o NULL
		* en caso de que no exista
		*/
		public function getMenusAReducir($cod, $cantidad) {
			if(!$this->checkMenus($cod)) throw new Exception;

			if(!$this->db->isinteger($cantidad)) throw new Exception;
			
			$this->db->query("SELECT p.cod_producto, (dm.cantidad * $cantidad) as 'cantidad_productos'
							  FROM detalle_menu dm LEFT JOIN productos p ON
							  		dm.cod_producto = p.cod_producto
							  WHERE dm.cod_menu = $cod");

			return $this->db->fetchAll();
		}




		/**
		* Función que retorna registros
		*
		* Devuelve los platos Principales
		*
		* @return array|NULL retorna un array con todos los registros correspondientes a platos Principales o NULL en caso de que no exista
		*/
		public function getPlatosPrincipales() {
			$this->db->query("SELECT *
							  FROM menus
							  WHERE cod_tipo = 2");

			return $this->db->fetchAll();
		}



		
		/**
		* Función que retorna registros
		*
		* Devuelve los Postres
		*
		* @return array|NULL retorna un array con todos los registros correspondientes a Postres o NULL en caso de que no exista
		*/
		public function getPostres() {
			$this->db->query("SELECT *
							  FROM menus
							  WHERE cod_tipo = 3");

			return $this->db->fetchAll();
		}		
	}