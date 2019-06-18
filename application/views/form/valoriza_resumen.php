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
    <title>HOJA DE RESUMEN - VALUACIÓN DEL INMUEBLE</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/codigos/js/jquery-3.2.0.min.js"></script>
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css" rel="stylesheet">
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
       
            <div class="card-body wizard-content">
                <h6 class="card-subtitle"></h6>
                <form id="valuacion-form" class="m-t-40">
                    <div>
                    <body>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card text-center">HOJA DE RESUMEN</h3>
                                            <h3 class="card text-center">VALUACIÓN DEL INMUEBLE</h3>
                                            <div class="form-group row">
                                                <label for="nroValuacionResumen" class="col-sm-9 text-right control-label col-form-label">Código</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="nroValuacionResumen" name="nroValuacionResumen" value="<?php  echo $valoriza->nroValuacion;?>" readonly>
                                                </div>
                                                <label for="tipoinmuebleresumen" class="col-sm-9 text-right control-label col-form-label">Inmueble</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="tipoinmuebleresumen" name="tipoinmuebleresumen" value="<?php  echo $valoriza->tipoinmueble;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"><h6 class="card-title">REFERENCIA:</h6></div>
                                                <div class="col-sm-7">
                                                Valuación Comercial de inmueble   
                                                </div>
                                            </div>

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
                                                            <?php foreach($propietarios as $item) {?>
                                                                <tr>
                                                                    <td class="pt-5-half" contenteditable="false"> <?php echo $item->nombres; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="soli" class="col-sm-2 text-left control-label col-form-label">SOLICITANTE</label>

                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="soli" name="soli" value="<?php echo $valoriza->a103b; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="entifinan" class="col-sm-2 text-left control-label col-form-label">ENTIDAD FINANCIERA</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="entifinan" name="entifinan" value="<?php echo $valoriza->a104b; ?>">
                                                </div>
                                            </div>

                                            <h6 class="card-title">UBICACIÓN</h6>
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="regis" class="col-sm-2 text-left control-label col-form-label">REGISTRAL</label>
                                                <div class="col-sm-7">
                                                    <textarea rows="2" class="form-control" id="regis" name="regis"><?php echo $valoriza->a201; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <label for="depa" class="col-sm-2 text-left control-label col-form-label">DEPARTAMENTO</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="depa" name="depa" value="<?php echo $valoriza->a203a; ?>">
                                                </div>
                                                <label for="a203b" class="col-sm-1 text-right control-label col-form-label">PROVINCIA</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="provi" name="provi" value="<?php echo $valoriza->a203b; ?>">
                                                </div>
                                                <label for="a203c" class="col-sm-1 text-right control-label col-form-label">DISTRITO</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="distri" name="distri" value="<?php echo $valoriza->a203c; ?>">
                                                </div>
                                            </div>
                                            <h6 class="card-title">CROQUIS DE UBICACION</h6>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <img id="croquisresumen" alt="Croquis" src="<?php echo base_url().$valoriza->e3000a;?>" style="height: 100%">
                                                </div>
                                                <div class="col-sm-6">
                                                    <img id="fachadaresumen" alt="Fachada" src="<?php echo base_url().$valoriza->e3000c;?>" style="height: 100%">
                                                </div>
                                            </div>
                                            <h5 class="card-title">RESUMEN DE VALUACIÓN</h5>
                                              <div class="form-group row">
                                                <div class="col-sm-12">

                                                    <div id="table-propietario-resumen" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">DESCRIPCIÓN</th>
                                                                    <th class="text-center">AREA (m2)</th>
                                                                    <th class="text-center">VALOR EN US$</th>
                                                                    <th class="text-center">VALOR EN S/.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> Valor del Terreno </td>
                                                                    <td class="text-center" contenteditable="false"> (VT)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> Valor de edificaciones </td>
                                                                    <td class="text-center" contenteditable="false"> (VE)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> Obras complementarias </td>
                                                                    <td class="text-center" contenteditable="false"> (VOC)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> <strong>VALOR COMERCIAL  DEL INMUEBLE</strong> </td>
                                                                    <td class="text-center" contenteditable="false"> (VCI)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> <strong>VALOR NETO DE REALIZACION </strong> </td>
                                                                    <td class="text-center" contenteditable="false"> (VNR)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> <strong>CONSTITUYE GARANTIA HIPOTECARIA 80% DEL</strong> </td>
                                                                    <td class="text-center" contenteditable="false"> (VCI)</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> <strong>VALOR DE RECONSTRUCCION DE LA EDIFICACION</strong> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> VALOR ESTIMADO DE RECONSTRUCCIÓN </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div id="table-propietario-resumen" class="table-editable">
                                                        <table class="table table-sm table-bordered table-responsive-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2" class="text-left"> <h6>OBSERVACIONES</h6> </th>
                                                                    <th class="text-left" > <span>TIPO DE CAMBIO S/.<span> </th>
                                                                    <th class="text-center">  </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> DECLARATORIA DE FABRICA</td>
                                                                    <td class="text-left" contenteditable="false"> <?php echo $valoriza->a309; ?></td>
                                                                    <td class="text-left" contenteditable="false"> PORCENTAJE</td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> CARGAS Y GRAVAMENES </td>
                                                                    <td class="text-left" contenteditable="false"> <?php echo $valoriza->b900a; ?></td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" contenteditable="false"> USO/OCUPACIÓN </td>
                                                                    <td class="text-left" contenteditable="false"> <?php echo $valoriza->a305; ?></td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                    <td class="text-center" contenteditable="false"> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                            <div class="form-group row">
                                                <div class="col-sm-2"><h6 class="card-title">TIPO DE GARANTIA</h6></div>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" value="<?php echo $valoriza->c1500g; ?>"   id="tiga" name="tiga" value="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-2"><h6 class="card-title">PERITO RESPONSABLE</h6></div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="e2900a" name="e2900a" value="Cyntia Flor Ochoa Pino">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="e2900c" class="col-sm-1 text-right control-label col-form-label">CAP:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="e2900c" name="e2900c" value="12452">
                                                </div>
                                            </div>

                                           
                                            <div class="form-group row">
                                                <div class="col-sm-2">  <h6 class="card-title">FECHA:</div>
                                                <label for="fechavaluacion" class="col-sm-4 text-right control-label col-form-label">
                                                    <h6>San Jerónimo - CUSCO</h6>
                                                </label>
                                                <div class="col-sm-2">
                                                    <input type="date" class="form-control" id="fechavaluacion" name="fechavaluacion" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>

                                                     
                                <div class="form-group gcrud-form-group">
                                <div class="col-sm-offset-3 col-sm-7">        
                                    <a class="btn btn-info b10" href="<?= base_url() ?>valoriza">
                                            <i class="el el-return-key"></i>
                                            Volver a la lista                 
                                    </a>      
                                    <a class="btn btn-success b10" href="#" onclick="imprimirResumen()">
                                            <i class="el el-print"></i>
                                            Imprimir             
                                    </a>
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
<script>
    function imprimirResumen() {
        window.print();
    }
</script>
</body>
</html>