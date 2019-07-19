<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Reportes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->library('form_validation');
	}
	public function index()
	{ }


	public function listarvalfecha()
	{
		$crud = new grocery_CRUD();
		$this->config->load('grocery_crud');
		$crud->set_subject('');
		$crud->set_table('valoriza_fecha');	
		$crud->set_primary_key('Codigo');
		
		$crud->callback_column('Registro', array($this, 'callback_registro'));

		$fechaini = Date("Y-m-01");
		$fechafin = Date("Y-m-d");
		if($this->input->post('fecha_ini')){
			$fechaini = $this->input->post('fecha_ini');
		}
		if($this->input->post('fecha_fin')){
			$fechafin = $this->input->post('fecha_fin');
		}

		$crud->where('date(Registro) >=',$fechaini);
		$crud->where('date(Registro) <=',$fechafin);

		$crud->unset_clone();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_read();
		$crud->unset_edit();

		$titulo = "";
		$state = $crud->getState();
		if ($state == "list") $titulo = "VALORIZACIONES ENTRE DOS FECHAS";

		$data = new stdClass();

		$data = $crud->render();
		$data->titulo = $titulo;
		$data->state = $state;
		$data->fechaini = $fechaini;
		$data->fechafin = $fechafin;
		$this->load->view('v_crud_valoriza_fecha', $data);
	}

	function callback_registro($value, $row)
	{
		return Date("d/m/Y h:i a", strtotime($row->Registro));
	}

	public function listarvalcontac()
	{
		$crud = new grocery_CRUD();
		$this->config->load('grocery_crud');
		$crud->set_subject('Contacto');
		$crud->set_table('contactovaluacion');
		$crud->set_primary_key('idcontacto', 'contactovaluacion');
		$crud->columns( 'DNI_CONT','Nombres_y_Apellidos', 'CANTIDAD');


		$crud->display_as('Nombres_y_Apellidos', 'NOMBRES Y APELLIDOS');
		$crud->display_as('DNI_CONT', 'DNI');
		$crud->display_as('FENAC_CONT', 'FECHA_NACIMIENTO');
		$crud->display_as('TEL_CONT', 'TELEFONO');
		$crud->display_as('EMAIL_CONT', 'CORREO_ELECTRONICO');
		$crud->display_as('CANTIDAD', 'CANTIDAD VALORIZACIONES');
		$crud->required_fields(/*'idcontacto',*/'Nombres_y_Apellidos', 'DNI_CONT', 'FENAC_CONT', 'TEL_CONT', 'EMAIL_CONT', 'CANTIDAD');

		/*$crud->unset_export();
		$crud->unset_print();*/
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();

		$titulo = "";
		$state = $crud->getState();
		if ($state == "list") $titulo = "Contactos y cantidad de valorizaciones";
		/*else if ($state=="add") $titulo = "Registro de Contacto de Valorizaciones";
		else if ($state=="edit") $titulo = "Edici車n de Contacto de Valorizaciones";*/
		else if ($state == "read") $titulo = "Revisión de Contacto con más Valorizaciones";

		$data = new stdClass();

		$data = $crud->render();
		$data->titulo = $titulo;
		$data->state = $state;
		$this->load->view('v_crud', $data);
	}

	public function contactoval()
	{
		$crud = new grocery_CRUD();
		$this->config->load('grocery_crud');
		$crud->set_subject('Contacto');
		$crud->set_table('contactoval');
		$crud->order_by('nroValuacion', 'desc');
		$crud->set_primary_key('idcontacto', 'contactoval');
		$crud->columns('DNI_CONT', 'Nombres_y_Apellidos','TEL_CONT','EMAIL_CONT','nroValuacion','a104b', 'costo', 'pago', 'saldo');

        $crud->display_as('DNI_CONT', 'DNI');
		$crud->display_as('Nombres_y_Apellidos', 'NOMBRES Y APELLIDOS');
		$crud->display_as('TEL_CONT', 'TELEFONO');
		$crud->display_as('EMAIL_CONT', 'EMAIL');
		$crud->display_as('nroValuacion', 'Nro VALUACION');
		$crud->display_as('a104b', 'ENTIDAD FINANCIERA');
		$crud->display_as('costo', 'COSTO TOTAL');
		$crud->display_as('pago', 'PAGO TOTAL');
		$crud->display_as('saldo', 'SALDO');

		$crud->callback_column('saldo', array($this, 'callback_saldo'));

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$titulo = "";
		$state = $crud->getState();
		if ($state == "list") $titulo = "Reporte de Contactos y Pagos";
		/*else if ($state == "add") $titulo = "Registro de Contacto?";
		else if ($state == "edit") $titulo = "Edici車n de Contacto?";*/
		else if ($state == "read") $titulo = "Revisión de Contacto?";

		$data = new stdClass();

		$data = $crud->render();
		$data->titulo = $titulo;
		$data->state = $state;
		$this->load->view('v_crud', $data);
	}

	function callback_saldo($value, $row)
	{
		$saldo = $row->costo - $row->pago;

		return $saldo;
	}
}
