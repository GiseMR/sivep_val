<?php
	require_once APPPATH.'third_party/phpexcel/PHPExcel.php';
	class ValorizaExcel {

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

            $object_excel = new PHPExcel();
            $sheet = $object_excel->getActiveSheet();
            $sheet->setTitle('VALUACION');

            
            $row = 1;
            $sheet->setCellValueByColumnAndRow(1, $row, 'INFORME DE VALUACIÓN');
            $row= $row + 3;
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->nroValuacion);
            $row++;
            $sheet->setCellValueByColumnAndRow(3, $row, 'Inmueble:');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->tipoinmueble);
            $row++;
            $sheet->setCellValueByColumnAndRow(3, $row, 'Fecha:');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->fechavaluacion);

            /* Datos generales*/
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'A) DATOS GENERALES');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '1.0 INSTRUCCIONES RECIBIDAS');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '1.01 Objeto de Valuación');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a101);

            $row=$row+2;
            $nombresPropiestarios = "";
            foreach($propietarios as $item){
                $nombresPropiestarios = $nombresPropiestarios.' '.$item->nombres;
            }
            $sheet->setCellValueByColumnAndRow(0, $row, '1.02 Propietarios');
            $sheet->setCellValueByColumnAndRow(2, $row, $nombresPropiestarios);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '1.03 Solicitante');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a103b);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '1.04 Entidad Financiera');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a104b);
            /* End Datos generales*/

            $row=$row+2;
            /* Ubicación*/
            $sheet->setCellValueByColumnAndRow(0, $row, '2.0 UBICACIÓN');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'REGISTRAL');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a201);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'AUTOVALUO');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a202);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Distrito');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a203c);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Provincia');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a203b);
            $sheet->setCellValueByColumnAndRow(5, $row, 'Departamento');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->a203a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'FUENTE : CRI - 28/12/2018');
            /* End ubicación*/

            $row=$row+2;
            /* Descripción detallada*/
            $sheet->setCellValueByColumnAndRow(0, $row, '3.0 DESCRIPCIÓN DETALLADA');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.01 Zonificación');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a301);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.02 Linderos');
            $row=$row+2;
            foreach($linderos as $item){
                $sheet->setCellValueByColumnAndRow(0, $row, $item->ubicacion);
                $sheet->setCellValueByColumnAndRow(2, $row, $item->detalle);
                $row++;
            }
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.03 Terreno');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Area:');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a303a);
            $sheet->setCellValueByColumnAndRow(2, $row, 'Perímetro:');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a303b);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.04 Edificación');
            /* End Descripción detallada*/

            /*Bloques */
            foreach($edificaciones as $item)
            { 
                $bloques[$item->bloque][] = $item;
            }                      

            if(isset($bloques)){
                $row=$row+2;
                $i=1;
                foreach($bloques as $bloque){
                    $sheet->setCellValueByColumnAndRow(0, $row, 'BLOQUE '.$i);
                    $i++;
                    $row++;
                    $sheet->setCellValueByColumnAndRow(0, $row, 'NIVEL');
                    $sheet->setCellValueByColumnAndRow(1, $row, 'DISTRIBUCION DE AMBIENTES');
                    $sheet->setCellValueByColumnAndRow(3, $row, 'AREA CONSTRUIDA (m2)');
                    $row++;
                    foreach($bloque as $item){
                        $sheet->setCellValueByColumnAndRow(0, $row, $item->nivel);
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->distribucion);
                        $sheet->setCellValueByColumnAndRow(3, $row, $item->area);
                        $row++;
                    }
                    $row=$row+2;
                }
            }
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.06 Descripción del Predio:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a306);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.07 Fábrica- Especificaciones técnicas');

            
            /*End Bloques */
            $fotografiaSheet = $object_excel->createSheet(1);
            $fotografiaSheet->setTitle('FOTOGRAFIAS');


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
}
