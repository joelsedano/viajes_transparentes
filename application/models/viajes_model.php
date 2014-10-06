<?php
	class Viajes_model extends CI_Model{
		function getViaje($id){
			$sql = "SELECT viajes.*, f.id AS numero_servidor, f.nombre, f.apellido1, f.apellido2, f.cargo, aero_ida.nombre_aero AS nombre_aero_ida, aero_ida.nombre_aero AS nombre_aero_vuelta FROM viajes 
			LEFT JOIN funcionarios AS f ON viajes.funcionario = f.id
			LEFT JOIN aerolineas AS aero_ida ON viajes.aerolinea_ida = aero_ida.id
			LEFT JOIN aerolineas AS aero_vuelta ON viajes.aerolinea_vuelta = aero_vuelta.id
			WHERE viajes.id = ?";
			$q = $this->db->query($sql, $id);
			
			if($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[] = $row;
				}
				$q->free_result();
				return $data[0];
			}
		}
		
		function getUltimosViajes($cantidad = 10){
			$sql = "SELECT v.id, v.num_comision, f.nombre, f.apellido1, f.apellido2, f.cargo, v.tipo_representacion, v.tipo_comision, v.tipo_viaje, v.pais_destino, v.estado_destino, v.ciudad_destino, v.fecha_inicio_comision, v.fecha_fin_comision FROM viajes AS v
			LEFT JOIN funcionarios AS f ON v.funcionario = f.id
			WHERE 1
			ORDER BY fecha_inicio_comision DESC LIMIT ?";
			$q = $this->db->query($sql, $cantidad);
			
			if($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[] = $row;
				}
				$q->free_result();
				return $data;
			}
		}
		
		function viajesInstituto($instituto = 0){
			$sql = "SELECT v.id, v.num_comision, f.nombre, f.apellido1, f.apellido2, f.cargo, f.unidad_administrativa, f.correo_e, v.tipo_representacion, v.tipo_comision, v.tipo_viaje, v.pais_destino, v.estado_destino, v.ciudad_destino, v.fecha_inicio_comision, v.fecha_fin_comision FROM viajes AS v
			LEFT JOIN funcionarios AS f ON v.funcionario = f.id
			WHERE f.institucion = ?";
			//ORDER BY fecha_inicio_comision DESC LIMIT ?"
			$q = $this->db->query($sql, $instituto);
			
			if($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[] = $row;
				}
				$q->free_result();
				return $data;
			}
		}
		
		function buscarViaje($texto = ""){
			//ToDo: hacer que pueda buscar por múltiples palabras
			if($texto != ""){
				$texto = "%$texto%";
				
				$sql = "SELECT v.id, v.num_comision, f.nombre, f.apellido1, f.apellido2, f.cargo, v.tipo_representacion, v.tipo_comision, v.tipo_viaje, v.pais_destino, v.estado_destino, v.ciudad_destino, v.fecha_inicio_comision, v.fecha_fin_comision FROM viajes AS v
				LEFT JOIN funcionarios AS f
				ON v.funcionario = f.id
				WHERE v.num_comision LIKE ?
				OR f.nombre LIKE ?
				OR f.apellido1 LIKE ?
				OR f.apellido2 LIKE ?
				OR v.pais_origen LIKE ?
				OR v.estado_origen LIKE ?
				OR v.ciudad_origen LIKE ?
				OR v.pais_destino LIKE ?
				OR v.estado_destino LIKE ?
				OR v.ciudad_destino LIKE ?
				ORDER BY fecha_inicio_comision DESC";
				
				$q = $this->db->query($sql, array($texto, $texto, $texto, $texto, $texto, $texto, $texto, $texto, $texto, $texto));
				
				if($q->num_rows() > 0){
					foreach ($q->result() as $row){
						$data[] = $row;
					}
					$q->free_result();
					return $data;
				}
			}
		}
		
		function getViajesFuncionario($funcionario = 0){
			$id = (int)$funcionario;
			if($id > 0){
				$sql = "SELECT viajes.*, aero_ida.nombre_aero AS nombre_aero_ida, aero_ida.nombre_aero AS nombre_aero_vuelta FROM viajes 
				LEFT JOIN aerolineas aero_ida ON viajes.aerolinea_ida = aero_ida.id
				LEFT JOIN aerolineas aero_vuelta ON viajes.aerolinea_vuelta = aero_vuelta.id
				WHERE viajes.funcionario = ?";
				
				$q = $this->db->query($sql, $funcionario);
				
				if($q->num_rows() > 0){
					foreach ($q->result() as $row){
						$data[] = $row;
					}
					$q->free_result();
					return $data;
				}
			}
			return -1;
		}
		
		function agregaViaje($datos){
			return $this->db->insert('viajes', $datos);
		}
		
		function actualizaViaje($viaje = 0, $datos){
			if($viaje > 0){
				$q = $this->db->where('id', $viaje);
				return $this->db->update('viajes', $datos);
			}
			return -1;
		}
	}