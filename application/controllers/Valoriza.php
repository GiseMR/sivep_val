<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(__DIR__ . '/src/autoload.php');
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
		$crud->columns('nroValuacion','tipoinmueble','fechavaluacion','a101','a102b', 'a103a', 'a103b','a104a','a104b','a201','a202','a202a','a203a','a203b','a203c','a301',/*'a302','a302a','a302b','a302c','a302d',*/'a303a','a303b','a304','a304a','a304b','a305','a306','a307a','a307a','a307b','a307c','a307d','a307e','a307f','a307g','a307h','a307i','a308'/*,'a309','a309a','a400','a500','a600','a700','b800','b900a','b900b','b1000a','b1000b','b1000b1','b1000c','b1000d','b1100a','b1100b','c1200','c1300'*/,'c1400','c1400a','c1400b','c1400c','c1400d','c1400e','c1400f',
		'c1500a','c1500b','c1500c','c1500d','c1500e','c1500f','c1500g','c1600','c1700','d1800a','d1800b','d1800c','d1800d','d1901a','d1901b','d1901c','d1901d','d1902','d1902a','d1902b','d1902c','d1902d','d1902e','d1902f','d1903a','d1903b','d1903c','d1903d','d1903e','d1903f','d1903g','d1903h','d1903i','d1903j','d1903k','d1903l'/*,'e2000','e2100','e2200','e2300','e2400','e2500','e2600','e2700','e2800a','e2800b','e2800c','e2800d','e2800e','e2800f'*/,'e2900a','e2900b','e2900c','e2900d'/*,'e3000a','e3000b','e3000c'*/,'registro'); 
		$crud->callback_column('a102b',array($this,'propietarios_callback'));
		$crud->callback_column('nroValuacion',array($this,'color_row_callback'));

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
		/*$crud->display_as('a302','Lindero Fuente');
		$crud->display_as('a302a','Lindero Frente');
		$crud->display_as('a302b','Lindero Fondo');
		$crud->display_as('a302c','Lindero Derecha');
		$crud->display_as('a302d','Lindero Izquierda');*/
		$crud->display_as('a303a','Área');
		$crud->display_as('a303b','Perímetro');
		$crud->display_as('a304','Edificaión_Área_Construida');
		$crud->display_as('a304a','Edificación_Estado');
		$crud->display_as('a304b','Edificación_Años_Antigüedad');
		$crud->display_as('a305','Ocupación_Uso');
		$crud->display_as('a306','Descrip. Predio');
		$crud->display_as('a307a','Sistema_Constructivo');
		$crud->display_as('a307b','Muros');
		$crud->display_as('a307c','Techos');
		$crud->display_as('a307d','Puertas');
		$crud->display_as('a307e','Ventanas');
		$crud->display_as('a307f','Revestimiento');
		$crud->display_as('a307g','Pisos');
		$crud->display_as('a307h','Servicios Higénicos');
		$crud->display_as('a307i','Instalaciones Sanitarias');
		$crud->display_as('a308','Servidumbre');
		/*$crud->display_as('a309a','Declaratoria de Fábrica');
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
		$crud->display_as('c1300','Metodología Utilizada');*/
		$crud->display_as('c1400','Valores_Comerciales_de_Referencia');
		$crud->display_as('c1400a','Total');
		$crud->display_as('c1400b','Dolares');
		$crud->display_as('c1400c','Tipo de Cambio');
		$crud->display_as('c1400d','Valor Soles');
		$crud->display_as('c1400e','Valores_Comerciales_de_Referencia');
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
		/*$crud->display_as('e2000','Declaracion de Independencia de Criterio');
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
		$crud->display_as('e2800f','Documentación');*/
		$crud->display_as('e2900a','Perito_Valuador');
		$crud->display_as('e2900b','Profesión');
		$crud->display_as('e2900c','CAP');
		$crud->display_as('e2900d','Estado');
		/*$crud->display_as('e3000a','Fotos');
		$crud->display_as('e3000b','Fotos');
		$crud->display_as('e3000c','Fotos');*/
		$crud->display_as('registro','Fecha Registro');
	
		$crud ->set_relation('idvaluacion' , 'propietario' , '{nombres}') ;
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
		if(count($someArray)<100)
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


	function getDataResumen($id){
		$valoriza= $this->m_valoriza->get_header($id);
		$fistValoriza = $valoriza[0];
		
		$dpto = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a)[0]->C_NOMUBIGEO;
		$prov = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b)[0]->C_NOMUBIGEO;
		$dist = $this->m_ubigeo->get_ubigeo($fistValoriza->a203a, $fistValoriza->a203b, $fistValoriza->a203c)[0]->C_NOMUBIGEO;

		$fistValoriza->a203a = $dpto;
		$fistValoriza->a203b = $prov;
		$fistValoriza->a203c = $dist;
		$propietarios = $this->m_valoriza->get_detail('propietario', $id);
		$sintesis = $this->m_valoriza->get_detail('sintesis', $id);
		$data = array('valoriza'=>$fistValoriza, 'propietarios'=>$propietarios, 'sintesis'=>$sintesis);
		return $data;
	}

	function verresumen($id){
		$data = $this->getDataResumen($id);
		$valoriza = $data["valoriza"];
		$propietarios = $data["propietarios"];
		$sintesis = $data["sintesis"];

        
		$object_excel = new PHPExcel();
		$sheet = $object_excel->getActiveSheet();
		$styleArray = array(
			'borders' => array(
			  'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			  )
			)
		  );
		$sheet->mergeCells('B2:G2');
		$sheet->mergeCells('B3:G3');
		$sheet->getStyle('B2:G3')->applyFromArray($styleArray);

		$sheet->getCell('B2')->setValue('HOJA DE RESUMEN');
		$sheet->getCell('B3')->setValue('VALUACIÓN DE INMUEBLE');
		$sheet->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$sheet->getStyle('B2:B3')->getFont()->setBold(true);
		$sheet->getStyle('B8:C10')->getFont()->setBold(true);
		$sheet->getStyle('B12')->getFont()->setBold(true);
		$sheet->getStyle('B16')->getFont()->setBold(true);
		$sheet->getStyle('B30')->getFont()->setBold(true);
		$sheet->getStyle('B41')->getFont()->setBold(true);
		$sheet->getStyle('B46:B47')->getFont()->setBold(true);
		
		  
		$sheet->getStyle('G5:G6')->applyFromArray($styleArray);
		$row = 7;
		$sheet->setCellValueByColumnAndRow(1, $row, 'REFERENCIA:   Valuación Comercial de inmueble');
		$sheet->setCellValueByColumnAndRow(6, $row-2, 'Val. Nro'.$valoriza->nroValuacion);
		$sheet->setCellValueByColumnAndRow(6, $row-1, $valoriza->tipoinmueble);
		$row ++;

		$sheet->getStyle('B8:G10')->applyFromArray($styleArray);
		$sheet->setCellValueByColumnAndRow(1, $row, 'Propietarios:');
		$nombresPropiestarios = "";
		foreach($propietarios as $item){
			$nombresPropiestarios = $nombresPropiestarios.' '.$item->nombres;
		}
		$sheet->mergeCells('C8:G8');
		$sheet->getCell('C8')->setValue($nombresPropiestarios);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'Solicitante:');
		$sheet->mergeCells('C9:G9');
		$sheet->getCell('C9')->setValue($valoriza->a103b);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'Entidad financiera:');
		$sheet->mergeCells('C10:G10');
		$sheet->getCell('C10')->setValue($valoriza->a104b);

		$row = $row + 3;
		$sheet->mergeCells('B12:G12');
		$sheet->getCell('B12')->setValue('UBICACIÓN:');
		$sheet->setCellValueByColumnAndRow(1, $row, 'Registral');
		$sheet->mergeCells('C13:G13');
		$sheet->getCell('C13')->setValue($valoriza->a201);
		$sheet->getStyle('B12:G14')->applyFromArray($styleArray);

		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'Distrito');
		$sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a203c);
		$sheet->setCellValueByColumnAndRow(3, $row, 'Provincia');
		$sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a203b);
		$sheet->setCellValueByColumnAndRow(5, $row, 'Departamento');
		$sheet->setCellValueByColumnAndRow(6, $row, $valoriza->a203a);

		$row = $row+2;
		$sheet->setCellValueByColumnAndRow(1, $row, 'CROQUIS DE UBICACIÓN');

		$gdImageE3000a = $this->createImageFromFile(base_url().$valoriza->e3000a);
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('UBICACIÓN');
		$objDrawing->setDescription('UBICACIÓN');
		$objDrawing->setImageResource($gdImageE3000a);
		$objDrawing->setHeight(120);
		$objDrawing->setCoordinates("B17");
		$objDrawing->setOffsetX(130);
		$objDrawing->setWorksheet($sheet);

		$gdImageE3000c = $this->createImageFromFile(base_url().$valoriza->e3000c);
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('UBICACIÓN');
		$objDrawing->setDescription('UBICACIÓN');
		$objDrawing->setImageResource($gdImageE3000c);
		$objDrawing->setHeight(180);
		$objDrawing->setCoordinates("D17");
		$objDrawing->setOffsetX(130);
		$objDrawing->setWorksheet($sheet);

		$sheet->getStyle('B31:G39')->applyFromArray($styleArray);
		$row= $row+14;
		$sheet->setCellValueByColumnAndRow(1, $row, 'RESUMEN DE VALUACION');
		$row++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'DESCRIPCION');
		$sheet->setCellValueByColumnAndRow(4, $row, 'AREA (m2)');
		$sheet->setCellValueByColumnAndRow(5, $row, 'VALOR EN US$');
		$sheet->setCellValueByColumnAndRow(6, $row, 'VALOR EN S/.');
		$row++;
		$i=0;
		$vcid=0;
		$vcis=0;
		foreach($sintesis as $item){
			$sheet->setCellValueByColumnAndRow(1, $row, $item->detalle);
			$area="";
			if($i==0) { $area = $valoriza->d1901a; } 
			$sheet->setCellValueByColumnAndRow(4, $row, $area);

			$sheet->setCellValueByColumnAndRow(5, $row, $item->montod);
			$sheet->setCellValueByColumnAndRow(6, $row, $item->montos);
			$row++;
			$i++;

			$vcid= $vcid+  $item->montod;
			$vcis= $vcis+  $item->montos;
		}
		
		$sheet->setCellValueByColumnAndRow(1, $row, 'VALOR COMERCIAL  DEL INMUEBLE');
		$sheet->setCellValueByColumnAndRow(4, $row, '');
		$sheet->setCellValueByColumnAndRow(5, $row, $vcid);
		$sheet->setCellValueByColumnAndRow(6, $row, $vcis);
		$row++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'VALOR NETO DE REALIZACION (VNR)');
		$sheet->setCellValueByColumnAndRow(4, $row, '');
		$sheet->setCellValueByColumnAndRow(5, $row, '');
		$sheet->setCellValueByColumnAndRow(6, $row, '');
		$row++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'CONSTITUYE GARANTIA HIPOTECARIA 80% DEL  (VCI)');
		$sheet->setCellValueByColumnAndRow(4, $row, '');
		$sheet->setCellValueByColumnAndRow(5, $row, '');
		$sheet->setCellValueByColumnAndRow(6, $row, '');
		$row++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'VALOR DE RECONSTRUCCION DE LA EDIFICACION');
		$sheet->setCellValueByColumnAndRow(4, $row, '');
		$sheet->setCellValueByColumnAndRow(5, $row, '');
		$sheet->setCellValueByColumnAndRow(6, $row, '');
		$row++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'VALOR ESTIMADO DE RECONSTRUCCIÓN');
		$sheet->setCellValueByColumnAndRow(4, $row, '');
		$sheet->setCellValueByColumnAndRow(5, $row, '');
		$sheet->setCellValueByColumnAndRow(6, $row, '');

		$row=$row + 2;
		$sheet->setCellValueByColumnAndRow(1, $row, 'OBSERVACIONES');
		$sheet->setCellValueByColumnAndRow(5, $row, 'Tipo de cambio S/.');
		$sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1903l);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'DECLARATORIA DE FABRICA');
		$sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a309);
		$sheet->setCellValueByColumnAndRow(5, $row, 'PORCENTAJE');
		$sheet->setCellValueByColumnAndRow(6, $row, $valoriza->a309a);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'CARGAS Y GRAVAMENES');
		$sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b900a);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'USO/ OCUPACION:');
		$sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a305);
		$row ++;
		$row ++;
		$sheet->getStyle('B41:G44')->applyFromArray($styleArray);
		$sheet->setCellValueByColumnAndRow(1, $row, 'TIPO DE GARANTIA:');
		$sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500g);
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'PERITO RESPONSABLE:');
		$sheet->setCellValueByColumnAndRow(2, $row, 'ARQ. CYNTHIA FLOR OCHOA PINO');
		$sheet->setCellValueByColumnAndRow(3, $row, 'CAP: 12452');
		$row ++;
		$row ++;
		$sheet->setCellValueByColumnAndRow(1, $row, 'FECHA:');
		$sheet->setCellValueByColumnAndRow(2, $row, 'San Jeronimo-Cusco:'.$valoriza->fechavaluacion);
		
		for ($col = 0; $col <= PHPExcel_Cell::columnIndexFromString($sheet->getHighestDataColumn()); $col++)
		{
			 $sheet->getColumnDimensionByColumn($col)->setAutoSize(true); 
		}  
		
		$object_excel_writer = PHPExcel_IOFactory::createWriter($object_excel, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="resumen.xls"');
		$object_excel_writer->save('php://output'); 
	}

	function createImageFromFile($filename, $use_include_path = false, $context = null, &$info = null)
    {      
      $info = array("image"=>getimagesize($filename));
      $info["image"] = getimagesize($filename);
	  if($info["image"] === false) 
	  	throw new InvalidArgumentException("\"".$filename."\" is not readable or no php supported format");
      else
      {
        $imageRes = imagecreatefromstring(file_get_contents($filename, $use_include_path, $context));
		if(isset($http_response_header)) 
			$info["http"] = $http_response_header;
        return $imageRes;
	  }
	 }
}
