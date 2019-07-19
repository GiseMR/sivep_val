<!DOCTYPE html>
<html dir="ltr" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/matrix/assets/images/favicon.png">
    <title>PAGOS DE VALUACIÓN</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/codigos/js/jquery-3.2.0.min.js"></script>
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    
</head>
<form id="image-form" name="image-form">
    </form>
    <form id="temp-form" name="temp-form">
    </form>

    
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





<!-- Button to trigger modal -->
<button class="btn btn-success btn-lg" onclick="openPay()" >Pagos</button>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h5 class="modal-title">PAGO DE VALORIZACIONES</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                
                
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <h5 class="card-title">Datos de Contacto</h5>
                           
                           <div class="row">
                                <div class="col-sm-4">
                                    <label for="NOMBRES">Nombres:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nombres" name="nombres" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="APELLIDOS" >Apellidos:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="DNI" >Dni:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="FENAC">Fecha Nacimiento:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fenac" name="fenac" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="CORREO" >Correo:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="correo" name="correo">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="TELEFONO" >Teléfono:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-4">
                                    <label for="" ></label>
                             </div>   
                            </div>
                            <div class="row">                            
                            <div class="col-sm-5">                                               
                                <label for="COSTOTOTAL">***Costo Total Valorización S/.***</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="costo" name="costo">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="">::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</label>
                                    
                                    </div>
                                </div>
                            <h5 class="card-title">Registro de Pagos</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="PAGO">Pago S/.</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="pago" name="pago" >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="FECHA" >Fecha:</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-2">
                                    <br>
                                <button type="button" class="btn btn-success" onclick="AgregarPagos()"><i class="mdi mdi-check"></i>Agregar</button>
                                </div>
                            </div>
                             
                            
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cancelar</button>
                <button type="button" class="btn btn-success" onclick="guardarPagos()"><i class="mdi mdi-check"></i>Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function openPay(){
        $('#modalForm').modal('show');
    }

</script>


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