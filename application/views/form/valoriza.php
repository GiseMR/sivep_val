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
                <h4 class="card-title">NUEVO INFORME DE EVALUACIÓN</h4>
                <h6 class="card-subtitle"></h6>
                <form id="valuacion-form" class="m-t-40">
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
                                                    <input type="text" class="form-control" id="nroValuacion" name="nroValuacion">
                                                </div>
                                                <label for="tipoinmueble" class="col-sm-9 text-right control-label col-form-label">Inmueble</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="tipoinmueble" name="tipoinmueble" value="URBANO" readonly>
                                                </div>
                                                <label for="fechavaluacion" class="col-sm-9 text-right control-label col-form-label">Fecha</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="fechavaluacion" name="fechavaluacion" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                            <h4 class="card-title">A) DATOS GENERALES</h4>

                                            <h5 class="card-title">1.0 INSTRUCCIONES RECIBIDAS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a101" class="col-sm-3 text-left control-label col-form-label">1.01 Objeto de Valuación</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="3" class="form-control" id="a101" name="a101">Determinar el valor comercial y el de realización en el mercado del inmueble URBANO  de acuerdo a la Rs. S.B.S. N° 880 de fecha 15 de diciembre de 1997, modificada por las Resoluciones SBS N° 816-2005 y 12879 -2009, R.M.  Nº 172-2016-VIVIENDA</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">1.02 Propietarios</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="a102a" name="a102a" placeholder="Ingrese DNI">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="a102b" name="a102b">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a103a" class="col-sm-2 text-left control-label col-form-label">1.03 Solicitante</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="a103a" name="a103a" placeholder="Ingrese DNI">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="a103b" name="a103b">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a104a" class="col-sm-2 text-left control-label col-form-label">1.04 Entidad Financiera</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="a104a" name="a104a" placeholder="Ingrese RUC">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="a104b" name="a104b">
                                                </div>
                                            </div>

                                            <h5 class="card-title">2.0 UBICACIÓN</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a201" class="col-sm-3 text-left control-label col-form-label">REGISTRAL</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="2" class="form-control" id="a201" name="a201"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a202" class="col-sm-3 text-left control-label col-form-label">AUTOAVALUO</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="a202" name="a202">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="ubiautoavaluo" class="col-sm-3 text-left control-label col-form-label">INSITU:</label>
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
                                                                <option value="<?= $row->C_CODDPTO ?>"><?= $row->C_NOMUBIGEO ?></option>
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
                                                        <option>URBANA</option>
                                                        <option>RURAL</option>
                                                        <option>SEMIRURAL</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a302" class="col-sm-3 text-left control-label col-form-label">3.02 Linderos</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="a302" name="a302" placeholder="Ingrese Fuente">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <label for="a302a" class="col-sm-3 text-left control-label col-form-label">POR EL FRENTE</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="a302a" name="a302a"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302b" class="col-sm-3 text-left control-label col-form-label">POR EL FONDO</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="a302b" name="a302b"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302c" class="col-sm-3 text-left control-label col-form-label">POR LA DERECHA</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="a302c" name="a302c"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302d" class="col-sm-3 text-left control-label col-form-label">POR LA IZQUIERDA</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="a302d" name="a302d"></textarea>
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
                                                    <input type="number" class="form-control" id="a303a" name="a303a">
                                                </div>
                                                <label for="a303b" class="col-sm-2 text-left control-label col-form-label">Perimetro (ml)</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" id="a303b" name="a303b">
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
                                                                    <th class="text-center">BLOQUE</th>
                                                                    <th class="text-center">NIVEL</th>
                                                                    <th class="text-center">DISTRIBUCION DE AMBIENTES</th>
                                                                    <th class="text-center">AREA CONST. (m<sup>2</sup>)</th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-edificacion-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a304a" class="col-sm-3 text-left control-label col-form-label">Estado de Conservación </label>
                                                <div class="col-sm-3">
                                                    <select class="select2 form-control custom-select" id="a304a" name="a304a" style="width: 100%; height:36px;">
                                                        <option>Seleccione...</option>
                                                        <option>Muy Buena</option>
                                                        <option>Buena</option>
                                                        <option>Regular</option>
                                                        <option>Malo</option>
                                                        <option>Muy Malo</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="a304b" class="col-sm-2 text-left control-label col-form-label">Antiguedad</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="a304b" name="a304b" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a305" class="col-sm-3 text-left control-label col-form-label">3.05 Ocupación - Uso</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="a305" name="a305">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a306" class="col-sm-11 text-left control-label col-form-label">3.06 Descripción del predio</label>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="5" class="form-control" id="a306" name="a306"></textarea>
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
                                                    <select class="select2 form-control custom-select" id="a307a" name="a307a" multiple>
                                                        <option>Concreto Armado</option>
                                                        <option>Adobe</option>
                                                        <option>Madera</option>
                                                        <option>Estructura Metálica</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307b" class="col-sm-3 text-left control-label col-form-label">Muros</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307b" name="a307b">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307c" class="col-sm-3 text-left control-label col-form-label">Techos</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307c" name="a307c">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307d" class="col-sm-3 text-left control-label col-form-label">Puertas</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307d" name="a307d">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307e" class="col-sm-3 text-left control-label col-form-label">Ventanas</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307e" name="a307e">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307f" class="col-sm-3 text-left control-label col-form-label">Revestimiento</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307f" name="a307f">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307g" class="col-sm-3 text-left control-label col-form-label">Pisos</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307g" name="a307g">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307h" class="col-sm-3 text-left control-label col-form-label">SS.HH.</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307h" name="a307h">
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a307i" class="col-sm-3 text-left control-label col-form-label">Instalaciones Sanitarias</label>
                                                <div class="col-sm-7">
                                                    <select class="select2 form-control custom-select" id="a307i" name="a307i">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a308" class="col-sm-11 text-left control-label col-form-label">3.08 Servidumbre</label>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" id="a308" name="a308">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a309" class="col-sm-11 text-left control-label col-form-label">3.09 Declaratoria de Fabrica</label>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="a309" name="a309">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="a309a" class="col-sm-1 text-left control-label col-form-label">Porcentaje</label>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="a309a" name="a309a">
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
                                                    <textarea rows="2" class="form-control" id="a400" name="a400"></textarea>
                                                </div>
                                            </div>

                                            <h5 class="card-title">5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO</h5>
                                            <div class="form-group row">
                                                <label for="a500" class="col-sm-12 text-left control-label col-form-label"></label>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="a500" name="a500"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">6.00 FECHA DE ASIGNACIÓN DEL VALOR</h5>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="a600" name="a600">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">7.00 POLIZA DE SEGUROS</h5>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="a700" name="a700">
                                                </div>
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
                                                    <input type="text" class="form-control" id="b800" name="b800">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-4">9.00 CARGAS Y GRAVÁMENES</h5>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="b900a" name="b900a" placeholder="<a favor de>">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="b900b" name="b900b" placeholder="<fuente>">
                                                </div>
                                            </div>

                                            <h5 class="card-title">10.00 DATOS LEGALES</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="b1000a" class="col-sm-3 text-left control-label col-form-label">Oficina Registral</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000a" name="b1000a">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000b" class="col-sm-3 text-left control-label col-form-label">Codigo del Predio / Ficha N°</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000b" name="b1000b">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000c" class="col-sm-3 text-left control-label col-form-label">Folio</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000c" name="b1000c">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1000d" class="col-sm-3 text-left control-label col-form-label">Asiento</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1000d" name="b1000d">
                                                </div>
                                            </div>


                                            <h5 class="card-title">11.00 CÓDIGO DE SUMINISTROS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="b1100a" class="col-sm-3 text-left control-label col-form-label">Energía Eléctrica</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1100a" name="b1100a">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="b1100b" class="col-sm-3 text-left control-label col-form-label">Agua</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="b1100b" name="b1100b">
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
                                                    <textarea rows="2" class="form-control" id="c1200" name="c1200">Se ha realizado una visita de inspección de campo a la vez el entorno del predio, para determinar valores comerciales de compra y venta de inmuebles con caracerísticas similares.</textarea>
                                                </div>
                                            </div>

                                            <h5 class="card-title">13.00 METODOLOGÍA UTILIZADA.</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1300" name="c1300">El trabajo que se realiza en concordancia a lo establecido por las normas vigentes del SBS y el ReglamentoNacional de Tazaciones del Perú. </textarea>
                                                </div>
                                            </div>

                                            <h5 class="card-title">14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA.</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400" name="c1400">Se consideró una investigación en el entorno del inmueble durante la inspección, revisión de avisos económicos y la base de datos del perito.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <div id="table-referencia" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">REFERENCIA</th>
                                                                    <th class="text-center">DIRECCION</th>
                                                                    <th class="text-center">PROPIETARIO</th>
                                                                    <th class="text-center">TELEFONO</th>
                                                                    <th class="text-center">DISTANCIA</th>
                                                                    <th class="text-center">TERRENO $</th>
                                                                    <th class="text-center">FECHA</th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <span class="table-referencia-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus" aria-hidden="true"></i> Nuevo item</a></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6"></div>
                                                <label for="c1400a" class="col-sm-1 text-left control-label col-form-label">Total</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="c1400a" name="c1400a">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="c1400b" class="col-sm-6 text-left control-label col-form-label">Valor comercial del terreno investigado (promedio): en soles</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="c1400b" name="c1400b">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="c1400c" class="col-sm-6 text-left control-label col-form-label">Valor comercial del terreno investigado (promedio): en dolares</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="c1400c" name="c1400c">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d">Se toma el valor considerando las referencias y predios de características similares, con un criterio conservador y prudente  asi mismo por encontrarse en la misma esquina.</textarea>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="file" class="form-control" id="c1400e" name="c1400e">
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
                                                    <input type="range" min="1" max="5" value="3" class="form-control" id="c1500a" name="c1500a">
                                                </div>
                                                <div class="col-sm-1" id="c1500av">3</div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500b" class="col-sm-3 text-left control-label col-form-label">2. Áreas del predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="3" class="form-control" id="c1500b" name="c1500b">
                                                </div>
                                                <div class="col-sm-1" id="c1500bv">3</div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500c" class="col-sm-3 text-left control-label col-form-label">3. Ubicación del Predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="3" class="form-control" id="c1500c" name="c1500c">
                                                </div>
                                                <div class="col-sm-1" id="c1500cv">3</div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500d" class="col-sm-3 text-left control-label col-form-label">4. Servicios del Predio</label>
                                                <div class="col-sm-4">
                                                    <input type="range" min="1" max="5" value="3" class="form-control" id="c1500d" name="c1500d">
                                                </div>
                                                <div class="col-sm-1" id="c1500dv">3</div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500e" class="col-sm-3 text-left control-label col-form-label">Total Puntaje</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="c1500e" name="c1500e" value="12">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500f" class="col-sm-3 text-left control-label col-form-label">Porcentaje</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="c1500f" name="c1500f" value="60.00%">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-2"></div>
                                                <label for="c1500g" class="col-sm-3 text-left control-label col-form-label"><b>Tipo de Garantía</b></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="c1500g" name="c1500g">
                                                </div>
                                                <div class="col-sm-3"></div>
                                            </div>

                                            <h5 class="card-title">16.00 DEDUCCIONES APLICADAS</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    Para el caso de la realización del inmueble de acuerdo a lo establecido por la Resolución SBS N° 11356-2008
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" id="c1600" name="c1600">
                                                </div>
                                            </div>

                                            <h5 class="card-title">17.00 SUSTENTO</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1700" name="c1700"></textarea>
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
                                                    S = Area Total
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    VCU = Valor Comercial Unitario
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    VCT = Valor Comercial del Terreno.
                                                </div>
                                                <div class="col-sm-7"></div>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    Tipo de cambio Abril del 2019.
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
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
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Area m2</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Valor ($)/m2</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">VT US$</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">VT S/.</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="objetovalua" class="col-sm-4 text-left control-label col-form-label">19.2 Valor de la Edificación (VE): </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-11 text-left control-label col-form-label">BLOQUE 1</label>

                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-3">(*)Prop. Exclusiva</div>
                                                <div class="col-sm-3">Categoría</div>
                                                <div class="col-sm-3">Precio Unit S/.</div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Muros y columnas</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Techos</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Pisos</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Puertas y ventanas</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Revestimiento</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Baños</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Instalac. Elec. y Sanit.</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Valor /m2</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-5"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Valor de la construcción</label>
                                                <div class="col-sm-3">
                                                    VC S/
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Depreciación (DP)</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-1"></div>
                                                <label for="siscons" class="col-sm-3 text-left control-label col-form-label">Sub total</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
                                                </div>
                                                <div class="col-sm-2"></div>

                                                <div class="col-sm-4"></div>
                                                <label for="siscons" class="col-sm-2 text-left control-label col-form-label">VE S/=</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="siscons" name="siscons">
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
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"> La presente  valuación se ha efectuado con total independencia, aplicada un criterio prudente y conservador en la determinación del valor.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">21.00 RECONOCIMIENTO DE NORMAS APLICABLES</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"> En la determinación del valor se aplicaron las normas vigentes reconocidas por la S.B.S y el Reglamento Nacional de Tasaciones del Perú. Rs. S.B.S. N° 11356-2008, R.M.  Nº 172-2016-VIVIENDA.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">22.00 DECLARACIÓN JURADA</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"> Declaro bajo juramento, no tener ningún tipo de vinculación familiar, económico, relación laboral entre el propietario, cliente y/o solicitante en la presente valorización.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">23.00 VIGENCIA DE LA VALUACIÓN</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"> Si no varían las edificaciones del mercado, así como no se surgir imponderables la valuación tiene una vigencia de: 90 días.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">24.00 DE LA POSESIÓN DEL INMUEBLE</h5>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">El bien inmueble se encuentra en posesion de:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="a102b" name="a102b" placeholder="Propietarios">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-7">25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE</h5>
                                            </div>                                          
                                            
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">La persona que atendió la verificación es: </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="a102b" name="a102b" placeholder="Solicitante">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">26.00 CONSIDERACIONES PARA LA VALORIZACIÓN</h5>
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-7 text-left control-label col-form-label"> Para la valuación se toma en cuenta lo siguiente:</label>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"> </textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">27.00 OBSERVACIONES Y/O RECOMENDACIONES</h5>
                                                <div class="col-sm-11">
                                                    <textarea rows="2" class="form-control" id="c1400d" name="c1400d"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">28.00 DOCUMENTACION UTILIZADA EN LA VALUACION</h5>                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label>Con la siguiente documentación proporcionada por el cliente, el perito que suscribe elaboro el  presente informe.</label>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <label for="a302a" class="col-sm-3 text-left control-label col-form-label">Título de propiedad o derechos</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302a" name="a302a"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302b" class="col-sm-3 text-left control-label col-form-label">Certificado de dominio, gravámenes</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302b" name="a302b"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302c" class="col-sm-3 text-left control-label col-form-label">Autoavalúo</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302c" name="a302c"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302d" class="col-sm-3 text-left control-label col-form-label">Planos de ubicación, distribución</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302d" name="a302d"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302d" class="col-sm-3 text-left control-label col-form-label">Memoria descriptiva</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302d" name="a302d"></textarea>
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <label for="a302d" class="col-sm-3 text-left control-label col-form-label">Otros </label>
                                                <div class="col-sm-7">
                                                    <textarea rows="1" class="form-control" id="a302d" name="a302d"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">29.00 DEL PERITO VALUADOR </h5>
                                             </div>
                                                <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">Nombre:</label>
                                                <div class="col-sm-3">
                                                    <textarea rows="1" class="form-control" id="a302c" name="a302c">Cyntia Flor Ochoa Pino</textarea>
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">Profesión:</label>
                                                <div class="col-sm-2">
                                                    <textarea rows="1" class="form-control" id="a302c" name="a302c">Arquitecto</textarea>
                                                </div> 
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-1 text-right control-label col-form-label">CAP:</label>
                                                <div class="col-sm-2">
                                                    <textarea rows="1" class="form-control" id="a302c" name="a302c">12452</textarea>
                                                </div>                                        
                                                </div>
                                                <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a102a" class="col-sm-2 text-left control-label col-form-label">Habilitación:</label>
                                                <div class="col-sm-3">
                                                    <textarea rows="1" class="form-control" id="a302c" name="a302c">Vigente</textarea>
                                                </div>
                                                </div>
                                            <div class="form-group row">
                                                <h5 class="card-title col-sm-6">30.00 PANEL FOTOGRÁFICO </h5>                                                
                                            </div>
                                            <div class="col-sm-1"></div>
                                                <div class="col-sm-11">
                                                    <input type="file" class="form-control" id="c1400e" name="c1400e">
                                                </div>                                         
                                                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>HOJA RESUMEN</h3>
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">I agree with the Terms and Conditions.</label>
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
    <script src="<?= base_url(); ?>assets/codigos/js/proceso.js"></script>

    <script>
        $(function() {
            $("#a102a").blur(function() {
                let dni = $("#a102a").val();
                $("#a102b").val("Consultando nombre, espere...");
                consultarDni(dni, 'a102b');
            });

            $("#a103a").blur(function() {
                let dni = $("#a103a").val();
                $("#a103b").val("Consultando nombre, espere...");
                consultarDni(dni, 'a103b');
            });

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
                    },
                    error: function() {
                        alert("Invalide!");
                    }
                });
            }

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
            $("#a307a").select2({
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

        });

        function calcula1500() {
            var p1 = parseInt($("#c1500a").val());
            var p2 = parseInt($("#c1500b").val());
            var p3 = parseInt($("#c1500c").val());
            var p4 = parseInt($("#c1500d").val());

            var total = p1 + p2 + p3 + p4;
            $("#c1500e").val(total);
            var porcentaje = (total * 100 / 20);
            $("#c1500f").val(porcentaje);

        }


        // Basic Example with form
        var form = $("#valuacion-form");
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                alert("Enviado!");
            }
        });

        //FUNCIONES TABLA EDITABLE EDIFICACION
        const $tableEdificacion = $('#table-edificacion');

        const newEdTr = `<tr>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td>
                                <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                            </td>
                        </tr>`;

        $('.table-edificacion-add').on('click', 'a', () => {
            $tableEdificacion.find('table').append(newEdTr);
        });

        $tableEdificacion.on('click', '.table-remove', function() {
            $(this).parents('tr').detach();
        });
        //FIN FUNCIONES TABLA EDITABLE EDIFICACION

        //FUNCIONES TABLA EDITABLE REFERENCIA
        const $tableReferencia = $('#table-referencia');

        const newReTr = `<tr>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td class="pt-3-half" contenteditable="true"></td>
                            <td>
                                <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">x</button></span>
                            </td>
                        </tr>`;

        $('.table-referencia-add').on('click', 'a', () => {
            $tableReferencia.find('table').append(newReTr);
        });

        $tableReferencia.on('click', '.table-remove', function() {
            $(this).parents('tr').detach();
        });
        //FIN FUNCIONES TABLA EDITABLE EDIFICACION
    </script>
</body>

</html>