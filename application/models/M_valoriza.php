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
		return $this->db->count_all_results() + 1;
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

	public function actualizar($data, $id)
	{
		$this->db->trans_start();
		$this->db->where('idvaluacion', $id);
		$this->db->update('valuacion', $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return "ERROR";
		} else {
			return "OK";
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

	public function grabaDetalle($data, $table)
	{
		$this->db->insert($table, $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return $id;
		} else {
			return "ERROR";
		}
	}

	public function actualizaDetalle($data, $id, $table)
	{
		$this->db->trans_start();
		$this->db->where('id' . $table, $id);
		$this->db->update($table, $data);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			return "ERROR";
		} else {
			return "OK";
		}
	}
	public function eliminaDetalle($id, $table)
	{
		$this->db->trans_start();
		$this->db->where('id' . $table, $id);
		$this->db->delete($table);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
			return "ERROR";
		} else {
			return "OK";
		}
	}


	public function get_header($id)
	{
		$this->db->where('idvaluacion', $id);
		$query = $this->db->get('valuacion');
		return $query->result();
	}
	public function get_detail($table, $id)
	{
		$this->db->where('idvaluacion', $id);
		if($table == "edificacion" || $table == "valor"){
			$this->db->order_by("orden", "asc");
		}
		$query = $this->db->get($table);
		return $query->result();
	}
}








