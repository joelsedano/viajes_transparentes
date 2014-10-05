	<div class="form-group">
		<label class="col-sm-3 control-label">Seleccione un funcionario:</label>
		<div class="row">
			<div class="col-sm-8">
				<select id="funcionarios" class="form-control" onchange="listaViajes()">
<?php
	foreach($funcionarios as $valor){
		echo "					<option value=\"0\">Instituciones disponibles</option>\n";
		echo "					<option value=\"{$valor->id}\">{$valor->apellido1} {$valor->apellido2}, {$valor->nombre}</option>\n";
	}
?>
				</select>
			</div>
		</div>
	</div>