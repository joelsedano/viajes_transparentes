<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(15);
		$this->load->helper('url');
		$this->load->helper('fecha_mx_helper');
	}
	
	public function index(){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "inicio";
		$data['contenido'] = "inicio";
		
		$this->load->model('viajes_model');
		$data['viajes'] = $this->viajes_model->getUltimosViajes(20);
		
		$this->load->view('inc/plantilla', $data);
	}
	
}
