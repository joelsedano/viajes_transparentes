		<h2>Lista de viajes hechos por funcionarios de esa institución</h2>
		
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
					<th>Numeración</th>
					<th>Funcionario</th>
					<th>Cargo</th>
					<th>Unidad Administrativa</th>
					<th>Destino</th>
					<th class="hidden-print">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
<?php
		for($i = 0; $i < count($viajes); $i++){
			$viaje = $viajes[$i];
			echo "				<tr>\n";
			echo "					<td><em class=\"texto-claro\">{$viaje->numeracion}</em></td>\n";
			echo "					<td>{$viaje->apellido1} {$viaje->apellido2}, {$viaje->nombre}</td>\n";
			echo "					<td>{$viaje->cargo}</td>\n";
			echo "					<td>{$viaje->unidad_administrativa}</td>\n";
			if($viaje->correo_e != "") echo "<td><a href=\"mailto:{$viaje->correo_e}\">{$viaje->correo_e}</a></td>\n";
			else echo "					<td>&nbsp;</td>\n";
			echo "					<td class=\"hidden-print\">
		<div class=\"dropdown\">
  <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\">
    Acciones
    <span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"dropdownMenu1\">
	<!--<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\"><span class=\"glyphicon glyphicon-eye-open\"></span> Ver</a></li>-->
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\" onclick=\"editar({$viaje->id})\"><span class=\"glyphicon glyphicon-pencil\"></span> Editar</a></li>
	<li role=\"presentation\" class=\"divider\"></li>
	<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\" onclick=\"borrar({$viaje->id})\"><span class=\"glyphicon glyphicon-remove\"></span> Eliminar</a></li>
  </ul>
</div>
		</td>\n";
			echo "				</tr>\n";
		}
?>
			</tbody>
		</table>

