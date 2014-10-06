	<h1>Reto Viajes Transparentes</h1>
	
	<div class="content">
		<h2>Integrantes del equipo</h2>
		<ol>
			<li>Joel Sedano Padilla</li>
			<li>José Raúl Solórzano de Anda</li>
		</ol>
		<p><a href="http://www.joelsedano.com/webs/ifai_viajes/Docs/cartas_participantes.pdf">Carta bajo protesta de decir verdad de los participantes</a></p>
	  
		<!--<h3>Objetivos del reto</h3>

		<ul>
			<li>Transparentar inteligentemente la información pública que se genera sobre los viajes de trabajo nacionales e internacionales de los comisionados y los servidores públicos del IFAI para fomentar un debate público informado y rendir cuentas en la materia</li>
			<li>Desarrollar una herramienta web de código abierto que pueda ser replicada a nivel nacional e internacional por otras instituciones públicas.</li>
			<li>Generar una primera práctica de reutilización de datos abiertos sobre viajes de trabajo para retroalimentar un posible primer estándar de publicación de datos abiertos en viajes de servidores públicos.</li>
			<li>Difundir y dar uso a la información derivada de los trabajos realizados durante los viajes para asociar su costo a los resultados que producen a la luz de las tareas sustantivas y agenda estratégica de la institución.</li>
			<li>Generar estadísticas y métricas sobre distintos aspectos de los viajes de trabajo, así como visualizaciones que permitan realizar comparaciones históricas, temáticas y por servidor público, y que faciliten el seguimiento y la evaluación.</li>
		</ul>

		<p><a href="http://es.slideshare.net/joelsas73/retoviajestransparentes">Presentación PPT del Reto</a></p>
		<h4>Convocatoria completa</h4>
		<p><a href="http://bit.ly/retoviajesifai">Bases del Reto</a></p>-->
		
		<h2>Viajes recientes:</h2>
		
		<p>Presiona sobre algun registro para obtener más información</p>
		
		<table class="table table-striped table-bordered table-responsive">
			<thead>
				<tr>
					<th>No. de comisión</th>
					<th>Servidor público</th>
					<th>Representación</th>
					<th>Viaje</th>
					<th>Destino</th>
					<th>Tipo de comisión</th>
					<th>Periodo</th>
				</tr>
			</thead>
			<tbody>
<?php
	$tipo_representa = array("<span class=\"texto-claro\">No Capturado</span>", "Técnico", "Alto Nivel");
	$tipo_viajes = array("<span class=\"texto-claro\">No Capturado</span>", "Nacional", "Internacional");
	for($i=0; $i<count($viajes); $i++){
		$v = $viajes[$i];
		echo "				<tr class=\"enlace\" onclick=\"detalles({$v->id})\">\n";
		if($v->num_comision == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
		else echo "					<td>{$v->num_comision}</td>\n";
		if($v->nombre == "") echo "					<td><em class=\"texto-claro\">No capturado</em></td>\n";
		else echo "					<td>{$v->nombre} {$v->apellido1} {$v->apellido2}<br><small>{$v->cargo}</small></td>\n";
		echo "					<td>{$tipo_representa[$v->tipo_representacion]}</td>\n";
		echo "					<td>{$tipo_viajes[$v->tipo_viaje]}</td>\n";
		echo "					<td>{$v->ciudad_destino}";
		if($v->estado_destino != "") echo ", {$v->estado_destino}";
		if($v->pais_destino != "") echo "<br><small>{$v->pais_destino}</small>";
		echo "</td>\n";
		echo "					<td>{$v->tipo_comision}</td>\n";
		echo "					<td>".fecha_mx($v->fecha_inicio_comision)." - ".fecha_mx($v->fecha_fin_comision)."</td>\n";
		echo "				</tr>\n";
	}
?>
			</tbody>
		</table>
    </div>

<script>
function detalles(registro){
	/*$.get("<?php echo base_url(); ?>index.php/viaje/detalle/"+registro,
	function(data){
		$.colorbox({html:data, opacity:0.7, width:'80%', height:'90%'});
	});*/
	window.location.assign("<?php echo base_url(); ?>index.php/viaje/detalle/"+registro);
}
</script>