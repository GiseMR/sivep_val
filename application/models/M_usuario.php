<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_usuario extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	public function obtenerMenu(){
		$query = $this->db->query('SELECT ID_MENU, DESC_MENU, IMG_MENU, URL_MENU, ORD_MENU, ESTATUS_MENU FROM menu WHERE ESTATUS_MENU=1');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function obtenerPermisos($id){

		$query = $this->db->query('SELECT pm.ID_PERMENU, pm.COD_USU, pm.ID_MENU, pm.ESTATUS FROM permisosmenu pm where pm.COD_USU = "'.$id.'"');
	   
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function eliminarPermisos($idUser){
		$this->db->query('DELETE FROM permisosmenu  where COD_USU = "'.$idUser.'"');
		return true;
	}

	public function registarPermiso($idUser, $menuId){
		$this->db->query('INSERT INTO permisosmenu (COD_USU,ID_MENU,ESTATUS) VALUES ("'.$idUser.'",'.$menuId.',1)');
		return true;
	}

	public function obtnerUsuario($id){
		$query = $this->db->query('SELECT PASS_USU, NOM_USU, APP_USU, APM_USU FROM usuario where COD_USU = "'.$id.'"');
	   
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function actualizarPassword($idUser, $newPassword){
		$this->db->query('UPDATE usuario set PASS_USU="'.$newPassword.'"  where  COD_USU="'.$idUser.'"');
		return true;
	}
}	
