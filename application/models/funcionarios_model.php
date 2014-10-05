<?php
	class Funcionarios_model extends CI_Model{
		//devuelve los datos del funcionario y el nombre de la institucion
		function getFuncionario($funcionario = 0){
			if($funcionario > 0){
				$sql = "SELECT f.*, i.nombre AS nombre_institucion FROM funcionarios AS f
				LEFT JOIN instituciones AS i ON f.institucion = i.id
				WHERE f.id = ?";
				$q = $this->db->query($sql, $funcionario);
				
				if($q->num_rows() == 1){
					$data = $q->result();
					$q->free_result();
					return $data[0]; //porque solamente es un resultado, no varios
				}
			}
			return -1;
		}
		
		//devuelve los datos más relevantes de los funcionarios de una institución
		function getFuncionariosInstitucion($institucion = 0){
			if($institucion > 0){
				$sql = "SELECT id, nombre, apellido1, apellido2, cargo, unidad_administrativa, correo_e FROM funcionarios
				WHERE institucion = ?
				ORDER BY apellido1, apellido2, nombre DESC";
				
				$q = $this->db->query($sql, $institucion);
				
				if($q->num_rows() > 0){
					foreach ($q->result() as $row){
						$data[] = $row;
					}
					$q->free_result();
					return $data;
				}
				return 0;
			}
			return -1;
		}
		
		//devuelve los datos de los viaje del funcionario y unos cuantos datos generales de éste
		function getViajesFuncionario($funcionario = 0){
			if($funcionario > 0){
				$sql = "SELECT v.id, v.numeracion, f.nombre, f.apellido1, f.apellido2, f.cargo, v.tipo_representacion, v.tipo_comision, v.tipo_viaje, v.pais_destino, v.estado_destino, v.ciudad_destino, v.fecha_inicio_comision, v.fecha_fin_comision FROM viajes AS v
				LEFT JOIN funcionarios AS f ON v.funcionario = f.id
				WHERE 1
				ORDER BY fecha_inicio_comision DESC LIMIT ?";
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
		
		//ToDo: verificar que tenga permisos para agregar y actualizar
		function actualizaFuncionario($funcionario = 0, $datos){
			if($funcionario > 0){
				$q = $this->db->where('id', $funcionario);
				return $this->db->update('funcionarios', $datos);
			}
			return -1;
		}
		
		function agregafuncionario($datos){
			return $this->db->insert('funcionarios', $datos);
		}
		
	}