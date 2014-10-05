<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viaje extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('fecha_mx_helper');
		$this->load->helper('variables_helper');
	}
	
	public function index($datos){
		$data = $datos;
		$data['titulo'] = "Detalle del viaje";
		$data['seccion'] = "viaje";
		$data['contenido'] = "detalle";
		
		$this->load->view('inc/plantilla', $data);
	}
	
	public function detalle($id_viaje = 0){
		$id = (int)$id_viaje;
		if($id > 0){
			$data['titulo'] = "Detalle del viaje";
			$data['seccion'] = "viaje";
			$data['contenido'] = "detalle_viaje";
			
			$this->load->model('viajes_model');
			$data['detalle'] = $this->viajes_model->getViaje($id);
			
			$this->load->view('inc/plantilla', $data);
		}
		else return -1;
	}
}
