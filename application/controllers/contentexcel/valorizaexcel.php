<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('1.0 INSTRUCCIONES RECIBIDAS');
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
            $sheet->setCellValueByColumnAndRow(1, $row, 'FUENTE:');
            $this->cellColor($sheet, 'C'.$row.':C'.$row, '91D2EE');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(2, $row,'CRI-' .$valoriza->a600);
            
            /* End ubicación*/

            $row=$row+2;
            /* Descripción detallada*/
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('3.0 DESCRIPCIÓN DETALLADA');
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
            $sheet->getStyle('B'.$row.':E'.$row)->applyFromArray($styleArray);
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
                    $sheet->mergeCells('C'.$row.':F'.$row);
                    $sheet->getCell('C'.$row)->setValue('DISTRIBUCION DE AMBIENTES');
                    $sheet->setCellValueByColumnAndRow(6, $row, 'AREA CONSTRUIDA (m2)');
                    $row++;
                    $area=0;
                    foreach($bloque as $item){
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->nivel);
                        $sheet->mergeCells('C'.$row.':F'.$row);
                        $sheet->getCell('C'.$row)->setValue($item->distribucion);
                        $sheet->setCellValueByColumnAndRow(6, $row, $item->area);
                        $area =$area + $item->area;
                        $row++;
                    }

                    $sheet->setCellValueByColumnAndRow(5, $row, 'Total');
                    $sheet->setCellValueByColumnAndRow(6, $row, $area);
                    $row++;
                    $sheet->setCellValueByColumnAndRow(1, $row, 'Estado de Conservación:');
                    $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a304a);
                    $sheet->setCellValueByColumnAndRow(3, $row, 'Antigüedad:');
                    $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a304b);
                    $sheet->mergeCells('F'.$row.':G'.$row);
                    $sheet->getCell('F'.$row)->setValue('Años Aproximadamente');
                    $row=$row+2;
                    $sheet->getStyle('B'.($rowStart+1).':G'.($row-2).'')->applyFromArray($styleArray);
                    $rowStart=$row;
                }
                
            }
            /*End Bloques */
            
            
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, '3.05 Ocupación - Uso:');
            $sheet->getStyle('C'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a305);
            $row=$row+2;
            /* Fabricas*/
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('3.06 Descripción del Predio:');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a306);

            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('3.07 Fábrica- Especificaciones técnicas');
            
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
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a308);
            $row=$row+2;
            
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('3.09 Declaratoria de Fabrica');
            $row++;
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a309);
            
            $sheet->setCellValueByColumnAndRow(4, $row, 'Porcentaje');
            $sheet->getStyle('F'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->a309a.'%');
            $row= $row+2;
             /* 4*/
             $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('4.00 ANALISIS DEL MEJOR Y MÁS INTENSIVO USOS POSIBLE DEL BIEN');
            
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Dado su ubicación, dimensiones y características constructivas el inmueble se puede utilizar como:');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a400);
            /* End 4*/
            $row= $row+2;

            /* 5*/
            
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->a500);
            /* End 5*/
            $row = $row+2;
            /* 6*/
            $sheet->mergeCells('A'.$row.':C'.$row);
            $sheet->getCell('A'.$row)->setValue('6.00 FECHA DE ASIGNACIÓN DEL VALOR');
            $this->cellColor($sheet, 'D'.$row.':D'.$row, '91D2EE');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->a203c.'-'.$valoriza->a203a.','.$valoriza->a600);
           
            /* End 6*/
            $row = $row+2;
            /* 7*/
            $sheet->setCellValueByColumnAndRow(0, $row, '7.00 POLIZA DE SEGUROS');
            $sheet->getStyle('C'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('C'.$row.':G'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->a700);
            
            /* End 7*/
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':C'.$row);
            $sheet->getCell('A'.$row)->setValue('B) VERIFICACIONES EFECTUADAS');
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':C'.$row);
            $sheet->getCell('A'.$row)->setValue('8.00 INSPECCIÓN OCULAR DEL BIEN');
            $this->cellColor($sheet, 'D'.$row.':D'.$row.'', '91D2EE');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->a203c.'-'.$valoriza->a203a.','.$valoriza->b800);
           
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '9.00 GRAVÁMENES');
            $sheet->setCellValueByColumnAndRow(2, $row, 'A FAVOR DE:');
            $sheet->getStyle('D'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':F'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->b900a);
           
            $row++;
            $sheet->setCellValueByColumnAndRow(2, $row, 'FUENTE');
            $sheet->getStyle('D'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':F'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->b900b);
            $row = $row+2;
            /* 10*/
            $sheet->setCellValueByColumnAndRow(0, $row, '10.00 DATOS LEGALES');
            $row++;
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('El predio está inscrito en la Oficina Registral de :');
            $sheet->setCellValueByColumnAndRow(4, $row, 'Oficina Registral:');
            $sheet->getStyle('F'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('F'.$row.':G'.$row);
            $sheet->getCell('F'.$row)->setValue($valoriza->b1000a);
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'Codigo del Predio / Ficha N°');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1000b);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Folio: ');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->b1000c);
            $sheet->setCellValueByColumnAndRow(5, $row, 'Asiento');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->b1000d);
            /* End 10*/
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('11.00 CÓDIGO DE SUMINISTROS.');
            
            $row++;
            $sheet->getStyle('B'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, 'Energía Eléctrica :');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1100a);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Agua :');
            $sheet->setCellValueByColumnAndRow(4, $row,  $valoriza->b1100b);
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('C) METODOLOGÍA APLICADA');
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('12.00 BASES PARA SU DESARROLLO');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1200);
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('13.00 METODOLOGÍA UTILIZADA.');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1300);
            $row = $row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA.');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
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
            
            
            $sheet->setCellValueByColumnAndRow(4, $row, 'TOTAL');
            $sheet->getStyle('F'.$row.':F'.$row)->applyFromArray($styleArray);
            $this->cellColor($sheet, 'F'.$row.':F'.$row, '91D2EE');
            $sheet->setCellValueByColumnAndRow(5, $row, $terreno);
            $row = $row+2;
            
            $sheet->mergeCells('B'.$row.':E'.$row);
            $sheet->getCell('B'.$row)->setValue('Valor comercial del terreno investigado (promedio): en dolares');
            
            $sheet->getStyle('F'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(5, $row,'$. '. $valoriza->c1400b);
            $row++;
            $sheet->mergeCells('B'.$row.':E'.$row);
            $sheet->getCell('B'.$row)->setValue('Tipo de Cambio:');
            $sheet->getStyle('F'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(5, $row,'S/. '. $valoriza->c1400c);
            
            $row++;
            $sheet->mergeCells('B'.$row.':E'.$row);
            $sheet->getCell('B'.$row)->setValue('Valor comercial del terreno investigado (promedio): en soles');
            $sheet->getStyle('F'.$rowStart.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(5, $row,'S/. '. $valoriza->c1400d);
            $row=$row+2;
            $sheet->getStyle('B'.$rowStart.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1400e);
            $row=$row+2;
            
            if(file_exists($valoriza->c1400f) ){
                $gdImageE3000c = $this->createImageFromFile(base_url().$valoriza->c1400f);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000c);
                $objDrawing->setHeight(300);
                $objDrawing->setCoordinates("B".$row);
                $objDrawing->setOffsetX(350);
                $objDrawing->setWorksheet($sheet);
            }
            $row=$row+14;
            $sheet->mergeCells('C'.$row.':E'.$row);
            $sheet->getCell('C'.$row)->setValue('Ubicación de las referencias');
            $row++;
           
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('La factibilidad de realización se realiza según la siguiente ponderación:');
            $row++;
            $rowStart=$row;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Criterios');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue('Ponderación (1 a 5)');
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('1. Características de Predio');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500a);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('2. Áreas del predio');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500b);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('3. Ubicación del Predio');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500c);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('4. Servicios del Predio');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500d);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Total Puntaje');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500e);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Porcentaje');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500f);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Tipo de Garantía');
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->c1500g);
            $sheet->getStyle('B'.$rowStart.':E'.$row)->applyFromArray($styleArray);


            $row=$row+2;
            
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('16.00 DEDUCCIONES APLICADAS');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Para el caso de la realización del inmueble de acuerdo a lo establecido por la Resolución N° 880-97 de fecha 15 de diciembre de 1997,modificado por las resoluciones SBS N° 816-2005 y 12879-2009');
            $row++;
            $sheet->getStyle('B'.$row.':B'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1600.'%');
            $row=$row+2;
            
            $sheet->setCellValueByColumnAndRow(0, $row, '17.00  SUSTENTO');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->c1700);

            $row=$row+2;
            /*D */
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('D) CALCULOS EFECTUADOS');
            

            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('18.00 VALOR COMERCIAL DEL PRECIO (VCP)');

            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('El valor comercial se obtiene multiplicando el valor comercial investigado se rige la oferta y la demanda del mercado con criterio prudente y conservador. Rs. S.B.S. N° 11356-2008, R.M. Nº 172-2016-VIVIENDA.');
            $row=$row+2;
            $this->cellColor($sheet, 'B'.$row.':C'.$row, '91D2EE');
            $sheet->getStyle('B'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('VCP = VCT + VE + VOC');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Fórmula:');
            $this->cellColor($sheet, 'C'.$row.':C'.$row, '91D2EE');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(2, $row, 'VCT = S*VCU');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Donde:');
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('S = Área Total');
            $sheet->getStyle('G'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800a.'  m2.');
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('VCU = Valor Comercial Unitario');
            $sheet->getStyle('G'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(6, $row, 'S/.'.$valoriza->d1800b);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('VCT = Valor Comercial del Terreno.');
            $sheet->getStyle('G'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(6, $row,'S/. '.$valoriza->d1800c);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('VCU = Tipo de cambio:');
            $sheet->getStyle('G'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(6, $row,'S/. '.$valoriza->d1800d);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('19. VALOR COMERCIAL DE LA EDIFICACION');
            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Se obtiene a través de la aplicación de la siguiente fórmula:');
            $row++;
            $sheet->getStyle('B'.$row.':D'.$row)->applyFromArray($styleArray);
            $this->cellColor($sheet, 'B'.$row.':D'.$row, '91D2EE');
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('VSN = Σ(At x VUAt) +  Σ (metr.oc x VUOC) +  Σ (metr.if x VUIF)');
            $row=$row+2;
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
            $row=$row+2;
            
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Depreciación:');
            $row++;
            $this->cellColor($sheet, 'B'.$row.':C'.$row, '91D2EE');
            $sheet->getStyle('B'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Formula: D = (P / 100) x VSN');
            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Donde.');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('D = Depreciación de la Edificación');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('P = Porcentaje de depreciación');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VSN = Valor similar Nuevo');
            $row++;
            $rowStart=$row;
            $sheet->mergeCells('A'.$row.':C'.$row);
            $sheet->getCell('A'.$row)->setValue('19.1 Valor del terreno (VT)');
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
            $row=$row+3;
          
            $sheet->mergeCells('A'.$row.':D'.$row);
            $sheet->getCell('A'.$row)->setValue('19.2 Valor de la Edificación (VE)');
            $sheet->getStyle('E'.$row.':E'.$row)->applyFromArray($styleArray);
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
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('19.3 Valor de las Obras Complementarias (VOC)');
            $row++;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Comprende las obras complementarias comunes, como cerco en acceso, bajo el régimen de unidades inmobiliarias de propiedad exclusiva y propiedad común.');
            $row=$row+2;
            $rowStart=$row;
            $sheet->setCellValueByColumnAndRow(1, $row, 'DESCRIPCION');
            $sheet->setCellValueByColumnAndRow(2, $row, 'COSTO S/ M2');
            $sheet->setCellValueByColumnAndRow(3, $row, 'CANTIDAD M2, M3, Und.');
            $sheet->setCellValueByColumnAndRow(4, $row, '% DEPRECIACIÓN');
            $sheet->setCellValueByColumnAndRow(5, $row, 'TOTAL S/.');
            $sheet->setCellValueByColumnAndRow(6, $row, 'TOTAL SIN DEPRECIACIÓN S/.');
            $row++;
            $costo=0;
            $total=0;
            $totalsindep=0;
            foreach($valorcomplementarios as $item){
                $sheet->setCellValueByColumnAndRow(1, $row, $item->descripcion);
                $sheet->setCellValueByColumnAndRow(2, $row, $item->costo);
                $sheet->setCellValueByColumnAndRow(3, $row, $item->cantidad);
                $sheet->setCellValueByColumnAndRow(4, $row, $item->depreciacion);
                $sheet->setCellValueByColumnAndRow(5, $row, $item->total);
                $sheet->setCellValueByColumnAndRow(6, $row, $item->totalsindep);
                $total=$total+$item->total;
                $costo=$costo+$item->costo;
                $totalsindep=$totalsindep+$item->totalsindep;
                $row++;
            }            
            
            $sheet->setCellValueByColumnAndRow(3, $row, $costo/3.328);
            $sheet->setCellValueByColumnAndRow(5, $row, $total);
            $sheet->setCellValueByColumnAndRow(6, $row, $totalsindep);
            $sheet->getStyle('B'.$rowStart.':G'.($row).'')->applyFromArray($styleArray);
            $row++;
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1903a);
            $row=$row+2;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('SINTESIS DE LA VALUACIÓN');
            $row++;
            $rowStart=$row;
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('VCP = VT + VE + VOC');
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
            $sheet->getStyle('E'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(4, $row, 'US$');
            $sheet->setCellValueByColumnAndRow(5, $row, 'S/.');
            $row++;
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('El VER se estima considerado el VE + VOC (sin depreciación)');
            $sheet->getStyle('E'.$row.':F'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903j);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903k);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Tipo de Cambio  S/.');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->d1903l);
            /*End D */

            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('E) OPINIÓN INTEGRAL DEL PERITO VALUADOR');
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('20.00 DECLARACION DE INDEPENDENCIA DE CRITERIO');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2000);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('21.00  RECONOCIMIENTO DE NORMAS APLICABLES');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2100);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('22.00 DECLARACIÓN JURADA');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2200);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('23.00 VIGENCIA DE LA VALUACIÓN');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue($valoriza->e2300);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('24.00 DE LA POSESIÓN DEL INMUEBLE');
            $row++;
            
            $sheet->mergeCells('B'.$row.':D'.$row);
            $sheet->getCell('B'.$row)->setValue('El bien inmueble se encuentra en posesion de: ');
            $sheet->getStyle('E'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('E'.$row.':G'.$row);
            $sheet->getCell('E'.$row)->setValue($valoriza->e2400);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE');
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('La persona que atendió la verificación es: ');
            $sheet->getStyle('E'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('E'.$row.':G'.$row);
            $sheet->getCell('E'.$row)->setValue($valoriza->e2500);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('26.00 CONSIDERACIONES PARA LA VALORIZACIÓN');
           
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue('Para la valuación se toma en cuenta lo siguiente: '.$valoriza->e2600);
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('27.00 OBSERVACIONES Y/O RECOMENDACIONES ');
            $row++;
            $sheet->getStyle('B'.$row.':G'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('B'.$row.':G'.$row);
            $sheet->getCell('B'.$row)->setValue( $valoriza->e2700);
            
            $row=$row+2;
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('28.00 DOCUMENTACION UTILIZADA EN LA VALUACION');
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Título de propiedad o derechos');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800a);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Certificado de dominio, gravámenes');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800b);
            
           $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Autoavalúo');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800c); 
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Planos de ubicación, distribución');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800d);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Memoria descriptiva');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800e);
            $row++;
            $sheet->mergeCells('B'.$row.':C'.$row);
            $sheet->getCell('B'.$row)->setValue('Otros');
            $sheet->getStyle('D'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('D'.$row.':E'.$row);
            $sheet->getCell('D'.$row)->setValue($valoriza->e2800f);
            $row=$row+2;
            
            $sheet->mergeCells('A'.$row.':G'.$row);
            $sheet->getCell('A'.$row)->setValue('29.00 DEL PERITO VALUADOR');
            $row++;
            
            
            $sheet->setCellValueByColumnAndRow(1, $row, 'Nombre');
            $sheet->getStyle('C'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->mergeCells('C'.$row.':E'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->e2900a);
            $row++;
            
            $sheet->setCellValueByColumnAndRow(1, $row, 'Profesión');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->e2900b);
            $sheet->setCellValueByColumnAndRow(3, $row, 'CAP:');
            $sheet->getStyle('E'.$row.':E'.$row)->applyFromArray($styleArray);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->e2900c);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Habilitación');
            $sheet->getStyle('C'.$row.':C'.$row)->applyFromArray($styleArray);
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
            $sheet->getColumnDimension('A')->setWidth(10);
            $sheet->getColumnDimension('B')->setWidth(20);
            $sheet->getColumnDimension('C')->setWidth(20);
            $sheet->getColumnDimension('D')->setWidth(20);
            $sheet->getColumnDimension('E')->setWidth(20);
            $sheet->getColumnDimension('F')->setWidth(20);
            $sheet->getColumnDimension('G')->setWidth(20);
            
            $this->cellColor($sheet, 'B2:G2','91D2EE'); 
            $this->cellColor($sheet, 'B3:G3','91D2EE'); 
            
            $sheet->getStyle('B2:B3')->getFont()->setBold(true);
            $sheet->getStyle('B8:C10')->getFont()->setBold(true);
            $sheet->getStyle('G4')->getFont()->setBold(true);
            $sheet->getStyle('G5')->getFont()->setBold(true);
            $sheet->getStyle('G6')->getFont()->setBold(true);
            $sheet->getStyle('C14')->getFont()->setBold(true);
            $sheet->getStyle('E14')->getFont()->setBold(true);
            $sheet->getStyle('G14')->getFont()->setBold(true);
            $sheet->getStyle('B12')->getFont()->setBold(true);
            $sheet->getStyle('B16')->getFont()->setBold(true);
            $sheet->getStyle('B30')->getFont()->setBold(true);
            $sheet->getStyle('B41')->getFont()->setBold(true);
            $sheet->getStyle('B46')->getFont()->setBold(true);
            $sheet->getStyle('B47')->getFont()->setBold(true);
            
            
             
           
            
            
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
            if(file_exists($valoriza->e3000a) ){
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
            
            if(file_exists($valoriza->e3000c) ){
                $gdImageE3000c = $this->createImageFromFile(base_url().$valoriza->e3000c);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000c);
                $objDrawing->setHeight(200);
                $objDrawing->setCoordinates("D17");
                $objDrawing->setOffsetX(250);
                $objDrawing->setWorksheet($sheet);
            }

            $sheet->getStyle('B31:G39')->applyFromArray($styleArray);
            $row= $row+14;
            $sheet->setCellValueByColumnAndRow(1, $row, 'RESUMEN DE VALUACION');
            $row++;
            $sheet->mergeCells('B'.$row.':D'.$row);
             $sheet->getCell('B'.$row)->setValue('DESCRIPCION');
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
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->a309a.'%');
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
            $sheet->mergeCells('C'.$row.':D'.$row);
            $sheet->getCell('C'.$row)->setValue($valoriza->a203c.','.$valoriza->fechavaluacion);
           
            /*for ($col = 0; $col <= PHPExcel_Cell::columnIndexFromString($sheet->getHighestDataColumn()); $col++)
            {
                $sheet->getColumnDimensionByColumn($col)->setAutoSize(true); 
            } */ 
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
