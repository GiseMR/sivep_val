<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/matrix/assets/images/favicon.png">
    <title>Imprimir valuacion</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/codigos/js/jquery-3.2.0.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <form id="image-form" name="image-form">
    </form>
    <form id="temp-form" name="temp-form">
    </form>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
       
                       
            <div class="card">
            <div class="card-body wizard-content">
            <div class="form-group gcrud-form-group">
                                <div class="col-sm-offset-3 col-sm-7">        
                                    <a class="btn btn-info b10" href="<?= base_url() ?>valoriza">
                                            <i class="el el-return-key"></i>
                                            Volver a la lista                 
                                    </a>      
                                    <a class="btn btn-success b10" href="#" onclick="imprimirInforme()">
                                            <i class="el el-print"></i>
                                            Imprimir             
                                    </a>
                                        
                                </div>
                                </div>
                <h6 class="card-subtitle"></h6>
                <form id="valuacion-form" class="m-t-40">
                    <input type="hidden" name="idvaluacion" id="idvaluacion" value="<?= $valoriza[0]->idvaluacion ?>">
                    <div>        
                                                                            
                    <h2>INFORME DE VALUACIÓN</h2>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">                                    
                         
                                            <div class="form-group row">
                                            
                                                <label for="nroValuacion" class="col-sm-9 text-right control-label col-form-label">Código</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="nroValuacion" name="nroValuacion" value="<?= $valoriza[0]->nroValuacion ?>" readonly>
                                                </div>
                                                <label for="tipoinmueble" class="col-sm-9 text-right control-label col-form-label">Inmueble</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="tipoinmueble" name="tipoinmueble" value="<?= $valoriza[0]->tipoinmueble ?>" readonly>
                                                </div>
                                                <label for="fechavaluacion" class="col-sm-9 text-right control-label col-form-label">Fecha</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="fechavaluacion" name="fechavaluacion" value="<?= $valoriza[0]->fechavaluacion ?>" readonly>
                                                </div>
                                            </div>
                                            <h4 class="card-title">A) DATOS GENERALES</h4>

                                            <h5 class="card-title">1.0 INSTRUCCIONES RECIBIDAS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a101" class="col-sm-3 text-left control-label col-form-label">1.01 Objeto de Valuación</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="3" class="form-control" id="a101" name="a101"><?= $valoriza[0]->a101 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">1.02 Propietarios</label>
                                                <div class="col-sm-9">

                                                    <div id="table-propietario" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" head="dni">DNI</th>
                                                                    <th class="text-center" head="nombres">NOMBRES</th>
                                                                    <th style="display:none" head="idpropietario"></th>
                                                                    <th class="text-center" style="width:10px"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? foreach ($propietario as $pitem) { ?>
                                                                    <tr>
                                                                        <td class="pt-1-half" contenteditable="true"><?= $pitem->dni ?></td>
                                                                        <td class="pt-5-half" contenteditable="true"><?= $pitem->nombres ?></td>
                                                                        <td style="display:none"><?= $pitem->idpropietario ?></td>
                                                                        <td>
                                                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                        </td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-propietario-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a103a" class="col-sm-2 text-left control-label col-form-label">1.03 Solicitante</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="a103a" name="a103a" placeholder="Ingrese DNI" value="<?= $valoriza[0]->a103a ?>">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="a103b" name="a103b" value="<?= $valoriza[0]->a103b ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a104a" class="col-sm-2 text-left control-label col-form-label">1.04 Entidad Financiera</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="a104a" name="a104a" placeholder="Ingrese RUC" value="<?= $valoriza[0]->a104a ?>">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="a104b" name="a104b" value="<?= $valoriza[0]->a104b ?>" list="financiera">
                                                </div>
                                            </div>

                                            <datalist id="financiera">
                                                <option>CMAC CUSCO S.A.</option>
                                                <option>CMAC HUANCAYO S.A.</option>
                                                <option>CMAC ICA S.A.</option>
                                                <option>CMAC PIURA S.A.C.</option>
                                                <option>CAJA LOS ANDES</option>
                                                <option>CAJA AREQUIPA</option>
                                                <option>BANCO DE CRÉDITO DEL PERÚ</option>
                                                <option>C.A.C. LOS ANDES DE COTARUSI</option>
                                                <option>C.A.C. SANTA MARIA MAGDALENA</option>
                                                <option>C.A.C SANTO DOMINGO DE GUZMAN</option>
                                                <option>C.A.C SAN PEDRO DE ANDAHUAYLAS</option>
                                                <option>C.A.C PIURA</option>
                                                <option>C.A.C. SAN CRISTOVAL DE HUAMANGA</option>
                                                <option>MIBANCO </option>
                                                <option>INTERBANK</option>
                                                <option>C.A.C EMPRENDER</option>
                                                <option>BBVA CONTINENTAL</option>
                                            </datalist>

                                            <h5 class="card-title">2.0 UBICACIÓN</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a201" class="col-sm-3 text-left control-label col-form-label">REGISTRAL</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="2" class="form-control" id="a201" name="a201"><?= $valoriza[0]->a201 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a202" class="col-sm-3 text-left control-label col-form-label">AUTOAVALUO</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="a202" name="a202" value="<?= $valoriza[0]->a202 ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a204" class="col-sm-3 text-left control-label col-form-label">INSITU:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="a204" name="a204" value="<?= $valoriza[0]->a204 ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a203a" class="col-sm-2 text-right control-label col-form-label">DEPARTAMENTO</label>
                                                <div class="col-sm-2">
                                                    <select id="a203a" name="a203a" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                        <option>Seleccione...</option>
                                                        <?php
                                                        if ($consulta_departamento) {
                                                            foreach ($consulta_departamento as $row) : ?>
                                                                <option value="<?= $row->C_CODDPTO ?>" <?= ($row->C_CODDPTO == $valoriza[0]->a203a ? "selected" : "") ?>><?= $row->C_NOMUBIGEO ?></option>
                                                            <?php
                                                        endforeach;
                                                    } ?>
                                                    </select>
                                                </div>
                                                <label for="a203b" class="col-sm-2 text-right control-label col-form-label">PROVINCIA</label>
                                                <div class="col-sm-2">
                                                    <select id="a203b" name="a203b" class="select2 form-control custom-select">
                                                        <option>Seleccione...</option>
                                                    </select>
                                                </div>
                                                <label for="a203c" class="col-sm-1 text-right control-label col-form-label">DISTRITO</label>
                                                <div class="col-sm-2">
                                                    <select id="a203c" name="a203c" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                        <option>Seleccione...</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <h5 class="card-title">3.0 DESCRIPCION DETALLADA</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a301" class="col-sm-3 text-left control-label col-form-label">3.01 Zonificación</label>
                                                <div class="col-sm-4">
                                                    <select class="select2 form-control custom-select" id="a301" name="a301" style="width: 100%; height:36px;">
                                                        <option>Seleccione...</option>
                                                        <option <?= ($valoriza[0]->a301 == "URBANO" ? "selected" : "") ?>>URBANO</option>
                                                        <option <?= ($valoriza[0]->a301 == "RURAL" ? "selected" : "") ?>>RURAL</option>
                                                        <option <?= ($valoriza[0]->a301 == "SEMIRURAL" ? "selected" : "") ?>>SEMIRURAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a302" class="col-sm-3 text-left control-label col-form-label">3.02 Linderos</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="a302" name="a302" placeholder="Ingrese Fuente" value="<?= $valoriza[0]->a302 ?>">
                                                </div>
                                                <div class="col-sm-4"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <div id="table-lindero" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead style="display:none">
                                                                <tr>
                                                                    <th head="ubicacion"></th>
                                                                    <th head="detalle"></th>
                                                                    <th head="idlindero"></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? foreach ($lindero as $litem) { ?>
                                                                    <tr>
                                                                        <td style="width:200px" class="pt-1-half" contenteditable="true"><?= $litem->ubicacion ?></td>
                                                                        <td class="pt-5-half text-left" contenteditable="true"><?= $litem->detalle ?></td>
                                                                        <td style="display:none"><?= $litem->idlindero ?></td>
                                                                        <td style="width: 10px">
                                                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                        </td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-lindero-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                    <div class="col-sm-1"></div>
                                                    <label for="terreno" class="col-sm-3 text-left control-label col-form-label">3.03 Terreno</label>
                                                    <div class="col-sm-3">
                                                    </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"></div>
                                            <label for="a303a" class="col-sm-1 text-left control-label col-form-label">Area (m<sup>2</sup>)</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="a303a" name="a303a" value="<?= $valoriza[0]->a303a ?>">
                                            </div>
                                        
                                            <div class="col-sm-2"></div>
                                            <label for="a303b" class="col-sm-1 text-left control-label col-form-label">Perimetro (ml)</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="a303b" name="a303b" value="<?= $valoriza[0]->a303b ?>">
                                            </div>
                                        </div>                                      


                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="edificacion" class="col-sm-11 text-left control-label col-form-label">3.04 Edificación</label>

                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <span class="table-edificacion-add-bloque float-left mr-2">
                                                <a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo bloque</a></span>
                                            </div>
                                        </div>
                                        
                                        <div class="grupo-edificacion">
                                            <? //convirtiendo lista a arreglo para bloques
                                            $numed = 0;
                                            $edificacionarray = array();
                                            $arraytemp = array();
                                            $count = 0;
                                            foreach ($edificacion as $eitem) {
                                                if ($numed == 0) {
                                                    $arraytemp = array();
                                                    $numed = $eitem->bloque;
                                                }
                                                if ($numed != $eitem->bloque) {

                                                    $edificacionarray[$numed] = $arraytemp;
                                                    $numed = $eitem->bloque;
                                                    $arraytemp = array();
                                                    $count = 0;
                                                }
                                                $item = array();
                                                array_push($item, $eitem->bloque);
                                                array_push($item, $eitem->nivel);
                                                array_push($item, $eitem->distribucion);
                                                array_push($item, $eitem->area);
                                                array_push($item, $eitem->idedificacion);
                                                $arraytemp[$count] = $item;
                                                $count++;
                                            }
                                            $edificacionarray[$numed] = $arraytemp;
                                            //var_dump($edificacionarray);
                                            ?>
                                            <? foreach ($edificacionarray as $eaitem) { ?>
                                                <div class="form-group row" bloque-id="<?= $eaitem[0][0] ?>">

                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-11"><b>BLOQUE <?= $eaitem[0][0] ?></b></div>

                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-11">
                                                        <div id="table-edificacion-<?= $eaitem[0][0] ?>" class="table-editable table-edificacion">
                                                            <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="display:none" head="bloque">BLOQUE</th>
                                                                        <th class="text-center" head="nivel">NIVEL</th>
                                                                        <th class="text-center" head="distribucion">DISTRIBUCION DE AMBIENTES</th>
                                                                        <th class="text-center" head="area">AREA CONST. (m<sup>2</sup>)</th>
                                                                        <th style="display:none" head="idedificacion"></th>
                                                                        <th class="text-center"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <? $aux = 0;
                                                                    foreach ($eaitem as $listitem) {
                                                                        if ($aux == 0) {
                                                                            $aux++;
                                                                            continue;
                                                                        } ?>
                                                                        <tr>
                                                                            <td style="display:none"><?= $listitem[0] ?></td>
                                                                            <td class="pt-3-half" contenteditable="true"><?= $listitem[1] ?></td>
                                                                            <td class="pt-3-half" contenteditable="true"><?= $listitem[2] ?></td>
                                                                            <td class="pt-3-half" contenteditable="true"><?= $listitem[3] ?></td>
                                                                            <td style="display:none"><?= $listitem[4] ?></td>
                                                                            <td>
                                                                                <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                            </td>
                                                                        </tr>
                                                                    <? } ?>
                                                                </tbody>
                                                            </table>
                                                            <span class="float-right mb-3 mr-2"><a href="#!" class="text-success table-edificacion-add"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                        </div>
                                                    </div>

                                                    <? $resumen = explode("---", $eaitem[0][2]); //var_dump($resumen);
                                                    ?>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" id="codigo-detalle-edificacion-<?= $eaitem[0][0] ?>" name="codigo-detalle-edificacion-<?= $eaitem[0][0] ?>" form="form-null" value="<?= $eaitem[0][4] ?>">
                                                    </div>
                                                    <label for="total-edificacion-<?= $eaitem[0][0] ?>" class="col-sm-3 text-right control-label col-form-label">Total:</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control" id="total-edificacion-<?= $eaitem[0][0] ?>" name="total-edificacion-<?= $eaitem[0][0] ?>" form="form-null" value="<?= $resumen[0] ?>" readonly>
                                                    </div>

                                                    <div class="col-sm-1"></div>
                                                    <label for="estado-edificacion-<?= $eaitem[0][0] ?>" class="col-sm-3 text-left control-label col-form-label">Estado de Conservación </label>
                                                    <div class="col-sm-3">
                                                        <select class="select2 form-control custom-select" id="estado-edificacion-1" name="estado-edificacion-1" form="form-null" style="width: 100%; height:36px;">
                                                            <option>Seleccione...</option>
                                                            <option <?= ($resumen[1] == "Muy Buena" ? "selected" : "") ?>>Muy Buena</option>
                                                            <option <?= ($resumen[1] == "Buena" ? "selected" : "") ?>>Buena</option>
                                                            <option <?= ($resumen[1] == "Regular" ? "selected" : "") ?>>Regular</option>
                                                            <option <?= ($resumen[1] == "Malo" ? "selected" : "") ?>>Malo</option>
                                                            <option <?= ($resumen[1] == "Muy Malo" ? "selected" : "") ?>>Muy Malo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1"></div>
                                                    <label for="antiguedad-edificacion-1" class="col-sm-2 text-left control-label col-form-label">Antiguedad (años)</label>
                                                    <div class="col-sm-2">
                                                        <input type="number" class="form-control" id="antiguedad-edificacion-<?= $eaitem[0][0] ?>" name="antiguedad-edificacion-<?= $eaitem[0][0] ?>" value="<?= $resumen[2] ?>" form="form-null" placeholder="">
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6">
                                                <hr>
                                            </div>

                                            <div class="col-sm-6"></div>
                                            <label for="a304" class="col-sm-3 text-right control-label col-form-label">Total area construida:</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="a304" name="a304" value="<?= $valoriza[0]->a304 ?>" readonly>
                                            </div>

                                            <div class="col-sm-1"></div>
                                            <label for="a305" class="col-sm-3 text-left control-label col-form-label">3.05 Ocupación - Uso <?= $valoriza[0]->a305 ?></label>
                                            <div class="col-sm-8">
                                                <? $a305 = explode(";", $valoriza[0]->a305); ?>
                                                <select class="select2 form-control custom-select" id="a305" name="a305" multiple>
                                                    <option <?= (in_array("Vivienda", $a305) ? "selected" : "") ?>>Vivienda</option>
                                                    <option <?= (in_array("Almacen", $a305) ? "selected" : "") ?>>Almacen</option>
                                                    <option <?= (in_array("Departamento", $a305) ? "selected" : "") ?>>Departamento</option>
                                                    <option <?= (in_array("Local Comercial", $a305) ? "selected" : "") ?>>Local Comercial</option>
                                                    <option <?= (in_array("Institución educativa", $a305) ? "selected" : "") ?>>Institución educativa</option>
                                                    <option <?= (in_array("Centro de Salud", $a305) ? "selected" : "") ?>>Centro de Salud</option>
                                                    <option <?= (in_array("Terreno", $a305) ? "selected" : "") ?>>Terreno</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="a306" class="col-sm-11 text-left control-label col-form-label">3.06 Descripción del predio</label>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <textarea rows="5" class="form-control" id="a306" name="a306"><?= $valoriza[0]->a306 ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label class="col-sm-11 text-left control-label col-form-label">3.07 Fábrica - Especificaciones técnicas</label>

                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <span class="table-fabrica-add-bloque float-left mr-2">
                                                    <a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo bloque</a></span>
                                            </div>
                                        </div>

                                        <div class="grupo-fabrica">
                                            <? $cantfitem = 0;
                                            foreach ($fabrica as $fitem) {
                                                $cantfitem++; ?>
                                                <div class="form-group row" bloque-id="<?= $cantfitem ?>" row-id="<?= $fitem->idfabrica ?>">
                                                    <div class="col-sm-1"></div>
                                                    <label class="col-sm-11 text-left control-label col-form-label">BLOQUE <?= $cantfitem ?></label>


                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-sistema-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Sistema constructivo</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_sistema = explode(",", $fitem->sistema); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-sistema-<?= $cantfitem ?>" name="fabrica-sistema-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Concreto Armado", $fabrica_sistema) ? "selected" : "") ?>>Concreto Armado</option>
                                                            <option <?= (in_array("Adobe", $fabrica_sistema) ? "selected" : "") ?>>Adobe</option>
                                                            <option <?= (in_array("Madera", $fabrica_sistema) ? "selected" : "") ?>>Madera</option>
                                                            <option <?= (in_array("Estructura Metálica", $fabrica_sistema) ? "selected" : "") ?>>Estructura Metálica</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-muro-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Muros</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_muro = explode(",", $fitem->muro); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-muro-<?= $cantfitem ?>" name="fabrica-muro-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Ladrillo de Arcilla", $fabrica_muro) ? "selected" : "") ?>>Ladrillo de Arcilla</option>
                                                            <option <?= (in_array("Drywall", $fabrica_muro) ? "selected" : "") ?>>Drywall</option>
                                                            <option <?= (in_array("Madera", $fabrica_muro) ? "selected" : "") ?>>Madera</option>
                                                            <option <?= (in_array("Adobe", $fabrica_muro) ? "selected" : "") ?>>Adobe</option>
                                                            <option <?= (in_array("Muro de ladrillos de concreto", $fabrica_muro) ? "selected" : "") ?>>Muro de ladrillos de concreto</option>
                                                            <option <?= (in_array("Techos de losa aligerado horizontal", $fabrica_muro) ? "selected" : "") ?>>Techos de losa aligerado horizontal</option>
                                                            <option <?= (in_array("Piso porcelanato", $fabrica_muro) ? "selected" : "") ?>>Piso porcelanato</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-techo-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Techos</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_techo = explode(",", $fitem->techo); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-techo-<?= $cantfitem ?>" name="fabrica-techo-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Calamina", $fabrica_techo) ? "selected" : "") ?>>Calamina</option>
                                                            <option <?= (in_array("Teja Andina", $fabrica_techo) ? "selected" : "") ?>>Teja Andina</option>
                                                            <option <?= (in_array("Termo acustico", $fabrica_techo) ? "selected" : "") ?>>Termo acustico</option>
                                                            <option <?= (in_array("Fibrocemento", $fabrica_techo) ? "selected" : "") ?>>Fibrocemento</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-puerta-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Puertas</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_puerta = explode(",", $fitem->puerta); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-puerta-<?= $cantfitem ?>" name="fabrica-puerta-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Metalicas", $fabrica_puerta) ? "selected" : "") ?>>Metalicas</option>
                                                            <option <?= (in_array("Madera Contraplacada", $fabrica_puerta) ? "selected" : "") ?>>Madera Contraplacada</option>
                                                            <option <?= (in_array("Madera Tablero Rajado", $fabrica_puerta) ? "selected" : "") ?>>Madera Tablero Rajado</option>
                                                            <option <?= (in_array("Fibrocemento", $fabrica_puerta) ? "selected" : "") ?>>Fibrocemento</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-ventana-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Ventanas</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_ventana = explode(",", $fitem->ventana); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-ventana-<?= $cantfitem ?>" name="fabrica-ventana-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Vidrio Semi Doble", $fabrica_ventana) ? "selected" : "") ?>>Vidrio Semi Doble</option>
                                                            <option <?= (in_array("Estructura de Aluminio", $fabrica_ventana) ? "selected" : "") ?>>Estructura de Aluminio</option>
                                                            <option <?= (in_array("Estructura de Madera", $fabrica_ventana) ? "selected" : "") ?>>Estructura de Madera</option>
                                                            <option <?= (in_array("Otros", $fabrica_ventana) ? "selected" : "") ?>>Otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-revestimiento-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Revestimiento</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_revestimiento = explode(",", $fitem->revestimiento); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-revestimiento-<?= $cantfitem ?>" name="fabrica-revestimiento-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Enchapado con cerámico", $fabrica_revestimiento) ? "selected" : "") ?>>Enchapado con cerámico</option>
                                                            <option <?= (in_array("Enchapado con piedra", $fabrica_revestimiento) ? "selected" : "") ?>>Enchapado con piedra</option>
                                                            <option <?= (in_array("Estucado con yeso", $fabrica_revestimiento) ? "selected" : "") ?>>Estucado con yeso</option>
                                                            <option <?= (in_array("otros", $fabrica_revestimiento) ? "selected" : "") ?>>otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-piso-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Pisos</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_piso = explode(",", $fitem->piso); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-piso-<?= $cantfitem ?>" name="fabrica-piso-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Sin Piso", $fabrica_piso) ? "selected" : "") ?>>Sin Piso</option>
                                                            <option <?= (in_array("Tierra Compactada", $fabrica_piso) ? "selected" : "") ?>>Tierra Compactada</option>
                                                            <option <?= (in_array("Cemento Pulido", $fabrica_piso) ? "selected" : "") ?>>Cemento Pulido</option>
                                                            <option <?= (in_array("Cerámico Nacional", $fabrica_piso) ? "selected" : "") ?>>Cerámico Nacional</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-sshh-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">SS.HH.</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_sshh = explode(",", $fitem->sshh); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-sshh-<?= $cantfitem ?>" name="fabrica-sshh-<?= $cantfitem ?>" form="form-null" multiple>
                                                            <option <?= (in_array("Completo con mayolica nacional de color", $fabrica_sshh) ? "selected" : "") ?>>Completo con mayolica nacional de color</option>
                                                            <option <?= (in_array("Completo con ceramico importado", $fabrica_sshh) ? "selected" : "") ?>>Completo con ceramico importado</option>
                                                            <option <?= (in_array("Básico de granito", $fabrica_sshh) ? "selected" : "") ?>>Básico de granito</option>
                                                            <option <?= (in_array("otros", $fabrica_sshh) ? "selected" : "") ?>>otros</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2"></div>
                                                    <label for="fabrica-sanitaria-<?= $cantfitem ?>" class="col-sm-3 text-left control-label col-form-label">Instalaciones Sanitarias</label>
                                                    <div class="col-sm-7">
                                                        <? $fabrica_sanitaria = explode(",", $fitem->sanitaria); ?>
                                                        <select class="select2 form-control custom-select" id="fabrica-sanitaria-<?= $cantfitem ?>" name="fabrica-sanitaria-<?= $cantfitem ?>" form="form-null" multiple>

                                                            <option <?= (in_array("Agua fría", $fabrica_sanitaria) ? "selected" : "") ?>>Agua fría</option>
                                                            <option <?= (in_array("Agua caliente", $fabrica_sanitaria) ? "selected" : "") ?>>Agua caliente</option>
                                                            <option <?= (in_array("Corriente monofasica", $fabrica_sanitaria) ? "selected" : "") ?>>Corriente monofasica</option>
                                                            <option <?= (in_array("Corriente trifásica", $fabrica_sanitaria) ? "selected" : "") ?>>Corriente trifásica</option>
                                                            <option <?= (in_array("Teléfono", $fabrica_sanitaria) ? "selected" : "") ?>>Teléfono</option>
                                                            <option <?= (in_array("otros", $fabrica_sanitaria) ? "selected" : "") ?>>otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="a308" class="col-sm-11 text-left control-label col-form-label">3.08 Servidumbre</label>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <textarea class="form-control" id="a308" name="a308" rows="1"><?= $valoriza[0]->a308 ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="a309" class="col-sm-11 text-left control-label col-form-label">3.09 Declaratoria de Fabrica</label>

                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="a309" name="a309" value="<?= $valoriza[0]->a309 ?>">
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <label for="a309a" class="col-sm-2 text-left control-label col-form-label">Porcentaje</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="a309a" name="a309a" value="<?= $valoriza[0]->a309a ?>">
                                            </div>
                                        </div>
                                        <h5 class="card-title">4.00 ANALISIS DEL MEJOR Y MÁS INTENSIVO USOS POSIBLE DEL BIEN</h5>
                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                Dado su ubicación, dimensiones y características constructivas el inmueble se puede utilizar como:
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <? $a400 = explode(";", $valoriza[0]->a400); ?>
                                                <select class="select2 form-control custom-select" id="a400" name="a400" multiple>
                                                    <option <?= (in_array("Vivienda", $a400) ? "selected" : "") ?>>Vivienda</option>
                                                    <option <?= (in_array("Almacen", $a400) ? "selected" : "") ?>>Almacen</option>
                                                    <option <?= (in_array("Departamento", $a400) ? "selected" : "") ?>>Departamento</option>
                                                    <option <?= (in_array("Local Comercial", $a400) ? "selected" : "") ?>>Local Comercial</option>
                                                    <option <?= (in_array("Institución educativa", $a400) ? "selected" : "") ?>>Institución educativa</option>
                                                    <option <?= (in_array("Centro de Salud", $a400) ? "selected" : "") ?>>Centro de Salud</option>
                                                    <option <?= (in_array("Terreno", $a400) ? "selected" : "") ?>>Terreno</option>
                                                </select>
                                            </div>
                                        </div>

                                        <h5 class="card-title">5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO</h5>
                                        <div class="form-group row">
                                            <label for="a500" class="col-sm-12 text-left control-label col-form-label"></label>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <textarea rows="2" class="form-control" id="a500" name="a500"><?= $valoriza[0]->a500 ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <h5 class="card-title col-sm-6">6.00 FECHA DE ASIGNACIÓN DEL VALOR</h5>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="a600" name="a600" value="<?= $valoriza[0]->a600 ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <h5 class="card-title col-sm-6">7.00 POLIZA DE SEGUROS</h5>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="a700" name="a700" value="<?= $valoriza[0]->a700 ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">B) VERIFICACIONES EFECTUADAS</h4>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">8.00 INSPECCIÓN OCULAR DEL BIEN</h5>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control" id="b800" name="b800" value="<?= $valoriza[0]->b800 ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-4">9.00 CARGAS Y GRAVÁMENES</h5>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="b900a" name="b900a" placeholder="<a favor de>" value="<?= $valoriza[0]->b900a ?>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="b900b" name="b900b" placeholder="<fuente>" value="<?= $valoriza[0]->b900b ?>">
                                                </div>
                                            </div>

                                            <h5 class="card-title">10.00 DATOS LEGALES</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="b1000a" class="col-sm-3 text-left control-label col-form-label">Oficina Registral</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000a" name="b1000a" value="<?= $valoriza[0]->b1000a ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000b" class="col-sm-3 text-left control-label col-form-label">Codigo del Predio / Ficha N°</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000b" name="b1000b" value="<?= $valoriza[0]->b1000b ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000e" class="col-sm-3 text-left control-label col-form-label">Partida Electrónica N°</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000e" name="b1000e" value="<?= $valoriza[0]->b1000e ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000c" class="col-sm-3 text-left control-label col-form-label">Folio</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000c" name="b1000c" value="<?= $valoriza[0]->b1000c ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000d" class="col-sm-3 text-left control-label col-form-label">Asiento</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000d" name="b1000d" value="<?= $valoriza[0]->b1000d ?>">
                                                </div>
                                            </div>

                                            <h5 class="card-title">11.00 CÓDIGO DE SUMINISTROS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="b1100a" class="col-sm-3 text-left control-label col-form-label">Energía Eléctrica</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1100a" name="b1100a" value="<?= $valoriza[0]->b1100a ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1100b" class="col-sm-3 text-left control-label col-form-label">Agua</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1100b" name="b1100b" value="<?= $valoriza[0]->b1100b ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">C) METODOLOGÍA APLICADA</h4>

                                            <h5 class="card-title">12.00 BASES PARA SU DESARROLLO</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1200" name="c1200"><?= $valoriza[0]->c1200 ?></textarea>
                                                </div>
                                            </div>

                                            <h5 class="card-title">13.00 METODOLOGÍA UTILIZADA.</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1300" name="c1300"><?= $valoriza[0]->c1300 ?></textarea>
                                                </div>
                                            </div>

                                            <h5 class="card-title">14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA.</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400" name="c1400"><?= $valoriza[0]->c1400 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <div id="table-referencia" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" head="direccion">DIRECCION</th>
                                                                    <th class="text-center" head="propietario">PROPIETARIO</th>
                                                                    <th class="text-center" head="telefono">TELEFONO</th>
                                                                    <th class="text-center" head="distancia">DISTANCIA</th>
                                                                    <th class="text-center" head="terreno">TERRENO $</th>
                                                                    <th class="text-center" head="fecha">FECHA</th>
                                                                    <th style="display:none" head="idreferencia"></th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? $cantreferencia = 0;
                                                                foreach ($referencia as $ritem) {
                                                                    $cantreferencia++; ?>
                                                                    <tr>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->direccion ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->propietario ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->telefono ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->distancia ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->terreno ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $ritem->fecha ?></td>
                                                                        <td style="display:none"><?= $ritem->idreferencia ?></td>
                                                                        <td>
                                                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                        </td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-referencia-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6"></div>
                                                <label for="c1400a" class="col-sm-1 text-left control-label col-form-label">Total</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="c1400a" name="c1400a" value="<?= $valoriza[0]->c1400a ?>" readonly>
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="c1400b" class="col-sm-6 text-left control-label col-form-label">Valor comercial del terreno investigado (promedio): en dolares</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="c1400b" name="c1400b" value="<?= $valoriza[0]->c1400b ?>">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="c1400c" class="col-sm-6 text-left control-label col-form-label">Tipo de Cambio</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="c1400c" name="c1400c" value="<?= $valoriza[0]->c1400c ?>">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="c1400d" class="col-sm-6 text-left control-label col-form-label">Valor comercial del terreno investigado (promedio): en soles</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="c1400d" name="c1400d" value="<?= $valoriza[0]->c1400d ?>">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400e" name="c1400e"><?= $valoriza[0]->c1400e ?></textarea>
                                                </div>

                                                <div class="col-sm-12 text-center" style="height: 400px;">
                                                    <img id="c1400f-prev" src="<?= base_url() . $valoriza[0]->c1400f ?>" style="height: 100%">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="hidden" id="c1400f" name="c1400f" value="<?= $valoriza[0]->c1400f ?>">
                                                    <input type="file" class="form-control" id="c1400f-temp" name="c1400f-temp" form="image-form" accept=".jpeg, .jpg, .png">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    Ubicación de las referencias
                                                </div>
                                            </div>

                                            <h5 class="card-title">15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    La factibilidad de realización se realiza según la siguiente ponderación:
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-3 text-center"><strong>Criterios</strong></div>
                                                <div class="col-sm-4 text-center"><strong>Ponderación (1 a 5 )</strong></div>
                                                <div class="col-sm-3"></div>


                                                <div class="col-sm-2"></div>
                                                <label for="c1500a" class="col-sm-3 text-left control-label col-form-label">1. Características de Predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="<?= $valoriza[0]->c1500a ?>" class="form-control" id="c1500a" name="c1500a">
                                                </div>
                                                <div class="col-sm-1" id="c1500av"><?= $valoriza[0]->c1500a ?></div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500b" class="col-sm-3 text-left control-label col-form-label">2. Áreas del predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="<?= $valoriza[0]->c1500b ?>" class="form-control" id="c1500b" name="c1500b">
                                                </div>
                                                <div class="col-sm-1" id="c1500bv"><?= $valoriza[0]->c1500b ?></div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500c" class="col-sm-3 text-left control-label col-form-label">3. Ubicación del Predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="<?= $valoriza[0]->c1500c ?>" class="form-control" id="c1500c" name="c1500c">
                                                </div>
                                                <div class="col-sm-1" id="c1500cv"><?= $valoriza[0]->c1500c ?></div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500d" class="col-sm-3 text-left control-label col-form-label">4. Servicios del Predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="<?= $valoriza[0]->c1500d ?>" class="form-control" id="c1500d" name="c1500d">
                                                </div>
                                                <div class="col-sm-1" id="c1500dv"><?= $valoriza[0]->c1500d ?></div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500e" class="col-sm-3 text-left control-label col-form-label">Total Puntaje</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control text-right" id="c1500e" name="c1500e" value="<?= $valoriza[0]->c1500e ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500f" class="col-sm-3 text-left control-label col-form-label">Porcentaje</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control text-right" id="c1500f" name="c1500f" value="<?= $valoriza[0]->c1500f ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500g" class="col-sm-3 text-left control-label col-form-label"><b>Tipo de Garantía</b></label>
                                                <div class="col-sm-4">
                                                    <select class="select2 form-control custom-select" id="c1500g" name="c1500g">
                                                        <option>Seleccione...</option>
                                                        <option <?= ($valoriza[0]->c1500g == "Garantía Hipotecaria Preferida" ? "selected" : "") ?>>Garantía Hipotecaria Preferida</option>
                                                        <option <?= ($valoriza[0]->c1500g == "Garantía Hipotecaria No Preferida" ? "selected" : "") ?>>Garantía Hipotecaria No Preferida</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <h5 class="card-title">16.00 DEDUCCIONES APLICADAS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    Para el caso de la realización del inmueble de acuerdo a lo establecido por la Resolución N° 880-97 de fecha 15 de diciembre de 1997,modificado por las resoluciones SBS N° 816-2005 y 12879-2009
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control text-right" id="c1600" name="c1600" value="<?= $valoriza[0]->c1600 ?>" readonly>
                                                </div>
                                            </div>

                                            <h5 class="card-title">17.00 SUSTENTO</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1700" name="c1700"><?= $valoriza[0]->c1700 ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">D) CALCULOS EFECTUADOS</h4>

                                            <h5 class="card-title">18.00 VALOR COMERCIAL DEL PRECIO (VCP)</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    El valor comercial se obtiene multiplicando el valor comercial investigado se rige la oferta y la demanda del mercado con criterio prudente y conservador. Rs. S.B.S. N° 11356-2008, R.M. Nº 172-2016-VIVIENDA.
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <b>VCP = VCT + VE + VOC</b>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <b>Formula: VCT = S*VCU, donde: </b>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    Tipo de cambio
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1800d" name="d1800d" value="<?= $valoriza[0]->d1800d ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    S = Area Total
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1800a" name="d1800a" value="<?= $valoriza[0]->d1800a ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    VCU = Valor Comercial Unitario
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1800b" name="d1800b" value="<?= $valoriza[0]->d1800b ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    VCT = Valor Comercial del Terreno
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1800c" name="d1800c" value="<?= $valoriza[0]->d1800c ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <h5 class="card-title">19. VALOR COMERCIAL DE LA EDIFICACION</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    Se obtiene a través de la aplicación de la siguiente fórmula:<br><br>
                                                    VSN = Σ(At x VUAt) + Σ (metr.oc x VUOC) + Σ (metr.if x VUIF) <br><br>

                                                    Donde:<br>
                                                    VSN = Valor similar nuevo.<br>
                                                    At = Ärea techada.<br>
                                                    VUAT = Valor Unitario del área techada.<br>
                                                    metr.oc = Metrado de las obras complementarias.<br>
                                                    VUOC = Valor unitario de las obras complementarias.<br>
                                                    metr.if = Metrado de las instalaciones fijas y permanentes.<br>
                                                    VUIF = Valor unitario de las instalaciones fijas y permanentes.<br><br>

                                                    Depreciación:<br>
                                                    Formula: D = (P / 100) x VSN<br><br>

                                                    Donde:<br>
                                                    D = Depreciación de la Edificación <br>
                                                    P = Porcentaje de depreciación <br>
                                                    VSN = Valor similar Nuevo
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-11 text-left control-label col-form-label">19.1 Valor del terreno (VT)
                                                </label>

                                                <div class="col-sm-2"></div>
                                                <label for="d1901a" class="col-sm-3 text-left control-label col-form-label">Area m2</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1901a" name="d1901a" value="<?= $valoriza[0]->d1901a ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="d1901b" class="col-sm-3 text-left control-label col-form-label">Valor ($)/m2</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1901b" name="d1901b" value="<?= $valoriza[0]->d1901b ?>0" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="d1901c" class="col-sm-3 text-left control-label col-form-label">VT US$</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1901c" name="d1901c" value="<?= $valoriza[0]->d1901c ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="d1901d" class="col-sm-3 text-left control-label col-form-label">VT S/.</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control text-right" id="d1901d" name="d1901d" value="<?= $valoriza[0]->d1901d ?>" readonly>
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="objetovalua" class="col-sm-4 text-left control-label col-form-label">19.2 Valor de la Edificación (VE): </label>
                                                <div class="col-sm-4">
                                                    <select class="select2 form-control custom-select" id="d1902" name="d1902">
                                                        <option>Seleccione...</option>
                                                        <option <?= ($valoriza[0]->d1902 == "COSTA" ? "selected" : "") ?>>COSTA</option>
                                                        <option <?= ($valoriza[0]->d1902 == "SIERRA" ? "selected" : "") ?>>SIERRA</option>
                                                        <option <?= ($valoriza[0]->d1902 == "SELVA" ? "selected" : "") ?>>SELVA</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <span class="table-valor-add-bloque float-left mr-2">
                                                        <a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo bloque</a></span>
                                                </div>
                                            </div>

                                            <div class="grupo-valor">
                                                <? //convirtiendo lista a arreglo para bloques
                                                $numva = 0;
                                                $valorarray = array();
                                                $arraytemp = array();
                                                $count = 0;
                                                foreach ($valor as $eitem) {
                                                    if ($numva == 0) {
                                                        $arraytemp = array();
                                                        $numva = $eitem->bloque;
                                                    }
                                                    if ($numva != $eitem->bloque) {

                                                        $valorarray[$numva] = $arraytemp;
                                                        $numva = $eitem->bloque;
                                                        $arraytemp = array();
                                                        $count = 0;
                                                    }
                                                    $item = array();
                                                    array_push($item, $eitem->bloque);
                                                    array_push($item, $eitem->propiedad);
                                                    array_push($item, $eitem->categoria);
                                                    array_push($item, $eitem->precio);
                                                    array_push($item, $eitem->idvalor);
                                                    $arraytemp[$count] = $item;
                                                    $count++;
                                                }
                                                $valorarray[$numva] = $arraytemp;
                                                //var_dump($valorarray);
                                                ?>
                                                <? foreach ($valorarray as $vaitem) { ?>
                                                    <div class="form-group row" bloque-id="<?= $vaitem[0][0] ?>">

                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-11"><b>BLOQUE <?= $vaitem[0][0] ?></b></div>

                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-11">
                                                            <div id="table-valor-<?= $vaitem[0][0] ?>" class="table-editable table-valor">
                                                                <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="display:none" head="bloque">BLOQUE</th>
                                                                            <th class="text-center" head="propiedad">(*)Prop. Exclusiva</th>
                                                                            <th class="text-center" head="categoria">Categoria</th>
                                                                            <th class="text-center" head="precio">Precio Unit S/.</th>
                                                                            <th style="display:none" head="idvalor"></th>
                                                                            <th class="text-center"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <? $aux = 0;

                                                                        foreach ($vaitem as $listitem) {
                                                                            if ($aux == 0) {
                                                                                $aux++;
                                                                                continue;
                                                                            } ?>
                                                                            <tr>
                                                                                <td style="display:none"><?= $listitem[0] ?></td>
                                                                                <td class="pt-3-half" contenteditable="false" colid="<?= $aux ?>"><?= $listitem[1] ?></td>
                                                                                <td class="pt-3-half" contenteditable="true"><?= $listitem[2] ?></td>
                                                                                <td class="pt-3-half" contenteditable="true"><?= $listitem[3] ?></td>
                                                                                <td style="display:none"><?= $listitem[4] ?></td>
                                                                                <td>
                                                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                                </td>
                                                                            </tr>
                                                                            <? $aux++;
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <? $resumen = explode("---", $vaitem[0][1]); //var_dump($resumen);
                                                        ?>
                                                        <div class="col-sm-6">
                                                            <input type="hidden" id="codigo-detalle-valor-<?= $vaitem[0][0] ?>" name="codigo-detalle-valor-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $vaitem[0][4] ?>">
                                                        </div>
                                                        <label for="total-valor-<?= $vaitem[0][0] ?>" class="col-sm-2 text-left control-label col-form-label">Valor/m<sup>2</sup></label>
                                                        <div class="col-sm-3">
                                                            <input type="number" class="form-control text-right" id="total-valor-<?= $vaitem[0][0] ?>" name="total-valor-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $resumen[0] ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-1"></div>

                                                        <div class="col-sm-1"></div>
                                                        <label for="valor-construccion-<?= $vaitem[0][0] ?>" class="col-sm-3 text-left control-label col-form-label">Valor de la construcción</label>
                                                        <div class="col-sm-1">
                                                            VC S/
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="number" class="form-control text-right" id="valor-construccion-<?= $vaitem[0][0] ?>" name="valor-construccion-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $resumen[1] ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-4"></div>

                                                        <div class="col-sm-1"></div>
                                                        <label for="depreciacion-valor-<?= $vaitem[0][0] ?>" class="col-sm-3 text-left control-label col-form-label">Depreciación (DP%)</label>
                                                        <div class="col-sm-1">
                                                            <input type="number" class="form-control text-right depreciacion-valor" id="depreciacion-valor-<?= $vaitem[0][0] ?>" name="depreciacion-valor-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $resumen[2] ?>">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="number" class="form-control text-right" id="depreciacion-monto-<?= $vaitem[0][0] ?>" name="depreciacion-monto-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $resumen[3] ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-4"></div>

                                                        <div class="col-sm-1"></div>
                                                        <label for="valor-sub-total-<?= $vaitem[0][0] ?>" class="col-sm-3 text-left control-label col-form-label">Sub total</label>
                                                        <div class="col-sm-1">
                                                            VE S/ =
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="number" class="form-control text-right" id="valor-sub-total-<?= $vaitem[0][0] ?>" name="valor-sub-total-<?= $vaitem[0][0] ?>" form="form-null" value="<?= $resumen[4] ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-4"></div>
                                                    </div>
                                                <? } ?>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-7"></div>
                                                <div class="col-sm-2">
                                                    <b>TOTAL VE S/ =</b>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1902a" name="d1902a" value="<?= $valoriza[0]->d1902a ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-11 text-left control-label col-form-label">19.3 Valor de las Obras Complementarias (VOC)</label>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">Comprende las obras complementarias comunes, como cerco en acceso, bajo el régimen de unidades inmobiliarias de propiedad exclusiva y propiedad común.</div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <div id="table-valor-comp" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" head="descripcion">DESCRIPCION</th>
                                                                    <th class="text-center" head="costo">COSTO S/ M<sup>2</sup></th>
                                                                    <th class="text-center" head="cantidad">CANTIDAD M<sup>2</sup>, M<sup>3</sup>, Und.</th>
                                                                    <th class="text-center" head="depreciacion">% DEPRECIACION</th>
                                                                    <th class="text-center" head="total">TOTAL</th>
                                                                    <th class="text-center" head="totalsindep">TOTAL SIN DEPRECIACION</th>
                                                                    <th style="display:none" head="idvalorcomplementario"></th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? foreach ($valorcomplementario as $vcitem) { ?>
                                                                    <tr>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vcitem->descripcion ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vcitem->costo ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vcitem->cantidad ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vcitem->depreciacion ?></td>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $vcitem->total ?></td>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $vcitem->totalsindep ?></td>
                                                                        <td style="display:none"><?= $vcitem->idvalorcomplementario ?></td>
                                                                        <td>
                                                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                        </td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-valor-comp-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6"></div>
                                                <label for="d1903a" class="col-sm-2 text-left control-label col-form-label">VOC S/</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1903a" name="d1903a" value="<?= $valoriza[0]->d1903a ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="d1903b" class="col-sm-3 text-left control-label col-form-label">Estado de conservación:</label>
                                                <div class="col-sm-4">
                                                    <select class="select2 form-control custom-select" id="d1903b" name="d1903b" style="width: 100%; height:36px;">
                                                        <option>Seleccione...</option>
                                                        <option <?= ($valoriza[0]->d1902 == "Muy Buena" ? "selected" : "") ?>>Muy Buena</option>
                                                        <option <?= ($valoriza[0]->d1902 == "Buena" ? "selected" : "") ?>></option>
                                                        <option <?= ($valoriza[0]->d1902 == "Regular" ? "selected" : "") ?>>Regular</option>
                                                        <option <?= ($valoriza[0]->d1902 == "Malo" ? "selected" : "") ?>>Malo</option>
                                                        <option <?= ($valoriza[0]->d1902 == "Muy Malo" ? "selected" : "") ?>>Muy Malo</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1903c" class="col-sm-3 text-left control-label col-form-label">Antiguedad (años)</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="d1903c" name="d1903c" value="<?= $valoriza[0]->d1903c ?>">
                                                </div>
                                                <div class="col-sm-4">años</div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11"><strong>SINTESIS DE LA VALUACIÓN</strong></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <div id="table-sintesis" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" head="detalle">VCP = VT + VE + VOC</th>
                                                                    <th class="text-center" head="montod">US$</th>
                                                                    <th class="text-center" head="montos">S/</th>
                                                                    <th style="display:none" head="idsintesis"></th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? foreach ($sintesis as $sitem) { ?>
                                                                    <tr>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $sitem->detalle ?></td>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $sitem->montod ?></td>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $sitem->montos ?></td>
                                                                        <td style="display:none"><?= $sitem->idsintesis ?></td>
                                                                        <td></td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-sintesis-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1903d" class="col-sm-6 text-left control-label col-form-label">VALOR COMERCIAL DEL PREDIO (VCP)</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903d" name="d1903d" value="<?= $valoriza[0]->d1903d ?>" readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903e" name="d1903e" value="<?= $valoriza[0]->d1903e ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1903f" class="col-sm-4 text-left control-label col-form-label"> VALOR NETO DE REALIZACIÓN (VNR)</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903f" name="d1903f" value="<?= $valoriza[0]->d1903f ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903g" name="d1903g" value="<?= $valoriza[0]->d1903g ?>" readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903h" name="d1903h" value="<?= $valoriza[0]->d1903h ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control text-left" id="d1903i" name="d1903i" value="<?= $valoriza[0]->d1903i ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-6 text-left control-label col-form-label">Valor Estimado de Reconstrucción de la Edificación (VER)</label>
                                                <label class="col-sm-2 text-center control-label col-form-label">US$</label>
                                                <label class="col-sm-2 text-center control-label col-form-label">S/</label>
                                                <div class="col-sm-1"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1903j" class="col-sm-6 text-left control-label col-form-label">El ver se estima considerado el VE + VOC (sin depreciación)</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903j" name="d1903j" value="<?= $valoriza[0]->d1903j ?>" readonly>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903k" name="d1903k" value="<?= $valoriza[0]->d1903k ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1903l" class="col-sm-2 text-left control-label col-form-label">Tipo de cambio</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control text-right" id="d1903l" name="d1903l" value="<?= $valoriza[0]->d1903l ?>" readonly>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">E) OPINION INTEGRAL DEL PERITO VALUADOR</h4>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">20.00 DECLARACION DE INDEPENDENCIA DE CRITERIO</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="e2000" name="e2000"><?= $valoriza[0]->e2000 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">21.00 RECONOCIMIENTO DE NORMAS APLICABLES</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="e2100" name="e2100"><?= $valoriza[0]->e2100 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">22.00 DECLARACIÓN JURADA</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="e2200" name="e2200"><?= $valoriza[0]->e2200 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">23.00 VIGENCIA DE LA VALUACIÓN</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="e2300" name="e2300"><?= $valoriza[0]->e2300 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">24.00 DE LA POSESIÓN DEL INMUEBLE</h5>
                                            </div>
                                            <div class="form-group row">
                                                <label for="e2400" class="col-sm-3 text-left control-label col-form-label">El bien inmueble se encuentra en posesion de:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="e2400" name="e2400" placeholder="Propietarios" value="<?= $valoriza[0]->e2400 ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-7">25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE</h5>
                                            </div>

                                            <div class="form-group row">
                                                <label for="e2500" class="col-sm-3 text-left control-label col-form-label">La persona que atendió la verificación es: </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="e2500" name="e2500" placeholder="Solicitante" value="<?= $valoriza[0]->e2500 ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">26.00 CONSIDERACIONES PARA LA VALORIZACIÓN</h5>
                                                <div class="col-sm-1"></div>
                                                <label for="e2600" class="col-sm-7 text-left control-label col-form-label"> Para la valuación se toma en cuenta lo siguiente:</label>
                                                <div class="col-sm-11">
                                                    <textarea rows="10" class="form-control" id="e2600" name="e2600"><?= $valoriza[0]->e2600 ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">27.00 OBSERVACIONES Y/O RECOMENDACIONES</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="e2700" name="e2700"><?= $valoriza[0]->e2700 ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">28.00 DOCUMENTACION UTILIZADA EN LA VALUACION</h5>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label>Con la siguiente documentación proporcionada por el cliente, el perito que suscribe elaboro el presente informe.</label>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="e2800a" class="col-sm-3 text-left control-label col-form-label">Título de propiedad o derechos</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800a" name="e2800a" value="<?= $valoriza[0]->e2800a ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="e2800b" class="col-sm-3 text-left control-label col-form-label">Certificado de dominio, gravámenes</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800b" name="e2800b" value="<?= $valoriza[0]->e2800b ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="e2800c" class="col-sm-3 text-left control-label col-form-label">Autoavalúo</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800c" name="e2800c" value="<?= $valoriza[0]->e2800c ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="e2900d" class="col-sm-3 text-left control-label col-form-label">Planos de ubicación, distribución</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800d" name="e2800d" value="<?= $valoriza[0]->e2800d ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="e2800e" class="col-sm-3 text-left control-label col-form-label">Memoria descriptiva</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800e" name="e2800e" value="<?= $valoriza[0]->e2800e ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="e2800f" class="col-sm-3 text-left control-label col-form-label">Otros </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="e2800f" name="e2800f" value="<?= $valoriza[0]->e2800f ?>">
                                                </div>
                                                <div class="col-sm-4"></div>

                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">29.00 DEL PERITO VALUADOR </h5>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="e2900a" class="col-sm-2 text-left control-label col-form-label">Nombre:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="e2900a" name="e2900a" value="<?= $valoriza[0]->e2900a ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="e2900b" class="col-sm-2 text-left control-label col-form-label">Profesión:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="e2900b" name="e2900b" value="<?= $valoriza[0]->e2900b ?>">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="e2900c" class="col-sm-1 text-right control-label col-form-label">CAP:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="e2900c" name="e2900c" value="<?= $valoriza[0]->e2900c ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="e2900d" class="col-sm-2 text-left control-label col-form-label">Habilitación:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="e2900d" name="e2900d" value="<?= $valoriza[0]->e2900d ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">30.00 PANEL FOTOGRÁFICO </h5>
                                            </div>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                         </section>
                        
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/matrix/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/matrix/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/matrix/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/matrix/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/matrix/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/matrix/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/matrix/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/matrix/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?= base_url() ?>assets/matrix/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/matrix/assets/libs/select2/dist/js/select2.min.js"></script>

    <script>
        $(function() {

            //combos
            var idprov = "<?= $valoriza[0]->a203b ?>";
            $("#a203a").change(function(event) { //Departamento
                var valor = $("#a203a option:selected").val();

                $("#a203b").html("<option>Seleccione...</option>");
                $("#a203c").html("<option>Seleccione...</option>");

                $.ajax({
                    url: '<?= base_url() ?>ubigeo/cargar_provincia',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: valor
                    },
                    success: function(data) {

                        var datos = data.consulta_provincia;
                        for (i in datos) {
                            if (datos[i].C_CODPROV == idprov && idprov != 0) {
                                $("#a203b").append("<option value=" + datos[i].C_CODPROV + " selected>" + datos[i].C_NOMUBIGEO + "</option>")
                            } else {
                                $("#a203b").append("<option value=" + datos[i].C_CODPROV + ">" + datos[i].C_NOMUBIGEO + "</option>")
                            }
                        }
                    },
                    error: function(error) {
                        console.log('Error al obtener los datos');
                    }
                }).done(function() {
                    if (idprov != 0) {
                        $("#a203b").change();
                        idprov = 0;
                    }
                });
                return false;
            });

            var iddist = "<?= $valoriza[0]->a203b ?>";
            $("#a203b").change(function(event) { //provincia
                var id_dep = $("#a203a option:selected").val();
                var id_prov = $("#a203b option:selected").val();

                $("#a203c").html("<option>Seleccione...</option>");

                $.ajax({
                    url: '<?= base_url() ?>ubigeo/cargar_distrito',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id_dep: id_dep,
                        id_prov: id_prov
                    },
                    success: function(data) {

                        var datos = data.consulta_distrito;
                        for (i in datos) {

                            if (datos[i].C_CODDIST == iddist && iddist != 0) {
                                $("#a203c").append("<option value=" + datos[i].C_CODDIST + " selected>" + datos[i].C_NOMUBIGEO + "</option>");
                                iddist = 0;
                            } else {
                                $("#a203c").append("<option value=" + datos[i].C_CODDIST + ">" + datos[i].C_NOMUBIGEO + "</option>");
                            }
                        }
                    },
                    error: function(error) {
                        console.log('Error al obtener los datos');
                    }
                });
                return false;
            });

            //serializar form como json
            $.fn.serializeFormJSON = function() {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function() {
                    if (o[this.name]) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };

            $("#a103a").blur(function() { //solicitante
                let dni = $("#a103a").val();
                $("#a103b").val("Consultando nombre, espere...");
                consultarDni(dni, 'a103b');
            });

            $('#a104a').blur(function() {
                let ruc = $("#a104a").val();
                $.ajax({
                    type: "post",
                    url: " <?php echo base_url(); ?>valoriza/consultarruc",
                    data: {
                        ruc: ruc
                    },
                    success: function(response) {
                        let data = JSON.parse(response);
                        $('#a104b').val(data.result.razon_social);
                    },
                    error: function() {
                        alert("Error al buscar RUC!");
                    }
                });
            });

            $("div.steps").find("li.disabled").removeClass("disabled").addClass("done");

            $("#c1400f-temp").change(function() {
                setIMG(this, "c1400f-prev");
                var formData = new FormData($("form")[0]);
                $.ajax({
                    url: "<?= base_url() ?>valoriza/subeImagen/c1400f-temp", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function(data) // A function to be called if request succeeds
                    {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result.status == "error") {
                            alert(result.message);
                        } else if (result.status == "warning") {
                            alert(result.message);
                            $('#c1400f-prev').attr('src', "<?= base_url() ?>" + result.file);
                            $('#c1400f').val(result.file);
                        } else if (result.status = "ok") {
                            $('#c1400f').val(result.file);
                        }
                    }
                });
            });
            $("#e3000a-temp").change(function() {
                setIMG(this, "e3000a-prev");
                var formData = new FormData($("form")[0]);
                $.ajax({
                    url: "<?= base_url() ?>valoriza/subeImagen/e3000a-temp", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function(data) // A function to be called if request succeeds
                    {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result.status == "error") {
                            alert(result.message);
                        } else if (result.status == "warning") {
                            alert(result.message);
                            $('#e3000a-prev').attr('src', "<?= base_url() ?>" + result.file);
                            $('#e3000a').val(result.file);
                        } else if (result.status = "ok") {
                            $('#e3000a').val(result.file);
                        }
                    }
                });
            });
            $("#e3000b-temp").change(function() {
                setIMG(this, "e3000b-prev");
                var formData = new FormData($("form")[0]);
                $.ajax({
                    url: "<?= base_url() ?>valoriza/subeImagen/e3000b-temp", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function(data) // A function to be called if request succeeds
                    {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result.status == "error") {
                            alert(result.message);
                        } else if (result.status == "warning") {
                            alert(result.message);
                            $('#e3000b-prev').attr('src', "<?= base_url() ?>" + result.file);
                            $('#e3000b').val(result.file);
                        } else if (result.status = "ok") {
                            $('#e3000b').val(result.file);
                        }
                    }
                });
            });
            $("#e3000c-temp").change(function() {
                setIMG(this, "e3000c-prev");
                var formData = new FormData($("form")[0]);
                $.ajax({
                    url: "<?= base_url() ?>valoriza/subeImagen/e3000c-temp", // Url to which the request is send
                    type: "POST", // Type of request to be send, called as method
                    data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false, // To send DOMDocument or non processed data file it is set to false
                    success: function(data) // A function to be called if request succeeds
                    {
                        var result = JSON.parse(data);
                        console.log(result);
                        if (result.status == "error") {
                            alert(result.message);
                        } else if (result.status == "warning") {
                            alert(result.message);
                            $('#e3000c-prev').attr('src', "<?= base_url() ?>" + result.file);
                            $('#e3000c').val(result.file);
                        } else if (result.status = "ok") {
                            $('#e3000c').val(result.file);
                        }
                    }
                });
            });

            $("#c1500a").on('input', function() {
                $("#c1500av").text($(this).val());
                calcula1500();
            });
            $("#c1500b").on('input', function() {
                $("#c1500bv").text($(this).val());
                calcula1500();
            });
            $("#c1500c").on('input', function() {
                $("#c1500cv").text($(this).val());
                calcula1500();
            });
            $("#c1500d").on('input', function() {
                $("#c1500dv").text($(this).val());
                calcula1500();
            });

            //selecciones multiples
            $("#a305, #a400").select2({
                tags: true,
                createTag: function(params) {
                    var term = $.trim(params.term);
                    var count = 0
                    var existsVar = false;
                    //check if there is any option already
                    if ($('#keywords option').length > 0) {
                        $('#keywords option').each(function() {
                            if ($(this).text().toUpperCase() == term.toUpperCase()) {
                                existsVar = true
                                return false;
                            } else {
                                existsVar = false
                            }
                        });
                        if (existsVar) {
                            return null;
                        }
                        return {
                            id: params.term,
                            text: params.term,
                            newTag: true
                        }
                    }

                    //since select has 0 options, add new without comparing
                    else {
                        return {
                            id: params.term,
                            text: params.term,
                            newTag: true
                        }
                    }
                },
                maximumInputLength: 20, // only allow terms up to 20 characters long
                closeOnSelect: true
            });

            //selecciones multiples bloques
            var num_sel = <?= $cantfitem ?>;

            for (faux = 1; faux <= num_sel; faux++) {
                $("#fabrica-sistema-"+faux+", #fabrica-muro-"+faux+", #fabrica-techo-"+faux+", #fabrica-puerta-"+faux+", #fabrica-ventana-"+faux+", #fabrica-revestimiento-"+faux+", #fabrica-piso-"+faux+", #fabrica-sshh-"+faux+", #fabrica-sanitaria-"+faux).select2({
                    tags: true,
                    createTag: function(params) {
                        var term = $.trim(params.term);
                        var count = 0
                        var existsVar = false;

                        if ($('#keywords option').length > 0) {
                            $('#keywords option').each(function() {
                                if ($(this).text().toUpperCase() == term.toUpperCase()) {
                                    existsVar = true
                                    return false;
                                } else {
                                    existsVar = false
                                }
                            });
                            if (existsVar) {
                                return null;
                            }
                            return {
                                id: params.term,
                                text: params.term,
                                newTag: true
                            }
                        }

                        //since select has 0 options, add new without comparing
                        else {
                            return {
                                id: params.term,
                                text: params.term,
                                newTag: true
                            }
                        }
                    },
                    maximumInputLength: 20, // only allow terms up to 20 characters long
                    closeOnSelect: true
                });
            }

            $("#a301").change(function() {
                $("#tipoinmueble").val($("#a301").val());
            });

            $("#a203a").change();

        });

        function getTable(tableName, addHead, headValue) {
            var o = "[";
            var head = [];

            $("#" + tableName + " thead th").each(function(i, e) {
                if ($(this).attr("head") != undefined && $(this).attr("head") != "") {
                    head[i] = $(this).attr("head");
                }
            });

            $("#" + tableName + " tbody tr").each(function(i, e) {
                var item = "{";
                $(this).find("td").each(function(n, v) {
                    if (head[n] != undefined) {
                        item += '"' + head[n] + '" : "' + $(v).html() + '",';
                    }
                });
                if ($(this).attr("delete") == "yes") {
                    item += '"delete": "yes",';
                } else {
                    item += '"delete": "no",';
                }
                item += '"' + addHead + '": "' + headValue + '"},';
                o += item;
            });
            o = o.slice(0, -1);
            console.log(o + "]");
            return o + "]";
        }

        function getTableEdificacion(tableName, addHead, headValue) {
            var o = "[";
            var head = [];

            var chead = 0;
            $("#" + tableName + "-1 thead th").each(function(i, e) {
                if ($(this).attr("head") != undefined && $(this).attr("head") != "") {
                    head[i] = $(this).attr("head");
                    chead++;
                }
            });

            var num = 0;
            var orden = 0;
            $(".table-edificacion").each(function() {
                num++;
                orden++;

                var group = $(this).closest(".form-group");
                var codigo = parseFloat(group.find("#codigo-detalle-edificacion-" + num).val());
                var subTotal = parseFloat(group.find("#total-edificacion-" + num).val());
                var estado = group.find("#estado-edificacion-" + num).val();
                var antiguedad = group.find("#antiguedad-edificacion-" + num).val();

                var item_e = '{ "bloque" : "' + num + '", "nivel": "RESUMEN", "distribucion" :"' + subTotal + '---' + estado + '---' + antiguedad + '" , "delete": "no", "area" : "", "orden" : "' + orden + '", "idedificacion": "' + codigo + '", "' + addHead + '": "' + headValue + '"},';
                o += item_e;
                $("#" + tableName + "-" + num + " tbody tr").each(function(i, e) {
                    var item = "{";
                    $(this).find("td").each(function(n, v) {
                        if (head[n] != undefined) {
                            item += '"' + head[n] + '" : "' + $(v).html() + '",';
                        }
                    });
                    if ($(this).attr("delete") == "yes") {
                        item += '"delete": "yes",';
                    } else {
                        orden++;
                        item += '"orden": "' + orden + '",';
                        item += '"delete": "no",';
                    }
                    item += '"' + addHead + '": "' + headValue + '"},';
                    o += item;
                });
            });

            o = o.slice(0, -1);
            console.log(o + "]");
            return o + "]";
        }

        function getTableFabrica(tableName, addHead, headValue) {
            var o = "[";
            var head = ["sistema", "muro", "techo", "puerta", "ventana", "revestimiento", "piso", "sshh", "sanitaria"];

            var chead = 0;
            $(".grupo-fabrica .form-group").each(function() {
                var item = "{";
                var rowid = $(this).attr("row-id");
                $(this).find("select").each(function() {
                    if ($(this) != undefined) {
                        var param = $(this).attr("id").split("-");
                        item += '"' + param[1] + '" : "' + $(this).val() + '",';
                    }
                });
                item += '"idfabrica": "' + rowid + '", "delete": "no", ';
                item += '"' + addHead + '": "' + headValue + '"},';
                o += item;
            });

            o = o.slice(0, -1);
            console.log(o + "]");
            return o + "]";
        }

        function getTableValor(tableName, addHead, headValue) {
            var o = "[";
            var head = [];

            var chead = 0;
            $("#" + tableName + "-1 thead th").each(function(i, e) {
                if ($(this).attr("head") != undefined && $(this).attr("head") != "") {
                    head[i] = $(this).attr("head");
                    chead++;
                }
            });

            var num = 0;
            var orden = 0;
            $(".table-valor").each(function() {
                num++;
                orden++;

                var group = $(this).closest(".form-group");
                var codigo = parseFloat(group.find("#codigo-detalle-valor-" + num).val());
                var valorm2 = parseFloat(group.find("#total-valor-" + num).val());
                var valorconst = parseFloat(group.find("#valor-construccion-" + num).val());
                var porcdep = parseFloat(group.find("#depreciacion-valor-" + num).val());
                var montodep = parseFloat(group.find("#depreciacion-monto-" + num).val());
                var subTotal = parseFloat(group.find("#valor-sub-total-" + num).val());
                //here ENVIAR TODOS LOS CAMPOS
                var item_e = '{ "bloque" : "' + num + '", "categoria": "RESUMEN", "propiedad" :"' + valorm2 + '---' + valorconst + '---' + porcdep + '---' + montodep + '---' + subTotal + '" , "precio" : "", "delete": "no", "orden" : "' + orden + '", "idvalor": "' + codigo + '", "' + addHead + '": "' + headValue + '"},';
                o += item_e;
                $("#" + tableName + "-" + num + " tbody tr").each(function(i, e) {
                    var item = "{";
                    $(this).find("td").each(function(n, v) {
                        if (head[n] != undefined) {
                            item += '"' + head[n] + '" : "' + $(v).html() + '",';
                        }
                    });
                    if ($(this).attr("delete") == "yes") {
                        item += '"delete": "yes",';
                    } else {
                        orden++;
                        item += '"orden": "' + orden + '",';
                        item += '"delete": "no",';
                    }
                    item += '"' + addHead + '": "' + headValue + '"},';
                    o += item;
                });
            });

            o = o.slice(0, -1);
            console.log(o + "]");
            return o + "]";
        }

        function consultarDni(dni, mostrarResultado) {
            $.ajax({
                type: "post",
                url: " <?php echo base_url(); ?>valoriza/consultadni",
                data: {
                    dni: dni
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    $('#' + mostrarResultado).val(data.name + ' ' + data.firtsname + ' ' + data.lastname);
                    $('#e2500').val(data.name + ' ' + data.firtsname + ' ' + data.lastname);
                },
                error: function() {
                    alert("Error al buscar DNI!");
                }
            });
        }

        function calcula1500() {
            var p1 = parseInt($("#c1500a").val());
            var p2 = parseInt($("#c1500b").val());
            var p3 = parseInt($("#c1500c").val());
            var p4 = parseInt($("#c1500d").val());

            var total = p1 + p2 + p3 + p4;
            $("#c1500e").val(total);
            var porcentaje = (total * 100 / 20);
            $("#c1500f").val(porcentaje.toFixed(2));
            $("#c1600").val((100 - porcentaje).toFixed(2));
        }

        // 
        var registryid = 0;
        var form = $("#valuacion-form");
        form.children("div").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "fade",
            onStepChanging: function(event, currentIndex, newIndex) {
                if (newIndex === 6) {
                    cargarDatosResumen();
                }
                try {
                    parent.resizeFromIframe();
                } catch (ex) {
                    //nothing
                }
                return true;
            },
            
        });

        function actualizaDetalle(tabla, destiny) {
            var posturl = "<?= base_url() ?>valoriza/actualizadetalle/" + destiny;
            var postdata = JSON.parse('{ "' + destiny + '" : ' + getTable(tabla, 'idvaluacion', registryid) + '}');

            $.ajax({
                type: "post",
                url: posturl,
                data: postdata,
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    console.log("Error al grabar detalle " + tabla);
                }
            });

        }

        function actualizaDetalleEdificacion(tabla, destiny) {
            var posturl = "<?= base_url() ?>valoriza/actualizadetalle/" + destiny;
            var result = getTableEdificacion(tabla, 'idvaluacion', registryid);
            var postdata = JSON.parse('{ "' + destiny + '" : ' + result + '}');

            $.ajax({
                type: "post",
                url: posturl,
                data: postdata,
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    console.log("Error al grabar detalle " + tabla);
                }
            });
        }

        function actualizaDetalleFabrica(tabla, destiny) {
            var posturl = "<?= base_url() ?>valoriza/actualizadetalle/" + destiny;
            var result = getTableFabrica(tabla, 'idvaluacion', registryid);
            var postdata = JSON.parse('{ "' + destiny + '" : ' + result + '}');

            $.ajax({
                type: "post",
                url: posturl,
                data: postdata,
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    console.log("Error al grabar detalle " + tabla);
                }
            });
        }


        function actualizaDetalleValor(tabla, destiny) {
            var posturl = "<?= base_url() ?>valoriza/actualizadetalle/" + destiny;
            var result = getTableValor(tabla, 'idvaluacion', registryid);
            var postdata = JSON.parse('{ "' + destiny + '" : ' + result + '}');

            $.ajax({
                type: "post",
                url: posturl,
                data: postdata,
                success: function(response) {
                    console.log(response);
                },
                error: function() {
                    console.log("Error al grabar detalle " + tabla);
                }
            });
        }

        //FUNCIONES TABLA EDITABLE PROPIETARIO
        const $tablePropietario = $('#table-propietario');

        const newPrTr = `<tr>
                                <td class="pt-1-half" contenteditable="true"></td>
                                <td class="pt-5-half" contenteditable="true"></td>                            
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        $('.table-propietario-add').on('click', 'a', () => {
            $tablePropietario.find('table').append(newPrTr);
        });

        $tablePropietario.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            verificaPropietario();
        });

        $("#table-propietario").on('keyup', 'td', function(e) {
            if (this.cellIndex == 0) {
                if (e.keyCode == 13) {
                    var dni = $(this).html().replace(/<br>/g, "");
                    $(this).html(dni);
                    var row = $(this).closest("tr");
                    row.find("td:eq(1)").html('Buscando datos...');
                    //buscar dni
                    $.ajax({
                        type: "post",
                        url: " <?php echo base_url(); ?>valoriza/consultadni",
                        data: {
                            dni: dni
                        },
                        success: function(response) {
                            let data = JSON.parse(response);
                            row.find("td:eq(1)").html(data.name + ' ' + data.firtsname + ' ' + data.lastname);
                            verificaPropietario();
                        },
                        error: function() {
                            alert("Error al buscar DNI!");
                        }
                    });

                }
            }
        });

        function verificaPropietario() {
            var nombres = "";
            $('#table-propietario tbody tr').each(function(index, value) {
                var valor = $(value).find("td:eq(1)").html();
                nombres += valor + ", ";
            });
            nombres = nombres.slice(0, -2);
            $("#e2400").val(nombres);
        }
        //FIN FUNCIONES TABLA EDITABLE PROPIETARIO

        //FUNCIONES TABLA EDITABLE LINDERO
        const $tableLindero = $('#table-lindero');

        const newLiTr = `<tr>
                <td style="width:200px"  class="pt-1-half" contenteditable="true"></td>
                <td class="pt-5-half text-left" contenteditable="true"></td>
                <td style="display:none"></td>
                <td style="width: 10px">
                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                </td>
            </tr>`;

        $('.table-lindero-add').on('click', 'a', () => {
            $tableLindero.find('table').append(newLiTr);
        });

        $tableLindero.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calcula304();
        });
        //FIN FUNCIONES TABLA EDITABLE PROPIETARIO


        //FUNCIONES GRUPO TABLA EDITABLE EDIFICACION

        const newEdBlq = `<div class="form-group row" bloque-id="{num}" >
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <hr>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <b>BLOQUE {num}</b>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 block-remove">x</button>
                            </div>

                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <div id="table-edificacion-{num}" class="table-editable table-edificacion">
                                    <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th style="display:none" head="bloque">BLOQUE</th>
                                                <th class="text-center" head="nivel">NIVEL</th>
                                                <th class="text-center" head="distribucion">DISTRIBUCION DE AMBIENTES</th>
                                                <th class="text-center" head="area">AREA CONST. (m<sup>2</sup>)</th>
                                                <th style="display:none" head="idedificacion">BLOQUE</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="true">PRIMER</td>
                                                <td class="pt-3-half" contenteditable="true"></td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <span class="float-right mr-2"><a href="#!" class="text-success table-edificacion-add"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <input type="hidden" id="codigo-detalle-edificacion-{num}" name="total-edificacion-{num}" form="form-null" value="">
                            </div>
                            <label for="total-edificacion-{num}" class="col-sm-3 text-right control-label col-form-label">Total:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="total-edificacion-{num}" name="total-edificacion-{num}" form="form-null" value="0.00" readonly>
                            </div>

                            <div class="col-sm-1"></div>
                            <label for="estado-edificacion-{num}" class="col-sm-3 text-left control-label col-form-label">Estado de Conservación </label>
                            <div class="col-sm-3">
                                <select class="select2 form-control custom-select" id="estado-edificacion-{num}" name="estado-edificacion-{num}" form="form-null" style="width: 100%; height:36px;">
                                    <option>Seleccione...</option>
                                    <option>Muy Buena</option>
                                    <option>Buena</option>
                                    <option>Regular</option>
                                    <option>Malo</option>
                                    <option>Muy Malo</option>
                                </select>
                            </div>
                            <div class="col-sm-1"></div>
                            <label for="antiguedad-edificacion-{num}" class="col-sm-2 text-left control-label col-form-label">Antiguedad (años)</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="antiguedad-edificacion-{num}" name="antiguedad-edificacion-{num}" value="0" form="form-null" placeholder="">
                            </div>
                            </div>`;

        const newEdTr = `<tr>
                            <td style="display:none">{num}</td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true">0.00</td>
                            <td style="display:none"></td>
                            <td>
                                <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                            </td>
                        </tr>`;

        var numblq = <?= $numed; ?>;
        $('.table-edificacion-add-bloque').on('click', 'a', () => {
            numblq++;
            var newBlq = newEdBlq.replace(/{num}/g, numblq);
            $(".grupo-edificacion").append(newBlq);
        });

        $('.grupo-edificacion').on('click', '.block-remove', function() {
            numblq--;
            $(this).closest("div.form-group").remove();
            calcula304();
        });

        $('.grupo-edificacion').on('click', 'a.table-edificacion-add', function() {
            var num = $(this).closest("div.form-group").attr("bloque-id");
            var table = $("#table-edificacion-" + num).find("table");

            var newTr = newEdTr.replace(/{num}/g, num);
            table.append(newTr);
        });

        $('.grupo-edificacion').on('click', '.table-remove', function() {
            var group = $(this).closest(".form-group");
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calculaSumaEdificacion(group);
        });

        $(".grupo-edificacion").on('keyup', 'td', function(e) {
            if (this.cellIndex == 3) {
                var areaConst = parseFloat($(this).html());
                if (!isNaN(areaConst)) {
                    var group = $(this).closest(".form-group");
                    calculaSumaEdificacion(group);
                }
            }
        });

        function calculaSumaEdificacion(group) { //total area construida por bloque
            var subTotal = 0;
            var num = group.attr("bloque-id");
            $('#table-edificacion-' + num + ' tbody tr').each(function(index, value) {
                if ($(value).attr("delete") == "yes") {
                    //no sumar
                } else {
                    var valor = parseFloat($(value).find("td:eq(3)").html());
                    if (!isNaN(valor)) {
                        subTotal += valor;
                    }
                }
            });
            group.find("#total-edificacion-" + num).val(subTotal.toFixed(2));
            calcula304();
        }

        function calcula304() {
            var total = 0;
            $(".table-edificacion").each(function() {
                var group = $(this).closest(".form-group");
                var num = group.attr("bloque-id");
                var subTotal = parseFloat(group.find("#total-edificacion-" + num).val());
                total += subTotal;
            });
            $("#a304").val(total.toFixed(2));
        }
        //FIN FUNCIONES GRUPO TABLA EDITABLE EDIFICACION

        //FUNCIONES GRUPO TABLA EDITABLE FABRICA
        const newFaBlq = `<div class="form-group row" bloque-id="{num}" row-id="">
                            <div class="col-sm-1"></div>
                            <label class="col-sm-11 text-left control-label col-form-label">
                                BLOQUE {num}                                
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 block-remove">x</button>
                            </label>

                            <div class="col-sm-2"></div>
                            <label for="fabrica-sistema-{num}" class="col-sm-3 text-left control-label col-form-label">Sistema constructivo</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-sistema-{num}" name="fabrica-sistema-{num}" form="form-null" multiple>
                                    <option>Concreto Armado</option>
                                    <option>Adobe</option>
                                    <option>Madera</option>
                                    <option>Estructura Metálica</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-muro-{num}" class="col-sm-3 text-left control-label col-form-label">Muros</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-muro-{num}" name="fabrica-muro-{num}" form="form-null" multiple>
                                    <option>Ladrillo de Arcilla</option>
                                    <option>Drywall</option>
                                    <option>Madera</option>
                                    <option>Adobe</option>
                                    <option>Muro de ladrillos de concreto</option>
                                    <option>Techos de losa aligerado horizontal</option>
                                    <option>Piso porcelanato</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-techo-{num}" class="col-sm-3 text-left control-label col-form-label">Techos</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-techo-{num}" name="fabrica-techo-{num}" form="form-null" multiple>
                                    <option>Calamina</option>
                                    <option>Teja Andina</option>
                                    <option>Termo acustico</option>
                                    <option>Fibrocemento</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-puerta-{num}" class="col-sm-3 text-left control-label col-form-label">Puertas</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-puerta-{num}" name="fabrica-puerta-{num}" form="form-null" multiple>
                                    <option>Metalicas</option>
                                    <option>Madera Contraplacada</option>
                                    <option>Madera Tablero Rajado</option>
                                    <option>Fibrocemento</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-ventana-{num}" class="col-sm-3 text-left control-label col-form-label">Ventanas</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-ventana-{num}" name="fabrica-ventana-{num}" form="form-null" multiple>
                                    <option>Vidrio Semi Doble</option>
                                    <option>Estructura de Aluminio</option>
                                    <option>Estructura de Madera</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-revestimiento-{num}" class="col-sm-3 text-left control-label col-form-label">Revestimiento</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-revestimiento-{num}" name="fabrica-revestimiento-{num}" form="form-null" multiple>
                                    <option>Enchapado con cerámico</option>
                                    <option>Enchapado con piedra</option>
                                    <option>Estucado con yeso</option>
                                    <option>otros</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-piso-{num}" class="col-sm-3 text-left control-label col-form-label">Pisos</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-piso-{num}" name="fabrica-piso-{num}" form="form-null" multiple>
                                    <option>Sin Piso</option>
                                    <option>Tierra Compactada</option>
                                    <option>Cemento Pulido</option>
                                    <option>Cerámico Nacional</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-sshh-{num}" class="col-sm-3 text-left control-label col-form-label">SS.HH.</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-sshh-{num}" name="fabrica-sshh-{num}" form="form-null" multiple>
                                    <option>Completo con mayolica nacional de color</option>
                                    <option>Completo con ceramico importado</option>
                                    <option>Básico de granito</option>
                                    <option>otros</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                            <label for="fabrica-sanitaria-{num}" class="col-sm-3 text-left control-label col-form-label">Instalaciones Sanitarias</label>
                            <div class="col-sm-7">
                                <select class="select2 form-control custom-select" id="fabrica-sanitaria-{num}" name="fabrica-sanitaria-{num}" form="form-null" multiple>
                                    <option>Agua fría</option>
                                    <option>Agua caliente</option>
                                    <option>Corriente monofasica</option>
                                    <option>Corriente trifásica</option>
                                    <option>Teléfono</option>
                                    <option>otros</option>
                                </select>
                            </div>
                        </div>`;

        var numfablq = "<?=$cantfitem?>";
        $('.table-fabrica-add-bloque').on('click', 'a', () => {
            numfablq++;
            var newBlq = newFaBlq.replace(/{num}/g, numfablq);
            $(".grupo-fabrica").append(newBlq);

            $("#fabrica-sistema-" + numfablq + ", #fabrica-muro-" + numfablq + ", #fabrica-techo-" + numfablq + ", #fabrica-puerta-" + numfablq + ", #fabrica-ventana-" + numfablq + ", #fabrica-revestimiento-" + numfablq + ", #fabrica-piso-" + numfablq + ", #fabrica-sshh-" + numfablq + ", #fabrica-sanitaria-" + numfablq).select2({
                tags: true,
                createTag: function(params) {
                    var term = $.trim(params.term);
                    var count = 0
                    var existsVar = false;

                    if ($('#keywords option').length > 0) {
                        $('#keywords option').each(function() {
                            if ($(this).text().toUpperCase() == term.toUpperCase()) {
                                existsVar = true
                                return false;
                            } else {
                                existsVar = false
                            }
                        });
                        if (existsVar) {
                            return null;
                        }
                        return {
                            id: params.term,
                            text: params.term,
                            newTag: true
                        }
                    }

                    //since select has 0 options, add new without comparing
                    else {
                        return {
                            id: params.term,
                            text: params.term,
                            newTag: true
                        }
                    }
                },
                maximumInputLength: 20, // only allow terms up to 20 characters long
                closeOnSelect: true
            });
        });

        $('.grupo-fabrica').on('click', '.block-remove', function() {
            numfablq--;
            $(this).closest("div.form-group").remove();

        });
        //FIN FUNCIONES GRUPO TABLA EDITABLE FABRICA

        //FUNCIONES TABLA EDITABLE REFERENCIA
        const $tableReferencia = $('#table-referencia');

        const newReTr = `<tr>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        var countReferencia = parseInt("<?= $cantreferencia ?>");
        $('.table-referencia-add').on('click', 'a', () => {
            $tableReferencia.find('table').append(newReTr);
            countReferencia++;
            calcula1400a();
        });

        $tableReferencia.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            countReferencia -= 1;
            calcula1400a();
        });

        $("#table-referencia").on('keyup', 'td', function(e) {
            if (this.cellIndex == 4) {
                var precioTerreno = parseFloat($(this).html());
                if (!isNaN(precioTerreno)) {
                    calcula1400a();
                }
            }
        });

        function calcula1400a() {
            var total = 0;
            $('#table-referencia tbody tr').each(function(index, value) {
                if ($(this).attr("delete") != "yes") {
                    var valor = parseFloat($(value).find("td:eq(4)").html());
                    if (!isNaN(valor)) {
                        total += valor;
                    }
                }
            });
            var promedio = total / countReferencia;
            $("#c1400a").val(promedio.toFixed(2));
        }

        //FIN FUNCIONES TABLA EDITABLE REFERENCIA

        // CALCULOS 1400, 1800, 1900
        $("#a303a").keyup(function() { //a303 area del terreno m2
            $("#d1800a").val(parseFloat($(this).val()).toFixed(2));
            $("#d1901a").val(parseFloat($(this).val()).toFixed(2));
            calcula1800c();
        });

        $("#c1400b").keyup(function() { //valor del terreno m2
            $("#d1800b").val(parseFloat($(this).val()).toFixed(2));
            $("#d1901b").val(parseFloat($(this).val()).toFixed(2));
            calcula1400d();
            calcula1800c();
        });

        $("#c1400c").keyup(function() { //tipo de cambio
            $("#d1800d").val(parseFloat($(this).val()).toFixed(4));
            $("#d1903l").val(parseFloat($(this).val()).toFixed(4));
            calcula1400d();
            calcula1800c();
        });

        function calcula1400d() { //valor comercial soles
            var precioSoles = parseFloat($("#c1400b").val()) * parseFloat($("#c1400c").val());
            $("#c1400d").val(precioSoles.toFixed(2));
        }

        function calcula1800c() { //valor comercial del terreno calculado
            var precioVCT = parseFloat($("#d1800b").val()) * parseFloat($("#d1800a").val());
            $("#d1800c").val(precioVCT.toFixed(2));
            $("#d1901c").val(precioVCT.toFixed(2));
            $("#table-sintesis tbody").find("tr:eq(0)").find("td:eq(1)").html(precioVCT.toFixed(2));

            var precioVCTSoles = precioVCT * parseFloat($("#c1400c").val());
            $("#d1901d").val(precioVCTSoles.toFixed(2));
            $("#table-sintesis tbody").find("tr:eq(0)").find("td:eq(2)").html(precioVCTSoles.toFixed(2));
            //sumar sintesis
            calcula1903e();
        }
        //FIN CALCULOS 1800

        //FUNCIONES TABLA EDITABLE VALOR
        const newValBlq = `<div class="form-group row" bloque-id="{num}">

                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <b>BLOQUE {num}</b>
                                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0 block-remove">x</button>
                            </div>

                            <div class="col-sm-1"></div>
                            <div class="col-sm-11">
                                <div id="table-valor-{num}" class="table-editable table-valor">
                                    <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th style="display:none" head="bloque">BLOQUE</th>
                                                <th class="text-center" head="propiedad">(*)Prop. Exclusiva</th>
                                                <th class="text-center" head="categoria">Categoria</th>
                                                <th class="text-center" head="precio">Precio Unit S/.</th>
                                                <th style="display:none" head="idvalor"></th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="1">Muros y columnas</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="2">Techos</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="3">Pisos</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="4">Puertas y ventanas</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="5">Revestimiento</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="6">Baños</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="display:none">{num}</td>
                                                <td class="pt-3-half" contenteditable="false" colid="7">Instalaciones Electricas y Sanitarias</td>
                                                <td class="pt-3-half" contenteditable="true">A</td>
                                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                                <td style="display:none"></td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-6"></div>
                            <label for="total-valor-{num}" class="col-sm-2 text-left control-label col-form-label">Valor/m<sup>2</sup></label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control text-right" id="total-valor-{num}" name="total-valor-{num}" form="form-null" value="0.00" readonly>
                            </div>
                            <div class="col-sm-1"></div>

                            <div class="col-sm-1"></div>
                            <label for="valor-construccion-1" class="col-sm-3 text-left control-label col-form-label">Valor de la construcción</label>
                            <div class="col-sm-1">
                                VC S/
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control text-right" id="valor-construccion-{num}" name="valor-construccion-{num}" form="form-null" value="0.00" readonly>
                            </div>
                            <div class="col-sm-4"></div>

                            <div class="col-sm-1"></div>
                            <label for="depreciacion-valor-{num}" class="col-sm-3 text-left control-label col-form-label">Depreciación (DP%)</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control text-right depreciacion-valor" id="depreciacion-valor-{num}" name="depreciacion-valor-{num}" form="form-null" value="0">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control text-right" id="depreciacion-monto-{num}" name="depreciacion-monto-{num}" form="form-null" value="0.00" readonly>
                            </div>
                            <div class="col-sm-4"></div>

                            <div class="col-sm-1"></div>
                            <label for="valor-sub-total-{num}" class="col-sm-3 text-left control-label col-form-label">Sub total</label>
                            <div class="col-sm-1">
                                VE S/ =
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control text-right" id="valor-sub-total-{num}" name="valor-sub-total-{num}" form="form-null" value="0.00" readonly>
                            </div>
                            <div class="col-sm-4"></div>
                            </div>`;

        var numblqval = <?= $numva ?>;
        $('.table-valor-add-bloque').on('click', 'a', () => {
            numblqval++;
            var newBlq = newValBlq.replace(/{num}/g, numblqval);
            $(".grupo-valor").append(newBlq);
            calculaTableValor(numblqval);
        });

        $('.grupo-valor').on('click', '.block-remove', function() {
            numblqval--;
            $(this).closest("div.form-group").remove();
        });

        $('.grupo-valor').on('click', '.table-remove', function() {
            var group = $(this).closest(".form-group");
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calculaValorM2(group);
        });
        var costa = [
            [494.88, 300.57, 265.44, 268.57, 289.48, 97.68, 281.89],
            [319.06, 196.10, 159.10, 141.56, 219.32, 74.27, 204.42],
            [219.63, 162.01, 104.71, 91.50, 162.71, 51.52, 127.21],
            [212.39, 102.83, 92.37, 80.15, 124.83, 27.49, 80.52],
            [149.52, 38.34, 61.89, 68.58, 85.89, 16.16, 58.53],
            [112.61, 21.08, 42.26, 51.48, 60.54, 12.04, 32.19],
            [66.35, 14.49, 37.30, 27.81, 49.64, 8.28, 17.39],
            [0.00, 0.00, 23.34, 13.90, 19.86, 0.00, 0.00],
            [0.00, 0.00, 4.67, 0.00, 0.00, 0.00, 0.00]
        ];
        var sierra = [
            [551.27, 286.64, 203.39, 217.57, 274.55, 97.37, 346.98],
            [327.97, 197.07, 169.59, 192.54, 219.28, 69.56, 204.09],
            [237.95, 137.90, 109.74, 140.48, 181.49, 45.41, 151.86],
            [219.79, 93.36, 89.98, 82.39, 138.82, 27.78, 86.05],
            [172.54, 42.86, 74.42, 62.94, 115.49, 13.62, 47.89],
            [107.59, 34.24, 60.78, 48.67, 68.86, 11.58, 31.13],
            [63.39, 0.00, 45.46, 28.68, 51.16, 7.96, 18.34],
            [0.00, 0.00, 24.56, 14.34, 20.46, 0.00, 0.00],
            [0.00, 0.00, 5.40, 0.00, 0.00, 0.00, 0.00]
        ];

        var selva = [
            [577.43, 295.72, 360.46, 244.61, 290.05, 105.83, 357.74],
            [393.97, 208.90, 172.75, 194.03, 199.92, 75.21, 214.31],
            [291.00, 157.61, 113.36, 147.83, 170.54, 53.07, 156.25],
            [225.00, 137.41, 96.11, 99.09, 123.24, 35.98, 86.89],
            [178.66, 100.04, 77.54, 64.34, 93.44, 17.86, 58.74],
            [140.88, 46.00, 63.14, 52.48, 72.24, 15.18, 32.44],
            [122.03, 36.19, 52.20, 30.96, 60.37, 10.45, 19.14],
            [61.01, 0.00, 20.09, 15.48, 24.15, 0.00, 0.00],
            [24.41, 0.00, 4.42, 0.00, 0.00, 0.00, 0.00],
            [9.76, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
        ];

        var rows = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"];

        $("#d1902").change(function() {
            for (aux = 1; aux <= numblqval; aux++) {
                calculaTableValor(aux);
            }
        });

        function calculaTableValor(num) {
            $('#table-valor-' + num + ' tbody tr').each(function(index, value) {
                var letra = $(value).find("td:eq(2)").html().toUpperCase();
                var rowNum = rows.indexOf(letra);
                if ($("#d1902").val() != "SELVA" && rowNum > 8) {
                    rowNum = -1;
                }
                var monto = "0.00";
                if (rowNum > -1) {
                    var colNum = parseInt($(value).find("td:eq(1)").attr("colid")) - 1;
                    if ($("#d1902").val() == "COSTA") {
                        monto = costa[rowNum][colNum];
                    } else if ($("#d1902").val() == "SIERRA") {
                        monto = sierra[rowNum][colNum];
                    } else if ($("#d1902").val() == "SELVA") {
                        monto = selva[rowNum][colNum];
                    }
                }
                $(this).closest("tr").find("td:eq(3)").html(monto);
            });
            var group = $('#table-valor-' + num).closest(".form-group");
            calculaValorM2(group);
        }

        $(".grupo-valor").on('keyup', 'td', function(e) {
            if (this.cellIndex == 3) {
                var precioUnit = parseFloat($(this).html());
                if (!isNaN(precioUnit)) {
                    var group = $(this).closest(".form-group");
                    calculaValorM2(group);
                }
            }
            if (this.cellIndex == 2) {
                var letra = $(this).html();
                if (letra.length > 1) {
                    letra = letra.charAt(0).toUpperCase();
                } else {
                    letra = letra.toUpperCase();
                }

                $(this).html(letra);

                var rowNum = rows.indexOf(letra);
                if ($("#d1902").val() != "SELVA" && rowNum > 8) {
                    rowNum = -1;
                }
                var monto = 0.00;

                if (rowNum > -1) {
                    var colNum = parseInt($(this).closest("tr").find("td:eq(1)").attr("colid")) - 1;

                    if ($("#d1902").val() == "COSTA") {
                        monto = costa[rowNum][colNum];
                    } else if ($("#d1902").val() == "SIERRA") {
                        monto = sierra[rowNum][colNum];
                    } else if ($("#d1902").val() == "SELVA") {
                        monto = selva[rowNum][colNum];
                    }
                }

                $(this).closest("tr").find("td:eq(3)").html(monto);
                var group = $(this).closest(".form-group");
                calculaValorM2(group);
            }
        });

        function calculaValorM2(group) { //total valor m2 y construccion vc s/
            var subTotal = 0;
            var num = group.attr("bloque-id");

            $('#table-valor-' + num + ' tbody tr').each(function(index, value) {
                if ($(value).attr("delete") == "yes") {
                    //no sumar
                } else {
                    var valor = parseFloat($(value).find("td:eq(3)").html());
                    if (!isNaN(valor)) {
                        subTotal += valor;
                    }
                }
            });

            $("#total-valor-" + num).val(subTotal.toFixed(2));
            var totalEdificacion = parseFloat($("#total-edificacion-" + num).val());
            if (totalEdificacion == undefined || isNaN(totalEdificacion)) {
                alert("NO SE HA INGRESADO BLOQUE " + num + " DE EDIFICACION");
                totalEdificacion = 0;
            }

            var valorCon = subTotal * totalEdificacion;
            $("#valor-construccion-" + num).val(valorCon.toFixed(2));

            calculaDepreciacionTotal(group);
        }

        $(".grupo-valor").on('keyup', '.depreciacion-valor', function() { //porcentaje depreciacion
            var porc = parseFloat($(this).val());
            if (!isNaN(porc)) {
                var group = $(this).closest(".form-group");
                calculaDepreciacionTotal(group);
            }
        });

        function calculaDepreciacionTotal(group) { //monto depreciacion y subtotal

            var num = group.attr("bloque-id");
            var porDep = parseFloat(group.find("#depreciacion-valor-" + num).val());
            var valCon = parseFloat(group.find("#valor-construccion-" + num).val());

            var valDep = valCon * porDep / 100;
            $("#depreciacion-monto-" + num).val(valDep.toFixed(2));
            var subTotal = valCon - valDep;
            $("#valor-sub-total-" + num).val(subTotal.toFixed(2));

            calculaVETotal();
        }

        function calculaVETotal() { //calcula d1902a y agrega a tabla resumen

            var subTotal = 0;

            for (aux = 1; aux <= numblqval; aux++) {
                subTotal += parseFloat($("#valor-sub-total-" + aux).val());
            }

            $("#d1902a").val(subTotal.toFixed(2));

            $("#table-sintesis tbody").find("tr:eq(1)").find("td:eq(2)").html(subTotal.toFixed(2));
            var veDolar = subTotal / parseFloat($("#c1400c").val());
            $("#table-sintesis tbody").find("tr:eq(1)").find("td:eq(1)").html(veDolar.toFixed(2));

            //sumar sintesis
            calcula1903e();
            calculaVer();
        }

        function calculaVer() {
            var valorCon = 0;

            for (aux = 1; aux <= numblqval; aux++) {
                valorCon += parseFloat($("#valor-construccion-" + aux).val());
            }

            var valVoc = parseFloat($("#d1903a").val());
            valorCon += valVoc;

            $("#d1903k").val(valorCon.toFixed(2));
            var verDol = valorCon / parseFloat($("#c1400c").val());
            $("#d1903j").val(verDol.toFixed(2));

        }
        //FIN FUNCIONES TABLA EDITABLE VALOR EDIFICACION


        //FUNCIONES TABLA EDITABLE VALOR COMPLEMENTARIOS
        const $tableValorComp = $('#table-valor-comp');

        const newValComTr = `<tr>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td class="pt-3-half" contenteditable="true">0</td>
                                <td class="pt-3-half" contenteditable="true">5</td>
                                <td class="pt-3-half" contenteditable="false">0.00</td>
                                <td class="pt-3-half" contenteditable="false">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        $('.table-valor-comp-add').on('click', 'a', () => {
            $tableValorComp.find('table').append(newValComTr);
        });

        $tableValorComp.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calcula1903a();
        });

        $("#table-valor-comp").on('keyup', 'td', function(e) {
            if (this.cellIndex == 1 || this.cellIndex == 2 || this.cellIndex == 3) {
                var valActual = parseFloat($(this).html());
                if (!isNaN(valActual)) {
                    var row = $(this).closest("tr");
                    var costo = parseFloat(row.find("td:eq(1)").html());
                    var cantidad = parseFloat(row.find("td:eq(2)").html());
                    var deprecia = parseFloat(row.find("td:eq(3)").html());
                    var total = costo * cantidad;
                    var totalSinDep = costo * cantidad * ((100 - deprecia) / 100);
                    row.find("td:eq(4)").html(totalSinDep.toFixed(2));
                    row.find("td:eq(5)").html(total.toFixed(2));

                    calcula1903a();
                }
            }
        });

        function calcula1903a() {
            var total = 0;
            $('#table-valor-comp tbody tr').each(function(index, value) {
                var valor = parseFloat($(value).find("td:eq(4)").html());
                if (!isNaN(valor)) {
                    total += valor;
                }
            });
            $("#d1903a").val(total.toFixed(2));

            $("#table-sintesis tbody").find("tr:eq(2)").find("td:eq(2)").html(total.toFixed(2));
            var vocDolar = total / parseFloat($("#c1400c").val());
            $("#table-sintesis tbody").find("tr:eq(2)").find("td:eq(1)").html(vocDolar.toFixed(2));

            //calcular sintesis
            calcula1903e();
        }

        //FIN FUNCIONES TABLA EDITABLE VALOR COMPLEMENTARIOS


        //FUNCIONES TABLA EDITABLE SINTESIS DE LA VALUACION
        const $tableSintesis = $('#table-sintesis');

        const newSintTr = `<tr>
                                <td class="pt-3-half" contenteditable="false"></td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        $('.table-sintesis-add').on('click', 'a', () => {
            $tableSintesis.find('table').append(newSintTr);
        });

        $tableSintesis.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calcula1903e();
        });

        $("#table-sintesis").on('keyup', 'td', function(e) {
            if (this.cellIndex == 1) { //dolares
                var valActual = parseFloat($(this).html());
                if (!isNaN(valActual)) {
                    var valActualSoles = valActual * parseFloat($("#c1400c").val());
                    $(this).closest("tr").find("td:eq(2)").html(valActualSoles.toFixed(2));
                    calcula1903e();
                }
            } else if (this.cellIndex == 2) { //soles
                var valActual = parseFloat($(this).html());
                if (!isNaN(valActual)) {
                    var valActualDolares = valActual / parseFloat($("#c1400c").val());
                    $(this).closest("tr").find("td:eq(1)").html(valActualDolares.toFixed(2));
                    calcula1903e();
                }
            }
        });

        function calcula1903e() { //suma sintesis
            var totalSol = 0;
            var totalDol = 0;
            $('#table-sintesis tbody tr').each(function(index, value) {
                var valorDol = parseFloat($(value).find("td:eq(1)").html());
                if (!isNaN(valorDol)) {
                    totalDol += valorDol;
                }
                var valorSol = parseFloat($(value).find("td:eq(2)").html());
                if (!isNaN(valorSol)) {
                    totalSol += valorSol;
                }
            });
            $("#d1903d").val(totalDol.toFixed(2));
            $("#d1903e").val(totalSol.toFixed(2));
            calcula1903h();
        }

        $("#d1903f").keyup(function() {
            var valActual = parseFloat($(this).val());
            if (!isNaN(valActual)) {
                calcula1903h();
            }
        })

        function calcula1903h() {
            var vnrDol = parseFloat($("#d1903d").val()) * parseFloat($("#d1903f").val()) / 100;
            var vnrSol = parseFloat($("#d1903e").val()) * parseFloat($("#d1903f").val()) / 100;

            $("#d1903g").val(vnrDol.toFixed(2));
            $("#d1903h").val(vnrSol.toFixed(2));

            $.ajax({
                url: "<?= base_url() ?>valoriza/aletra/" + vnrDol.toFixed(2),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $("#d1903i").val(data);
                }
            });
        }

        //FIN FUNCIONES TABLA EDITABLE SINTESIS DE LA VALUACION


        //FUNCIONES TABLA EDITABLE FOTO
        const $tableFoto = $('#table-foto');

        const newFoTr = `<tr>
                                <td class="pt-3-half" style="display:none"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td style="display:none"></td>
                                <td class="pt-3-half"><input type="file" class="form-control" form="form-temp" accept=".jpeg, .jpg, .png"></td>
                                <td class="pt-3-half"><img src="#" style="height: 200px"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        $('.table-foto-add').on('click', 'a', () => {
            $tableFoto.find('table').append(newFoTr);
        });

        $tableFoto.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
        });

        $("#table-foto").on('change', 'input', function(e) {
            var row = $(this).closest("tr");
            var img = row.find("img");
            setIMGTable(this, img);
            var formData = new FormData();
            formData.append("img-temp", this.files[0]);
            $.ajax({
                url: "<?= base_url() ?>valoriza/subeImagen/img-temp", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                {
                    var result = JSON.parse(data);
                    console.log(result);
                    if (result.status == "error") {
                        alert(result.message);
                    } else if (result.status == "warning") {
                        alert(result.message);
                        img.attr('src', "<?= base_url() ?>" + result.file);
                        row.find("td:eq(0)").html(result.file);
                    } else if (result.status = "ok") {
                        row.find("td:eq(0)").html(result.file);
                    }
                }
            });
        });


        //FIN FUNCIONES TABLA EDITABLE FOTO

        function setIMG(input, target) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#' + target).attr('src', e.target.result);
                    $('#' + target).closest("div").show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function setIMGTable(input, img) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    img.attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

       
    function imprimirInforme() {
        window.print();
    }

    </script>
</body>

</html>