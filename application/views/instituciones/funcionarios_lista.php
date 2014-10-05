		<h2>Lista de funcionarios</h2>
		
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
					<th class="hidden-print">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
<?php
		for($i = 0; $i < count($funcionarios); $i++){
			$funcionario = $funcionarios[$i];
			echo "				<tr>\n";
			if($funcionario->nombre == "") echo "					<td><em class=\"texto-claro\">N/D</em></td>\n";
			else echo "					<td>{$funcionario->apellido1} {$funcionario->apellido2}, {$funcionario->nombre}</td>\n";
			echo "					<td>{$funcionario->cargo}</td>\n";
			echo "					<td>{$funcionario->unidad_administrativa}</td>\n";
			if($funcionario->correo_e != "") echo "<td><a href=\"mailto:{$funcionario->correo_e}\">{$funcionario->correo_e}</a></td>\n";
			else echo "					<td>&nbsp;</td>\n";
			echo "					<td class=\"hidden-print\">
		<div class=\"dropdown\">
  <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\">
    Acciones
    <span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dropdownMenu1\">
	<!--<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\"><span class=\"glyphicon glyphicon-eye-open\"></span> Ver</a></li>-->
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\" onclick=\"editar({$funcionario->id})\"><span class=\"glyphicon glyphicon-pencil\"></span> Editar</a></li>
	<li role=\"presentation\" class=\"divider\"></li>
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\" onclick=\"borrar({$funcionario->id})\"><span class=\"glyphicon glyphicon-remove\"></span> Eliminar</a></li>
  </ul>
</div>
		</td>\n";
			echo "				</tr>\n";
		}
?>
			</tbody>
		</table>

<script>
function editar(funcionario){
	window.location.assign("<?php echo base_url(); ?>index.php/admin/editar_funcionario/"+funcionario);
}
function borrar(funcionario){
	alert("Esta función no está programada aún");
}
</script>
