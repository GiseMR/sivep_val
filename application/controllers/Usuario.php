<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->library('form_validation');
		$this->load->model(array('m_usuario'));
    }
	
	public function index(){
		
		if(!$this->verificarUserDataSesion()) {
			header('Location: ' . base_url());
   			die();
		}
        $crud = new grocery_CRUD();
        $this->config->load('grocery_crud');
        $crud->set_subject('Usuario');
		$crud->set_table('usuario');
		$crud->add_action('Permisos', '', '','el el-key', array($this, 'permisoLink'));
		$crud->add_action('Contraseña', '', '','el el-lock',array($this, 'passwordLink'));
        $crud->columns('COD_USU','PASS_USU','NOM_USU','APP_USU','APM_USU','EMAIL_USU', 'CARGO_USU', 'ESTADO_USU');   
		
		$crud->display_as('COD_USU','USUARIO');
		$crud->display_as('PASS_USU','CONTRASEÑA');
		$crud->display_as('NOM_USU','NOMBRE');
		$crud->display_as('APP_USU','A. PATERNO');
		$crud->display_as('APM_USU','A. MATERNO');
		$crud->display_as('EMAIL_USU','CORREO');
		$crud->display_as('CARGO_USU','CARGO');
		$crud->display_as('ESTADO_USU','ESTADO');
        		
		$crud->required_fields('COD_USU','PASS_USU','NOM_USU','APP_USU','APM_USU','EMAIL_USU', 'CARGO_USU', 'ESTADO_USU');
		$crud->change_field_type('PASS_USU','password');
		/*$crud->set_rules('EMAIL_USU','CORREO','required|email');*/
	
	
        $crud->callback_before_insert(array($this,'encrypt_password_callback'));
		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		
		$crud->field_type('CARGO_USU','dropdown',
            array('AD' => 'Administrador', 'AN' => 'Analista'));
		$crud->field_type('ESTADO_USU','dropdown',
			array('A' => 'Activo', 'I' => 'Inactivo'));
		
		/*$crud->unset_export();
		$crud->unset_print();*/

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
		$this->load->view('usuario/v_crud',$data);
	}
	
	function encrypt_password_callback($post_array, $primary_key = null){
		if(strlen($post_array['PASS_USU'])<32)
		{
			$post_array['PASS_USU'] = md5($post_array['PASS_USU']);
		}
		return $post_array;
	}
	
	private function verificarUserDataSesion(){
		if(isset($this->session->userdata['logged_in'])){
			return true;
		}else{
			return false;
		}
	}

	function permisoLink($primary_key , $row)
	{
		return site_url('usuario/permisos/'.$primary_key);
	}

	function permisos($id, $mensaje=null)
	{
		$permisos = $this->m_usuario->obtenerPermisos($id);
		$menus = $this->m_usuario->obtenerMenu();
		$allmenus = [];
		foreach ($menus  as $menu)
		{
			$hasPermission = false;
			if(isset($permisos)){
				foreach($permisos as $permiso) {
					if ($menu->ID_MENU == $permiso->ID_MENU) {
						$hasPermission = true;
						break;
					}
				}
			}		

			$dto = array('id' => $menu->ID_MENU,
						'descripcion'=>$menu->DESC_MENU,
						'url'=>$menu->URL_MENU,
						'icono'=>$menu->IMG_MENU,
						'hasPermission'=> $hasPermission);
				
			array_push($allmenus, $dto);
		}
		
		
		$data = array('menus' =>$allmenus, 'codigoUsuario'=>$id, 'mensaje'=>$mensaje);
		$this->load->view('usuario/v_permiso', $data);
	}

	function registarpermiso(){

		$codigoUsuario = $this->input->post('codigoUsuario');
		$nuevoPermisoMenu= $this->input->post('permissions');
		$this->m_usuario->eliminarPermisos($codigoUsuario);
		foreach($nuevoPermisoMenu as $menuId) {
			$this->m_usuario->registarPermiso($codigoUsuario, $menuId);
		}
		$this->permisos($codigoUsuario, 'ok');
	}

	function cambiarpassword(){
		$codigoUsuario = $this->input->post('codigoUsuario');
		$password = $this->input->post('password');
		$usuario = $this->m_usuario->obtnerUsuario($codigoUsuario);
		$currentPassord = '';
		if(isset($usuario)){
			foreach($usuario as $row){
				$currentPassord =  $row->PASS_USU;
				break;
			}
		}

		if($currentPassord!=md5($password)){
			$this->password($codigoUsuario, 'La contraseña actual no es correcta');
			return;
		}
		else{
			$newpassword = $this->input->post('newpassword');
			$this->m_usuario->actualizarPassword($codigoUsuario, md5($newpassword));
			$this->password($codigoUsuario, 'ok');
		}
		
	}

	
	function passwordLink($primary_key , $row){
    	return site_url('usuario/password/'.$primary_key);           	 
	}

	function password($id, $mensaje=null) {
		
		$usuario = $this->m_usuario->obtnerUsuario($id);
		$nombreusuario = '';
		if(isset($usuario)){
			foreach($usuario as $row){
				$nombreusuario =  $row->NOM_USU;
				break;
			}
		}
		$data = array('codigoUsuario'=> $id, 'nombreusuario'=>$nombreusuario ,'mensaje'=>$mensaje);
		$this->load->view('usuario/v_password',$data);
	}	
}

?>