<?php
class Admin_model extends CI_Model{
	function login($usuario, $password){
		/*$this->db->select('id, nombre, institucion, correo_e')->from('usuarios')->where('username', $username)->where('password', SHA1($password))->where('activo', 1)->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1) return $query->result();
		return FALSE;*/
	   
		$sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ? AND activo = 1 LIMIT 1";
		$q = $this->db->query($sql, array($usuario, $password));
		
		if($q->num_rows() == 1){
			$data = $q->result();
			$q->free_result();
			return $data[0]; //porque solamente es un resultado, no varios
		}
		return FALSE;
	}
}