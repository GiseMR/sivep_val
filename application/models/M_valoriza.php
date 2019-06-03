<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_valoriza extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	public function insertar($data){
		$this->db->insert('valuacion', $data);

		return $this->db->last_query();
	}

}	
