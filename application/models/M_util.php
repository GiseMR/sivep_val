<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_util extends CI_Model{

     function __construct(){
          parent::__construct();
     }
	 
	 public function ejecuta($query){
		 return $this->db->query($query)->result();
	 }

}?>