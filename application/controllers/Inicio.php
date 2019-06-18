<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

     public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
     }
	 
	public function index(){
		if($this->verificarUserDataSesion()){
			$this->load->view('v_header');
			$this->load->view('v_iframe');
		}else{			
			header('Location: ' . base_url());
		}
	}
	
	public function main(){
		if($this->verificarUserDataSesion()){
			$menu = $this->m_login->PermisosMenu($this->session->userdata['codigo']);
			$menu['colores'] = array('bg-cyan', 'bg-success', 'bg-warning', 'bg-primary', 'bg-danger');
			$this->load->view('form/main', $menu);
		}
	}
	public function logo(){
		$this->load->view('v_logo');
	}

	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}
	
	
}
