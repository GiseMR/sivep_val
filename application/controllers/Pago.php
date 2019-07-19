<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pago extends CI_Controller {

    public function __construct(){
        parent::__construct();
		
		$this->load->model(array('m_contacto'));
		$this->load->model(array('m_pago'));
    }
	
	public function index(){	}
	
	
	public function getdata()
		{		
			$data = $this->input->post();
			$contanto = $this->m_contacto->consultarporid($data['idcontacto']);
			$dataResult['contacto'] = $contanto[0];
			echo json_encode($dataResult);
		}

	public function getdataresult($id)
	{	
		$pagos = $this->m_pago->getPagosByIdValuacion($id);
		$view = $this->load->view('pago/pago_list', ['pagos'=>$pagos]);
		return $view;
	}

	public function registrar()
	{		
		$data = $this->input->post();
		$row = $this->m_pago->registrar($data);
		if($row)
			$dataResult["result"] = true;
		else
			$dataResult["result"] = false;

		echo json_encode($dataResult);
	}

}
?>
