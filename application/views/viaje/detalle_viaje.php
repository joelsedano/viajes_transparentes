<?php $v = $detalle; ?>
<div class="hidden-print">
	
	<div class="btn-group btn-breadcrumb">
		<a href="<?php echo base_url(); ?>index.php" class="btn btn-default"><i class="fa fa-home"></i> Inicio</a>
		<a href="#" class="btn btn-default">Detalles del viaje</a>
	</div>

	<h3>Detalles del viaje</h3>
	
	<div class="content">
		<ul class="nav nav-tabs hidden-print" role="tablist">
			<li id="tab_1" class="pestana active" onclick="info_tab(1)"><a><span class="glyphicon glyphicon-info-sign"></span> Info general</a></li>
			<li id="tab_2" class="pestana enlace" onclick="info_tab(2)"><a><span class="glyphicon glyphicon-plane"></span> Viaje</a></li>
			<li id="tab_3" class="pestana enlace" onclick="info_tab(3)"><a><span class="glyphicon glyphicon-calendar"></span> Hospedaje</a></li>
			<li id="tab_4" class="pestana enlace" onclick="info_tab(4)"><a><span class="glyphicon glyphicon-usd"></span> Viáticos</a></li>
			<li id="tab_5" class="pestana enlace" onclick="info_tab(5)"><a><span class="glyphicon glyphicon-ok-circle"></span> Evento</a></li>
			<li id="tab_6" class="pestana enlace" onclick="info_tab(6)"><a><span class="glyphicon glyphicon-eye-open"></span> Observaciones</a></li>
		</ul>
		
		<!-- Detalles generales -->
		<div id="contenido_1" class="info_pestana">
			<p><strong>Servidor público:</strong><br>
				<?php
				if($v->nombre != "") echo $v->nombre." ".$v->apellido1." ".$v->apellido2;
				else echo '<span class="texto-claro">No capturado</span>';
				?><br>
				<?php
				if($v->cargo != "") echo $v->cargo;
				//else echo '<span class="texto-claro">No capturado</span>';
				?>
			</p>
<?php
	if($v->numero_servidor != 0){
?>
				<p class="hidden-print"><a href="<?php echo base_url(); ?>index.php/funcionario/detalle/<?php echo $v->numero_servidor; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Información de éste servidor público</button></a></p>
<?php
	}
?>

			<p><strong>Mecanismo que origina la comisión:</strong> <?php echo $v->mecanismo_origen; ?></p>
			<p><strong>Quién invita / qué UR solicita:</strong> <?php echo $v->solicitante; ?></p>
			<p><strong>Unidad Responsable que genera la nota de viaje (área sustantiva):</strong><br><?php echo $v->unidad_responsable; ?></p>
			<p><strong>Tipo de viaje:</strong> <?php echo tipo_viajes($v->tipo_viaje); ?></p>
			<p><strong>Número de comisión:</strong> <?php echo $v->num_comision; ?></p>
			<p><strong>No. de acuerdo de autorización del pleno / de coordinadores:</strong> <?php echo $v->num_autorizacion; ?></p>
			<p><strong>No. de oficio de comisión:</strong> <?php echo $v->num_oficio; ?></p>
			<p><strong>Tipo de representación requerida:</strong><br> <?php echo tipo_representa($v->tipo_representacion); ?></p>
			<p><strong>Periodo:</strong><br>
			<?php echo fecha_mx($v->fecha_inicio_comision); ?> - <?php echo fecha_mx($v->fecha_fin_comision); ?></p>
		</div>
		
		<!-- Vuelos -->
		<div id="contenido_2" class="info_pestana oculto">
			<h3>Viaje:</h3>
			<p><strong>Tipo de pasaje:</strong> <?php echo tipo_pasaje($v->tipo_pasaje); ?></p>
			
			<p><strong>Aerolínea de ida:</strong> <?php
			if($v->nombre_aero_ida == "" || $v->nombre_aero_ida == "No especificado") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->nombre_aero_ida;
			?></p>
			<p><strong>Número de vuelo:</strong> <?php 
			if($v->num_vuelo_ida == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->num_vuelo_ida;
			?></p>
			
			<p><strong>Aerolínea de regreso:</strong> <?php
			if($v->nombre_aero_vuelta == "" || $v->nombre_aero_vuelta == "No especificado") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->nombre_aero_vuelta;
			?></p>
			<p><strong>Número de vuelo:</strong> <?php
			if($v->num_vuelo_vuelta == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->num_vuelo_vuelta;
			?></p>
			
			<h3>Origen:</h3>
			<p><?php
			if($v->ciudad_origen != "") echo $v->ciudad_origen;
			else echo "<span class=\"texto-claro\">Ciudad no especificada</span>";
			if($v->estado_origen != "") echo ", ".$v->estado_origen;
			else echo "<span class=\"texto-claro\">, Estado no especificado</span>";
			if($v->pais_origen != "") echo "<br>".$v->pais_origen.".";
			else echo "<span class=\"texto-claro\"><br>País no especificado</span>";
			?></p>
			
			<h3>Destino:</h3>
			<p><?php
			if($v->ciudad_destino != "") echo $v->ciudad_destino;
			else echo "<span class=\"texto-claro\">Ciudad no especificada</span>";
			if($v->estado_destino != "") echo ", ".$v->estado_destino;
			else echo "<span class=\"texto-claro\">, Estado no especificado</span>";
			if($v->pais_destino != "")  echo "<br>".$v->pais_destino.".";
			else echo "<span class=\"texto-claro\"><br>País no especificado</span>";
			?></p>
		</div>
		
		<!-- Hospedaje -->
		<div id="contenido_3" class="info_pestana oculto">
			<p><strong>Nombre del hotel:</strong> <?php
			if($v->nombre_hotel == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->nombre_hotel;
			?></p>
			<p><strong>Fecha de entrada:</strong> <?php
			if($v->fecha_entrada == "0000-00-00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo fecha_mx($v->fecha_entrada);
			?></p>
			<p><strong>Fecha de salida:</strong> <?php
			if($v->fecha_salida == "0000-00-00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo fecha_mx($v->fecha_salida);
			?></p>
		</div>
		
		<!-- Viaticos -->
		<div id="contenido_4" class="info_pestana oculto">
			<h3>Viáticos</h3>
			<p><strong>Institución que cubre pasaje:</strong> <?php
			if($v->institucion_pago == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->institucion_pago;
			?></p>
			<p><strong>Tarifa diaria de viáticos por día:</strong> <?php
			if($v->tarifa_x_dia == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "$".number_format($v->tarifa_x_dia, 2);
			if($v->moneda == 1) echo " MXN";
			elseif($v->moneda == 2) echo " USD";
			?></p>
			<p><strong>Gasto por concepto de viáticos (MXN):</strong> <?php
			if($v->gastos_viaticos_mxn == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "$".number_format($v->gastos_viaticos_mxn, 2)." MXN";
			?></p>
			<p><strong>Gasto por concepto de viáticos (USD):</strong> <?php
			if($v->gastos_viaticos_usd == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "$".number_format($v->gastos_viaticos_usd, 2)." USD";
			?></p>
			<p><strong>Institución que cubre hospedaje:</strong> <?php
			if($v->institucion_paga_hospeda == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->institucion_paga_hospeda;
			?></p>
			<p><strong>Costo total del hospedaje:</strong> <?php
			if($v->costo_total_hospedaje == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "$".number_format($v->costo_total_hospedaje, 2)." MXN";
			?></p>
			<p><strong>Monto de viáticos comprobados:</strong> <?php
			if($v->monto_viaticos_comprobados == "0.00") echo "";
			else echo "$".number_format($v->monto_viaticos_comprobados, 2)." MXN";
			?></p>
			<p><strong>Monto de viáticos no comprobados:</strong> <?php
			if($v->monto_viaticos_no_comprobados == "0.00") echo "";
			else echo "$".number_format($v->monto_viaticos_no_comprobados, 2)." MXN";
			?></p>
			<p><strong>Monto de viáticos devueltos:</strong> <?php
			if($v->monto_viaticos_devueltos == "0.00") echo "";
			else echo "$".number_format($v->monto_viaticos_devueltos, 2)." MXN";
			?></p>
		</div>
		
		<!-- Evento -->
		<div id="contenido_5" class="info_pestana oculto">
			<p><strong>Nombre del evento o actividad principal a la que se asiste:</strong> <?php
			if($v->nombre_evento == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->nombre_evento;
			?></p>
			<p><strong>Periodo:</strong> <?php
			if($v->fecha_inicio == "0000-00-00") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo fecha_mx($v->fecha_inicio);
			
			if($v->fecha_fin != "0000-00-00") echo " - ".fecha_mx($v->fecha_fin);
			?></p>
			<p><strong>Página web del evento:</strong> <?php
			if($v->url_evento == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "<a href=\"http://{$v->url_evento}\" target=\"_blank\">Visitar página web</a>";
			?></p>
			<p><strong>Motivo de la comisión:</strong> <?php
			if($v->motivo_comision == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->motivo_comision;
			?></p>
			<p><strong>Tipo de comisión:</strong> <?php
			if($v->tipo_comision == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->tipo_comision;
			?></p>
			<p><strong>Antecedentes:</strong> <?php
			if($v->antecedentes == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->antecedentes;
			?></p>
			<p><strong>Actividades realizadas:</strong> <?php
			if($v->actividades_realizadas == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->actividades_realizadas;
			?></p>
			<p><strong>Resultados obtenidos:</strong> <?php
			if($v->resultados_obtenidos == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->resultados_obtenidos;
			?></p>
			<p><strong>Contribuciones al IFAI:</strong> <?php
			if($v->contribuciones_ifai == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo $v->contribuciones_ifai;
			?></p>
			<p><strong>Comunicado:</strong> <?php
			if($v->url_comunicado == "") echo "<span class=\"texto-claro\">No Capturado</span>";
			else echo "<a href=\"http://{$v->url_comunicado}\" target=\"_blank\">{$v->url_comunicado}</a>";
			?></p>
		</div>
		
		<!-- Observaciones -->
		<div id="contenido_6" class="info_pestana oculto">
			<p><?php
			if($v->observaciones == "") echo "<span class=\"texto-claro\">Sin observaciones.</span>";
			else echo $v->observaciones;
			?></p>
		</div>

		<div id="r_sociales" class="pull-right">
			<button type="button" class="btn btn-info btn-xs" onclick="window.print()" style="margin-top:-12px"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
			<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.joelsedano.com%2Fwebs%2Fifai_viajes%2Fdetalle%2F<?php echo $v->id; ?>&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=recommend&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>

			<a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-lang="es">Twittear</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

			<g:plusone size="medium" annotation="none"></g:plusone>
			<script type="text/javascript">
			window.___gcfg = {lang: 'es'};

			(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
			</script>
		</div>
		<div class="clearfix"></div>
		<p class="pull-right"><strong>Nota:</strong> El bótón imprimir genera un reporte optimizado para impresoras</p>
    </div>
</div>
	
<div class="visible-print-block" style="font-size:9px; margin:-60px 0 0 0; padding:0">
	<h5>Reporte de viaje</h5>
	<p><strong>Servidor público:</strong><br>
	<?php
	if($v->nombre != "") echo $v->nombre." ".$v->apellido1." ".$v->apellido2;
	else echo '<span class="texto-claro">No capturado</span>';
	?><br>
	<?php
	if($v->cargo != "") echo $v->cargo;
	//else echo '<span class="texto-claro">No capturado</span>';
	?></p>
	<h5>Datos de registro</h5>
	<p>
		<strong>Mecanismo que origina la comisión:</strong> <?php echo $v->mecanismo_origen; ?><br>
		<strong>Quién invita / qué UR solicita:</strong> <?php echo $v->solicitante; ?><br>
		<strong>Unidad Responsable que genera la nota de viaje (área sustantiva):</strong> <?php echo $v->unidad_responsable; ?><br>
		<strong>Tipo de viaje:</strong> <?php echo tipo_viajes($v->tipo_viaje); ?><br>
		<strong>Número de comisión:</strong> <?php echo $v->num_comision; ?><br>
		<strong>No. de acuerdo de autorización del pleno / de coordinadores:</strong> <?php echo $v->num_autorizacion; ?><br>
		<strong>No. de oficio de comisión:</strong> <?php echo $v->num_oficio; ?><br>
		<strong>Tipo de representación requerida:</strong> <?php echo tipo_representa($v->tipo_representacion); ?><br>
		<strong>Periodo:</strong> <?php echo fecha_mx($v->fecha_inicio_comision); ?> - <?php echo fecha_mx($v->fecha_fin_comision); ?>
	</p>
	
	<h5>Viaje:</h5>
	<div class="col-xs-6">
		<p><strong>Tipo de pasaje:</strong> <?php echo tipo_pasaje($v->tipo_pasaje); ?><br>
		<strong>Aerolínea de ida:</strong> <?php
		if($v->nombre_aero_ida == "" || $v->nombre_aero_ida == "No especificado") echo "<span class=\"texto-claro\">No Capturado</span>";
		else echo $v->nombre_aero_ida;
		?> <strong>Número de vuelo:</strong> <?php 
		if($v->num_vuelo_ida == "") echo "<span class=\"texto-claro\">No Capturado</span>";
		else echo $v->num_vuelo_ida;
		?><br>
		<strong>Aerolínea de regreso:</strong> <?php
		if($v->nombre_aero_vuelta == "" || $v->nombre_aero_vuelta == "No especificado") echo "<span class=\"texto-claro\">No Capturado</span>";
		else echo $v->nombre_aero_vuelta;
		?> <strong>Número de vuelo:</strong> <?php
		if($v->num_vuelo_vuelta == "") echo "<span class=\"texto-claro\">No Capturado</span>";
		else echo $v->num_vuelo_vuelta;
		?></p>
	</div>
	<div class="col-xs-6">
		<div class="col-xs-6">
			<p><strong>Origen:</strong><br>
			<?php
			if($v->ciudad_origen != "") echo $v->ciudad_origen;
			else echo "<span class=\"texto-claro\">Ciudad no especificada</span>";
			if($v->estado_origen != "") echo ", ".$v->estado_origen;
			else echo "<span class=\"texto-claro\">, Estado no especificado</span>";
			if($v->pais_origen != "") echo "<br>".$v->pais_origen.".";
			else echo "<span class=\"texto-claro\"><br>País no especificado</span>";
			?></p>
		</div>
		<div class="col-xs-6">
			<p><strong>Destino:</strong><br>
			<?php
			if($v->ciudad_destino != "") echo $v->ciudad_destino;
			else echo "<span class=\"texto-claro\">Ciudad no especificada</span>";
			if($v->estado_destino != "") echo ", ".$v->estado_destino;
			else echo "<span class=\"texto-claro\">, Estado no especificado</span>";
			if($v->pais_destino != "")  echo "<br>".$v->pais_destino.".";
			else echo "<span class=\"texto-claro\"><br>País no especificado</span>";
			?></p>
		</div>
	</div>
	
	<h5>Hospedaje:</h5>
	<p><strong>Nombre del hotel:</strong> <?php
	if($v->nombre_hotel == "") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo $v->nombre_hotel;
	?><br>
	<strong>Fecha de entrada:</strong> <?php
	if($v->fecha_entrada == "0000-00-00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo fecha_mx($v->fecha_entrada);
	?><br>
	<strong>Fecha de salida:</strong> <?php
	if($v->fecha_salida == "0000-00-00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo fecha_mx($v->fecha_salida);
	?></p>

	<h5>Viáticos</h5>
	<p><strong>Institución que cubre pasaje:</strong> <?php
	if($v->institucion_pago == "") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo $v->institucion_pago;
	?><br>
	<strong>Tarifa diaria de viáticos por día:</strong> <?php
	if($v->tarifa_x_dia == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo "$".number_format($v->tarifa_x_dia, 2);
	if($v->moneda == 1) echo " MXN";
	elseif($v->moneda == 2) echo " USD";
	?><br>
	<strong>Gasto por concepto de viáticos (MXN):</strong> <?php
	if($v->gastos_viaticos_mxn == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo "$".number_format($v->gastos_viaticos_mxn, 2)." MXN";
	?><br>
	<strong>Gasto por concepto de viáticos (USD):</strong> <?php
	if($v->gastos_viaticos_usd == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo "$".number_format($v->gastos_viaticos_usd, 2)." USD";
	?><br>
	<strong>Institución que cubre hospedaje:</strong> <?php
	if($v->institucion_paga_hospeda == "") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo $v->institucion_paga_hospeda;
	?><br>
	<strong>Costo total del hospedaje:</strong> <?php
	if($v->costo_total_hospedaje == "0.00") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo "$".number_format($v->costo_total_hospedaje, 2)." MXN";
	?><br>
	<strong>Monto de viáticos comprobados:</strong> <?php
	if($v->monto_viaticos_comprobados == "0.00") echo "";
	else echo "$".number_format($v->monto_viaticos_comprobados, 2)." MXN";
	?><br>
	<strong>Monto de viáticos no comprobados:</strong> <?php
	if($v->monto_viaticos_no_comprobados == "0.00") echo "";
	else echo "$".number_format($v->monto_viaticos_no_comprobados, 2)." MXN";
	?><br>
	<strong>Monto de viáticos devueltos:</strong> <?php
	if($v->monto_viaticos_devueltos == "0.00") echo "";
	else echo "$".number_format($v->monto_viaticos_devueltos, 2)." MXN";
	?></p>
		
	<h5>Evento:</h5>
	<p><strong>Nombre del evento o actividad principal a la que se asiste:</strong> <?php
	if($v->nombre_evento == "") echo "<span class=\"texto-claro\">No Capturado</span>";
	else echo $v->nombre_evento;
	?><br>
	<strong>Periodo:</strong> <?php
	if($v->fecha_inicio != "0000-00-00") echo fecha_mx($v->fecha_inicio);
	echo " - ";
	if($v->fecha_fin != "0000-00-00") echo fecha_mx($v->fecha_fin);
	echo "<br>\n";
	if($v->url_evento != "") echo "<strong>Página web del evento:</strong> {$v->url_evento}<br>\n";
	if($v->motivo_comision != "") echo "<strong>Motivo de la comisión:</strong> {$v->motivo_comision}<br>\n";
	if($v->tipo_comision != "") echo "<strong>Tipo de comisión:</strong> {$v->tipo_comision}<br>\n";
	if($v->antecedentes != "") echo "<strong>Antecedentes:</strong> {$v->antecedentes}<br>\n";
	if($v->actividades_realizadas != "") echo "<strong>Actividades realizadas:</strong>{$v->actividades_realizadas}<br>\n";
	if($v->resultados_obtenidos != "") echo "<strong>Resultados obtenidos:</strong> {$v->resultados_obtenidos}<br>\n";
	if($v->contribuciones_ifai != "") echo "<strong>Contribuciones al IFAI:</strong> {$v->contribuciones_ifai}<br>\n";
	if($v->url_comunicado != "") echo  "<strong>Direccion web del Comunicado:</strong> {$v->url_comunicado}<br>\n";
	?></p>
	
	<h5>Observaciones</h5>
	<p><?php
		if($v->observaciones == "") echo "<span class=\"texto-claro\">Sin observaciones.</span>";
		else echo $v->observaciones;
	?></p>
</div>

<script>
function info_tab(n){
	$('.pestana').removeClass("active");
	$('#tab_'+n).addClass("active");
	$('.info_pestana').hide();
	$('#contenido_'+n).show();
}
</script>