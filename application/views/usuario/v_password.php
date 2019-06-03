<!DOCTYPE html>
<html dir="ltr" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/matrix/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/matrix/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/elusive-icons/css/elusive-icons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Cambiar Contrasenia</h2>

<form method="post" action="<?= base_url() ?>usuario/cambiarpassword">
<input name="codigoUsuario" type="hidden" value="<?php echo $codigoUsuario; ?>" />
<div class="form-group gcrud-form-group">
    <div class="col-sm-offset-3 col-sm-12">
    <h5>Nombre usuario: <?php echo $nombreusuario; ?></h5>    
    </div>
    <div class="col-sm-offset-3 col-sm-3">
        <label for="password">Contrasenia actual</label>
        <input type="password" name="password" class="form-control" required/>
    </div>
    <div class="col-sm-offset-3 col-sm-3">
        <label for="password">Nueva contrasenia </label>
        <input type="password" name="newpassword" class="form-control" required/>
    </div>
</div>
<?php
    if(isset($mensaje)){

        if($mensaje=='ok'){
            ?>
            <div class="alert alert-success" role="alert">
            <p>Sus datos han sido actualizados correctamente. <a href="<?= base_url() ?>usuario" class="alert-link">Volver a la lista</a> </p>
            </div>        
            <?php
        }
        else{
            ?>
            <div class="alert alert-warning" role="alert">
                <p> <?php  echo $mensaje;?></p>
                </div>
            <?php
        }
    }
?>
<div class="form-group gcrud-form-group">
    <div class="col-sm-offset-3 col-sm-7">
        <button class="btn btn-secondary btn-success b10" type="submit" id="form-button-save">
            <i class="el el-ok"></i>
            Actualizar cambios 
        </button>
        <a class="btn btn-secondary cancel-button b10" href="<?= base_url() ?>usuario">
                <i class="el el-warning-sign"></i>
                Cancelar                         
        </a>
    </div>
</div>
</form>
</body>

</html>