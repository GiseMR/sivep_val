<div class="col-md-12" style="max-height: 200px;overflow-y: auto;">
<table class="table">
  <thead>
      <th>Persona</th>
      <th>Monto</th>
      <th>Fecha</th>
      <th>Descripción</th>
      <th>Usuario</th>
  </thead>
<tbody>
    <?php if(isset($pagos)){?>
      <?php foreach($pagos as $item) {?>
        <tr>      
          <td><?=$item->persona?></td>
          <td>S/. <?=$item->monto?></td>
          <td><?=$item->registro?></td>    
          <td><?=$item->descripcion?></td>
          <td><?=$item->COD_USU?></td>         
      </tr>
    <?php } } ?>
</tbody>
</table>
<div>