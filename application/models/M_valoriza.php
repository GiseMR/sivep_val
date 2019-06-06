<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_valoriza extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}


	public function get_number()
	{
		$this->db->where('YEAR(registro)', date("Y"));
		$this->db->from("valuacion");
		return $this->db->count_all_results()+1;
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
	public function insertarDetalle($data, $table)
	{
		$this->db->insert_batch($table, $data);

		$numrows = $this->db->affected_rows();

		if ($numrows > 0) {
			return $numrows;
		} else {
			return "ERROR";
		}
	}
}
