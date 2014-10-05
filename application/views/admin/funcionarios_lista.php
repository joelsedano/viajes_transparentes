<div class="content">
	<h1>Funcionarios</h1>
	
	<a href="<?php echo base_url(); ?>index.php/admin/editar_funcionario/0"><button type="button" class="btn btn-success btn-lg hidden-print pull-right" style="margin-bottom:20px">
		<span class="glyphicon glyphicon-plus"></span> Agregar funcionario
	</button></a>
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
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Seleccione una institución:</label>
		<div class="row">
			<div class="col-sm-8">
				<select id="instituto" class="form-control" onchange="listaFuncionarios()">
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
	
	<div id="tabla_res"></div>
</div>

<script>
function listaFuncionarios(){
	var texto = "<table class=\"table table-striped table-bordered table-responsive\"><thead><tr><th>Nombre</th><th>Cargo</th><th>Unidad Administrativa</th><th>Correo-E</th><th class=\"hidden-print\">&nbsp;</th></tr></thead><tbody>";
	var instituto = $('#instituto').val();
	$.get("<?php echo base_url(); ?>index.php/instituciones/funcionarios_json/"+instituto,
	function(data){
		var obj = JSON.parse(data);
		var cantidad = obj.length;
		if(cantidad){
			for(i = 0; i < cantidad; i++){
				texto += "<tr id=\"row_"+obj[i].id+"\">";
				texto +="<td>"+obj[i].apellido1+" "+obj[i].apellido2+", "+obj[i].nombre+"</td>";
				texto +="<td>"+obj[i].cargo+"</td>";
				texto +="<td>"+obj[i].unidad_administrativa+"</td>";
				texto +="<td>"+obj[i].correo_e+"</td>";
				texto +="<td><div class=\"dropdown\"><button data-toggle=\"dropdown\" id=\"dropdownMenu1\" type=\"button\" class=\"btn btn-default dropdown-toggle\">Acciones<span class=\"caret\"></span></button><ul aria-labelledby=\"dropdownMenu1\" role=\"menu\" class=\"dropdown-menu\"><li role=\"presentation\"><a href=\"<?php echo base_url(); ?>index.php/admin/editar_funcionario/"+obj[i].id+"\" tabindex=\"-1\" role=\"menuitem\"><span class=\"glyphicon glyphicon-pencil\"></span> Editar</a></li><li class=\"divider\" role=\"presentation\"></li><li role=\"presentation\"><a onclick=\"borrar("+obj[i].id+")\" href=\"#\" tabindex=\"-1\" role=\"menuitem\"><span class=\"glyphicon glyphicon-remove\"></span> Eliminar</a></li></ul></div></td>";
				texto +="</tr>\n";
			}
			$('#tabla_res').html(texto);
		}
	});
}
function borrar(funcionario){
	var resp = confirm("¿Seguro que desea borrar este elemento?");
	if(rest) alert("Esta función no está programada aún");
}
</script>
