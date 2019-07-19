<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contacto extends CI_Model {

	public function __construct(){
		parent::__construct();

	}
	
	public function registrar($data){
		$this->db->insert('contacto', $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return $id;
		} else {
			return "ERROR";
		}
	}
	public function insertar($data)
	{
		$this->db->insert('valuacion', $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return $id;
		} else {
			return "ERROR";
		}
	}

    public function consultarpordni($dni){
        $result = $this->db->query('SELECT * FROM  contacto where dni_cont="'.$dni.'"');
		return $result->result();
	}

 public function consultarporid($id){
        $result = $this->db->query('SELECT * FROM  contacto where idcontacto="'.$id.'"');
		return $result->result();
	}
	
	public function obtener_contactos(){
		$query = $this->db->query('SELECT idcontacto, DNI_CONT, NOM_CONT, APP_CONT, APM_CONT FROM contacto ORDER BY APP_CONT, APM_CONT, NOM_CONT ASC');

		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}	
}	
