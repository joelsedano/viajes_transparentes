<?php
	function fecha_mx($fecha){
		$meses = array("01"=>"Ene", "02"=>"Feb", "03"=>"Mar", "04"=>"Abr", "05"=>"May", "06"=>"Jun", "07"=>"Jul", "08"=>"Ago", "09"=>"Sep", "10"=>"Oct", "11"=>"Nov", "12"=>"Dic");
		list($anio, $mes, $dia) = explode("-", $fecha);
		if($mes != 00) return "$dia/{$meses[$mes]}/$anio";
		else return "No definido";
	}
	function fecha_mx2sql($fecha){
		list($dia, $mes, $anio) = explode("/", $fecha);
		return "$anio-$mes-$dia";
	}
