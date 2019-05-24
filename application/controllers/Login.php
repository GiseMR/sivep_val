<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//cagando modelo login
		$this->load->model('m_login');
	}
	 
     public function index(){ /*VALIDAMOS SI LA SESION ES ACTIVA REDIRIGIMOS AL HOME, SI NO AL LOGIN*/
          //si la sesion esta activa se cargan las vistas del menu , etc
          if($this->verificarUserDataSesion()){
          	
            $this->load->view('v_header');
						$this->load->view('index');
						$this->load->view('v_footer');
          }else{
            $this->MuestraLogin('');
          }
     }
	 
	 /*FUNCION QUE CARGA EL LOGIN*/
     public function MuestraLogin($validationMessage) {
		 $data['validationMessage'] = $validationMessage;
          $this->load->view('v_login', $data);
	 }
     public function salir(){
		$this->session->sess_destroy(); 
		header('Location: ' . base_url());
		die();
     }

	public function iniciar(){
		if($this->verificarUserDataSesion()){
            $this->load->view('v_header');
			$this->load->view('v_iframe');
			$this->load->view('v_footer');
			return;
		  }		  

		if ($this->input->post('iniciar')){
			$user = $this->input->post('usuario');
			$clave = md5($this->input->post('password'));
			$datos = $this->m_login->LoginBD($user);
			if (count($datos)==1){
				$pass = $datos->PASS_USU;
				if($clave==$pass){
					if($datos->ESTADO_USU=='0'){
						$this->MuestraLogin('* Usuario inactivo, consulte al administrador del sistema');
						return;
					}
					$sesion = array('logged_in' => true,
									'codigo' => $datos->COD_USU,
									'nombres' => $datos->NOM_USU,								
									'cargo' => $datos->CARGO_USU
									);
					$menu = $this->m_login->PermisosMenu($datos->COD_USU);
					$this->session->set_userdata($sesion);
					$this->session->set_userdata($menu);

					if(count($menu['Permisos'])==1){
						$row='';
						foreach ($menu['Permisos'] as $result) {
							$row = $result['ID']; 
							break;
						}
						if($row=='Error'){
							$this->MuestraLogin('* El usuario no tiene permisos');	
							return;
						}
					}
					$this->load->view('v_header');
					$this->load->view('v_iframe');
					$this->load->view('v_footer');

				}else{
					$this->MuestraLogin('* Contraseña incorrecta');
				}
			}else{
				$this->MuestraLogin('* Usuario no registrado');
			}
		} else {
			$this->MuestraLogin('');
		}
	}

	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}
}