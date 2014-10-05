<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->output->cache(15);
		$this->load->helper('url');
	}
	
	public function index(){
		$data['titulo'] = "Reto Viajes Transparentes";
		$data['seccion'] = "contacto";
		$data['contenido'] = "contact_form";
		
		$this->load->view('inc/plantilla', $data);
	}
	
}
