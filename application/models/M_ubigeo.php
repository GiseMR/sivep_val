<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ubigeo extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	public function obtener_departamentos(){

		//CONSULTAMOS LOS NOMBRES, ID ...DE LOS DEPARTAMENTOS 
		$query = $this->db->query('SELECT C_CODUBIGEO, C_CODDPTO, C_NOMUBIGEO FROM UBIGEO WHERE C_CODPROV=0 AND C_CODDIST=0');

		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}	

	//CONSULTAMOS LOS NOMBRES, ID ...DE UNA PROVINCIA QUE PERTENCE A UN DEPARTAMENTO POR SU ID
	public function obtener_provincia($id){

		$query = $this->db->query('SELECT C_CODUBIGEO, C_CODPROV, C_NOMUBIGEO FROM UBIGEO WHERE C_CODDPTO = "'.$id.'" AND C_CODDIST=0  AND  C_CODPROV<>0 ');
	   
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	//CONSULTAMOS LOS NOMBRES, ID ...DE UNA DISTRITO QUE PERTENCE A UN PROVINCIA POR SU ID
	public function obtener_distrito($id_dep, $id_prov){

		$query = $this->db->query('SELECT C_CODUBIGEO, C_CODDIST, C_NOMUBIGEO FROM UBIGEO WHERE C_CODDPTO = "'.$id_dep.'" AND C_CODPROV="'.$id_prov.'"  AND C_CODDIST<>0');
	   
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
}	
