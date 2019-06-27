<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(__DIR__ . '/src/autoload.php');
require_once(__DIR__ . '/contentexcel/valorizaexcel.php');
require_once APPPATH.'third_party/phpexcel/PHPExcel.php';

class Valoriza extends CI_Controller
{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->model(array('m_ubigeo', 'm_valoriza'));
	}

	public function index()
	{
		/* ACTIVAR CON SESION
		if(!$this->verificarUserDataSesion()) {
			header('Location: ' . base_url());
   			die();
		}*/
		$crud = new grocery_CRUD();
		$this->config->load('grocery_crud');
		$crud->set_subject('');
		$crud->set_table('valuacion');
		$crud->order_by('registro', 'desc');
		$crud->add_action('Resumen', '', '','el el-file', array($this, 'resumenLink'));
		$crud->add_action('Fotos', '', '','el el-picture', array($this, 'fotosLink'));
		$crud->add_action('Exporta a Excel', '', '','el el-doc', array($this, 'exportoExcelLink'));
		$crud->columns('nroValuacion','tipoinmueble','fechavaluacion','a101','a102b', 'a103a',
		 'a103b','a104a','a104b','a201','a202','a202a','a203a','a203b','a203c','a301',
		 'a303a','a303b','a304','a305','a306','d1800a',
		'd1800b','d1800c','d1800d','d1901a','d1901b','d1901c','d1901d','d1902','d1902a',
		'd1903a','d1903b','d1903c','d1903d','d1903e','d1903f',
		'd1903g','d1903h','d1903i','d1903j','d1903k','d1903l','registro'); 
		$crud->callback_column('a102b',array($this,'propietarios_callback'));
		$crud->callback_column('nroValuacion',array($this,'color_row_callback'));
		$crud->callback_before_delete(array($this,'delete_detail'));
		
		$crud->display_as('nroValuacion','Nro._Valuación'); 
		$crud->display_as('tipoinmueble','Tipo_de_Inmueble');
		$crud->display_as('fechavaluacion','Fecha_de_Valuación');
		$crud->display_as('a101','Objeto_de_Valuación');
		$crud->display_as('a102a','DNI');
		$crud->display_as('a102b','Propietarios');
		$crud->display_as('a103a','DNI_Solicitante');
		$crud->display_as('a103b','Solicitante');
		$crud->display_as('a104a','RUC_Entidad_Financiera');
		$crud->display_as('a104b','Entidad_Finaciera');
		$crud->display_as('a201','Registral');
		$crud->display_as('a202','Autovaluo');
		$crud->display_as('a202a','Insitu');
		$crud->display_as('a203a','Departamento');
		$crud->display_as('a203b','Provincia');
		$crud->display_as('a203c','Distrito');
		$crud->display_as('a301','Zonificación');		
		$crud->display_as('a303a','Área');
		$crud->display_as('a303b','Perímetro');
		$crud->display_as('a304','Edificaión_Área_Construida');
		$crud->display_as('a305','Ocupación_Uso');
		$crud->display_as('a306','Descrip._Predio');
		$crud->display_as('d1800a','Valor_Comercial_del_Predio');
		$crud->display_as('d1800b','Valor_Comercial_Unitario');
		$crud->display_as('d1800c','Valor_Comercial_del_Terreno');
		$crud->display_as('d1800d','Tpo_de_Cambio');
		$crud->display_as('d1901a','Area_m2_(VT)');
		$crud->display_as('d1901b','Valor$ _m2 (VT) ');
		$crud->display_as('d1901c','Valor_Total_$ (VT)');
		$crud->display_as('d1901d','Valor_Total_S/ (VT)');
		$crud->display_as('d1902','Región_(VE)');
		$crud->display_as('d1902a','Valor_m2 (VE)');
		$crud->display_as('d1903a','TOTAL_(VOC)');
		$crud->display_as('d1903b','Estado_Conservación_(VOC)');
		$crud->display_as('d1903c','Antiguedad_(VOC)');
		$crud->display_as('d1903d','Valor_Obras_Complementarias_$');
		$crud->display_as('d1903e','Valor_Obras_Complementaria_S/.');
		$crud->display_as('d1903f','Valor_Obras_Complementaria_%');
		$crud->display_as('d1903g','Valor_Obras_Complementarias_$_(VNR)');
		$crud->display_as('d1903h','Valor_Obras_Complementarias_S/._(VNR)');
		$crud->display_as('d1903i','Valor_Obras_Complementarias_(VNR)');
		$crud->display_as('d1903j','Valor_Obras_Complementarias_$ ');
		$crud->display_as('d1903k','Valor_Obras_Complementarias_S/.');
		$crud->display_as('d1903l','Tipo_de_Cambio_(VOC)');
		$crud->display_as('e2900a','Perito_Valuador');
		$crud->display_as('e2900b','Profesión');
		$crud->display_as('e2900c','CAP');
		$crud->display_as('e2900d','Estado');
		$crud->display_as('registro','Fecha_Registro');		
		
		
		$crud->unset_export();
		$crud->unset_clone();
		$crud->unset_print();

		$titulo = "";
		$state = $crud->getState();
		if ($state == "list") $titulo = "Gestión de Valuaciones";
		else if ($state == "add") $titulo = "Registro de Valuacion?";
		else if ($state == "edit") $titulo = "Edición de Valuacion?";
		else if ($state == "read") $titulo = "Revisión de Valuacion?";

		$data = new stdClass();

		$data = $crud->render();
		$data->titulo = $titulo;
		$data->state = $state;
		$this->load->view('v_crud_valoriza', $data);
	}
	public function delete_detail($primary_key)
	{
	  	$detalles = array("propietario", "edificacion", "lindero", "referencia", "sintesis", "valor", "valorcomplementario", "foto", "fabrica");
		foreach ($detalles as $item) {
			$this->m_valoriza->delete_detail($item, $primary_key);
		}
		return true;
	}

	function propietarios_callback($value, $row){
		$nombres =$this->getDataPropiestario($row->idvaluacion);
		$html= "";
		if(strlen($nombres)>1)
			$html='<button type="button" id="'.$row->idvaluacion.'show" onmouseover="showPropietarios()" 
			data-trigger="focus" class="btn btn-outline-info btn-sm"
			data-toggle="popover" title="Propietarios"
			data-content="'.$nombres.'">Ver</button>';

			$row->a102b=$nombres;

		return $html;
	}

	

	function getDataPropiestario($idvaluacion){
		$propietarios = $this->m_valoriza->get_detail('propietario', $idvaluacion);
		$nombres ="";
		$i= 0;
		foreach($propietarios  as $item){
			if($i==0)
				$nombres = ''.$item->dni.':'.$item->nombres.'';
			else
				$nombres= $nombres.', '.$item->dni.':'.$item->nombres;
			$i++;
		}
		return  $nombres;
	}
	function color_row_callback($value, $row){
		
		
		$temp =	json_encode(array_filter((array) $row, function($val) {
			return !empty($val);
		}));

		$someArray = json_decode($temp, true);
		$result = $value;
		if(count($someArray)<110)
		{
			$separador='"';
			$result = $value."<script> $(".$separador."input[data-id='".$row->idvaluacion."']:checkbox".$separador.").parent().parent().css('background-color','#FFA07A'); </script>";	
		}		
		return $result;
	}
	

	function nuevo()
	{
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		$data["codigo"] = $this->m_valoriza->get_number() . '-' . date("Y");
		$this->load->view('form/valoriza', $data);
	}

	function edita($id)
	{
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		$data["valoriza"] = $this->m_valoriza->get_header($id);

		$detalles = array("propietario", "edificacion", "lindero", "referencia", "sintesis", "valor", "valorcomplementario", "foto", "fabrica");

		foreach ($detalles as $item) {
			$data[$item] = $this->m_valoriza->get_detail($item, $id);
		}

		$this->load->view('form/valoriza_edit', $data);
	}
	function leer($id)
	{
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		$data["valoriza"] = $this->m_valoriza->get_header($id);

		$detalles = array("propietario", "edificacion", "lindero", "referencia", "sintesis", "valor", "valorcomplementario", "foto", "fabrica");

		foreach ($detalles as $item) {
			$data[$item] = $this->m_valoriza->get_detail($item, $id);
		}

		$this->load->view('form/valoriza_read', $data);
	}

	private function verificarUserDataSesion()
	{
		if (isset($this->session->userdata['logged_in'])) {
			return true;
		} else {
			return false;
		}
	}



	public function consultadni()
	{
		$dni = $this->input->post('dni');
		$consulta = file_get_contents('http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI=' . $dni);
		$partes = explode("|", $consulta);
		$datos = array(
			'dni' => $dni,
			'firtsname' => $partes[0],
			'lastname' => $partes[1],
			'name' => $partes[2],
		);
		echo json_encode($datos);
	}

	public function consultarruc()
	{
		$company = new \Sunat\Sunat(true, true);
		$ruc = $this->input->post('ruc');
		$search = $company->search($ruc);
		echo $search->json();
	}

	public function grabar()
	{
		$data = $this->input->post();

		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$data[$key] = implode(';', $value);
			}
		}
		$data["nroValuacion"] = $this->m_valoriza->get_number() . '-' . date("Y");
		echo $this->m_valoriza->insertar($data);
	}

	public function grabardetalle($tabla)
	{
		$data = $this->input->post();
		echo $this->m_valoriza->insertarDetalle($data[$tabla], $tabla);
	}

	public function actualizar()
	{
		$data = $this->input->post();
		$id = $data["idvaluacion"];
		unset($data["idvaluacion"]);

		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$data[$key] = implode(';', $value);
			}
		}
		//$data["nroValuacion"] = $this->m_valoriza->get_number() . '-' . date("Y");
		$res = $this->m_valoriza->actualizar($data, $id);

		if($res=="OK"){
			echo $id;
		}else{
			echo $res;
		}
	}

	public function actualizadetalle($tabla)
	{
		$data = $this->input->post();

		$res = "";
		foreach ($data[$tabla] as $item) {			
			$idx = "id" . $tabla;
			$id = $item[$idx];
			$delete = $item["delete"];
			unset($item[$idx]);
			unset($item["delete"]);

			if ($id == "" || $id == NULL || $id == "NULL") {
				if($delete == "no"){
					$res .= "-".$this->m_valoriza->grabaDetalle($item, $tabla);
				}
			}else{
				if($delete == "no"){
					$res .= "-".$this->m_valoriza->actualizaDetalle($item, $id, $tabla);
				}else{
					$res .= "-".$this->m_valoriza->eliminaDetalle($id, $tabla);
				}
			}
		}
		echo $res;		
	}

	public function subeImagen($campo)
	{
		if (isset($_FILES[$campo]["type"])) {
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES[$campo]["name"]);
			$file_extension = end($temporary);
			if ($_FILES[$campo]["size"] < 1000000 && in_array($file_extension, $validextensions)) {
				if ($_FILES[$campo]["error"] > 0) {
					$response = '{"status":"error", "message":"' . "Error: " . $_FILES[$campo]["error"] . '"}';
					echo $response;
				} else {
					if (file_exists("assets/uploads/" . $_FILES[$campo]["name"])) {
						$response = '{"status":"warning", "message":"' . "El archivo " . $_FILES[$campo]["name"] . " ya existe" . '", "file" : "' . "assets/uploads/" . $_FILES[$campo]["name"] . '"}';
						echo $response;
					} else {
						$sourcePath = $_FILES[$campo]['tmp_name']; // Storing source path of the file in a variable
						$targetPath = "assets/uploads/" . $_FILES[$campo]['name']; // Target path where file is to be stored
						move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file

						$response = '{"status":"ok", "message":"Archivo cargado!", "file": "' . $targetPath . '"}';
						echo $response;
					}
				}
			} else {
				$response = '{"status":"error", "message":"' . "El archivo " . $_FILES[$campo]["error"] . ' es muy grande o no es una imagen"}';
				echo $response;
			}
		}
	}

	public function aletra($numero)
	{
		$this->load->library('numero_a_letra');
		$obj_numero_a_letra = new Numero_a_letra();
		echo strtoupper($obj_numero_a_letra->valor_en_letras($numero, ''));
	}
	function resumenLink($primary_key , $row)
	{
		return site_url('valoriza/resumen/'.$primary_key);
	}

	function resumen($id) {
		$data = $this->getDataResumen($id);
		$this->load->view('form/valoriza_resumen', $data);
	} 

	function getDataResumen($id){
		$valoriza= $this->m_valoriza->get_header($id);
		$fistValoriza = $valoriza[0];

		$dpto = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a);
		$prov = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b);
		$dist = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b, $fistValoriza->a203c);
		if(isset($dpto))
			$fistValoriza->a203a = $dpto[0]->C_NOMUBIGEO;
		if(isset($prov))
			$fistValoriza->a203b = $prov[0]->C_NOMUBIGEO;
		if(isset($dist))
			$fistValoriza->a203c = $dist[0]->C_NOMUBIGEO;
		$propietarios = $this->m_valoriza->get_detail('propietario', $id);
		$sintesis = $this->m_valoriza->get_detail('sintesis', $id);
		$data = array('valoriza'=>$fistValoriza, 'propietarios'=>$propietarios, 'sintesis'=>$sintesis);
		return $data;
	}

	function exportarresumenexcel($id){
		$data = $this->getDataResumen($id);
		$valorizaExcel = new ValorizaExcel();		
		$object_excel = $valorizaExcel->generarResumen($data);
		$object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="resumen.xls"');
		$object_excel_writer->save('php://output'); 
	}

	function fotosLink($primary_key , $row)
	{
		return site_url('valoriza/panelfotos/'.$primary_key);
	}

	function panelfotos($id) {
		$valoriza= $this->m_valoriza->get_header($id);
		$fistValoriza = $valoriza[0];
		$fotos = $this->m_valoriza->get_detail('foto', $id);
		$data = array('valoriza'=>$fistValoriza, 'fotos'=>$fotos);
		$this->load->view('form/valoriza_fotos', $data);
	}


	 function exportoExcelLink($primary_key , $row)
	 {
		 return site_url('valoriza/exportoexcel/'.$primary_key);
	 }

	 function exportoexcel($id) {
			$data = $this->m_valoriza->getAllDataById($id);
			$fistValoriza = $data['valoriza'][0];

			$dpto = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a);
			$prov = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b);
			$dist = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b, $fistValoriza->a203c);
			if(isset($dpto))
				$fistValoriza->a203a = $dpto[0]->C_NOMUBIGEO;
			if(isset($prov))
				$fistValoriza->a203b = $prov[0]->C_NOMUBIGEO;
			if(isset($dist))
				$fistValoriza->a203c = $dist[0]->C_NOMUBIGEO;

			$data['valoriza'] = $fistValoriza;

			$valorizaExcel = new ValorizaExcel();		
			$object_excel = $valorizaExcel->exporToExcel($data);
			$object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5');
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="valuacion.xls"');
			$object_excel_writer->save('php://output');
	} 
}
