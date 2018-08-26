<?php
	//models/Productos.php

	/**
	* Clase del Modelo Productos
	*
	* Contiene un conjunto de métodos que son utilizados cuando se necesitan funcionalidades que involucran productos.
	*
	* @package ProyectoFinal
	* @author Lucas Duré
	* @version 0.1
	*/
	class Productos extends Model {




		/**
		* Función que recibe un entero y retorna verdadero o falso
		*
		* Chequea la existencia de un producto
		*
		* @param integer $codproducto un entero que representa el código de un producto
		* @return bool retorna verdadero en caso de que exista el producto o falso en caso contrario
		*/		
		public function checkProductos($codproducto) {
			if(!$this->db->isinteger($codproducto)) throw new Exception;

			$this->db->query("SELECT *
							  FROM productos
							  WHERE cod_producto = $codproducto");

			return $this->db->hasResults();
		}




		/**
		* Función que retorna registros
		*
		* Chequea que el stock de un producto esté sobre el punto de reposición
		*
		* @return array|NULL retorna un array con el código del producto y el código del plato que está debajo del punto de reposición, o NULL en caso
		* de que no exista
		*/
		public function checkStock() {
			$this->db->query("SELECT DISTINCT p.cod_producto as cod_producto, dm.cod_menu as cod_menu
						  	  FROM productos p LEFT JOIN detalle_menu dm ON
						  			p.cod_producto = dm.cod_producto
						  	  WHERE stock < pto_reposicion");

			return $this->db->fetchAll();
		}




		/**
		* Función que actualiza la base de datos
		*
		* Reduce el stock (determinado por la cantidad enviada) del producto correspondiente al código enviado
		*
		* @param integer $codproducto un entero que representa el código del producto al que se le debe reducir el stock
		* @param float $cantidad un flotante que representa la cantidad de stock a reducir
		*/
		public function reduceStock($codproducto,$cantidad) {
			if(!$this->checkProductos($codproducto)) throw new Exception;

			if(!$this->isnumeric($cantidad)) throw new Exception;
			
			$this->db->query("UPDATE productos
							  SET stock = stock - $cantidad
							  WHERE cod_producto = $codproducto");

		}
	}