	<div class="content">
		<h1><?php echo $titulo_formulario; ?> Institución</h1>

		<form class="form-horizontal" role="form" method="post" action="">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la institución"<?php if(isset($institucion->nombre)) echo " value=\"{$institucion->nombre}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Domicilio</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="calle" name="calle" placeholder="Nombre de la calle"<?php if(isset($institucion->calle)) echo " value=\"{$institucion->calle}\""; ?>>
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="numero_exterior" placeholder="No. de Exterior"<?php if(isset($institucion->numero_exterior)) echo " value=\"{$institucion->numero_exterior}\""; ?>>
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="numero_interior" placeholder="No. de Interior"<?php if(isset($institucion->numero_interior)) echo " value=\"{$institucion->numero_interior}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Colonia</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="colonia" id="colonia" placeholder="Nombre de la colonia"<?php if(isset($institucion->colonia)) echo " value=\"{$institucion->colonia}\""; ?>>
				</div>
				<label class="col-sm-2 control-label">Código Postal</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" name="codigo_postal" placeholder="Código Postal"<?php if(isset($institucion->codigo_postal)) echo " value=\"{$institucion->codigo_postal}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Ciudad</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="ciudad" placeholder="Ciudad"<?php if(isset($institucion->ciudad)) echo " value=\"{$institucion->ciudad}\""; ?>>
				</div>
<?php
	$insti_estado = isset($institucion->estado) ? $institucion->estado : "";
?>
				<div class="col-sm-4">
					<select class="form-control" name="estado">
						<option<?php if($insti_estado == "Aguascalientes") echo " selected"?>>Aguascalientes</option>
						<option<?php if($insti_estado == "Baja California") echo " selected"?>>Baja California</option>
						<option<?php if($insti_estado == "Baja California Sur") echo " selected"?>>Baja California Sur</option>
						<option<?php if($insti_estado == "Campeche") echo " selected"?>>Campeche</option>
						<option<?php if($insti_estado == "Chiapas") echo " selected"?>>Chiapas</option>
						<option<?php if($insti_estado == "Chihuahua") echo " selected"?>>Chihuahua</option>
						<option<?php if($insti_estado == "Coahuila") echo " selected"?>>Coahuila</option>
						<option<?php if($insti_estado == "Colima") echo " selected"?>>Colima</option>
						<option<?php if($insti_estado == "Distrito Federal") echo " selected"?>>Distrito Federal</option>
						<option<?php if($insti_estado == "Durango") echo " selected"?>>Durango</option>
						<option<?php if($insti_estado == "Estado de México") echo " selected"?>>Estado de México</option>
						<option<?php if($insti_estado == "Guanajuato") echo " selected"?>>Guanajuato</option>
						<option<?php if($insti_estado == "Guerrero") echo " selected"?>>Guerrero</option>
						<option<?php if($insti_estado == "Hidalgo") echo " selected"?>>Hidalgo</option>
						<option<?php if($insti_estado == "Jalisco") echo " selected"?>>Jalisco</option>
						<option<?php if($insti_estado == "Michoacán") echo " selected"?>>Michoacán</option>
						<option<?php if($insti_estado == "Morelos") echo " selected"?>>Morelos</option>
						<option<?php if($insti_estado == "Nayarit") echo " selected"?>>Nayarit</option>
						<option<?php if($insti_estado == "Nuevo León") echo " selected"?>>Nuevo León</option>
						<option<?php if($insti_estado == "Oaxaca") echo " selected"?>>Oaxaca</option>
						<option<?php if($insti_estado == "Puebla") echo " selected"?>>Puebla</option>
						<option<?php if($insti_estado == "Querétaro") echo " selected"?>>Querétaro</option>
						<option<?php if($insti_estado == "Quintana Roo") echo " selected"?>>Quintana Roo</option>
						<option<?php if($insti_estado == "San Luis Potosí") echo " selected"?>>San Luis Potosí</option>
						<option<?php if($insti_estado == "Sinaloa") echo " selected"?>>Sinaloa</option>
						<option<?php if($insti_estado == "Sonora") echo " selected"?>>Sonora</option>
						<option<?php if($insti_estado == "Tabasco") echo " selected"?>>Tabasco</option>
						<option<?php if($insti_estado == "Tamaulipas") echo " selected"?>>Tamaulipas</option>
						<option<?php if($insti_estado == "Tlaxcala") echo " selected"?>>Tlaxcala</option>
						<option<?php if($insti_estado == "Veracruz") echo " selected"?>>Veracruz</option>
						<option<?php if($insti_estado == "Yucatán") echo " selected"?>>Yucatán</option>
						<option<?php if($insti_estado == "Zacatecas") echo " selected"?>>Zacatecas</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Teléfono(s)</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="telefonos" placeholder="Telefonos"<?php if(isset($institucion->telefonos)) echo " value=\"{$institucion->telefonos}\""; ?>>
				</div>
				<label class="col-sm-1 control-label">Fax</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fax" placeholder="Número de Fax"<?php if(isset($institucion->fax)) echo " value=\"{$institucion->fax}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Página web</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="url_web" placeholder="Dirección de página web"<?php if(isset($institucion->url_web)) echo " value=\"{$institucion->url_web}\""; ?>>
				</div>
			</div>
			
			<div class="form-group pull-right">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="accion" value="<?php echo $titulo_formulario; ?>" class="btn btn-success">
				</div>
			</div>
		</form>
    </div>