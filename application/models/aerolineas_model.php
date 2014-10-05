<?php
	class Aerolineas_model extends CI_Model{
		function getAerolineas(){
			$sql = "SELECT * FROM aerolineas WHERE 1";
			$q = $this->db->query($sql);
			
			if($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[] = $row;
				}
				$q->free_result();
				return $data;
			}
		}
	}