<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buscar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(15);
		$this->load->helper('url');
		$this->load->helper('fecha_mx_helper');
		$this->load->helper('variables_helper');
		$this->load->model('viajes_model');
	}
	
	public function index(){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "buscar";
		$data['contenido'] = "buscar";
		
		$texto = $this->input->post('txtBuscar');
		
		//si agregó algo de texto en la caja, lo buscamos
		if($texto != ""){
			$data['viajes'] = $this->viajes_model->buscarViaje($texto);
			$this->load->view('inc/plantilla', $data);
		}
		//si no puso nada en la caja de texto, lo mandamos a home
		else{
			$data['titulo'] = "Reto Viajes Transparentes";
			$data['seccion'] = "inicio";
			$data['contenido'] = "inicio";
			
			$data['viajes'] = $this->viajes_model->getUltimosViajes(20);
			
			$this->load->view('inc/plantilla', $data);
		}
	}
	
}
