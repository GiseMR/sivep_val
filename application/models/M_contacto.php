<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contacto extends CI_Model {

	public function __construct(){
		parent::__construct();

	}
	
	public function registrar($dni, $nombre, $app, $apm, $fenac, $telefono, $email, $pago, $obs){
		$this->db->query('INSERT INTO contacto(DNI_CONT, NOM_CONT, APP_CONT, APM_CONT, FENAC_CONT, 
                         TEL_CONT, EMAIL_CONT, PAGO_CONT, OBS_CONT) VALUES 
                         ("'.$dni.'","'.$nombre.'","'.$app.'","'.$apm.'","'.$fenac.'",
                         "'.$telefono.'","'.$email.'",'.$pago.',"'.$obs.'")');
		return true;
	}

    public function consultarpordni($dni){
        $result = $this->db->query('SELECT * FROM  contacto where dni_cont="'.$dni.'"');
		return $result->result();
    }

}	
