<p><strong>ToDo:</strong> Según el usuario que se firme, puede agregar viajes para sí mismo, o si tiene una clave de <em>administrador</em> puede agregar viajes para otros funcionarios de su institución, puede también agregar, borrar o modificar datos de otros funcionarios y sus viajes.</p>

<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
	<div class="panel panel-primary" >
		<div class="panel-heading">
			<div class="panel-title">Formulario de ingreso</div>
			<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">¿Olvidó su contraseña?</a></div>
		</div>     

		<div style="padding-top:30px" class="panel-body" >
			<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
			<form id="loginform" class="form-horizontal" role="form" action="" method="post">
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="login-username" type="text" class="form-control" name="usuario" value="admin" placeholder="Nombre de usuario">
				</div>
					
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña" value="admin">
				</div>

				<div style="margin-top:10px" class="form-group">
					<div class="col-sm-12 controls">
					  <input type="submit" class="btn btn-success" name="accion" value="Ingresar">
					</div>
				</div>
			</form>
			<p>Usuario por defecto: <strong>admin / admin</strong>
		</div>                     
	</div>
</div>
