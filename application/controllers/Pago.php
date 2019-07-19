<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pago extends CI_Controller {

    public function __construct(){
        parent::__construct();
		
		$this->load->model(array('m_contacto'));
    }
	
	public function index(){	}
	
	
	public function getdata()
		{		
			$data = $this->input->post();
			$contanto = $this->m_contacto->consultarporid($data['idcontacto']);
			$dataResult['contacto'] = $contanto[0];
			echo json_encode($dataResult);
		}

}
?>
