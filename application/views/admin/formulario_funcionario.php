	<div class="content">
		<h1><?php echo $titulo_formulario; ?> Funcionario</h1>

		<form class="form-horizontal" role="form" method="post" action="">
			<div class="form-group">
				<label class="col-sm-2 control-label">Institución</label>
				<div class="col-sm-10">
					<select name="institucion" class="form-control">
						<option value="0">Instituciones disponibles</option>
<?php
	foreach($instituciones as $valor){
		if($funcionario->institucion == $valor->id) echo "						<option value=\"{$valor->id}\" selected>{$valor->nombre}</option>\n";
		else echo "						<option value=\"{$valor->id}\">{$valor->nombre}</option>\n";
	}
?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre(s)</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="nombre" placeholder="Nombre(s)"<?php if(isset($funcionario->nombre)) echo " value=\"{$funcionario->nombre}\""; ?>>
				</div>
				<label class="col-sm-1 control-label">Apellidos</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="apellido1" placeholder="Apellido paterno"<?php if(isset($funcionario->apellido1)) echo " value=\"{$funcionario->apellido1}\""; ?>>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="apellido2" placeholder="Apellido materno"<?php if(isset($funcionario->apellido2)) echo " value=\"{$funcionario->apellido2}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Tipo de personal</label>
<?php $tipo_personal = isset($funcionario->tipo_personal) ? $funcionario->tipo_personal : 0; ?>
				<div class="col-sm-3">
					<select name="tipo_personal" class="form-control">
						<option value="0"<?php if($tipo_personal == 0) echo " selected"; ?>>No definido</option>
						<option value="1"<?php if($tipo_personal == 1) echo " selected"; ?>>De confianza</option>
						<option value="2"<?php if($tipo_personal == 2) echo " selected"; ?>>Base</option>
					</select>
				</div>
				<label class="col-sm-1 control-label">Cargo</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="cargo" placeholder="Nombre del cargo"<?php if(isset($funcionario->cargo)) echo " value=\"{$funcionario->cargo}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Cargo superior</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="cargo_superior" placeholder="Cargo del superior jerárquico"<?php if(isset($funcionario->cargo_superior)) echo " value=\"{$funcionario->cargo_superior}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Unidad administrativa</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="unidad_administrativa" placeholder="Unidad Administrativa"<?php if(isset($funcionario->unidad_administrativa)) echo " value=\"{$funcionario->unidad_administrativa}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre del puesto</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="nombre_puesto" placeholder="Nombre del puesto"<?php if(isset($funcionario->nombre_puesto)) echo " value=\"{$funcionario->nombre_puesto}\""; ?>>
				</div>
				<label class="col-sm-2 control-label">Clave del puesto</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="clave_puesto" placeholder="Clave del puesto"<?php if(isset($funcionario->clave_puesto)) echo " value=\"{$funcionario->clave_puesto}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Correo electrónico</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="correo_e" placeholder="Correo electrónico"<?php if(isset($funcionario->correo_e)) echo " value=\"{$funcionario->correo_e}\""; ?>>
					</div>
			</div>
			
			<div class="pull-right form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="accion" value="<?php echo $titulo_formulario; ?>" class="btn btn-success">
				</div>
			</div>
		</form>
    </div>