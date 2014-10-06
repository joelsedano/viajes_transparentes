<div class="content">
	<h1><?php echo $titulo_formulario; ?> Viaje</h1>
	<ul class="nav nav-tabs" role="tablist">
		<li id="tab_1" class="pestana active" onclick="info_tab(1)"><a><span class="glyphicon glyphicon-user"></span> Funcionario</a></li>
		<li id="tab_2" class="pestana enlace" onclick="info_tab(2)"><a><span class="glyphicon glyphicon-plane"></span> Viaje</a></li>
		<li id="tab_3" class="pestana enlace" onclick="info_tab(3)"><a><span class="glyphicon glyphicon-calendar"></span> Hospedaje y viáticos</a></li>
		<li id="tab_4" class="pestana enlace" onclick="info_tab(4)"><a><span class="glyphicon glyphicon-calendar"></span> Comisión</a></li>
		<li id="tab_5" class="pestana enlace" onclick="info_tab(5)"><a><span class="glyphicon glyphicon-ok-circle"></span> Evento</a></li>
		<li id="tab_6" class="pestana enlace" onclick="info_tab(6)"><a><span class="glyphicon glyphicon-eye-open"></span> Observaciones</a></li>
	</ul>
		
	<form id="formuario1" class="form-horizontal" role="form" method="post" action="">
		<p><strong>Pendiente:</strong> Validación de formulario</p>
		<div id="contenido_1" class="info_pestana">
			<h3>Datos del funcionario</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Institución</label>
				<div class="col-md-10">
					<select id="instituto" name="instituto" class="form-control" onchange="listaFuncionarios()">
						<option value="0">Instituciones disponibles</option>
<?php
	foreach($instituciones as $valor){
		$extra = "";
		if($viaje->instituto == $valor->id) $extra=" selected";
		echo "						<option value=\"{$valor->id}\"$extra>{$valor->nombre}</option>\n";
	}
?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Funcionario</label>
				<div class="col-md-10" id="lista_funcionarios">
<?php
if(isset($funcionarios)){
	echo "					<select name=\"funcionario\" class=\"form-control\">\n";
	foreach($funcionarios as $valor){
		$extra = "";
		if($viaje->funcionario == $valor->id) $extra = " selected";
		echo "						<option value=\"{$valor->id}\"$extra>{$valor->apellido1} {$valor->apellido2}, {$valor->nombre}</option>\n";
	}
	echo "					</select>\n";
}
?>
				</div>
			</div>
			<!--<div class="form-group">
				<label class="col-md-2 control-label">Cargo del Funcionario</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="cargo_servidor" placeholder="Cargo del funcionario"<?php if(isset($viaje->cargo_servidor)) echo " value=\"{$viaje->cargo_servidor}\""; ?>>
				</div>
				
				<label class="col-md-2 control-label">Grupo jerárquico</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="grupo_servidor" placeholder="Grupo jerárquico"<?php if(isset($viaje->grupo_servidor)) echo " value=\"{$viaje->grupo_servidor}\""; ?>>
				</div>
			</div>-->
			
			<div class="form-group">
				<div class="pull-right">
					<button type="button" class="btn btn-primary" onclick="info_tab(2)">Siguiente pestaña <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>
		</div>
		
		<div id="contenido_2" class="info_pestana oculto">
			<h3>Datos de registro de viaje</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Tipo de representación</label>
				<div class="col-md-4">
					<select class="form-control" name="tipo_representacion">
						<option value="0"<?php if($viaje->tipo_representacion == 0) echo " selected"; ?>>No definido</option>
						<option value="1"<?php if($viaje->tipo_representacion == 1) echo " selected"; ?>>Técnico</option>
						<option value="2"<?php if($viaje->tipo_representacion == 2) echo " selected"; ?>>Alto Nivel</option>
					</select>
				</div>
				<label class="col-md-2 control-label">Mecanismo de origen</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="mecanismo_origen" placeholder="Mecanismo de origen"<?php if(isset($viaje->mecanismo_origen)) echo " value=\"{$viaje->mecanismo_origen}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Tipo de viaje</label>
				<div class="col-md-4">
					<select class="form-control" name="tipo_viaje">
						<option value="0"<?php if($viaje->tipo_viaje == 0) echo " selected"; ?>>No definido</option>
						<option value="1"<?php if($viaje->tipo_viaje == 1) echo " selected"; ?>>Nacional</option>
						<option value="2"<?php if($viaje->tipo_viaje == 2) echo " selected"; ?>>Internacional</option>
					</select>
				</div>
				<label class="col-md-2 control-label">No. de autorización</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="num_autorizacion" placeholder="No. de autorización"<?php if(isset($viaje->num_autorizacion)) echo " value=\"{$viaje->num_autorizacion}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">No. de oficio</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="num_oficio" placeholder="No. de oficio"<?php if(isset($viaje->num_oficio)) echo " value=\"{$viaje->num_oficio}\""; ?>>
				</div>
				<label class="col-md-2 control-label">No. de comisión</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="num_comision" placeholder="No. de comisión"<?php if(isset($viaje->num_comision)) echo " value=\"{$viaje->num_comision}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Solicitante</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="solicitante" placeholder="Solicitante"<?php if(isset($viaje->solicitante)) echo " value=\"{$viaje->solicitante}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Unidad responsable</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="unidad_responsable" placeholder="Unidad responsable"<?php if(isset($viaje->unidad_responsable)) echo " value=\"{$viaje->unidad_responsable}\""; ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Tipo de pasaje</label>
				<div class="col-md-4">
					<select class="form-control" name="tipo_pasaje">
						<option value="0">No especificado</option>
						<option value="1">Terrestre</option>
						<option value="2">Aéreo</option>
						<option value="3">Marino</option>
					</select>
				</div>
			</div>
			
			<h3>Vuelos</h3>
			<div class="form-group">
				<label class="col-sm-3 col-md-2 control-label">Aerolínea de ida</label>
				<div class="col-sm-3 col-md-4">
					<select class="form-control" name="aerolinea_ida"><?php
					foreach($aerolineas as $valor){
						$extra = "";
						if($valor->id ==$viaje->aerolinea_ida) $extra = " selected";
						echo "						<option value=\"{$valor->id}\"$extra>{$valor->nombre_aero}</option>\n";
					}
					?></select>
				</div>
				<label class="col-sm-3 control-label">Número de vuelo de ida</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="num_vuelo_ida" placeholder=""<?php if(isset($viaje->num_vuelo_ida)) echo " value=\"{$viaje->num_vuelo_ida}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 col-md-2 control-label">Aerolínea de regreso</label>
				<div class="col-sm-3 col-md-4">
					<select class="form-control" name="aerolinea_vuelta"><?php
					foreach($aerolineas as $valor){
						$extra = "";
						if($valor->id ==$viaje->aerolinea_vuelta) $extra = " selected";
						echo "						<option value=\"{$valor->id}\"$extra>{$valor->nombre_aero}</option>\n";
					}
					?></select>
				</div>
				<label class="col-sm-3 control-label">Número de vuelo de regreso</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="num_vuelo_vuelta" placeholder=""<?php if(isset($viaje->num_vuelo_vuelta)) echo " value=\"{$viaje->num_vuelo_vuelta}\""; ?>>
				</div>
			</div>
			
			<h3>Origen</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">País de origen</label>
				
				<div class="col-md-4">
					<input type="text" class="form-control" name="pais_origen" placeholder="País de origen"<?php if(isset($viaje->pais_origen)) echo " value=\"{$viaje->pais_origen}\""; ?>>
				</div>
				<label class="col-md-2 control-label">Estado de origen</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="estado_origen" placeholder="Estado de origen"<?php if(isset($viaje->estado_origen)) echo " value=\"{$viaje->estado_origen}\""; ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Ciudad de origen</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="ciudad_origen" placeholder="Ciudad de origen"<?php if(isset($viaje->ciudad_origen)) echo " value=\"{$viaje->ciudad_origen}\""; ?>>
				</div>
			</div>
			
			<h3>Destino</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">País de destino</label>
				
				<div class="col-md-4">
					<input type="text" class="form-control" name="pais_destino" placeholder="País de destino"<?php if(isset($viaje->pais_destino)) echo " value=\"{$viaje->pais_destino}\""; ?>>
				</div>
				<label class="col-md-2 control-label">Estado de destino</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="estado_destino" placeholder="Estado de destino"<?php if(isset($viaje->estado_destino)) echo " value=\"{$viaje->estado_destino}\""; ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Ciudad de destino</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="ciudad_destino" placeholder="Ciudad de destino"<?php if(isset($viaje->ciudad_destino)) echo " value=\"{$viaje->ciudad_destino}\""; ?>>
				</div>
			</div>
			
			<h3>Pago</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Institución que cubre vuelo</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="institucion_pago" placeholder="Nombre de la institución"<?php if(isset($viaje->institucion_pago)) echo " value=\"{$viaje->institucion_pago}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" onclick="info_tab(1)"><span class="glyphicon glyphicon-chevron-left"></span> Pestaña anterior</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary" onclick="info_tab(3)">Siguiente pestaña <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>
		</div>
		
		<div id="contenido_3" class="info_pestana oculto">
			<h3>Hospedaje y viáticos</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Tarifa diaria de viáticos por día</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="tarifa_x_dia" placeholder="Tarifa de viáticos por día"<?php if(isset($viaje->tarifa_x_dia)) echo " value=\"{$viaje->tarifa_x_dia}\""; ?>>
					</div>
				</div>
					<label class="col-md-3 control-label">Moneda</label>
					<div class="col-md-2">
					<select name="moneda" class="form-control">
						<option value="1">MXN</option>
						<option value="2">USD</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Fecha de entrada al hotel</label>
				<div class="col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_entrada" placeholder=""<?php if(isset($viaje->fecha_entrada)) echo " value=\"".fecha_mx2($viaje->fecha_entrada)."\""; ?>>
						
					</div>
				</div>
				<label class="col-md-3 control-label">Fecha de salida al hotel</label>
				<div class="col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_salida" placeholder=""<?php if(isset($viaje->fecha_salida)) echo " value=\"".fecha_mx2($viaje->fecha_salida)."\""; ?>>
						
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre del hotel</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="nombre_hotel" placeholder="Nombre del hotel"<?php if(isset($viaje->nombre_hotel)) echo " value=\"{$viaje->nombre_hotel}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Costo total del hospedaje</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="costo_total_hospedaje" placeholder="0.00"<?php if(isset($viaje->costo_total_hospedaje)) echo " value=\"{$viaje->costo_total_hospedaje}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
				<label class="col-md-2 control-label">Monto comprobado de viáticos</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="monto_viaticos_comprobados" placeholder="0.00"<?php if(isset($viaje->monto_viaticos_comprobados)) echo " value=\"{$viaje->monto_viaticos_comprobados}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
				<label class="col-md-2 control-label">Monto sin comprobación</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="monto_viaticos_no_comprobados" placeholder="0.00"<?php if(isset($viaje->monto_viaticos_no_comprobados)) echo " value=\"{$viaje->monto_viaticos_no_comprobados}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Monto de viáticos devueltos</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="monto_viaticos_devueltos" placeholder="0.00"<?php if(isset($viaje->monto_viaticos_devueltos)) echo " value=\"{$viaje->monto_viaticos_devueltos}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Gasto por concepto de pasajes en pesos</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="gastos_pasajes_mxn" placeholder="0.00"<?php if(isset($viaje->gastos_pasajes_mxn)) echo " value=\"{$viaje->gastos_pasajes_mxn}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
				<label class="col-md-2 control-label">Gasto por concepto de viáticos en pesos</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="gastos_viaticos_mxn" placeholder="0.00"<?php if(isset($viaje->gastos_viaticos_mxn)) echo " value=\"{$viaje->gastos_viaticos_mxn}\""; ?>>
						<span class="input-group-addon">MXN</span>
					</div>
				</div>
				<label class="col-md-2 control-label">Gasto por concepto de viáticos en dólares</label>
				<div class="col-md-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" name="gastos_viaticos_usd" placeholder="0.00"<?php if(isset($viaje->gastos_viaticos_usd)) echo " value=\"{$viaje->gastos_viaticos_usd}\""; ?>>
						<span class="input-group-addon">USD</span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Institución que cubre hospedaje</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="institucion_paga_hospeda" placeholder="Nombre de la institución"<?php if(isset($viaje->institucion_paga_hospeda)) echo " value=\"{$viaje->institucion_paga_hospeda}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" onclick="info_tab(2)"><span class="glyphicon glyphicon-chevron-left"></span> Pestaña anterior</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary" onclick="info_tab(4)">Siguiente pestaña <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>
		</div>
		
		<div id="contenido_4" class="info_pestana oculto">
			<h3>Comisión</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Tipo de comisión</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="tipo_comision" placeholder="Tipo de comisión"<?php if(isset($viaje->tipo_comision)) echo " value=\"{$viaje->tipo_comision}\""; ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 col-md-2 control-label">Fecha de inicio de comisión</label>
				<div class="col-sm-3 col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_inicio_comision" placeholder=""<?php if(isset($viaje->fecha_inicio_comision)) echo " value=\"".fecha_mx2($viaje->fecha_inicio_comision)."\""; ?>>
						
					</div>
				</div>
				
				<label class="col-sm-3 col-md-2 control-label">Fecha de fin de comisión</label>
				<div class="col-sm-3 col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_fin_comision" placeholder=""<?php if(isset($viaje->fecha_fin_comision)) echo " value=\"".fecha_mx2($viaje->fecha_fin_comision)."\""; ?>>
						
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" onclick="info_tab(3)"><span class="glyphicon glyphicon-chevron-left"></span> Pestaña anterior</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary" onclick="info_tab(5)">Siguiente pestaña <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>
		</div>
		
		<div id="contenido_5" class="info_pestana oculto">
			<h3>Evento</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Tema</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="tema" placeholder="Ciudad de destino"<?php if(isset($viaje->tema)) echo " value=\"{$viaje->tema}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre del evento</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="nombre_evento" placeholder="Nombre del evento"<?php if(isset($viaje->nombre_evento)) echo " value=\"{$viaje->nombre_evento}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Página web del evento</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="url_evento" placeholder="Dirección de la página web del evento"<?php if(isset($viaje->url_evento)) echo " value=\"{$viaje->url_evento}\""; ?>>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-3 col-md-2 control-label">Fecha de inicio evento</label>
				<div class="col-sm-3 col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_inicio" placeholder=""<?php if(isset($viaje->fecha_inicio)) echo " value=\"".fecha_mx2($viaje->fecha_inicio)."\""; ?>>
					</div>
				</div>
				<label class="col-sm-3 col-md-2 control-label">Fecha de fin evento</label>
				<div class="col-sm-3 col-md-2">
					<div class="input-group">
						<input type="text" class="datepicker form-control" name="fecha_fin" placeholder=""<?php if(isset($viaje->fecha_fin)) echo " value=\"".fecha_mx2($viaje->fecha_fin)."\""; ?>>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Motivo de la comisión</label>
				<div class="col-md-10">
					<textarea class="form-control" name="motivo_comision" rows="5"><?php if(isset($viaje->motivo_comision)) echo $viaje->motivo_comision; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Antecedentes</label>
				<div class="col-md-10">
					<textarea class="form-control" name="antecedentes" rows="5"><?php if(isset($viaje->antecedentes)) echo $viaje->antecedentes; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Actividades realizadas</label>
				<div class="col-md-10">
					<textarea class="form-control" name="actividades_realizadas" rows="5"><?php if(isset($viaje->actividades_realizadas)) echo $viaje->actividades_realizadas; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Resultados obtenidos</label>
				<div class="col-md-10">
					<textarea class="form-control" name="resultados_obtenidos" rows="5"><?php if(isset($viaje->resultados_obtenidos)) echo $viaje->resultados_obtenidos; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Contribuciones al IFAI</label>
				<div class="col-md-10">
					<textarea class="form-control" name="contribuciones_ifai" rows="5"><?php if(isset($viaje->contribuciones_ifai)) echo $viaje->contribuciones_ifai; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 control-label">Dirección web del comunicado</label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="url_comunicado" placeholder="Dirección web del comunicado"<?php if(isset($viaje->url_comunicado)) echo " value=\"{$viaje->url_comunicado}\""; ?>>
				</div>
			</div>
			<div class="form-group">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" onclick="info_tab(4)"><span class="glyphicon glyphicon-chevron-left"></span> Pestaña anterior</button>
				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-primary" onclick="info_tab(6)">Siguiente pestaña <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>
		</div>
			
		<div id="contenido_6" class="info_pestana oculto">
			<h3>Observaciones</h3>
			<div class="form-group">
				<label class="col-md-2 control-label">Observaciones</label>
				<div class="col-md-10">
					<textarea class="form-control" name="observaciones" rows="5"><?php if(isset($viaje->observaciones)) echo $viaje->observaciones; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="pull-left">
					<button type="button" class="btn btn-primary" onclick="info_tab(5)"><span class="glyphicon glyphicon-chevron-left"></span> Pestaña anterior</button>
				</div>
				<div class="pull-right">
					<input type="submit" name="accion" value="<?php echo $titulo_formulario; ?>" class="btn btn-success">
				</div>
			</div>
		</div>
		
	</form>
</div>
	
<script>
function listaFuncionarios(){
	var texto = "";
	var instituto = $('#instituto').val();
	$.get("<?php echo base_url(); ?>index.php/instituciones/funcionarios_json/"+instituto,
	function(data){
		var obj = JSON.parse(data);
		var cantidad = obj.length;
		if(cantidad){
			for(i = 0; i < cantidad; i++){
				texto += "<option value=\""+obj[i].id+"\">"+obj[i].apellido1+" "+obj[i].apellido2+", "+obj[i].nombre+"</option>\n";
			}
			$('#lista_funcionarios').html("<select id=\"funcionario\" name=\"funcionario\" class=\"form-control\">"+texto+"</select>\n");
		}
	});
}
function seleccionaFuncionario(){
	var funcionario = $('#funcionario').val();
}
function info_tab(n){
	$('.pestana').removeClass("active");
	$('#tab_'+n).addClass("active");
	$('.info_pestana').hide();
	$('#contenido_'+n).show();
}

//prevenir enviar formulario con Enter
/*$('#formuario1').bind("keyup keypress", function(e) {
	var code = e.keyCode || e.which; 
	if (code == 13) {               
		e.preventDefault();
		return false;
	}
});*/
</script>