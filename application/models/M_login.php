<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model{

     function __construct(){
          parent::__construct();
     }
	 
     //INICIAR EN EL SISTEMA
     function LoginBD($login){
		  $this->db->select('*');
          $this->db->from('usuario');
          $this->db->where('COD_USU', $login);
		  $query = $this->db->get();
          return $query->row();
     }


function PermisosMenu($Id){
          $this->db->select('m.ID_MENU as ID, m.DESC_MENU, m.IMG_MENU, m.URL_MENU, p.ESTATUS');
          $this->db->from('menu as m');
          $this->db->join('permisosmenu as p', 'm.ID_MENU=p.ID_MENU');
          $this->db->where('p.COD_USU', $Id);
          $this->db->where('p.ESTATUS', 1);
          $this->db->order_by("m.ORD_MENU", "asc");
          $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data['MenuPermisos'] =  $query->result_array();
         }else{
             $data['MenuPermisos'] =  Array (0 => Array("ID" =>"Error"));
         }
         $query->free_result();
         return $data;
     }

}?>