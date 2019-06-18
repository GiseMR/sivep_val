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
                <h4 class="card-title">NUEVO INFORME DE EVALUACIÓN</h4>
                <h6 class="card-subtitle"></h6>
                <form id="valuacion-form" class="m-t-40">
                    <div>
                    <body>
                    <h3>HOJA RESUMEN</h3>
                       

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card text-center">HOJA RESUMEN</h3>
                                            <h3 class="card text-center">VALUACION DEL INMUEBLE</h3>
                                            <div class="form-group row">
                                                <label for="nroValuacionResumen" class="col-sm-9 text-right control-label col-form-label">Código</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="nroValuacionResumen" name="nroValuacionResumen" value="Val.N° 001-2019" readonly>
                                                </div>
                                                <label for="tipoinmuebleresumen" class="col-sm-9 text-right control-label col-form-label">Inmueble</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="tipoinmuebleresumen" name="tipoinmuebleresumen" value="URBANO" readonly>
                                                </div>
                                            </div>

                                            <h5 class="card-title">REFERENCIA:</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="for" class="col-sm-2 text-left control-label col-form-label">PROPIETARIOS</label>
                                                <div class="col-sm-7">

                                                    <div id="table-propietario-resumen" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">NOMBRES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="pt-5-half" contenteditable="true"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="soli" class="col-sm-2 text-left control-label col-form-label">SOLICITANTE</label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="soli" name="soli">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="entifinan" class="col-sm-2 text-left control-label col-form-label">ENTIDAD FINANCIERA</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="entifinan" name="entifinan">
                                                </div>
                                            </div>

                                            <h5 class="card-title">UBICACIÓN</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="regis" class="col-sm-2 text-left control-label col-form-label">REGISTRAL</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="regis" name="regis"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="depa" class="col-sm-2 text-left control-label col-form-label">DEPARTAMENTO</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="depa" name="depa">
                                                </div>
                                                <label for="a203b" class="col-sm-1 text-right control-label col-form-label">PROVINCIA</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="provi" name="provi">
                                                </div>
                                                <label for="a203c" class="col-sm-1 text-right control-label col-form-label">DISTRITO</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="distri" name="distri">
                                                </div>
                                            </div>
                                            <h5 class="card-title">CROQUIS DE UBICACION</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <img id="croquisresumen" alt="Croquis" src="#" style="height: 100%">
                                                </div>
                                                <div class="col-sm-6">
                                                    <img id="fachadaresumen" alt="Fachada" src="#" style="height: 100%">
                                                </div>
                                            </div>
                                            <h4 class="card-title">RESUMEN DE VALUACIÓN</h4>
                                            <div class="form-group row">

                                            </div>
                                            <h5 class="card-title">OBSERVACIONES</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a103a" class="col-sm-2 text-left control-label col-form-label">DECLARATORIA DE FABRICA</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="decfabri" name="decfabri" value="No se encuentra inscrita">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a103a" class="col-sm-2 text-left control-label col-form-label">CARGAS Y GRAVAMENES A FAVOR DE:</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="entifinac" name="entifinac">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="a103a" class="col-sm-2 text-left control-label col-form-label">USO/OCUPACIÓN</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="uso" name="uso">
                                                </div>
                                            </div>


                                            <h5 class="card-title">TIPO DE GARANTIA</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="tiga" name="tiga" value="">
                                                </div>
                                            </div>
                                            <h5 class="card-title">PERITO RESPONSABLE</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="e2900a" name="e2900a" value="Cyntia Flor Ochoa Pino">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="e2900c" class="col-sm-1 text-right control-label col-form-label">CAP:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="e2900c" name="e2900c" value="12452">
                                                </div>
                                            </div>

                                            <h5 class="card-title">FECHA:</h5>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="fechavaluacion" class="col-sm-4 text-right control-label col-form-label">
                                                    <h5>San Jerónimo - CUSCO</h5>
                                                </label>
                                                <div class="col-sm-2">
                                                    <input type="date" class="form-control" id="fechavaluacion" name="fechavaluacion" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   
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
</body>
</html>