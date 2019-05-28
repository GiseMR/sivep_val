<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(__DIR__.'/src/autoload.php');

class Valoriza extends CI_Controller {

	
    public function __construct(){
        parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model(array('m_ubigeo'));
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
		$crud->set_table('valuacion');

		$crud->display_as('nroValuacion','N° VALUACION');
		$crud->display_as('a101','ZONA');
		$crud->display_as('a102','PROPIETARIOS');
		$crud->display_as('a103','SOLICITANTE');
		$crud->display_as('a104','ENTIDAD_FINANCIERA');
		$crud->display_as('a201','UBICACION');
		$crud->display_as('a202','COD_UBIGEO');
		$crud->display_as('a203','CROQUIS_UBICACION');
		$crud->display_as('a301','VALOR_TERRENO');
		$crud->display_as('a302','VALOR_EDIFICACIONES');
		$crud->display_as('a301','VALOR_OBRAS_COMPLEMETARIAS');
		$crud->display_as('a302a','VCI');
		$crud->display_as('a302b','VNR');
		$crud->display_as('a302c','G.H DEL VCI');
		$crud->display_as('a302d','VALOR_RECONSTRUCCION');
       		
		$crud->unset_export();
		$crud->unset_add();
		$crud->unset_print();

		$titulo = "";
		$state = $crud->getState();
		if ($state=="list") $titulo = "Gestión de Valuaciones";
		else if ($state=="add") $titulo = "Registro de Valuacion?";
		else if ($state=="edit") $titulo = "Edición de Valuacion?";
		else if ($state=="read") $titulo = "Revisión de Valuacion?";
		
        $data= new stdClass();
        
        $data=$crud->render();
        $data->titulo= $titulo;
		$data->state = $state;
		$this->load->view('v_crud',$data);
    }
	function nuevo(){
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		$this->load->view('form/valoriza', $data);		
	}
	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

	public function consultadni(){
		$dni = $this->input->post('dni');
		$consulta = file_get_contents('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dni);
		$partes = explode("|", $consulta);
		$datos = array(
		'dni' => $dni,
		'firtsname' => $partes[0],
		'lastname' => $partes[1],
		'name' => $partes[2],
		);		
		echo json_encode($datos);
	}

	public function consultarruc(){
		$company = new \Sunat\Sunat( true, true );
		$ruc = $this->input->post('ruc');
		$search = $company->search( $ruc );
		echo $search->json();
	}
}

?>