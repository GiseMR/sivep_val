<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contactolista extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model(array('m_valoriza','m_contacto'));
    }
    public function index(){
		$crud = new grocery_CRUD();
        $this->config->load('grocery_crud');
        $crud->set_subject('Contacto');
        $crud->set_table('valuacion');
        $crud->columns('nroValuacion','idcontacto','NOM_CONT');   
        
        
		$crud->display_as('nroValuacion','NRO VALUACION');
        $crud->display_as('idcontacto','DNI');
        $crud->display_as('NOM_CONT','NOMBRE');
		
        $crud ->set_relation('idcontacto' , 'contacto','DNI_CONT','NOM_CONT');
        $crud->unset_add();
		$titulo = "";
		$state = $crud->getState();
		if ($state=="list") $titulo = "Gestión de Contactos de Valorizaciones";		
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