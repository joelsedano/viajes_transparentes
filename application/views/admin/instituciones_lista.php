	<div class="content">
		<h1>Instituciones</h1>

		<button type="button" class="btn btn-success btn-lg hidden-print pull-right" style="margin-bottom:20px" onclick="editar(0)">
			<span class="glyphicon glyphicon-plus"></span> Agregar institución
		</button>
		<div class="clearfix"></div>
<?php
	if(isset($mensaje)){
?>
		<div class="alert alert-<?php echo $tipo_mensaje; ?> alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
			<?php echo $mensaje; ?>
		</div>
<?php
	}
?>
		<table class="table table-striped table-bordered table-responsive" style="margin-top:20px">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Estado</th>
					<th>Teléfono(s)</th>
					<th class="hidden-print">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
<?php
	for($i=0; $i<count($instituciones); $i++){
		$institu = $instituciones[$i];
		echo "				<tr>\n";
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
		echo "					<td class=\"hidden-print\">
		<div class=\"dropdown\">
  <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\">
    Acciones
    <span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dropdownMenu1\">
	<!--<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\"><span class=\"glyphicon glyphicon-eye-open\"></span> Ver</a></li>-->
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"".base_url()."index.php/admin/instituto_edita/{$institu->id}\"><span class=\"glyphicon glyphicon-pencil\"></span> Editar</a></li>
	<li role=\"presentation\" class=\"divider\"></li>
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\" onclick=\"borrar({$institu->id})\"><span class=\"glyphicon glyphicon-remove\"></span> Eliminar</a></li>
  </ul>
</div>
		</td>\n";
		echo "				</tr>\n";
	}
?>
			</tbody>
		</table>
    </div>

<script>
function editar(instituto){
	window.location.assign("<?php echo base_url(); ?>index.php/admin/instituto_edita/"+instituto);
}
function borrar(instituto){
	alert("Esta función no está programada aún");
}
</script>