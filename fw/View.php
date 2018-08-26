<?php
	
	//	fw/View.php

	abstract class View {
		public function render() {
				include '../html/'. get_class($this) .'.php';
			}

		public function __set($a,$b) {
			die("La variable $a no existe!!");
		}
	}
?>