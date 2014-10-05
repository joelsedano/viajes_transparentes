<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instituciones extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(15);
		$this->load->helper('url');
		$this->load->model('instituciones_model');
	}
	
	//saca la lista de instituciones registradas
	public function index(){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "instituciones";
		$data['contenido'] = "instituciones";
		
		$data['instituciones'] = $this->instituciones_model->getInstituciones();
		
		$this->load->view('inc/plantilla', $data);
	}
	
	//saca info de la institucion y el listado de funcionarios en ella
	public function funcionarios($institucion = 0){
		if((int)$institucion > 0){
			$data['titulo'] = "Reto Viajes Transparentes";
			$data['seccion'] = "instituciones";
			$data['contenido'] = "funcionarios";
			
			$data['institucion'] = $this->instituciones_model->getInstitucion($institucion);
			$this->load->model('funcionarios_model');
			$data['funcionarios'] = $this->funcionarios_model->getFuncionariosInstitucion($institucion);
			
			//parche: un array vacio en caso que no haya registros
			if($data['funcionarios'] == 0) $data['funcionarios'] = array();
			
			$this->load->view('inc/plantilla', $data);
		}
		else return -1;
	}
	
	public function lista_funcionarios($institucion = 0){
		if($institucion > 0){
			$this->load->model('funcionarios_model');
			$data['funcionarios'] = $this->funcionarios_model->getFuncionariosInstitucion($institucion);
			//parche: un array vacio en caso que no haya registros
			if($data['funcionarios'] == 0) $data['funcionarios'] = array();
			
			//cargamos vista sin plantilla
			$this->load->view('instituciones/funcionarios_lista', $data);
		}
		else return -1;
	}
	
	public function funcionarios_json($institucion = 0){
		if($institucion > 0){
			$this->load->model('funcionarios_model');
			echo json_encode($this->funcionarios_model->getFuncionariosInstitucion($institucion));
		}
		else echo -1;
	}
	
	public function viajes($institucion = 0){
		if((int)$institucion > 0){
			$this->load->model('viajes_model');
			$data['viajes'] = $this->viajes_model->viajesInstituto($institucion);
			
			//parche: un array vacio en caso que no haya registros
			//cargar vista sin plantilla (va embebido dentro del HTML)
			if($data['viajes'] == 0) $data['viajes'] = array();
			$this->load->view('instituciones/viajes_instituto', $data);
		}
		else return -1;
	}
	
}
