	<div class="content">
	<h1><?php echo $institucion->nombre; ?></h1>
	
	<h2>Domicilio:</h2>
	<p><?php
	echo $institucion->calle;
	echo " ".$institucion->numero_exterior;
	if ($institucion->numero_interior != "") echo " - ".$institucion->numero_interior;
	echo "<br>";
	if($institucion->colonia != "") echo "Colonia ".$institucion->colonia."<br>";
	if($institucion->ciudad != "") echo $institucion->ciudad;
	if($institucion->estado != "") echo ", ".$institucion->estado;
	echo "<br>";
	if($institucion->codigo_postal != "") echo "C.P. ".$institucion->codigo_postal."<br>";
	if($institucion->telefonos != "") echo "Tel: ".$institucion->telefonos."<br>";
	if($institucion->fax != "") echo "Fax: ".$institucion->fax."<br>";
	$url = str_replace("http://", "", $institucion->url_web);
	if($institucion->url_web != "") echo "<a href=\"http://$url\" target=\"_blank\">$url</a><br>";
	?></p>

<?php
	$cantidad_funcionarios = count($funcionarios);
	if($cantidad_funcionarios > 0){
?>
	<h2>Lista de funcionarios:</h2>

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
					<th>Nombre</th>
					<th>Cargo</th>
					<th>Unidad Administrativa</th>
					<th>Correo-E</th>
				</tr>
			</thead>
			<tbody>
<?php
		for($i = 0; $i < $cantidad_funcionarios; $i++){
			$funcionario = $funcionarios[$i];
			echo "				<tr class=\"enlace\" onclick=\"detalle({$funcionario->id})\">\n";
			if($funcionario->nombre == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
			else echo "					<td>{$funcionario->apellido1} {$funcionario->apellido2}, {$funcionario->nombre}</td>\n";
			echo "					<td>{$funcionario->cargo}</td>\n";
			echo "					<td>{$funcionario->unidad_administrativa}</td>\n";
			if($funcionario->correo_e != "") echo "<td><a href=\"{$funcionario->correo_e}\">{$funcionario->correo_e}</a></td>\n";
			echo "				</tr>\n";
		}
?>
			</tbody>
		</table>
    </div>

<script>
function detalle(funcionario){
	window.location.assign("<?php echo base_url(); ?>index.php/funcionario/detalle/"+funcionario);
}
</script>
<?php
	}
?>