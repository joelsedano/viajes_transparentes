	<nav class="navbar navbar-fixed-top grid" role="navigation">
		<div class="container">
<?php
	if($this->session->userdata('logged_in')){
?>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span>Menú</span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>index.php/admin/instituciones">Instituciones</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/admin/funcionarios">Funcionarios</a></li>
					<li><a href="<?php echo base_url(); ?>index.php/admin/viajes">Viajes</a></li>
					<!--<li><a href="<?php echo base_url(); ?>index.php/admin/logout" style="color:yellow"><span class="glyphicon glyphicon-off"></span> Salir</a></li>-->
				</ul>
				
				<div class="pull-right" style="margin-top:7px">Firmado como: <strong><?php echo $this->session->userdata('nombre'); ?></strong><br><a href="<?php echo base_url(); ?>index.php/admin/logout" style="color:yellow"><span class="glyphicon glyphicon-off"></span> Salir</a></div>
			</div>
<?php
	}
	else echo "";
?>
		</div>
	</nav>
