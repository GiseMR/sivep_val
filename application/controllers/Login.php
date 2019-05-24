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
            $this->MuestraLogin();
          }
     }
	 
	 /*FUNCION QUE CARGA EL LOGIN*/
     public function MuestraLogin(){
          $this->load->view('v_login');
	 }
     public function salir(){
		$this->session->sess_destroy(); 
		header('Location: ' . base_url());
		die();
     }

	public function iniciar(){
		if ($this->input->post('iniciar')){
			$user=$this->input->post('user');
			$clave=md5($this->input->post('pass'));
			$datos=$this->m_login->LoginBD($user);
			
			if (count($datos)==1){
				$pass = $datos->PASS_USU;
				if($clave==$pass){
					if($datos->EST_USU=='1'){
					//si el uuuario esta inactivo 
					echo 'Usuario inactivo, consulte al administrador del sistema';
						return;
					}
					$sesion = array('logged_in' => true,
									'login' => $datos->COD_USU,
									'dni' => $datos->DNI_USU,
									'nombres' => $datos->NOM_USU,								
									'cargo' => $datos->CARGO_USU
									);
					/*Cargamos permisos de usuario y lo guardamos en una sesion
					$Menu = $this->m_login->PermisosMenu($datos->COD_USU);
					$this->session->set_userdata($sesion);
					$this->session->set_userdata($Menu);//cargamos la sesion del menu de acuerdo a los permisos*/


					echo 'true';
				}else{
					echo 'Contraseña incorrecta';
				}
			}else{
				echo 'Usuario no registrado';	
			}
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