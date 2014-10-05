<div class="content">
	<h1>Viajes</h1>
	
	<button type="button" class="btn btn-success btn-lg hidden-print pull-right" style="margin-bottom:20px" onclick="editar(0)">
		<span class="glyphicon glyphicon-plus"></span> Agregar viaje
	</button>
	<div class="clearfix"></div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Seleccione una institución:</label>
		<div class="row">
			<div class="col-sm-8">
				<select id="instituto" class="form-control" onchange="listaViajes()">
					<option value="0">Instituciones disponibles</option>
<?php
	foreach($instituciones as $valor){
		echo "					<option value=\"{$valor->id}\">{$valor->nombre}</option>\n";
	}
?>
				</select>
			</div>
		</div>
	</div>
	
	<div id="tabla_res"> </div>
</div>

<script>
function listaViajes(){
	$('#tabla_res').html("<p>Cargando, por favor espere...</p>");
	var instituto = $('#instituto').val();
	$.get("<?php echo base_url(); ?>index.php/instituciones/viajes/"+instituto,
	function(data){
		$('#tabla_res').html(data);
	});
}
function editar(viaje){
	window.location.assign("<?php echo base_url(); ?>index.php/admin/editar_viaje/"+viaje);
}
function borrar(funcionario){
	alert("Esta función no está programada aún");
}
</script>