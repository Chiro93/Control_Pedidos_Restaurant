<?php
	//models/Mesas.php

	/**
	* Clase del Modelo Mesas
	*
	* Contiene un conjunto de métodos que son utilizados cuando se necesitan funcionalidades que involucran mesas.
	*
	* @package ProyectoFinal
	* @author Lucas Duré
	* @version 0.1
	*/
	class Mesas extends Model {




		/**
		* Función que recibe un entero y retorna verdadero o falso
		*
		* Chequea la existencia de una mesa
		*
		* @param integer $mesa un entero que representa el número de la mesa a chequear
		* @return bool retorna verdadero si existe la mesa, o falso en caso contrario
		*/
		public function checkMesas($mesa) {
			if(!$this->db->isinteger($mesa)) throw new Exception;

			$this->db->query("SELECT *
					  		  FROM mesas
					  		  WHERE num_mesa = $mesa");

			return $this->db->hasResults();
		}



		
		/**
		* Recibe un entero y retorna un array.
		*
		* Devuelve la cantidad de personas del número de mesa recibido
		*
		* @param integer $nummesa un entero que representa el número de la mesa
		* @return array|NULL retorna un array con la cantidad de personas de la mesa
		*/
		public function getCantidadPersonas($nummesa) {
			if(!$this->checkMesas($nummesa)) throw new Exception;

			$this->db->query("SELECT cant_personas
							  FROM mesas
							  WHERE num_mesa = $nummesa");

			return $this->db->fetch();
		}
	}