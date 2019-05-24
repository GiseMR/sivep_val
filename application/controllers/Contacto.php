<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
	
	public function index(){
		
        $crud = new grocery_CRUD();
        $this->config->load('grocery_crud');
        $crud->set_subject('Contacto');
        $crud->set_table('contacto');
        $crud->columns('DNI_CONT','NOM_CONT','APP_CONT','APM_CONT','FENAC_CONT','TEL_CONT','EMAIL_CONT', 'PAGO_CONT', 'OBS_CONT');   
		
		$crud->display_as('ID_CONT','ID');
		$crud->display_as('DNI_CONT','DNI');
		$crud->display_as('NOM_CONT','NOMBRE');
		$crud->display_as('APP_CONT','A. PATERNO');
		$crud->display_as('APM_CONT','A. MATERNO');
		$crud->display_as('FENAC_CONT','FECH_NAC.');
		$crud->display_as('TEL_CONT','TELEFONO');
		$crud->display_as('EMAIL_CONT','CORREO');
		$crud->display_as('PAGO_CONT','PAGO');
		$crud->display_as('OBS_CONT','OBSERVACION');
		$crud->field_type('EMAIL_CONT','email');	
			
		$crud->required_fields(/*'ID_CONT'*/'DNI_CONT','NOM_CONT','APP_CONT','APM_CONT','FENAC_CONT', 'TEL_CONT', 'EMAIL_CONT','PAGO_CONT','OBS_CONT');
		
		/*$crud->unset_export();
		$crud->unset_print();*/

		$titulo = "";
		$state = $crud->getState();
		if ($state=="list") $titulo = "Gestión de Contactos de Valorizaciones";
		else if ($state=="add") $titulo = "Registro de Contacto de Valorizaciones";
		else if ($state=="edit") $titulo = "Edición de Contacto de Valorizaciones";
		else if ($state=="read") $titulo = "Revisión de Contacto de Valorizaciones";
		
        $data= new stdClass();
        
        $data=$crud->render();
        $data->titulo= $titulo;
		$data->state = $state;
		$this->load->view('v_crud',$data);
    }
	

}

?>