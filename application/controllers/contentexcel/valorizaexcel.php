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
            $fabricas = $data["fabricas"];

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
                    $area=0;
                    foreach($bloque as $item){
                        $sheet->setCellValueByColumnAndRow(0, $row, $item->nivel);
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->distribucion);
                        $sheet->setCellValueByColumnAndRow(3, $row, $item->area);
                        $area =$area + $item->area;
                        $row++;
                    }
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Total');
                    $sheet->setCellValueByColumnAndRow(3, $row, $area);
                    $row++;
                    $sheet->setCellValueByColumnAndRow(0, $row, 'Estadode Conservación');
                    $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a304a);
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Antiguedad');
                    $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a304b);
                    $sheet->setCellValueByColumnAndRow(4, $row, 'AÑOS');
                    $row=$row+2;
                }
            }
            /*End Bloques */
            $row=$row+2;
            /* Fabricas*/
            $sheet->setCellValueByColumnAndRow(0, $row, '3.06 Descripción del Predio:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a306);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.07 Fábrica- Especificaciones técnicas');
            $row=$row+2;
            $i=1;
            foreach($fabricas as $fabrica){
                $sheet->setCellValueByColumnAndRow(0, $row, 'BLOQUE '.$i);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Sistema constructivo');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->sistema);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Muros y Columnas');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->muro);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Techos');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->techo);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Puertas');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->puerta);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Ventanas');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->ventana);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Revestimiento');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->revestimiento);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Pisos');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->piso);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'SS.HH');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->sshh);
                $row++;
                $sheet->setCellValueByColumnAndRow(0, $row, 'Inst. eléctricas y sanitarias');
                $sheet->setCellValueByColumnAndRow(1, $row, $fabrica->sanitaria);
                $i++;
                $row= $row+2;
            }
            
            /* End Fabricas*/
            $sheet->setCellValueByColumnAndRow(0, $row, '3.08 Fábrica- Especificaciones técnicas');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a308);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '3.09 Declaratoria de Fabrica');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a309);

            $sheet->setCellValueByColumnAndRow(3, $row, 'Porcebtaje');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->a309a);
            $row= $row+2;
             /* 4*/
            $sheet->setCellValueByColumnAndRow(0, $row, '4.00 ANALISIS DEL MEJOR Y MÁS INTENSIVO USOS POSIBLE DEL BIEN');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Dado su ubicación, dimensiones y características constructivas el inmueble se puede utilizar como:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a400);
            /* End 4*/
            $row= $row+2;

            /* 5*/
            $sheet->setCellValueByColumnAndRow(0, $row, '5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO');
            $row++;            
            $sheet->setCellValueByColumnAndRow(0, $row, 'La valuación es para determinar el valor comercial del predio.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->a500);            
            /* End 5*/
            $row = $row+2;
            /* 6*/
            $sheet->setCellValueByColumnAndRow(0, $row, '6.00 FECHA DE ASIGNACIÓN DEL VALOR');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a600);
            /* End 6*/
            $row = $row+2;
            /* 7*/
            $sheet->setCellValueByColumnAndRow(0, $row, '7.00 POLIZA DE SEGUROS');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->a700);
            /* End 7*/
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'B)     VERIFICACIONES EFECTUADAS');
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '8.00 INSPECCIÓN OCULAR DEL BIEN ');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b800);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '9.00 GRAVÁMENES');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b900a);
            $row++;
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b900b);
            $row = $row+2;
            /* 10*/
            $sheet->setCellValueByColumnAndRow(0, $row, '10.00 DATOS LEGALES');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'El predio está inscrito en la Oficina Registral de :');
            $sheet->setCellValueByColumnAndRow(4, $row, 'Oficina Registral:'.$valoriza->b1000a);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Codigo del Predio / Ficha N°');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1000b);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Folio: '.$valoriza->b1000c);
            $sheet->setCellValueByColumnAndRow(4, $row, 'Asiento');
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->b1000d);
            /* End 10*/
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '11.00 CÓDIGO DE SUMINISTROS.');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Energía Eléctrica :');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->b1100a);
            $sheet->setCellValueByColumnAndRow(3, $row, 'Agua :');
            $sheet->setCellValueByColumnAndRow(4, $row,  $valoriza->b1100b);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'C) METODOLOGÍA APLICADA');
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '12.00 BASES PARA SU DESARROLLO');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->c1200);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '13.00 METODOLOGÍA UTILIZADA.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->c1300);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->c1400);
            $row = $row+2;
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
            $sheet->setCellValueByColumnAndRow(2, $row, 'VALOR PROMEDIO $');
            $sheet->setCellValueByColumnAndRow(3, $row, $terreno);
            $row = $row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Valor comercial del terreno investigado (promedio): en dolares');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1400b);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Valor comercial del terreno investigado (promedio): en soles');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->c1400d);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1400e);
            $row=$row+2;
            
            if(file_exists(base_url().$valoriza->c1400f) ){
                $gdImageE3000c = $this->createImageFromFile(base_url().$valoriza->c1400f);
                $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
                $objDrawing->setName('UBICACIÓN');
                $objDrawing->setDescription('UBICACIÓN');
                $objDrawing->setImageResource($gdImageE3000c);
                $objDrawing->setHeight(180);
                $objDrawing->setCoordinates("D".$row);
                $objDrawing->setOffsetX(130);
                $objDrawing->setWorksheet($sheet);
            }
            $row=$row+14;
            $sheet->setCellValueByColumnAndRow(3, $row, 'Ubicación de las referencias');
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Se toma el valor   de las referencias debido a la ubicación del terreno y 
                                                        la semejanza con otros inmuebles de similares caracteristicas, 
                                                        con un criterio conservador y prudente. Con un reajuste debido a 
                                                        que el área ocupada acualmente es menor al área registrada.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'La factibilidad de realización se realiza según la siguiente ponderación:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Criterios');
            $sheet->setCellValueByColumnAndRow(1, $row, 'Ponderación (1 a 5)');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '1. Características de Predio');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500a);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '2. Áreas del predio');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500b);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '3. Ubicación del Predio');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500c);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, '4. Servicios del Predio');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500d);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Total Puntaje');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500e);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Porcentaje');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500f);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Tipo de Garantía');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->c1500g);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '16.00 DEDUCCIONES APLICADAS');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Para el caso de la realización del inmueble de acuerdo a lo establecido por la Resolución 
                                                        N° 880-97 de fecha 15 de diciembre de 1997,modificado por las resoluciones SBS N° 816-2005 y 12879-2009');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->c1600);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '17.00  SUSTENTO');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->c1700);

            $row=$row+2;
            /*D */
            $sheet->setCellValueByColumnAndRow(0, $row, 'D)     CALCULOS EFECTUADOS');

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '18.00 VALOR COMERCIAL DEL PRECIO (VCP)');

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'El valor comercial se obtiene multiplicando el valor comercial investigado se rige la oferta y la 
                                                         demanda del mercado con criterio prudente y conservador. Rs. S.B.S. N° 11356-2008, R.M. Nº 172-2016-VIVIENDA.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VCP = VCT + VE + VOC');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Formula:');
            $sheet->setCellValueByColumnAndRow(1, $row, 'VCT = S*VCU');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Donde:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'S =        Area Total');
            $sheet->setCellValueByColumnAndRow(5, $row, 'm2');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800a);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VCU =   Valor Comercial Unitario');
            $sheet->setCellValueByColumnAndRow(5, $row, '$');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800b);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VCT =    Valor Comercial del Terreno.');
            $sheet->setCellValueByColumnAndRow(2, $row, 'Tipo de cambio:');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1800d);

            $sheet->setCellValueByColumnAndRow(5, $row, 'S/.');
            $sheet->setCellValueByColumnAndRow(6, $row, $valoriza->d1800c);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19. VALOR COMERCIAL DE LA EDIFICACION');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Se obtiene a través de la aplicación de la siguiente fórmula:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VSN = Σ(At x VUAt) +  Σ (metr.oc x VUOC) +  Σ (metr.if x VUIF)');
            $row++;
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Donde:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VSN = Valor similar nuevo.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'At = Ärea techada.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VUAT = Valor Unitario del área techada.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'metr.oc = Metrado de las obras complementarias.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VUOC = Valor unitario de las obras complementarias.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'metr.if = Metrado de las instalaciones fijas y permanentes.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VUIF = Valor unitario de las instalaciones fijas y permanentes.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Depreciación:');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Formula: D = (P / 100) x VSN');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Donde');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'D = Depreciación de la Edificación');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'P = Porcentaje de depreciación');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'VSN = Valor similar Nuevo');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19.1 Valor del terreno (VT)');
            $sheet->setCellValueByColumnAndRow(2, $row, 'Area m2');
            $sheet->setCellValueByColumnAndRow(3, $row, 'Valor ($)/m2');
            $sheet->setCellValueByColumnAndRow(4, $row, 'VT US$');
            $sheet->setCellValueByColumnAndRow(5, $row, 'VT S/.');
            $row++;
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->d1901a);
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1901b);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1901c);
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1901d);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19.2 Valor de la Edificación (VE)');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1902);
            $row=$row+2;


           foreach($valores as $item){
               $valorbloques[$item->bloque][]=$item;
           }

           if(isset($valorbloques)){
                $row=$row+2;
                $i=1;
                foreach($valorbloques as $bloque){
                    $sheet->setCellValueByColumnAndRow(0, $row, 'BLOQUE '.$i);
                    $i++;
                    $row++;
                    $sheet->setCellValueByColumnAndRow(0, $row, '(*)Prop. Exclusiva');
                    $sheet->setCellValueByColumnAndRow(1, $row, 'Categ');
                    $sheet->setCellValueByColumnAndRow(3, $row, 'Precio Unit S/.');
                    $row++;
                    $precio=0;
                    foreach($valores as $item){
                        $sheet->setCellValueByColumnAndRow(0, $row, $item->propiedad);
                        $sheet->setCellValueByColumnAndRow(1, $row, $item->categoria);
                        $sheet->setCellValueByColumnAndRow(3, $row, $item->precio);
                        $precio =$precio + $item->precio;
                        $row++;
                    }
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Total');
                    $sheet->setCellValueByColumnAndRow(3, $row, $precio);
                    /*$row++;
                    $sheet->setCellValueByColumnAndRow(0, $row, 'Estado de Conservación');
                    $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->a304a);
                    $sheet->setCellValueByColumnAndRow(2, $row, 'Antiguedad');
                    $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->a304b);
                    $sheet->setCellValueByColumnAndRow(4, $row, 'AÑOS');*/
                    $row=$row+2;
                    }
            }
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '19.3 Valor de las Obras Complementarias (VOC)');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Comprende las obras complementarias comunes, como cerco en acceso, bajo el régimen de unidades inmobiliarias de propiedad exclusiva y propiedad común.');
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, 'DESCRIPCION');
            $sheet->setCellValueByColumnAndRow(1, $row, 'COSTO S/ M2');
            $sheet->setCellValueByColumnAndRow(2, $row, 'Depreciación');
            $sheet->setCellValueByColumnAndRow(3, $row, 'TOTAL S/.');
            $sheet->setCellValueByColumnAndRow(4, $row, 'TOTAL SIN DEPRECIACIÓN S/.');
            $row++;
            $costo=0;
            $total=0;
            $totalsindep=0;
            foreach($valorcomplementarios as $item){
                $sheet->setCellValueByColumnAndRow(0, $row, $item->descripcion);
                $sheet->setCellValueByColumnAndRow(1, $row, $item->costo);
                $sheet->setCellValueByColumnAndRow(2, $row, $item->depreciacion);
                $sheet->setCellValueByColumnAndRow(3, $row, $item->total);
                $sheet->setCellValueByColumnAndRow(4, $row, $item->totalsindep);
                $total=$total+$item->total;
                $costo=$costo+$item->costo;
                $totalsindep=$totalsindep+$item->totalsindep;
                $row++;
            }
            
            $sheet->setCellValueByColumnAndRow(1, $row, $costo/3.328);
            $sheet->setCellValueByColumnAndRow(4, $row, $total);
            $sheet->setCellValueByColumnAndRow(5, $row, $totalsindep);
            $row++;
            $sheet->setCellValueByColumnAndRow(5, $row, $valoriza->d1903a);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'SINTESIS DE LA VALUACIÓN');
            $row++;
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

            $sheet->setCellValueByColumnAndRow(1, $row, 'VALOR COMERCIAL DEL PREDIO (VCP)');
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1903d);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903e);
            $row++;
            $sheet->setCellValueByColumnAndRow(1, $row, 'VALOR NETO DE REALIZACIÓN (VNR)');
            $sheet->setCellValueByColumnAndRow(2, $row, $valoriza->d1903f);
            $sheet->setCellValueByColumnAndRow(3, $row, $valoriza->d1903g);
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->d1903h);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(1, $row, 'Valor Estimado de Reconstrucción de la Edificación (VER)');
            $row++;
            $sheet->setCellValueByColumnAndRow(4, $row, 'US$');
            $sheet->setCellValueByColumnAndRow(5, $row, 'S/.');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'El VER se estima considerado el VE + VOC (sin depreciación)');
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
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->e2000);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '21.00  RECONOCIMIENTO DE NORMAS APLICABLES');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->e2100);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '22.00 DECLARACIÓN JURADA');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->e2200);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '23.00 VIGENCIA DE LA VALUACIÓN');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->e2300);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '24.00 DE LA POSESIÓN DEL INMUEBLE');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'El bien inmueble se encuentra en posesion de: '.$valoriza->e2400);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'La persona que atendió la verificación es: '.$valoriza->e2500);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '26.00 CONSIDERACIONES PARA LA VALORIZACIÓN');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Para la valuación se toma en cuenta lo siguiente: '.$valoriza->e2600);
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '27.00 OBSERVACIONES Y/O RECOMENDACIONES ');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, $valoriza->e2700);
            
            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Título de propiedad o derechos');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800a);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Certificado de dominio, gravámenes');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800b);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Autoavalúo');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800c);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Planos de ubicación, distribución');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800d);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Memoria descriptiva');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800e);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Otros');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2800f);

            $row=$row+2;
            $sheet->setCellValueByColumnAndRow(0, $row, '29.00 DEL PERITO VALUADOR');
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Nombre');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2900a);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Profesión:');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2900b);
            $sheet->setCellValueByColumnAndRow(3, $row, 'CAP:');
            $sheet->setCellValueByColumnAndRow(4, $row, $valoriza->e2900c);
            $row++;
            $sheet->setCellValueByColumnAndRow(0, $row, 'Habilitación');
            $sheet->setCellValueByColumnAndRow(1, $row, $valoriza->e2900d);

           
           
            $fotografiaSheet = $object_excel->createSheet(1);
            $fotografiaSheet->setTitle('FOTOGRAFIAS');
            $sheet->getStyle('A1:G'.$row)->getAlignment()->setWrapText(true); 

            for ($col = 0; $col <= PHPExcel_Cell::columnIndexFromString($sheet->getHighestDataColumn()); $col++)
            {
                $sheet->getColumnDimensionByColumn($col)->setAutoSize(true); 
            }  
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
