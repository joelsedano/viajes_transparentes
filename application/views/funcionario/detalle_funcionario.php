	<div class="btn-group btn-breadcrumb">
		<a href="<?php echo base_url(); ?>index.php" class="btn btn-default"><i class="fa fa-home"></i> Inicio</a>
		<!--<a href="#" class="btn btn-default" onclick="window.history.back()"><span class="glyphicon glyphicon-plane"></span> Detalles del viaje</a>-->
		<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Detalles del servidor público</a>
	</div>
	
	<h1><?php echo $funcionario->nombre." ".$funcionario->apellido1." ".$funcionario->apellido2 ; ?></h1>
	
	<div class="content">
		<!--<p><strong>Nombre:</strong> <?php echo $funcionario->nombre." ".$funcionario->apellido1." ".$funcionario->apellido2 ; ?></p>-->
		<p><strong>Correo-E:</strong> <a href="mailto:<?php echo $funcionario->correo_e; ?>"><?php echo $funcionario->correo_e; ?></a></p>
		<p><strong>Tipo de Personal:</strong> <?php echo tipo_personal($funcionario->tipo_personal); ?></p>
		<p><strong>Cargo:</strong> <?php echo $funcionario->cargo; ?></p>
		<p><strong>Institución:</strong> <?php echo $funcionario->nombre_institucion; ?></p>
		<p><strong>Clave del puesto:</strong> <?php echo $funcionario->clave_puesto; ?></p>
		<p><strong>Nombre del puesto:</strong> <?php echo $funcionario->nombre_puesto; ?></p>
		<p><strong>Cargo Superior:</strong> <?php echo $funcionario->cargo_superior; ?></p>
		<p><strong>Unidad Administrativa:</strong> <?php echo $funcionario->unidad_administrativa; ?></p>
		
		<form class="form-horizontal" role="form" method="post" action="">
			<div class="form-group">
				<label class="col-sm-4 control-label">Informáme de cada viaje nuevo de éste funcionario</label>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="correo" placeholder="Tu correo electrónico...">
					</div>
					<div class="col-sm-1">
						<input type="submit" name="accion" value="Suscribirse" class="btn btn-success">
					</div>
				</div>
			</div>
			<p><small><strong>Nota:</strong> El formulario anterior no hace nada aún</small></p>
		</form>
<?php
	//en caso que tengamos registrados viajes para este funcionario
	if($viajes != -1){
?>
		<h2>Viajes realizados</h2>
		<ul class="pagination ">
			<li><a href="#">&laquo;</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
		<p><small><strong>Nota:</strong> Paginación de ejemplo, aún no hace nada</small></p>
		
		<table class="table table-striped table-bordered table-responsive">
			<thead>
				<tr>
					<th>No. de comisión</th>
					<th>Representación</th>
					<th>Viaje</th>
					<th>Destino</th>
					<th>Tipo de comisión</th>
					<th>Periodo</th>
				</tr>
			</thead>
			<tbody>
<?php
	for($i=0; $i<count($viajes); $i++){
		$v = $viajes[$i];
		echo "				<tr class=\"enlace\" onclick=\"detalles({$v->id})\">\n";
		if($v->num_comision == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
		else echo "					<td>{$v->num_comision}</td>\n";
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
<script>
function detalles(registro){
	window.location.assign("<?php echo base_url(); ?>index.php/viaje/detalle/"+registro);
}
</script>
<?php
	} // fin de if($viajes != -1)
?>
    </div>
