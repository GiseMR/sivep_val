<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Valoriza extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('grocery_CRUD');
    }
	
	public function index(){
		/* ACTIVAR CON SESION
		if(!$this->verificarUserDataSesion()) {
			header('Location: ' . base_url());
   			die();
		}*/
        $crud = new grocery_CRUD();
        $this->config->load('grocery_crud');
        $crud->set_subject('');
        $crud->set_table('valoriza');
       		
		$crud->unset_export();
		$crud->unset_print();

		$titulo = "";
		$state = $crud->getState();
		if ($state=="list") $titulo = "Gestión de Usuarios del Sistema";
		else if ($state=="add") $titulo = "Registro de Usuario del Sistema";
		else if ($state=="edit") $titulo = "Edición de Usuario del Sistema";
		else if ($state=="read") $titulo = "Revisión de Usuario del Sistema";
		
        $data= new stdClass();
        
        $data=$crud->render();
        $data->titulo= $titulo;
		$data->state = $state;
		$this->load->view('v_crud',$data);
    }
	function nuevo(){
		$this->load->view('form/valoriza');		
	}
	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

}

?>