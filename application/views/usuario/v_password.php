<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
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
<h2>Cambiar Contraseña</h2>


<div class="form-group gcrud-form-group">
    <div class="col-sm-offset-3 col-sm-7">
        <button class="btn btn-secondary btn-success b10" type="submit" id="form-button-save">
            <i class="el el-ok"></i>
            Actualizar cambios 
        </button>
        <button class="btn btn-info b10" type="submit" id="save-and-go-back-button">
            <i class="el el-return-key"></i>
         Actualizar y volver a la lista 
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