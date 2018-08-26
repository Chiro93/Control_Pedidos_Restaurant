<!-- fw/DataBase.php -->

<?php
	class DataBase {
		private $cn;
		private $res;

		private static $instance;							//Singleton: se utiliza una unica instancia (para que no se realice mas de una conexion inecesaria)

		private function __construct() {}					//Singleton

		public static function getInstance() {				//Singleton
			if (! self::$instance)
				self::$instance = new DataBase;
			
			return self::$instance;
		}

		public function query($q) {
			if (!$this->cn) {
				$this->cn = mysqli_connect("localhost", "root", "", "pf");
				mysqli_query($this->cn, "SET NAMES utf8");
			}

			$this->res = mysqli_query($this->cn, $q);

			if(mysqli_error($this->cn) != "")
				echo 'ERROR CONSULTA: '.mysqli_error($this->cn);
		}

		public function fetchAll() {
			$aux = array();

			while ($fila = $this->fetch()) {
				$aux[] = $fila;
			}

			return $aux;
		}

		public function fetch() {
			return mysqli_fetch_assoc($this->res);
		}

		public function numRows() {
			return mysqli_num_rows($this->res);
		}

		public function escape($str) {
			return mysqli_escape_string($this->cn, $str);
		}

		public function escapejoker($str) {
			$str = str_replace("%","\%", $str);
			$str = str_replace("_","\_", $str);
			return $str;
		}

		public function isnumeric($num) {
			return is_numeric($num);
		}

		public function isinteger($num) {
			return ctype_digit($num);
		}

		public function hasResults() {
			if ($this->numRows() > 0)
				return true;

			return false;
		}
	}
?>