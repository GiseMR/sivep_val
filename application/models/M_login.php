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
          $this->db->select('m.ID_MENU as ID, m.DESCRIPCION as DESCRIPCION, m.IMAGEN as IMAGEN,m.URL as URL,p.ESTATUS as ESTATUS');
          $this->db->from('menu as m');
          $this->db->join('permisosmenu as p', 'm.ID=p.ID_MENU');
          $this->db->where('p.COD_USU', $Id);
          $this->db->where('p.ESTATUS', 0);
      $this->db->order_by("m.ORDENAMIENTO", "asc");
          $query = $this->db->get();
         if ($query->num_rows() > 0) {
             $data['Permisos'] =  $query->result_array();
         }else{
             $data['Permisos'] =  Array (0 => Array("ID" =>"Error"));
         }
         $query->free_result();
         //return the array to the controller
         return $data;
     }


}?>