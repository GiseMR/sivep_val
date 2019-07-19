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
		$crud->add_action('Exporta a Excel', '', '','el el-share', array($this, 'exportoExcelLink'));
		$crud->add_action('Imprimir', '', '','el el-print', array($this, 'printLink'));
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
		if(count($someArray)<95)
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

	function  printLink($primary_key , $row)
	{
		return site_url('valoriza/imprimir/'.$primary_key);
	}

	function imprimir($id)
	{
		$data = array('consulta_departamento' => $this->m_ubigeo->obtener_departamentos());
		$data["valoriza"] = $this->m_valoriza->get_header($id);

		$detalles = array("propietario", "edificacion", "lindero", "referencia", "sintesis", "valor", "valorcomplementario", "foto", "fabrica");

		foreach ($detalles as $item) {
			$data[$item] = $this->m_valoriza->get_detail($item, $id);
		}

		$this->load->view('form/valoriza_print', $data);
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
	
	
	/*-----------------------------------------*/

	
	
	
	/*-----------------------------------------*/


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


require_once APPPATH.'third_party/phpexcel/PHPExcel.php';

class ValorizaExcel
{

        public function exporToExcel($data) {
            $valoriza = $data["valoriza"];
            $edificaciones = $data["edificaciones"];
		    $fotos = $data["fotos"];
		    $linderos = $data["linderos"];
		    $propietarios = $data["propietarios"];
		    $referencias = $data["referencias"];
		    $sintesis = $data["sintesis"];
		    $valores = $data["valores"];
            $valorcomplementarios = $data["valorcomplementarios"];
            $fabricas = $data["fabricas"];

            $object_excel = new PHPExcel();
            $sheet = $object_excel->getActiveSheet();
            $sheet->setTitle('VALUACION');

            
            $row = 2;
            $styleArray = array(
                'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
                )
            );

            $sheet->mergeCells('A'.$row.':G'.($row+1).'');
            $sheet->getStyle('A'.$row.':G'.($row+1).'')->applyFromArray($styleArray);
            $sheet->getCell('A'.$row)->setValue('INFORME DE VALUACIÓN');
            $sheet->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $sheet->getColumnDimension('A')->setWidth(25);
            $sheet->getColumnDimension('B')->setWidth(20);
            $sheet->getColumnDimension('C')->setWidth(20);
            $sheet->getColumnDimension('D')->setWidth(20);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(20);
            $sheet->getColumnDimension('G')->setWidth(20);
            $this->cellColor($sheet, 'A'.$row.':G'.($row+1).'', '91D2EE'); 
            $row= $row + 3;
            $sheet->getStyle('F'.$row.':G'.($row+1).'')->applyFromArray($styleArray);
            
            $sheet->setCellValueByColumnAndRow(5, $row,'Val N°:');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->nroValuacion);
            $filaactual=$row;
            $row++;
            $sheet->setCellValueByColumnAndRow(5, $row, 'Inmueble:');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->tipoinmueble);
            $row++;
            
            $sheet->setCellValueByColumnAndRow(5, $row, 'Fecha:');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->fechavaluacion);
            
            $sheet->getStyle('G5:G7')->getFont()->setBold(true);
            $sheet->getStyle('B12')->getFont()->setBold(true);
            $sheet->getStyle('B14:C18')->getFont()->setBold(true);
            $sheet->getStyle('C23')->getFont()->setBold(true);
            $sheet->getStyle('E23')->getFont()->setBold(true);
            $sheet->getStyle('G23')->getFont()->setBold(true);
            $sheet->getStyle('B27:B35')->getFont()->setBold(true);
           
            $sheet->getStyle('F'.$filaactual.':A'.$row)->getFont()->setBold( true );

            /* Datos generales*/
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'A) DATOS GENERALES');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '1.0 INSTRUCCIONES RECIBIDAS');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '1.01 Objeto de Valuación');
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->a101);

            $row=$row+2;
            $nombresPropiestarios = "";
            foreach($propietarios as $item){
                $nombresPropiestarios = $nombresPropiestarios.' '.$item->nombres;
            }
            $sheet->setCellValueByColumnAndRow(1, $row, '1.02 Propietarios');

            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getStyle('C'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->getCell('C'.$row)->setValue($nombresPropiestarios);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '1.03 Solicitante');

            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getStyle('C'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->getCell('C'.$row)->setValue($valoriza->a103b);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '1.04 Entidad Financiera');
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getStyle('C'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->getCell('C'.$row)->setValue($valoriza->a104b);
            /* End Datos generales*/

            $row=$row+2;
            /* Ubicación*/            
            $sheet->setCellValueByColumnAndRow(0, $row, '2.0 UBICACIÓN');
            $row++;
            $sheet->getStyle('B'.$row.':G'.($row + 2).'')->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'REGISTRAL');
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->a201);

            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'AUTOVALUO');
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->a202);

            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Distrito');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a203c);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Provincia');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a203b);
            $sheet->setCellValueByColumnAndRow(5, $row, 'Departamento');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->a203a);
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('FUENTE : CRI - 28/12/2018');
            
            /* End ubicación*/

            $row=$row+2;
            /* Descripción detallada*/
            $sheet->setCellValueByColumnAndRow(0, $row, '3.0 DESCRIPCIÓN DETALLADA');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.01 Zonificación');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a301);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.02 Linderos');
            $row=$row+2;
            $rowStart=$row;
            foreach($linderos as $item){
                $sheet->mergeCells('B'.$row.':C'.$row);
                $sheet->getCell('B'.$row)->setValue($item->ubicacion);
                $sheet->mergeCells('D'.$row.':G'.$row);
                $sheet->getCell('D'.$row)->setValue($item->detalle);
                $row++;
            }
            $sheet->getStyle('B'.$rowStart.':G'.($row-1).'')->applyFromArray($styleArray);

            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.03 Terreno');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'Area:');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a303a);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Perímetro:');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a303b);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.04 Edificación');
            /* End Descripción detallada*/

            /*Bloques */
            foreach($edificaciones as $item)
            { 
                $bloques[$item->bloque][] = $item;
            }                      

            if(isset($bloques)){
                $row=$row+2;
                $i=1;
                $rowStart=$row;
                foreach($bloques as $bloque){                    
                    $sheet->setCellValueByColumnAndRow(1, $row, 'BLOQUE '.$i);
                    $i++;
                    $row++;
                    $sheet->setCellValueByColumnAndRow(1, $row, 'NIVEL');
                    $sheet->setCellValueByColumnAndRow(2, $row, 'DISTRIBUCION DE AMBIENTES');
                    $sheet->setCellValueByColumnAndRow(6, $row, 'AREA CONSTRUIDA (m2)');
                    $row++;
                    $area=0;
                    foreach($bloque as $item){
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->nivel);
                        $sheet->setCellValueByColumnAndRow(2, $row, $item->distribucion);
                        $sheet->setCellValueByColumnAndRow(6, $row, $item->area);
                        $area =$area + $item->area;
                        $row++;
                    }

                    $sheet->setCellValueByColumnAndRow(5, $row, 'Total');
                    $sheet->setCellValueByColumnAndRow(6, $row, $area);
                    $row++;
                    $sheet->setCellValueByColumnAndRow(1, $row, 'Estado de Conservación');
                    $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a304a);
                    $sheet->setCellValueByColumnAndRow(3, $row, 'Antigüedad');
                    $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a304b);
                    $sheet->setCellValueByColumnAndRow(5, $row, 'AÑOS');
                    $row=$row+2;
                    $sheet->getStyle('B'.($rowStart+1).':G'.($row-2).'')->applyFromArray($styleArray);
                    $rowStart=$row;
                }
                
            }
            /*End Bloques */
            $row=$row+2;
            /* Fabricas*/
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('3.06 Descripción del Predio:');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a306);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.07 Fábrica- Especificaciones técnicas');
            $row=$row+2;
            $i=1;
            
            foreach($fabricas as $fabrica){
                $rowStart=$row;
                $sheet->setCellValueByColumnAndRow(1, $row, 'BLOQUE '.$i);
                $row++;
                
                
                $sheet->setCellValueByColumnAndRow(1, $row, 'Sistema constructivo');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->sistema);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Muros y Columnas');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->muro);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Techos');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->techo);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Puertas');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->puerta);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Ventanas');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->ventana);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Revestimiento');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->revestimiento);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Pisos');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->piso);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'SS.HH');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->sshh);
                $row++;
                $sheet->setCellValueByColumnAndRow(1, $row, 'Inst. eléctricas y sanitarias');
                $sheet->setCellValueByColumnAndRow(2, $row, $fabrica->sanitaria);
                $sheet->getStyle('B'.$rowStart.':C'.$row)->applyFromArray($styleArray);
                $i++;
                $row= $row+2;
            }
            
                 
            /* End Fabricas*/
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('3.08 Fábrica- Especificaciones técnicas');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a308);
            $row=$row+2;
            
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('3.09 Declaratoria de Fabrica');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a309);

            $sheet->setCellValueByColumnAndRow(4, $row, 'Porcentaje');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->a309a,'%');
            $row= $row+2;
             /* 4*/
            $sheet->setCellValueByColumnAndRow(0, $row, '4.00 ANALISIS DEL MEJOR Y MÁS INTENSIVO USOS POSIBLE DEL BIEN');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Dado su ubicación, dimensiones y características constructivas el inmueble se puede utilizar como:');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a400);
            /* End 4*/
            $row= $row+2;

            /* 5*/
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO');
            $row++;            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('La valuación es para determinar el valor comercial del predio.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a500);
            /* End 5*/
            $row = $row+2;
            /* 6*/
            $sheet->setCellValueByColumnAndRow(0, $row, '6.00 FECHA DE ASIGNACIÓN DEL VALOR');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a600);
            /* End 6*/
            $row = $row+2;
            /* 7*/
            $sheet->setCellValueByColumnAndRow(0, $row, '7.00 POLIZA DE SEGUROS');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a700);
            /* End 7*/
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'B)     VERIFICACIONES EFECTUADAS');
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '8.00 INSPECCIÓN OCULAR DEL BIEN ');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->b800);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '9.00 GRAVÁMENES');
            $sheet->setCellValueByColumnAndRow(2, $row, 'A FAVOR DE:');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->b900a);
            $row++;
            $sheet->setCellValueByColumnAndRow(2, $row, 'FUENTE');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->b900b);
            $row = $row+2;
            /* 10*/
            $sheet->setCellValueByColumnAndRow(0, $row, '10.00 DATOS LEGALES');
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO');
            
            
            $sheet->setCellValueByColumnAndRow(1, $row, 'El predio está inscrito en la Oficina Registral de :');
            $sheet->setCellValueByColumnAndRow(4, $row, 'Oficina Registral:'.$valoriza->b1000a);
            $row++;

            $sheet->getStyle('B'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'Codigo del Predio / Ficha N°');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1000b);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Folio: '.$valoriza->b1000c);
            $sheet->setCellValueByColumnAndRow(4, $row, 'Asiento');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->b1000d);
            /* End 10*/
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '11.00 CÓDIGO DE SUMINISTROS.');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'Energía Eléctrica :');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1100a);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Agua :');
            $sheet->setCellValueByColumnAndRow(4, $row,  $valoriza->b1100b);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'C) METODOLOGÍA APLICADA');
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '12.00 BASES PARA SU DESARROLLO');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1200);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '13.00 METODOLOGÍA UTILIZADA.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1300);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1400);
            $row = $row+2;
            $rowStart=$row;
            $sheet->setCellValueByColumnAndRow(1, $row, 'DIRECCION');
            $sheet->setCellValueByColumnAndRow(2, $row, 'PROPIETARIO');
            $sheet->setCellValueByColumnAndRow(3, $row, 'TELEFONO');
            $sheet->setCellValueByColumnAndRow(4, $row, 'DISTANCIA');
            $sheet->setCellValueByColumnAndRow(5, $row, 'TERRENO $');
            $sheet->setCellValueByColumnAndRow(6, $row, 'FECHA');
            $row++;
            $terreno=0;
            foreach($referencias as $refrencia){               
                $sheet->setCellValueByColumnAndRow(1, $row, $refrencia->direccion);
                $sheet->setCellValueByColumnAndRow(2, $row, $refrencia->propietario);
                $sheet->setCellValueByColumnAndRow(3, $row, $refrencia->telefono);
                $sheet->setCellValueByColumnAndRow(4, $row, $refrencia->distancia);
                $sheet->setCellValueByColumnAndRow(5, $row, $refrencia->terreno);
                $sheet->setCellValueByColumnAndRow(6, $row, $refrencia->fecha);
                $terreno=$terreno+$refrencia->terreno;
                $row++;
            }
            /* NEGRITA ENCABEZADO TABLA INVESTIGACION DE VALORES COMERCIALES*/
            
            
            
            
            /*END*/
            $sheet->getStyle('B'.$rowStart.':G'.($row+1).'')->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(4, $row, 'TOTAL');
            $sheet->setCellValueByColumnAndRow(5, $row, $terreno);
            $row = $row+2;
            
            $sheet->mergeCells('B'.$row.':E'.$row);
            $sheet->getCell('B'.$row)->setValue('Valor comercial del terreno investigado (promedio): en dolares');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->c1400b);
            $row++;
            $sheet->mergeCells('B'.$row.':E'.$row);
            $sheet->getCell('B'.$row)->setValue('Valor comercial del terreno investigado (promedio): en soles');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->c1400d);
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1400e);
            $row=$row+2;
            
            if(file_exists('http://sistema.valeperusrl.com/'.$valoriza->c1400f) ){
                $gdImageE3000c = $this->createImageFromFile('http://sistema.valeperusrl.com/'.$valoriza->c1400f);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000c);
                $objDrawing->setHeight(120);
                $objDrawing->setCoordinates("B".$row);
                $objDrawing->setOffsetX(130);
                $objDrawing->setWorksheet($sheet);
            }
            $row=$row+14;
            $sheet->setCellValueByColumnAndRow(3, $row, 'Ubicación de las referencias');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Se toma el valor   de las referencias debido a la ubicación del terreno y 
                                                        la semejanza con otros inmuebles de similares caracteristicas, 
                                                        con un criterio conservador y prudente. Con un reajuste debido a 
                                                        que el área ocupada acualmente es menor al área registrada.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('La factibilidad de realización se realiza según la siguiente ponderación:');
            $row++;
            $rowStart=$row;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Criterios');
            $sheet->setCellValueByColumnAndRow(2, $row, 'Ponderación (1 a 5)');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '1. Características de Predio');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '2. Áreas del predio');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500b);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '3. Ubicación del Predio');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500c);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, '4. Servicios del Predio');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500d);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Total Puntaje');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500e);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Porcentaje');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500f);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Tipo de Garantía');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1500g);
            $sheet->getStyle('B'.$rowStart.':C'.($row).'')->applyFromArray($styleArray);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '16.00 DEDUCCIONES APLICADAS');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Para el caso de la realización del inmueble de acuerdo a lo establecido por la Resolución 
                                                        N° 880-97 de fecha 15 de diciembre de 1997,modificado por las resoluciones SBS N° 816-2005 y 12879-2009');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1600);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '17.00  SUSTENTO');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1700);

            $row=$row+2;
            /*D */
            $sheet->setCellValueByColumnAndRow(0, $row, 'D)     CALCULOS EFECTUADOS');

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '18.00 VALOR COMERCIAL DEL PRECIO (VCP)');

            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('El valor comercial se obtiene multiplicando el valor comercial investigado se rige la oferta y la 
                                                         demanda del mercado con criterio prudente y conservador. Rs. S.B.S. N° 11356-2008, R.M. Nº 172-2016-VIVIENDA.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'VCP = VCT + VE + VOC');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Formula:');
            $sheet->setCellValueByColumnAndRow(2, $row, 'VCT = S*VCU');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Donde:');
            $row++;
            $sheet->setCellValueByColumnAndRow(2, $row, 'S =        Area Total');
            $sheet->setCellValueByColumnAndRow(5, $row, 'm2');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'VCU =   Valor Comercial Unitario');
            $sheet->setCellValueByColumnAndRow(5, $row, '$');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800b);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'VCT =    Valor Comercial del Terreno.');
            $sheet->setCellValueByColumnAndRow(3, $row, 'Tipo de cambio:');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1800d);

            $sheet->setCellValueByColumnAndRow(5, $row, 'S/.');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800c);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19. VALOR COMERCIAL DE LA EDIFICACION');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Se obtiene a través de la aplicación de la siguiente fórmula:');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VSN = Σ(At x VUAt) +  Σ (metr.oc x VUOC) +  Σ (metr.if x VUIF)');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Donde:');
            $row++;
             $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VSN = Valor similar nuevo.');
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('At = Área techada.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VUAT = Valor Unitario del área techada.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('metr.oc = Metrado de las obras complementarias.');
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VUOC = Valor unitario de las obras complementarias.');
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('metr.if = Metrado de las instalaciones fijas y permanentes.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VUIF = Valor unitario de las instalaciones fijas y permanentes.');
            $row++;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Depreciación:');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Formula: D = (P / 100) x VSN');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Donde.');
            $row++;
            $row++;$sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('D = Depreciación de la Edificación');
            $row++;
             $row++;$sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('P = Porcentaje de depreciación');
            $row++;
            $row++;$sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VSN = Valor similar Nuevo');
            $row++;
            
            $rowStart=$row;
            $row++;$sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('19.1 Valor del terreno (VT)');
            $sheet->setCellValueByColumnAndRow(3, $row, 'Area m2');
            $sheet->setCellValueByColumnAndRow(4, $row, 'Valor ($)/m2');
            $sheet->setCellValueByColumnAndRow(5, $row, 'VT US$');
            $sheet->setCellValueByColumnAndRow(6, $row, 'VT S/.');
            $row++;
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1901a);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1901b);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1901c);
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1901d);
            $sheet->getStyle('D'.$rowStart.':G'.($row).'')->applyFromArray($styleArray);
            $row=$row+2;
            $row++;$sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('19.2 Valor de la Edificación (VE)');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1902);
            $row=$row+2;


           foreach($valores as $item){
               $valorbloques[$item->bloque][]=$item;
           }

           if(isset($valorbloques)){
                $row=$row+2;
                $i=1;
                $rowStart=$row;
                foreach($valorbloques as $bloque){
                    $sheet->setCellValueByColumnAndRow(1, $row, 'BLOQUE '.$i);
                    $i++;
                    $row++;
                    $sheet->setCellValueByColumnAndRow(1, $row, '(*)Prop. Exclusiva');
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Categ');
                    $sheet->setCellValueByColumnAndRow(4, $row, 'Precio Unit S/.');
                    $row++;
                    $precio=0;
                    foreach($valores as $item){
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->propiedad);
                        $sheet->setCellValueByColumnAndRow(2, $row, $item->categoria);
                        $sheet->setCellValueByColumnAndRow(4, $row, $item->precio);
                        $precio =$precio + $item->precio;
                        $row++;
                    }
                    $sheet->setCellValueByColumnAndRow(1, $row, 'Total');
                    $sheet->setCellValueByColumnAndRow(4, $row, $precio);
                    /*$row++;
                    $sheet->setCellValueByColumnAndRow(0, $row, 'Estado de Conservación');
                    $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a304a);
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Antiguedad');
                    $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a304b);
                    $sheet->setCellValueByColumnAndRow(4, $row, 'AÑOS');*/
                    $row=$row+2;
                    }
                    $sheet->getStyle('B'.($rowStart+1).':E'.($row-2).'')->applyFromArray($styleArray);
            }
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19.3 Valor de las Obras Complementarias (VOC)');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Comprende las obras complementarias comunes, como cerco en acceso, bajo el régimen de unidades inmobiliarias de propiedad exclusiva y propiedad común.');
            $row=$row+2;
            $rowStart=$row;
            $sheet->setCellValueByColumnAndRow(1, $row, 'DESCRIPCION');
            $sheet->setCellValueByColumnAndRow(2, $row, 'COSTO S/ M2');
            $sheet->setCellValueByColumnAndRow(3, $row, 'Depreciación');
            $sheet->setCellValueByColumnAndRow(4, $row, 'TOTAL S/.');
            $sheet->setCellValueByColumnAndRow(5, $row, 'TOTAL SIN DEPRECIACIÓN S/.');
            $row++;
            $costo=0;
            $total=0;
            $totalsindep=0;
            foreach($valorcomplementarios as $item){
                $sheet->setCellValueByColumnAndRow(1, $row, $item->descripcion);
                $sheet->setCellValueByColumnAndRow(2, $row, $item->costo);
                $sheet->setCellValueByColumnAndRow(3, $row, $item->depreciacion);
                $sheet->setCellValueByColumnAndRow(4, $row, $item->total);
                $sheet->setCellValueByColumnAndRow(5, $row, $item->totalsindep);
                $total=$total+$item->total;
                $costo=$costo+$item->costo;
                $totalsindep=$totalsindep+$item->totalsindep;
                $row++;
            }            
            
            $sheet->setCellValueByColumnAndRow(2, $row, $costo/3.328);
            $sheet->setCellValueByColumnAndRow(4, $row, $total);
            $sheet->setCellValueByColumnAndRow(5, $row, $totalsindep);
            $sheet->getStyle('B'.$rowStart.':F'.($row).'')->applyFromArray($styleArray);
            $row++;
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903a);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'SINTESIS DE LA VALUACIÓN');
            $row++;
            $rowStart=$row;
            $sheet->setCellValueByColumnAndRow(1, $row, 'VCP = VT + VE + VOC');
            $sheet->setCellValueByColumnAndRow(3, $row, 'US$');
            $sheet->setCellValueByColumnAndRow(4, $row, 'S/.');
            $row++;
            foreach($sintesis as $item){
                $sheet->setCellValueByColumnAndRow(1, $row, $item->detalle);
                $sheet->setCellValueByColumnAndRow(3, $row, $item->montod);
                $sheet->setCellValueByColumnAndRow(4, $row, $item->montos);
                $row++;
            }
            
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('VALOR COMERCIAL DEL PREDIO (VCP)');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903d);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903e);
            $sheet->getStyle('B'.$rowStart.':E'.($row).'')->applyFromArray($styleArray);

            $row=$row+2;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('VALOR NETO DE REALIZACIÓN (VNR)');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1903f);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903g);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903h);
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $row=$row+2;

            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('Valor Estimado de Reconstrucción de la Edificación (VER)');
            $row++;
            $sheet->setCellValueByColumnAndRow(5, $row, 'US$');
            $sheet->setCellValueByColumnAndRow(6, $row, 'S/.');
            $row++;
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('El VER se estima considerado el VE + VOC (sin depreciación)');

            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903j);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903k);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Tipo de Cambio  S/.');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->d1903l);
            /*End D */

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'E)     OPINIÓN INTEGRAL DEL PERITO VALUADOR');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '20.00 DECLARACION DE INDEPENDENCIA DE CRITERIO');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2000);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '21.00  RECONOCIMIENTO DE NORMAS APLICABLES');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2100);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '22.00 DECLARACIÓN JURADA');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2200);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '23.00 VIGENCIA DE LA VALUACIÓN');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2300);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '24.00 DE LA POSESIÓN DEL INMUEBLE');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('El bien inmueble se encuentra en posesion de: '.$valoriza->e2400);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('La persona que atendió la verificación es: '.$valoriza->e2500);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '26.00 CONSIDERACIONES PARA LA VALORIZACIÓN');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Para la valuación se toma en cuenta lo siguiente: '.$valoriza->e2600);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '27.00 OBSERVACIONES Y/O RECOMENDACIONES ');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue( $valoriza->e2700);
            
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Título de propiedad o derechos');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Certificado de dominio, gravámenes');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800b);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Autoavalúo');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800c);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Planos de ubicación, distribución');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800d);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Memoria descriptiva');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800e);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Otros');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2800f);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '29.00 DEL PERITO VALUADOR');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Nombre');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2900a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Profesión:');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->e2900b);
            $sheet->setCellValueByColumnAndRow(4, $row, 'CAP:');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->e2900c);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Habilitación');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2900d);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('30.00 PANEL FOTOGRÁFICO');

            $sheet->getStyle('A1:A'.$row)->getFont()->setBold( true );
           
            $fotografiaSheet = $object_excel->createSheet(1);
            $fotografiaSheet->setTitle('FOTOGRAFIAS');
            $sheet->getStyle('A1:G'.$row)->getAlignment()->setWrapText(true); 

            return $object_excel;
        }
        
        

       public function generarResumen($data){
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
            $this->cellColor($sheet, 'B2:G2','91D2EE'); 
              $this->cellColor($sheet, 'B3:G3','91D2EE'); 
           
            
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
            $sheet->setCellValueByColumnAndRow(6, $row-2, 'Val. N°'.$valoriza->nroValuacion);
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
            if(file_exists(base_url().$valoriza->e3000a) ){
                $gdImageE3000a = $this->createImageFromFile(base_url().$valoriza->e3000a);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000a);
                $objDrawing->setHeight(120);
                $objDrawing->setCoordinates("B17");
                $objDrawing->setOffsetX(130);
                $objDrawing->setWorksheet($sheet);
            }
            
            if(file_exists(base_url().$valoriza->e3000c) ){
                $gdImageE3000c = $this->createImageFromFile(base_url().$valoriza->e3000c);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000c);
                $objDrawing->setHeight(180);
                $objDrawing->setCoordinates("D17");
                $objDrawing->setOffsetX(130);
                $objDrawing->setWorksheet($sheet);
            }

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
            return $object_excel;
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
        
        function cellColor($sheet, $cells, $color){ 
            $sheet->getStyle($cells)->getFill('') 
            ->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID, 
            'startcolor' => array('rgb' => $color) 
            )); 
        } 

      
}

