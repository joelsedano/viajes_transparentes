<?php
	class Instituciones_model extends CI_Model{
		//regresa un Array con los valores del formulario de Instituciones
		function getInstituciones(){
			$sql = "SELECT * FROM instituciones WHERE 1";
			$q = $this->db->query($sql);
			
			if($q->num_rows() > 0){
				$data = $q->result();
				$q->free_result();
				return $data;
			}
		}
		
		function getInstitucion($institucion = 0){
			if($institucion > 0){
				$sql = "SELECT * FROM instituciones WHERE id = ?";
				$q = $this->db->query($sql, $institucion);
				
				if($q->num_rows() > 0){
					$data = $q->result();
					$q->free_result();
					return $data[0]; //porque solamente es un resultado, no varios
				}
			}
			return -1;
		}
		
		//ToDo: verificar que tenga permisos para agregar y actualizar
		function agregaInstitucion($datos){
			return $this->db->insert('instituciones', $datos);
		}
		
		function actualizaInstitucion($institucion = 0, $datos){
			if($institucion > 0){
				$q = $this->db->where('id', $institucion);
				return $this->db->update('instituciones', $datos);
			}
			return -1;
		}
		
	}