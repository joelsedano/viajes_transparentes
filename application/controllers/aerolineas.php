<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aerolineas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('aerolineas_model');
	}
	
	public function index(){
		return $this->aerolineas_model->getAerolineas();
	}
	public function json(){
		return json_encode($this->aerolineas_model->getAerolineas());
	}
}
