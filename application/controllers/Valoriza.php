<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(__DIR__ . '/src/autoload.php');

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
		$crud->columns('nroValuacion','tipoinmueble','fechavaluacion','a101','a102a','a102b', 'a103a', 'a103b','a104a','a104b','a201','a202','a202a','a203a','a203b','a203c','a301','a302','a302a','a302b','a302c','a302d','a303a','a303b','a304','a304a','a304b','a305','a306','a307a','a307a','a307b','a307c','a307d','a307e','a307f','a307g','a307h','a307i','a308','a309','a309a','a400','a500','a600','a700','b800','b900a','b900b','b1000a','b1000b','b1000b1','b1000c','b1000d','b1100a','b1100b','c1200','c1300','c1400','c1400a','c1400b','c1400c','c1400d','c1400e','c1400f',
		'c1500a','c1500b','c1500c','c1500d','c1500e','c1500f','c1500g','c1600','c1700','d1800a','d1800b','d1800c','d1800d','d1901a','d1901b','d1901c','d1901d','d1902','d1902a','d1902b','d1902c','d1902d','d1902e','d1902f','d1903a','d1903b','d1903c','d1903d','d1903e','d1903f','d1903g','d1903h','d1903i','d1903j','d1903k','d1903l','e2000','e2100','e2200','e2300','e2400','e2500','e2600','e2700','e2800a','e2800b','e2800c','e2800d','e2800e','e2800f','e2900a','e2900b','e2900c','e2900d','e3000a','e3000b','e3000c','registro');   
		
		$crud->display_as('nroValuacion','Nro. Valuación'); 
		$crud->display_as('tipoinmueble','Tipo de Inmueble');
		$crud->display_as('fechavaluacion','Fecha de Valuación');
		$crud->display_as('a101','Objeto de Valuación');
		$crud->display_as('a102a','DNI Propietarios');
		$crud->display_as('a102b','Propietarios');
		$crud->display_as('a103a','DNI Solicitante');
		$crud->display_as('a103b','Solicitante');
		$crud->display_as('a104a','RUC Entidad Financiera');
		$crud->display_as('a104b','Entidad Finaciera');
		$crud->display_as('a201','Registral');
		$crud->display_as('a202','Autovaluo');
		$crud->display_as('a202a','Insitu');
		$crud->display_as('a203a','Cod Departamento');
		$crud->display_as('a203b','Cod Provincia');
		$crud->display_as('a203c','Cod Distrito');
		$crud->display_as('a301','Zonificación');
		$crud->display_as('a302','Lindero Fuente');
		$crud->display_as('a302a','Lindero Frente');
		$crud->display_as('a302b','Lindero Fondo');
		$crud->display_as('a302c','Lindero Derecha');
		$crud->display_as('a302d','Lindero Izquierda');
		$crud->display_as('a303a','Área');
		$crud->display_as('a303b','Perímetro');
		$crud->display_as('a304','Edificaión Área Construida');
		$crud->display_as('a304a','Edificación Estado');
		$crud->display_as('a304b','Edificación Años Antigüedad');
		$crud->display_as('a305','Ocupación Uso');
		$crud->display_as('a306','Descrip. Predio');
		$crud->display_as('a307a','Sistema Constructivo');
		$crud->display_as('a307b','Muros');
		$crud->display_as('a307c','Techos');
		$crud->display_as('a307d','Puertas');
		$crud->display_as('a307e','Ventanas');
		$crud->display_as('a307f','Revestimiento');
		$crud->display_as('a307g','Pisos');
		$crud->display_as('a307h','Servicios Higénicos');
		$crud->display_as('a307i','Instalaciones Sanitarias');
		$crud->display_as('a308','Servidumbre');
		$crud->display_as('a309a','Declaratoria de Fábrica');
		$crud->display_as('a400','Análisis del Bien');
		$crud->display_as('a500','Alcances y Limitaciones');
		$crud->display_as('a600','Fecha de Asignación');
		$crud->display_as('a700','Poliza de Seguros');
		$crud->display_as('b800','Inspección Ocular del Bien');
		$crud->display_as('b900a','Cargas y Gravámenes');
		$crud->display_as('b900b','Cargas y Gravámenes Fuente');
		$crud->display_as('b1000a','Oficina Registral');
		$crud->display_as('b1000b','Código del Predio');
		$crud->display_as('b1000b1','Partida Electrónica');
		$crud->display_as('b1000c','Folio');
		$crud->display_as('b1000d','Asiento');
		$crud->display_as('b1100a','Cod. Suministro Energía Eléctrica');
		$crud->display_as('b1100b','Cod. Suministro Agua');
		$crud->display_as('c1200','Bases Para Su Desarrollo');
		$crud->display_as('c1300','Metodología Utilizada');
		$crud->display_as('c1400','Valores Comerciales de Referencia');
		$crud->display_as('c1400a','Total');
		$crud->display_as('c1400b','Dolares');
		$crud->display_as('c1400c','Tipo de Cambio');
		$crud->display_as('c1400d','Valor Soles');
		$crud->display_as('c1400e','Valores Comerciales de Referencia');
		$crud->display_as('c1400f','Mapa Referencia');
		$crud->display_as('c1500a','Características');
		$crud->display_as('c1500b','Áreas');
		$crud->display_as('c1500c','Ubicación');
		$crud->display_as('c1500d','Servicios');
		$crud->display_as('c1500e','Puntaje');
		$crud->display_as('c1500f','Porcentaje');
		$crud->display_as('c1500g','Tipo Garantía');
		$crud->display_as('c1600','Deducciones Aplicadas');
		$crud->display_as('c1700','Sustento');
		$crud->display_as('d1800a','Valor Comercial del Predio');
		$crud->display_as('d1800b','Valor Comercial Unitario');
		$crud->display_as('d1800c','Valor Comercial del Terreno');
		$crud->display_as('d1800d','Tpo de Cambio');
		$crud->display_as('d1901a','Area m2 (VT)');
		$crud->display_as('d1901b','Valor $ m2 (VT) ');
		$crud->display_as('d1901c','Valor Total $ (VT)');
		$crud->display_as('d1901d','Valor Total S/ (VT)');
		$crud->display_as('d1902','Región (VE)');
		$crud->display_as('d1902a','Valor m2 (VE)');
		$crud->display_as('d1902b','Valor Construcción (VE)');
		$crud->display_as('d1902c','Depreciación % (VE)');
		$crud->display_as('d1902d','Depreciación (VE)');
		$crud->display_as('d1902e','Subtotal (VE)');
		$crud->display_as('d1902f','Total (VE)');
		$crud->display_as('d1903a','TOTAL (VOC)');
		$crud->display_as('d1903b','Estado Conservación (VOC)');
		$crud->display_as('d1903c','Antiguedad (VOC)');
		$crud->display_as('d1903d','Valor Obras Complementarias $');
		$crud->display_as('d1903e','Valor Obras Complementaria S/.');
		$crud->display_as('d1903f','Valor Obras Complementaria %');
		$crud->display_as('d1903g','Valor Obras Complementarias $ (VNR)');
		$crud->display_as('d1903h','Valor Obras Complementarias S/. (VNR)');
		$crud->display_as('d1903i','Valor Obras Complementarias (VNR)');
		$crud->display_as('d1903j','Valor Obras Complementarias $ ');
		$crud->display_as('d1903k','Valor Obras Complementarias S/.');
		$crud->display_as('d1903l','Tipo de Cambio (VOC)');
		$crud->display_as('e2000','Declaracion de Independencia de Criterio');
		$crud->display_as('e2100','Normas Aplicables');
		$crud->display_as('e2200','Declaración Jurada');
		$crud->display_as('e2300','Vigencia de Evaluación');
		$crud->display_as('e2400','Posesión del Inmueble');
		$crud->display_as('e2500','Verificador del Inmueble');
		$crud->display_as('e2600','Consideraciones');
		$crud->display_as('e2700','Observaciones/Recomendaciones');
		$crud->display_as('e2800a','Titulo');
		$crud->display_as('e2800b','Certificado');
		$crud->display_as('e2800c','Autovaluo');
		$crud->display_as('e2800d','Planos');
		$crud->display_as('e2800e','Memoria');
		$crud->display_as('e2800f','Documentación');
		$crud->display_as('e2900a','Perito Valuador');
		$crud->display_as('e2900b','Profesión');
		$crud->display_as('e2900c','CAP');
		$crud->display_as('e2900d','Estado');
		$crud->display_as('e3000a','Fotos');
		$crud->display_as('e3000b','Fotos');
		$crud->display_as('e3000c','Fotos');
		$crud->display_as('registro','Fecha Registro');






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

		$detalles = array("propietario", "edificacion", "lindero", "referencia", "sintesis", "valor", "valorcomplementario", "foto");

		foreach ($detalles as $item) {
			$data[$item] = $this->m_valoriza->get_detail($item, $id);
		}

		$this->load->view('form/valoriza_edit', $data);
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

		$valoriza= $this->m_valoriza->get_header($id);
		$fistValoriza = $valoriza[0];
		
		$dpto = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a)[0]->C_NOMUBIGEO;
		$prov = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b)[0]->C_NOMUBIGEO;
		$dist = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b, $fistValoriza->a203c)[0]->C_NOMUBIGEO;

		$fistValoriza->a203a = $dpto;
		$fistValoriza->a203b = $prov;
		$fistValoriza->a203c = $dist;
		$propietarios = $this->m_valoriza->get_detail('propietario', $id);
		$data = array('valoriza'=>$fistValoriza, 'propietarios'=>$propietarios);

		$this->load->view('form/valoriza_resumen', $data);
	} 
}
