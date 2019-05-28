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
<h2>Permisos</h2>
<form method="post", action="<?= base_url() ?>usuario/registarpermiso">
<?php   
    if($menus)
    { 
        ?>
        <input name="codigoUsuario" type="hidden" value="<?php echo $codigoUsuario; ?>">
        <table class='table table-sm table-bordered grocery-crud-table table-hover'>
        <thead>
            <tr>
                <th>Icono</th>
                <th>Opción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($menus as $row){ ?>  
                <tr>
            <?php
            echo '<td> <i class="'.$row['icono'].'" /> </td>';
            echo '<td> <label>'.form_checkbox("permissions[]", $row['id'], $row['hasPermission']).' '.$row['descripcion'].' </label></td>';
            echo '<td>'.form_hidden("id", $row['id']).'</td>';
            ?> 
                </tr>
            <?php
             }
            ?>
       </tbody>
       </table>
       <?php
    }

    if(isset($mensaje)){
        ?>
            <div class="alert alert-success" role="alert">
            <p>Sus datos han sido actualizados correctamente. <a href="<?= base_url() ?>usuario" class="alert-link">Volver a la lista</a> </p>
            </div>        
        <?php
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