<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportes extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->library('form_validation');
		
    }
    public function index(){
    
    }
    public function listarvalfecha()
    {
        $this->load->view('reporte/v_fechas');
    }
    public function listarvalcontac(){
        $this->load->view('reporte/v_valcontacto');
    }
    public function listarvalentidad(){
        $this->load->view('reporte/v_valentidad');
    }
}