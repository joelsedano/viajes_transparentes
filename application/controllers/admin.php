<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('fecha_mx_helper');
		$this->load->model('viajes_model');
	}
	
	public function index(){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "admin";
		
		//si ya esta firmado, lo mandamos a la primer seccion del Administrador
		if($this->session->userdata('logged_in')){
			redirect('/admin/instituciones', 'refresh');
		}
		//si no esta firmado, hacemos toda la faramaña de login
		else{
			//si envia la informacion del formulario
			$accion = $this->input->post('accion');
			if($accion == "Ingresar"){
				$this->load->model('admin_model');
				$usuario = $this->input->post('usuario');
				$password = sha1($this->input->post('password'));
				$data['usuario'] = $this->admin_model->login($usuario, $password);
				$this->session->set_userdata($data['usuario']);
				$this->session->set_userdata('logged_in', TRUE);
				
				redirect('/admin/instituciones', 'refresh');
			}
			//no ha enviado datos del formulario, lo mostramos
			else{
				$data['contenido'] = "login";
				$this->load->view('admin/plantilla', $data);
			}
		}
	}
	
	/*============================ INSTITUCIONES ============================*/
	
	//listado de instituciones
	public function instituciones($data = array()){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "admin";
		$data['contenido'] = "instituciones_lista";
		
		$this->load->model('instituciones_model');
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		$this->load->view('admin/plantilla', $data);
	}
	
	//Esta funcion sirve para Editar y Agregar instituciones
	public function instituto_edita($id = 0){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "admin";
		
		$this->load->model('instituciones_model');
		
		//obtencion de valores del formulario
		$accion = $this->input->post('accion');
		if($accion != ""){
			$datos = array(
				'nombre' => $this->input->post('nombre'),
				'calle' => $this->input->post('calle'),
				'numero_exterior' => $this->input->post('numero_exterior'),
				'numero_interior' => $this->input->post('numero_interior'),
				'colonia' => $this->input->post('colonia'),
				'ciudad' => $this->input->post('ciudad'),
				'estado' => $this->input->post('estado'),
				'codigo_postal' => $this->input->post('codigo_postal'),
				'telefonos' => $this->input->post('telefonos'),
				'fax' => $this->input->post('fax'),
				'url_web' => str_replace("http://", "", strtolower($this->input->post('url_web')))
			);
		}
		
		//ToDo: aqui debería ver si el usuario tiene permiso para editar los datos de esa institucion, antes que nada
		
		//si sabmos el ID, podemos actualizar el registro
		if($id > 0){
			/******************* Actualizar *******************/
			if($accion == "Actualizar"){
				$exito = $this->instituciones_model->actualizaInstitucion($id, $datos);
				
				//mensaje de exito y de vuelta al listado de instituciones
				if($exito){
					$data['mensaje'] = "Registro actualizado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					//regresar al listado de Instituciones
					$this->instituciones($data);
				}
				
				//mensaje de error y volver a cargar el formulario
				else{
					$data['mensaje'] = "Error actualizando registro";
					$data['tipo_mensaje'] = "danger"; //clase de bootstrap (fondo rojo)
					$data['contenido'] = "formulario_instituto";
					$data['titulo_formulario'] = "Actualizar";
					//cargar los datos de la institucion
					$data['institucion'] = $this->instituciones_model->getInstitucion($id);
					$this->load->view('admin/plantilla', $data);
				}
			}
			//si no se reconoce la accion... mostramos el formulario de edición
			else{
				$data['contenido'] = "formulario_instituto";
				$data['titulo_formulario'] = "Actualizar";
				//cargar los datos de la institucion
				$data['institucion'] = $this->instituciones_model->getInstitucion($id);
				$this->load->view('admin/plantilla', $data);
			}
		}
		
		//si no sabemos el ID de registro, podemos agregar o mostrar el formulario
		else{
			/******************* Agregar *******************/
			if($accion == "Agregar"){
				$exito = $this->instituciones_model->agregaInstitucion($datos);
				if($exito){
					$data['contenido'] = "instituciones_lista";
					$data['mensaje'] = "Registro agregado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					
					//listado de Instituciones
					$data['instituciones'] = $this->instituciones_model->getInstituciones();
					$this->load->view('admin/plantilla', $data);
				}
				else{
					$data['mensaje'] = "Error agregando registro";
					$data['tipo_mensaje'] = "danger"; //clase de bootstrap (fondo rojo)
					$data['contenido'] = "formulario_instituto";
					$data['titulo_formulario'] = "Agregar";
					//le pasamos los datos del POST, pa' que no tenga que volver a escribirlos
					$this->load->view('admin/plantilla', $datos);
				}
			}
			//mostrar formulario
			else{
				$data['contenido'] = "formulario_instituto";
				$data['titulo_formulario'] = "Agregar";
				$this->load->view('admin/plantilla', $data);
			}
		}
	}
	
	/*============================ FUNCIONARIOS ============================*/
	public function funcionarios($data = array()){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "admin";
		$data['contenido'] = "funcionarios_lista";
		
		//listado de Instituciones, para sacar lista de funcionarios de esa institucion
		$this->load->model('instituciones_model');
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		
		$this->load->view('admin/plantilla', $data);
	}
	
	public function editar_funcionario($id = 0){
		$data['titulo'] = "Editar registro";
		$this->load->model('funcionarios_model');
		
		//listado de Instituciones, necesario para extraer los funcionarios de ese instituto
		$this->load->model('instituciones_model');
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		
		//obtencion de valores del formulario
		$accion = $this->input->post('accion');
		if($accion != ""){
			$datos = array(
				'institucion' => $this->input->post('institucion'),
				'nombre' => $this->input->post('nombre'),
				'apellido1' => $this->input->post('apellido1'),
				'apellido2' => $this->input->post('apellido2'),
				'tipo_personal' => $this->input->post('tipo_personal'),
				'cargo' => $this->input->post('cargo'),
				'cargo_superior' => $this->input->post('cargo_superior'),
				'unidad_administrativa' => $this->input->post('unidad_administrativa'),
				'nombre_puesto' => $this->input->post('nombre_puesto'),
				'clave_puesto' => $this->input->post('clave_puesto'),
				'correo_e' => $this->input->post('correo_e')
			);
		}
		/******************* Actualizar *******************/
		if($id > 0){
			//Si envía datos para actualizar
			if($accion == "Actualizar"){
				$exito = $this->funcionarios_model->actualizaFuncionario($id, $datos);
				if($exito){
					$data['mensaje'] = "Registro actualizado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					
					//devolverlo a la lista de funcionarios
					$this->funcionarios($data);
				}
				else{
					$data['mensaje'] = "Error actualizando registro";
					$data['tipo_mensaje'] = "danger"; //clase de bootstrap (fondo rojo)
					$data['contenido'] = "formulario_funcionario";
					$data['titulo_formulario'] = "Actualizar";
					
					//le pasamos los datos del POST, pa' que no tenga que volver a escribirlos
					$this->load->view('admin/plantilla', $datos);
				}
			}
			//Si no ha enviado datos, mostramos el formulario para edición
			else{
				$data['contenido'] = "formulario_funcionario";
				$data['titulo_formulario'] = "Actualizar";
				
				//listado de Funcionarios
				$this->load->model('funcionarios_model');
				$data['funcionario'] = $this->funcionarios_model->getFuncionario($id);
				
				$this->load->view('admin/plantilla', $data);
			}
		}
		/******************* Agregar *******************/
		else {
			if($accion == "Agregar"){
				$exito = $this->funcionarios_model->agregaFuncionario($datos);
				if($exito){
					$data['mensaje'] = "Registro agregado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					$this->funcionarios($data);
				}
				else{
					//error escribiendo registro
				}
			}
			else{
				$data['contenido'] = "formulario_funcionario";
				$data['titulo_formulario'] = "Agregar";
				
				$this->load->view('admin/plantilla', $data);
			}
		}
	}
	
	/*============================ VIAJES ============================*/
	public function viajes($data = array()){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "admin";
		$data['contenido'] = "viajes_lista";
		
		//listado de Instituciones
		$this->load->model('instituciones_model');
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		
		$this->load->view('admin/plantilla', $data);
	}
	
	public function editar_viaje($viaje = 0){
		$id = (int)$viaje;
		$data['titulo'] = "Reto Viajes Transparentes";
		$this->load->model('viajes_model');
		
		$this->load->model('aerolineas_model');
		$data['aerolineas'] = $this->aerolineas_model->getAerolineas();
		
		$this->load->model('instituciones_model');
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		
		//ToDo: verificar que tenga permisos para editar el viaje
		
		//obtencion de valores del formulario
		$accion = $this->input->post('accion');
		if($accion != ""){
			$datos = array(
				'instituto' => $this->input->post('instituto'),
				'funcionario' => $this->input->post('funcionario'),
				'cargo_servidor' => $this->input->post('cargo_servidor'),
				'grupo_servidor' => $this->input->post('grupo_servidor'),
				'numeracion' => $this->input->post('numeracion'),
				'tipo_representacion' => $this->input->post('tipo_representacion'),
				'num_comision' => $this->input->post('num_comision'),
				'num_autorizacion' => $this->input->post('num_autorizacion'),
				'num_oficio' => $this->input->post('num_oficio'),
				'solicitante' => $this->input->post('solicitante'),
				'unidad_responsable' => $this->input->post('unidad_responsable'),
				'tipo_pasaje' => $this->input->post('tipo_pasaje'),
				'num_vuelo_ida' => $this->input->post('num_vuelo_ida'),
				'num_vuelo_vuelta' => $this->input->post('num_vuelo_vuelta'),
				'pais_origen' => $this->input->post('pais_origen'),
				'estado_origen' => $this->input->post('estado_origen'),
				'ciudad_origen' => $this->input->post('ciudad_origen'),
				'pais_destino' => $this->input->post('pais_destino'),
				'estado_destino' => $this->input->post('estado_destino'),
				'ciudad_destino' => $this->input->post('ciudad_destino'),
				'tarifa_x_dia' => $this->input->post('tarifa_x_dia'),
				'fecha_entrada' => fecha_mx2sql($this->input->post('fecha_entrada')),
				'fecha_salida' => fecha_mx2sql($this->input->post('fecha_salida')),
				'nombre_hotel' => $this->input->post('nombre_hotel'),
				'costo_total_hospedaje' => $this->input->post('costo_total_hospedaje'),
				'monto_viaticos_comprobados' => $this->input->post('monto_viaticos_comprobados'),
				'monto_viaticos_no_comprobados' => $this->input->post('monto_viaticos_no_comprobados'),
				'gastos_pasajes_mxn' => $this->input->post('gastos_pasajes_mxn'),
				'gastos_viaticos_mxn' => $this->input->post('gastos_viaticos_mxn'),
				'gastos_viaticos_usd' => $this->input->post('gastos_viaticos_usd'),
				'institucion_pago' => $this->input->post('institucion_pago'),
				'institucion_paga_hospeda' => $this->input->post('institucion_paga_hospeda'),
				'tipo_comision' => $this->input->post('tipo_comision'),
				'fecha_inicio_comision' => fecha_mx2sql($this->input->post('fecha_inicio_comision')),
				'fecha_fin_comision' => fecha_mx2sql($this->input->post('fecha_fin_comision')),
				'tema' => $this->input->post('tema'),
				'nombre_evento' => $this->input->post('nombre_evento'),
				'url_evento' => str_replace("http://", "", strtolower($this->input->post('url_evento'))),
				'url_comunicado' => str_replace("http://", "", strtolower($this->input->post('url_comunicado'))),
				'fecha_inicio' => fecha_mx2sql($this->input->post('fecha_inicio')),
				'fecha_fin' => fecha_mx2sql($this->input->post('fecha_fin')),
				'motivo_comision' => $this->input->post('motivo_comision'),
				'antecedentes' => $this->input->post('antecedentes'),
				'actividades_realizadas' => $this->input->post('actividades_realizadas'),
				'resultados_obtenidos' => $this->input->post('resultados_obtenidos'),
				'contribuciones_ifai' => $this->input->post('contribuciones_ifai'),
				'observaciones' => $this->input->post('observaciones')
			);
		}
		
		//================ EDITAR ================
		if($viaje > 0){
			//Si envía datos para actualizar
			if($accion == "Actualizar"){
				$exito = $this->viajes_model->actualizaViaje($viaje, $datos);
				if($exito){
					$data['contenido'] = "viajes_lista";
					$data['mensaje'] = "Registro actualizado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					
					//listado de Instituciones
					//$data['instituciones'] = $this->instituciones_model->getInstituciones();
					$this->load->view('admin/plantilla', $data);
				}
				else{
					$data['mensaje'] = "Error agregando registro";
					$data['tipo_mensaje'] = "danger"; //clase de bootstrap (fondo rojo)
					$data['contenido'] = "formulario_viaje";
					$data['titulo_formulario'] = "Agregar";
					//le pasamos los datos del POST, para que no tenga que volver a escribirlos
					$this->load->view('admin/plantilla', $datos);
				}
			}
			//Si no ha enviado datos, mostramos el formulario para edición
			else{
				$data['contenido'] = "formulario_viaje";
				$data['titulo_formulario'] = "Actualizar";
				
				$data['viaje'] = $this->viajes_model->getViaje($id);
				
				//listado de Funcionarios
				$this->load->model('funcionarios_model');
				$data['funcionarios'] = $this->funcionarios_model->getFuncionariosInstitucion($data['viaje']->instituto);
				
				$this->load->view('admin/plantilla', $data);
			}
		}
		//================ AGREGAR ================
		else {
			if($accion == "Agregar"){
				$exito = $this->viajes_model->agregaViaje($datos);
				if($exito){
					$data['contenido'] = "viajes_lista";
					$data['mensaje'] = "Registro agregado exitosamente";
					$data['tipo_mensaje'] = "success"; //clase de bootstrap (fondo verde)
					
					//listado de Instituciones
					//$data['instituciones'] = $this->instituciones_model->getInstituciones();
					$this->load->view('admin/plantilla', $data);
				}
				else{
					$data['mensaje'] = "Error agregando registro";
					$data['tipo_mensaje'] = "danger"; //clase de bootstrap (fondo rojo)
					$data['contenido'] = "formulario_viaje";
					$data['titulo_formulario'] = "Agregar";
					//le pasamos los datos del POST, pa' que no tenga que volver a escribirlos
					$this->load->view('admin/plantilla', $datos);
				}
			}
			//mostrar formulario
			else{
				$data['contenido'] = "formulario_viaje";
				$data['titulo_formulario'] = "Agregar";
				$this->load->view('admin/plantilla', $data);
			}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		
		header('Location: '.base_url());
		exit;
	}
}
