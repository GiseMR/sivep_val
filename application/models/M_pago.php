<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pago extends CI_Model {

	public function __construct(){
		parent::__construct();

	}
	
	public function registrar($data){
		$this->db->insert('pago', $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return $id;
		} else {
			return "ERROR";
		}
	}

	
	public function getPagosByIdValuacion($idvaluacion){
		$query = $this->db->query('SELECT * FROM pago WHERE idvaluacion='.$idvaluacion.' ORDER BY idpago ASC');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}	
}	
