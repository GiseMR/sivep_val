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
    <title>PANEL FOTOGRÁFICO - VALUACIÓN DEL INMUEBLE</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/matrix/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/codigos/js/jquery-3.2.0.min.js"></script>
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .images{
            height: 300px;width: 300px;
        }
    </style>
</head>
  <body>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <h3 class="card text-center">PANEL FOTOGRÁFICO</h3>
                                <div class="col-md-12 text-center">
                                        <img  class="images" src="<?php echo base_url().$valoriza->e3000a;?>" >

                                        <h6 class="text-center">VISTA FRONTAL DEL PREDIO </h6>
                                </div>   
                                
                                <div class="row">
                                    <?php                                         
                                        foreach ($fotos as $item){ ?>

                                            <div class="col-6 text-center">
                                                <img  class="images" src="<?php echo base_url().$item->ruta;?>" >
                                                <br>
                                                <h6 class="text-center"><?php echo $item->leyenda; ?></h6>
                                             </div>
                                       
                                    <?php } ?>
                            </div>                                   
                            <div class="form-group gcrud-form-group">
                            <div class="col-sm-offset-3 col-sm-7">        
                                <a class="btn btn-info b10" href="<?= base_url() ?>valoriza">
                                        <i class="el el-return-key"></i>
                                        Volver a la lista                 
                                </a>      
                                <a class="btn btn-success b10" href="#" onclick="imprimirFotos()">
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
    function imprimirFotos() {
        window.print();
    }
</script>
</body>
</html>