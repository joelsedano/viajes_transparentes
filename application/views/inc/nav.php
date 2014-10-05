	<nav class="navbar navbar-fixed-top grid hidden-print" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span>Menú</span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/instituciones"><span class="glyphicon glyphicon-tower"></span> Instituciones</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/contacto"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/admin" style="color:yellow"><span class="glyphicon glyphicon-dashboard"></span> Administrador</a></li>
				</ul>
				
				<div class="pull-right" style="margin-top:7px">
				<form action="<?php echo base_url(); ?>index.php/buscar" role="form" class="form-inline" id="formBuscar" method="post">
					<div class="form-group">
						<input type="text" name="txtBuscar" class="form-control col-md-4" value="" placeholder="Buscador">
					</div>
					<button class="btn btn-primary" type="submit">Buscar</button>
				</form>
				</div>
			
			</div>
		</div>
	</nav>
