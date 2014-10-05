	<h1>Resultados de la búsqueda</h1>
	<div class="content">
		<table class="table table-striped table-bordered table-responsive">
			<thead>
				<tr>
					<th>Numeración</th>
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
	//$tipo_representa = array("<span class=\"texto-claro\">No Capturado</span>", "Técnico", "Alto Nivel");
	//$tipo_viajes = array("<span class=\"texto-claro\">No Capturado</span>", "Nacional", "Internacional");
	for($i=0; $i<count($viajes); $i++){
		$v = $viajes[$i];
		echo "				<tr class=\"enlace\" onclick=\"detalles({$v->id})\">\n";
		if($v->numeracion == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
		else echo "					<td>{$v->numeracion}</td>\n";
		if($v->nombre == "") echo "					<td><em class=\"texto-claro\">No capturado</em></td>\n";
		else echo "					<td>{$v->nombre} {$v->apellido1} {$v->apellido2}<br><small>{$v->cargo}</small></td>\n";
		echo "					<td>".tipo_representa($v->tipo_representacion)."</td>\n";
		echo "					<td>".tipo_viajes($v->tipo_viaje)."</td>\n";
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
	window.location.assign("<?php echo base_url(); ?>index.php/viaje/detalle/"+registro);
}
</script>