<h2>Permiso</h2>
<?php   
    if($menus)
    { 
        foreach ($menus as $row):?>    
        <span> <?php echo $row[0]->id; ?>  </span>
        <?php 
        endforeach;
    }
?>