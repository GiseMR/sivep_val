<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubigeo extends CI_Controller {


	public function __construct(){
		parent::__construct();


		$this->load->database('default');
		$this->load->model(array('m_ubigeo', /* 'otro_modelo' */)); #Le decimos a CodeIgniter que MODELO usaremos, si hay mas modelos los añadiremos con comas

	} 	
	public function index() #En el index se cargara primero el combo departamentos
	{
		#Consultamos a la BD todos los departamentos
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		
		#Cargamos la consulta de los departamentos al primer combo en la VISTA
		$this->load->view('form/valoriza',$data);
	}

	public function cargar_provincia() # Esta funcion es llamada desde proceso.js
	{
		if($this->input->is_ajax_request() && $this->input->post('id')){ //comprueba si es ajax que se llama desde proceso.js
        	$id = $this->input->post('id'); //capturamos el ID de departamento desde el combo
        	$data = array('consulta_provincia' => $this->m_ubigeo->obtener_provincia($id)); // consultamos en la BD las provincias de un departamento
			echo json_encode($data); //devolvemos la consulta en formato JSON
			return FALSE;
        }
        else{
        	$this->index();
        }
	}

	public function cargar_distrito() # Esta funcion es llamada desde proceso.js
	{
		if($this->input->is_ajax_request() && $this->input->post('id_prov')){ //comprueba si es ajax que se llama desde proceso.js
        	$id_dep = $this->input->post('id_dep'); //capturamos el ID de provincia desde el combo
        	$id_prov = $this->input->post('id_prov');
        	$data = array('consulta_distrito' => $this->m_ubigeo->obtener_distrito($id_dep , $id_prov)); // consultamos en la BD las distritos de un provincia
			echo json_encode($data); //devolvemos la consulta en formato JSON
			return FALSE;
        }
        else{
        	$this->index();
        }
	}
	
}

