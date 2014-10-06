<?php
	//En vez de hacer tablas y tablas con contenido que nunca cambia hago estas funciones simples y asi le quitamos carga a mysql
	
	function tipo_viajes($t = 0){
		$tipo_viajes = array("<span class=\"texto-claro\">No Capturado</span>", "Técnico", "Alto Nivel");
		return $tipo_viajes[$t];
	}
	
	function tipo_representa($t = 0){
		$tipo_representa = array("<span class=\"texto-claro\">No Capturado</span>", "Técnico", "Alto Nivel");
		return $tipo_representa[$t];
	}
	
	function tipo_pasaje($t = 0){
		$tipo_pasaje = array("<span class=\"texto-claro\">No Capturado</span>", "Terrestre", "Aéreo", "Marino");
		return $tipo_pasaje[$t];
	}
	
	function tipo_personal($t = 0){
		$tipo_personal = array("<span class=\"texto-claro\">No Capturado</span>", "Confianza", "Base");
		return $tipo_personal[$t];
	}

?>
