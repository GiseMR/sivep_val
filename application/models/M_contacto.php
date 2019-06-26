<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_contacto extends CI_Model {

	public function __construct(){
		parent::__construct();

	}
	
	public function registrar($nrovalcontac,$dni, $nombre, $app, $apm, $fenac, $telefono, $email, $pago, $obs){
		$this->db->query('INSERT INTO contacto(idvaluacion,DNI_CONT, NOM_CONT, APP_CONT, APM_CONT, FENAC_CONT, 
                         TEL_CONT, EMAIL_CONT, PAGO_CONT, OBS_CONT) VALUES 
                         ("'.$nrovalcontac.'","'.$dni.'","'.$nombre.'","'.$app.'","'.$apm.'","'.$fenac.'",
                         "'.$telefono.'","'.$email.'",'.$pago.',"'.$obs.'")');
		return true;
	}

    public function consultarpordni($dni){
        $result = $this->db->query('SELECT * FROM  contacto where dni_cont="'.$dni.'"');
		return $result->result();
	}
	/*public function listarcontacto()
	{
		$query = $this->db->query('SELECT c.DNI_CONT,c.NOM_COT,c.APP_CONT,c.APM_CONT,c.FENAC_CONT,c.TEL_CONT,c.EMAIL_CONT,c.PAGO_CONT,c.OBS_CONT,va.nroValuacion
		 FROM contacto c INNER join valuacion va on c.ID_CONT=va.ID_CONT') ;
		return $result->result();

	}*/

}	
