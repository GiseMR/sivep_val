<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

     public function __construct(){
          parent::__construct();
     }
	 
	public function index(){
		//if($this->verificarUserDataSesion()){
			$this->load->view('v_header');
			$this->load->view('v_iframe');
		/*}else{
			$this->load->view('v_login');
		}*/
	}
	
	public function main(){
		$this->load->view('form/main');
	}

	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}
}
