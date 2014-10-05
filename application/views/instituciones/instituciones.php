	<h1>Instituciones</h1>
	
	<p>Presiona sobre una institución para obtener más información y su lista de funcionarios</p>
	
	<div class="content">
		<table class="table table-striped table-bordered table-responsive table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Estado</th>
					<th>Telefono(s)</th>
				</tr>
			</thead>
			<tbody>
<?php
	for($i=0; $i<count($instituciones); $i++){
		$institu = $instituciones[$i];
		echo "				<tr class=\"enlace\" onclick=\"funcionarios({$institu->id})\">\n";
		if($institu->nombre == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
		else echo "					<td>{$institu->nombre}";
		if($institu->url_web != "") echo "<p><a href=\"http://{$institu->url_web}\" target=\"_blank\">{$institu->url_web}</a></p>";
		echo "</td>\n";
		if($institu->calle == "") echo "					<td><em class=\"texto-claro\">No capturado</em></td>\n";
		else echo "					<td>{$institu->calle} {$institu->numero_exterior}";
		if($institu->numero_interior != "") "Interior {$institu->numero_interior}";
		echo "<br>\n";
		if($institu->colonia != "") echo $institu->colonia;
		if($institu->ciudad != "") echo ", ".$institu->ciudad;
		if($institu->codigo_postal != 0) echo "<br>C.P. ".$institu->codigo_postal;
		echo "</td>\n";
		echo "					<td>{$institu->estado}</td>\n";
		echo "					<td>{$institu->telefonos}";
		if($institu->fax != "") echo "<br>Fax: {$institu->fax}";
		echo "</td>\n";
		echo "				</tr>\n";
	}
?>
			</tbody>
		</table>
    </div>

<script>
function funcionarios(instituto){
	window.location.assign("<?php echo base_url(); ?>index.php/instituciones/funcionarios/"+instituto);
}
</script>