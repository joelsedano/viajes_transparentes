<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(15);
		$this->load->helper('url');
		$this->load->helper('fecha_mx_helper');
		$this->load->helper('Variables_helper');
		//$this->load->model('viajes_model');
	}
	
	public function index(){
		$this->detalle(0);
	}
	public function detalle($id = 0){
		if($id > 0){
			$this->load->model('funcionarios_model');
			$data['funcionario'] = $this->funcionarios_model->getFuncionario($id);
			
			$this->load->model('viajes_model');
			$data['viajes'] = $this->viajes_model->getViajesFuncionario($id);
			
			$data['titulo'] = "Perfil de {$data['funcionario']->nombre} {$data['funcionario']->apellido1} {$data['funcionario']->apellido2}";
			$data['seccion'] = "funcionario";
			$data['contenido'] = "detalle_funcionario";
			
			$this->load->view('inc/plantilla', $data);
		}
		//mandarlo a Home
		else{
			header('Location: '.base_url());
			exit;
		}
	}
	
}
