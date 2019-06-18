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
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
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
                <h4 class="card-title">EDICIÓN DE INFORME DE EVALUACIÓN</h4>
                <h6 class="card-subtitle"></h6>
                <form id="valuacion-form" class="m-t-40">
                    <input type="hidden" name="idvaluacion" id="idvaluacion" value="<?= $valoriza[0]->idvaluacion ?>">
                    <div>
                        <h3>A) DATOS</h3>
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
                                                <div class="col-sm-3">
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
                                            <label for="a303a" class="col-sm-2 text-left control-label col-form-label">Area (m<sup>2</sup>)</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="a303a" name="a303a" value="<?= $valoriza[0]->a303a ?>">
                                            </div>
                                            <label for="a303b" class="col-sm-2 text-left control-label col-form-label">Perimetro (ml)</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="a303b" name="a303b" value="<?= $valoriza[0]->a303b ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="edificacion" class="col-sm-3 text-left control-label col-form-label">3.04 Edificación</label>
                                            <div class="col-sm-3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <div id="table-edificacion" class="table-editable">
                                                    <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" head="bloque">BLOQUE</th>
                                                                <th class="text-center" head="nivel">NIVEL</th>
                                                                <th class="text-center" head="distribucion">DISTRIBUCION DE AMBIENTES</th>
                                                                <th class="text-center" head="area">AREA CONST. (m<sup>2</sup>)</th>
                                                                <th style="display:none" head="idedificacion"></th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <? foreach ($edificacion as $eitem) { ?>
                                                                <tr>
                                                                    <td class="pt-3-half" contenteditable="true"><?= $eitem->bloque ?></td>
                                                                    <td class="pt-3-half" contenteditable="true"><?= $eitem->nivel ?></td>
                                                                    <td class="pt-3-half" contenteditable="true"><?= $eitem->distribucion ?></td>
                                                                    <td class="pt-3-half" contenteditable="true"><?= $eitem->area ?></td>
                                                                    <td style="display:none"><?= $eitem->idedificacion ?></td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                    </td>
                                                                </tr>
                                                            <? } ?>
                                                        </tbody>
                                                    </table>
                                                    <span class="table-edificacion-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-1"></div>
                                            <label for="a304" class="col-sm-8 text-left control-label col-form-label">Total area construida:</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="a304" name="a304" value="<?= $valoriza[0]->a304 ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-1"></div>
                                            <label for="a304a" class="col-sm-3 text-left control-label col-form-label">Estado de Conservación </label>
                                            <div class="col-sm-3">
                                                <select class="select2 form-control custom-select" id="a304a" name="a304a" style="width: 100%; height:36px;">
                                                    <option>Seleccione...</option>
                                                    <option <?= ($valoriza[0]->a304a == "Muy Buena" ? "selected" : "") ?>>Muy Buena</option>
                                                    <option <?= ($valoriza[0]->a304a == "Buena" ? "selected" : "") ?>>Buena</option>
                                                    <option <?= ($valoriza[0]->a304a == "Regular" ? "selected" : "") ?>>Regular</option>
                                                    <option <?= ($valoriza[0]->a304a == "Malo" ? "selected" : "") ?>>Malo</option>
                                                    <option <?= ($valoriza[0]->a304a == "Muy Malo" ? "selected" : "") ?>>Muy Malo</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <label for="a304b" class="col-sm-2 text-left control-label col-form-label">Antiguedad (años)</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" id="a304b" name="a304b" placeholder="" value="<?= $valoriza[0]->a304b ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
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
                                            <label class="col-sm-11 text-left control-label col-form-label">3.07 Fábrica - Especificaciones técnicas (Bloque predominante)</label>
                                            <div class="col-sm-1"></div>
                                            <label class="col-sm-11 text-left control-label col-form-label">BLOQUE 1</label>

                                            <div class="col-sm-2"></div>
                                            <label for="a307a" class="col-sm-3 text-left control-label col-form-label">Sistema constructivo</label>
                                            <div class="col-sm-7">
                                                <? $a307a = explode(";", $valoriza[0]->a307a); ?>
                                                <select class="select2 form-control custom-select" id="a307a" name="a307a" multiple>
                                                    <option <?= (in_array("Concreto Armado", $a307a) ? "selected" : "") ?>>Concreto Armado</option>
                                                    <option <?= (in_array("Adobe", $a307a) ? "selected" : "") ?>>Adobe</option>
                                                    <option <?= (in_array("Madera", $a307a) ? "selected" : "") ?>>Madera</option>
                                                    <option <?= (in_array("Estructura Metálica", $a307a) ? "selected" : "") ?>>Estructura Metálica</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307b" class="col-sm-3 text-left control-label col-form-label">Muros</label>
                                            <div class="col-sm-7">
                                                <? $a307b = explode(";", $valoriza[0]->a307b); ?>
                                                <select class="select2 form-control custom-select" id="a307b" name="a307b" multiple>
                                                    <option <?= (in_array("Ladrillo de Arcilla", $a307b) ? "selected" : "") ?>>Ladrillo de Arcilla</option>
                                                    <option <?= (in_array("Drywall", $a307b) ? "selected" : "") ?>>Drywall</option>
                                                    <option <?= (in_array("Madera", $a307b) ? "selected" : "") ?>>Madera</option>
                                                    <option <?= (in_array("Adobe", $a307b) ? "selected" : "") ?>>Adobe</option>
                                                    <option <?= (in_array("Muro de ladrillos de concreto", $a307b) ? "selected" : "") ?>>Muro de ladrillos de concreto</option>
                                                    <option <?= (in_array("Techos de losa aligerado horizontal", $a307b) ? "selected" : "") ?>>Techos de losa aligerado horizontal</option>
                                                    <option <?= (in_array("Piso porcelanato", $a307b) ? "selected" : "") ?>>Piso porcelanato</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307c" class="col-sm-3 text-left control-label col-form-label">Techos</label>
                                            <div class="col-sm-7">
                                                <? $a307c = explode(";", $valoriza[0]->a307c); ?>
                                                <select class="select2 form-control custom-select" id="a307c" name="a307c" multiple>
                                                    <option <?= (in_array("Calamina", $a307c) ? "selected" : "") ?>>Calamina</option>
                                                    <option <?= (in_array("Teja Andina", $a307c) ? "selected" : "") ?>>Teja Andina</option>
                                                    <option <?= (in_array("Termo acustico", $a307c) ? "selected" : "") ?>>Termo acustico</option>
                                                    <option <?= (in_array("Fibrocemento", $a307c) ? "selected" : "") ?>>Fibrocemento</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307d" class="col-sm-3 text-left control-label col-form-label">Puertas</label>
                                            <div class="col-sm-7">
                                                <? $a307d = explode(";", $valoriza[0]->a307d); ?>
                                                <select class="select2 form-control custom-select" id="a307d" name="a307d" multiple>
                                                    <option <?= (in_array("Metalicas", $a307d) ? "selected" : "") ?>>Metalicas</option>
                                                    <option <?= (in_array("Madera Contraplacada", $a307d) ? "selected" : "") ?>>Madera Contraplacada</option>
                                                    <option <?= (in_array("Madera Tablero Rajado", $a307d) ? "selected" : "") ?>>Madera Tablero Rajado</option>
                                                    <option <?= (in_array("Fibrocemento", $a307d) ? "selected" : "") ?>>Fibrocemento</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307e" class="col-sm-3 text-left control-label col-form-label">Ventanas</label>
                                            <div class="col-sm-7">
                                                <? $a307e = explode(";", $valoriza[0]->a307e); ?>
                                                <select class="select2 form-control custom-select" id="a307e" name="a307e" multiple>
                                                    <option <?= (in_array("Vidrio Semi Doble", $a307e) ? "selected" : "") ?>>Vidrio Semi Doble</option>
                                                    <option <?= (in_array("Estructura de Aluminio", $a307e) ? "selected" : "") ?>>Estructura de Aluminio</option>
                                                    <option <?= (in_array("Estructura de Madera", $a307e) ? "selected" : "") ?>>Estructura de Madera</option>
                                                    <option <?= (in_array("Otros", $a307e) ? "selected" : "") ?>>Otros</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307f" class="col-sm-3 text-left control-label col-form-label">Revestimiento</label>
                                            <div class="col-sm-7">
                                                <? $a307f = explode(";", $valoriza[0]->a307f); ?>
                                                <select class="select2 form-control custom-select" id="a307f" name="a307f" multiple>
                                                    <option <?= (in_array("Enchapado con cerámico", $a307f) ? "selected" : "") ?>>Enchapado con cerámico</option>
                                                    <option <?= (in_array("Enchapado con piedra", $a307f) ? "selected" : "") ?>>Enchapado con piedra</option>
                                                    <option <?= (in_array("Estucado con yeso", $a307f) ? "selected" : "") ?>>Estucado con yeso</option>
                                                    <option <?= (in_array("otros", $a307f) ? "selected" : "") ?>>otros</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307g" class="col-sm-3 text-left control-label col-form-label">Pisos</label>
                                            <div class="col-sm-7">
                                                <? $a307g = explode(";", $valoriza[0]->a307g); ?>
                                                <select class="select2 form-control custom-select" id="a307g" name="a307g" multiple>
                                                    <option <?= (in_array("Sin Piso", $a307g) ? "selected" : "") ?>>Sin Piso</option>
                                                    <option <?= (in_array("Tierra Compactada", $a307g) ? "selected" : "") ?>>Tierra Compactada</option>
                                                    <option <?= (in_array("Cemento Pulido", $a307g) ? "selected" : "") ?>>Cemento Pulido</option>
                                                    <option <?= (in_array("Cerámico Nacional", $a307g) ? "selected" : "") ?>>Cerámico Nacional</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307h" class="col-sm-3 text-left control-label col-form-label">SS.HH.</label>
                                            <div class="col-sm-7">
                                                <? $a307h = explode(";", $valoriza[0]->a307h); ?>
                                                <select class="select2 form-control custom-select" id="a307h" name="a307h" multiple>
                                                    <option <?= (in_array("Completo con mayolica nacional de color", $a307h) ? "selected" : "") ?>>Completo con mayolica nacional de color</option>
                                                    <option <?= (in_array("Completo con ceramico importado", $a307h) ? "selected" : "") ?>>Completo con ceramico importado</option>
                                                    <option <?= (in_array("Básico de granito", $a307h) ? "selected" : "") ?>>Básico de granito</option>
                                                    <option <?= (in_array("otros", $a307h) ? "selected" : "") ?>>otros</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                            <label for="a307i" class="col-sm-3 text-left control-label col-form-label">Instalaciones Sanitarias</label>
                                            <div class="col-sm-7">
                                                <? $a307i = explode(";", $valoriza[0]->a307i); ?>
                                                <select class="select2 form-control custom-select" id="a307i" name="a307i" multiple>

                                                    <option <?= (in_array("Agua fría, corriente monofasica", $a307i) ? "selected" : "") ?>>Agua fría, corriente monofasica</option>
                                                    <option <?= (in_array("Agua fría y caliente, corriente monofasica", $a307i) ? "selected" : "") ?>>Agua fría y caliente, corriente monofasica</option>
                                                    <option <?= (in_array("Agua fría, caliente, corriene monofásica teléfono", $a307i) ? "selected" : "") ?>>Agua fría, caliente, corriene monofásica teléfono</option>
                                                    <option <?= (in_array("Agua fría, caliente, corriente trifásica", $a307i) ? "selected" : "") ?>>Agua fría, caliente, corriente trifásica</option>
                                                    <option <?= (in_array("otros", $a307i) ? "selected" : "") ?>>otros</option>
                                                </select>
                                            </div>
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
                        </section>

                        <h3>B) VERIFICACIONES</h3>
                        <section>
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
                        </section>

                        <h3>C) METODOLOGÍA</h3>
                        <section>
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
                        </section>

                        <h3>D) CALCULOS</h3>
                        <section>
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
                                                    <div id="table-valor" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" head="bloque">BLOQUE</th>
                                                                    <th class="text-center" head="propiedad">(*)Prop. Exclusiva</th>
                                                                    <th class="text-center" head="categoria">Categoria</th>
                                                                    <th class="text-center" head="precio">Precio Unit S/.</th>
                                                                    <th style="display:none" head="idvalor"></th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? $colid = 0;
                                                                foreach ($valor as $vitem) {
                                                                    $colid++;
                                                                    if ($colid > 7) {
                                                                        $colid = 1;
                                                                    }
                                                                    ?>
                                                                    <tr>
                                                                        <td class="pt-3-half" contenteditable="false"><?= $vitem->bloque ?></td>
                                                                        <td class="pt-3-half" contenteditable="false" colid="<?= $colid ?>"><?= $vitem->propiedad ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vitem->categoria ?></td>
                                                                        <td class="pt-3-half" contenteditable="true"><?= $vitem->precio ?></td>
                                                                        <td style="display:none"><?= $vitem->idvalor ?></td>
                                                                        <td>
                                                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                        </td>
                                                                    </tr>
                                                                <? } ?>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-valor-add-blq float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo bloque</a></span>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6"></div>
                                                <label for="d1902a" class="col-sm-2 text-left control-label col-form-label">Valor/m<sup>2</sup></label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1902a" name="d1902a" value="<?= $valoriza[0]->d1902a ?>" readonly>
                                                </div>
                                                <div class="col-sm-1"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1902b" class="col-sm-3 text-left control-label col-form-label">Valor de la construcción</label>
                                                <div class="col-sm-1">
                                                    VC S/
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1902b" name="d1902b" value="<?= $valoriza[0]->d1902b ?>" readonly>
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1902c" class="col-sm-3 text-left control-label col-form-label">Depreciación (DP%)</label>
                                                <div class="col-sm-1">
                                                    <input type="number" class="form-control text-right" id="d1902c" name="d1902c" value="<?= $valoriza[0]->d1902c ?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1902d" name="d1902d" value="<?= $valoriza[0]->d1902d ?>" readonly>
                                                </div>
                                                <div class="col-sm-4"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="d1902e" class="col-sm-3 text-left control-label col-form-label">Sub total</label>
                                                <div class="col-sm-1">
                                                    VE S/ =
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control text-right" id="d1902e" name="d1902e" value="<?= $valoriza[0]->d1902e ?>" readonly>
                                                </div>
                                                <div class="col-sm-4"></div>
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
                                                    <input type="number" class="form-control" id="d1903c" name="d1903c" value="<?= $valoriza[0]->d1903c ?>" >
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
                        </section>
                        <h3>E) OPINIÓN</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">B) OPINION INTEGRAL DEL PERITO VALUADOR</h4>

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
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-11">
                                                <div id="table-foto" class="table-editable">
                                                    <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th style="display:none" head="ruta"></th>
                                                                <th class="text-center" head="leyenda">LEYENDA</th>
                                                                <th style="display:none" head="idfoto"></th>
                                                                <th class="text-center">SELECCIÓN</th>
                                                                <th class="text-center">VISTA PREVIA</th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <? foreach ($foto as $fitem) { ?>
                                                                <tr>
                                                                    <td style="display:none"><?= $fitem->ruta ?></td>
                                                                    <td class="pt-3-half" contenteditable="true"><?= $fitem->leyenda ?></td>
                                                                    <td style="display:none"><?= $fitem->idfoto ?></td>
                                                                    <td class="pt-3-half"><input type="file" class="form-control" form="temp-form" accept=".jpeg, .jpg, .png"></td>
                                                                    <td class="pt-3-half"><img src="<?= base_url() . $fitem->ruta ?>" style="height: 200px"></td>
                                                                    <td>
                                                                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                                                    </td>
                                                                </tr>
                                                            <? } ?>
                                                        </tbody>
                                                    </table>
                                                    <span class="table-foto-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>FOTOS COMP.</h3>
                        <section>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">FOTOS COMPLEMENTARIAS</h4>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <h4>CROQUIS DE UBICACION</h4>
                                                </div>
                                                <div class="col-sm-12 text-center" style="height: 400px;">
                                                    <img id="e3000a-prev" src="<?= base_url() . $valoriza[0]->e3000a ?>" style="height: 100%">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="hidden" id="e3000a" name="e3000a" value="<?= $valoriza[0]->e3000a ?>">
                                                    <input type="file" class="form-control" id="e3000a-temp" name="e3000a-temp" form="image-form" accept=".jpeg, .jpg, .png">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <h4>FRENTE/FACHADA PRINCIPAL</h4>
                                                </div>
                                                <div class="col-sm-12 text-center" style="height: 400px;">
                                                    <img id="e3000b-prev" src="<?= base_url() . $valoriza[0]->e3000b ?>" style="height: 100%">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="hidden" id="e3000b" name="e3000b" value="<?= $valoriza[0]->e3000b ?>">
                                                    <input type="file" class="form-control" id="e3000b-temp" name="e3000b-temp" form="image-form" accept=".jpeg, .jpg, .png">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <h4>PLANO GENERAL</h4>
                                                </div>
                                                <div class="col-sm-12 text-center" style="height: 500px;">
                                                    <img id="e3000c-prev" src="<?= base_url() . $valoriza[0]->e3000c ?>" style="height: 100%">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="hidden" id="e3000c" name="e3000c" value="<?= $valoriza[0]->e3000c ?>">
                                                    <input type="file" class="form-control" id="e3000c-temp" name="e3000c-temp" form="image-form" accept=".jpeg, .jpg, .png">
                                                </div>
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
            $("#a305, #a307a, #a307b, #a307c, #a307d, #a307e, #a307f, #a307g, #a307h, #a307i, #a400").select2({
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

            $("#a301").change(function() {
                $("#tipoinmueble").val($("#a301").val());
            });

            $("#a304a").change(function() {
                $("#d1903b").val($("#a304a").val());
            });

            $("#a304b").keyup(function() {
                $("#d1903c").val($("#a304b").val());
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
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            onFinished: function(event, currentIndex) {
                // FIN DE FORMULARIO
                //alert("Terminado");
                var formData = $("#valuacion-form").serializeFormJSON();
                console.log(formData);

                //ENVIAR CABECERA CON AJAX
                $.ajax({
                    type: "post",
                    url: " <?php echo base_url(); ?>valoriza/actualizar",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response != "ERROR") {
                            registryid = response;
                        }
                    },
                    error: function() {
                        alert("Error al grabar");
                    }
                }).done(function() {
                    if (registryid != 0) {
                        actualizaDetalle("table-propietario", "propietario");
                        actualizaDetalle("table-edificacion", "edificacion");
                        actualizaDetalle("table-lindero", "lindero");
                        actualizaDetalle("table-referencia", "referencia");
                        actualizaDetalle("table-sintesis", "sintesis");
                        actualizaDetalle("table-valor", "valor");
                        actualizaDetalle("table-valor-comp", "valorcomplementario");
                        actualizaDetalle("table-foto", "foto");
                        
                        alert("LOS DATOS SE ACTUALIZARON CORRECTAMENTE");
                        window.location.replace("<?= base_url() ?>/valoriza");
                    }
                });
            }
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

        //FUNCIONES TABLA EDITABLE EDIFICACION
        const $tableEdificacion = $('#table-edificacion');

        const newEdTr = `<tr>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true"></td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>                            
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        $('.table-edificacion-add').on('click', 'a', () => {
            $tableEdificacion.find('table').append(newEdTr);
        });

        $tableEdificacion.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calcula304();
        });

        $("#table-edificacion").on('keyup', 'td', function(e) {
            if (this.cellIndex == 3) {
                var areaConst = parseFloat($(this).html());
                if (!isNaN(areaConst)) {
                    calcula304();
                }
            }
        });

        function calcula304() { //total area construida
            var total = 0;
            $('#table-edificacion tbody tr').each(function(index, value) {
                var valor = parseFloat($(value).find("td:eq(3)").html());
                if (!isNaN(valor)) {
                    total += valor;
                }
            });
            $("#a304").val(total.toFixed(2));
        }
        //FIN FUNCIONES TABLA EDITABLE EDIFICACION

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
        const $tableValor = $('#table-valor');
        const newBlqTr = `<tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="1">Muros y columnas</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="2">Techos</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="3">Pisos</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="4">Puertas y ventanas</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="5">Revestimiento</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="6">Baños</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half" contenteditable="false">{num}</td>
                                <td class="pt-3-half" contenteditable="false" colid="7">Instalaciones Electricas y Sanitarias</td>
                                <td class="pt-3-half" contenteditable="true">A</td>
                                <td class="pt-3-half" contenteditable="true">0.00</td>
                                <td style="display:none"></td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                                </td>
                            </tr>`;

        var curBlq = 1;
        $('.table-valor-add-blq').on('click', 'a', () => {
            curBlq++;
            $tableValor.find('table').append(newBlqTr.replace(/{num}/g, curBlq));
            $("#d1902").change();
        });

        $tableValor.on('click', '.table-remove', function() {
            $(this).parents('tr').attr("delete", "yes");
            $(this).parents('tr').hide();
            calcula1902a();
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
            $('#table-valor tbody tr').each(function(index, value) {
                var letra = $(value).find("td:eq(2)").html().toUpperCase();
                var rowNum = rows.indexOf(letra);
                if ($("#d1902").val() != "SELVA" && rowNum > 8) {
                    rowNum = -1;
                }
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
            calcula1902a();
        });

        $("#table-valor").on('keyup', 'td', function(e) {
            if (this.cellIndex == 3) {
                var precioUnit = parseFloat($(this).html());
                if (!isNaN(precioUnit)) {
                    calcula1902a();
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
                calcula1902a();
            }
        });

        function calcula1902a() { //total valor m2
            var total = 0;
            $('#table-valor tbody tr').each(function(index, value) {
                var valor = parseFloat($(value).find("td:eq(3)").html());
                if (!isNaN(valor)) {
                    total += valor;
                }
            });
            $("#d1902a").val(total.toFixed(2));
            calcula1902b();
        }

        function calcula1902b() { //valor construccion
            var valorCon = parseFloat($("#d1902a").val()) * parseFloat($("#a304").val());
            $("#d1902b").val(valorCon.toFixed(2));
            calcula1902d();

            $("#d1903k").val(valorCon.toFixed(2));
            var verDol = valorCon / parseFloat($("#c1400c").val());
            $("#d1903j").val(verDol.toFixed(2));
        }

        $("#d1902c").keyup(function() { //porcentaje depreciacion
            var porc = parseFloat($(this).val());
            if (!isNaN(porc)) {
                calcula1902d();
            }
        });

        function calcula1902d() { //monto depreciacion y subtotal
            var valorCon = parseFloat($("#d1902b").val()) * parseFloat($("#d1902c").val()) / 100;
            $("#d1902d").val(valorCon.toFixed(2));
            var subTotal = parseFloat($("#d1902b").val()) - valorCon;
            $("#d1902e").val(subTotal.toFixed(2));

            $("#table-sintesis tbody").find("tr:eq(1)").find("td:eq(2)").html(subTotal.toFixed(2));
            var veDolar = subTotal / parseFloat($("#c1400c").val());
            $("#table-sintesis tbody").find("tr:eq(1)").find("td:eq(1)").html(veDolar.toFixed(2));

            //sumar sintesis
            calcula1903e();
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
    </script>
</body>

</html>