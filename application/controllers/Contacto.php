<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model(array('m_contacto'));
    }
	
	public function index(){	}
		
    
        public function lista()
        {
          $crud = new grocery_CRUD();
        $this->config->load('grocery_crud');
        $crud->set_subject('Contacto');
        $crud->set_table('contacto');
        $crud->columns(/*'ID_CONT'*/'DNI_CONT','NOM_CONT','APP_CONT','APM_CONT','FENAC_CONT', 'TEL_CONT','EMAIL_CONT','COSTOVAL_CONT','PAGO_CONT','OBS_CONT');
		
		
		$crud->display_as('DNI_CONT','DNI');
		$crud->display_as('NOM_CONT','NOMBRES');
		$crud->display_as('APP_CONT','APELLIDO_PATERNO');
		$crud->display_as('APM_CONT','APELLIDO_MATERNO');
		$crud->display_as('FENAC_CONT','FECHA_NACIMIENTO');
		$crud->display_as('TEL_CONT','TELEFONO');
		$crud->display_as('EMAIL_CONT','CORREO_ELECTRONICO');
		$crud->display_as('COSTOVAL_CONT','COSTO_S/.');
		$crud->display_as('PAGO_CONT','PAGO_S/.');
		$crud->display_as('OBS_CONT','OBSERVACION');
		
		$crud->required_fields(/*'ID_CONT'*/'DNI_CONT','NOM_CONT','APP_CONT','APM_CONT','FENAC_CONT', 'TEL_CONT','EMAIL_CONT','COSTOVAL_CONT','PAGO_CONT','OBS_CONT');
		
		/*$crud->unset_export();
		$crud->unset_print();*/
        $crud->unset_add();
		$titulo = "";
		$state = $crud->getState();
		if ($state=="list") $titulo = "Gestión Contacto de Valorizaciones";
		else if ($state=="edit") $titulo = "Edición de Contacto de Valorizaciones";
		else if ($state=="read") $titulo = "Revisión de Contacto de Valorizaciones";
		$data= new stdClass();
        
        $data=$crud->render();
        $data->titulo= $titulo;
		$data->state = $state;
		$this->load->view('v_crud',$data);
            
            
        }
	
		public function registrar()
		{		
			$data = $this->input->post();
	
			$resultado = $this->m_contacto->consultarpordni($data['DNI_CONT']);
	
			if(count($resultado)==0){
				$this->m_contacto->registrar($data);
				$resultado = $this->m_contacto->consultarpordni($data['DNI_CONT']);
			}
			
			echo json_encode($resultado);
		}

}
?>
