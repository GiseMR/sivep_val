<style>
.form-control{
	display: inline-block !important;
	padding: 3px !important;
}
.col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
	padding-right: 1px !important;
    padding-left: 1px !important;
}
.row{
	margin-bottom: 2px;
}
strong{
	padding-top: 8px;	
	display: inline-block;
	float: right;
	margin-right: 2px;
}
</style>
<form name="frmDetalleViaje">
<table align="center" width="100%">
  <tr>
    <th align="left"><h4> VIAJE # <?=$idviaje?></h4></th>
    <th width="30">&nbsp;</th>
    <th align="right">
        <a id="cerrar-ventana" class="btn btn-danger" style="float:right; margin-left: 5px;"><i class="fa fa-remove"></i> CERRAR</a>  
    	<a class="btn btn-info" id="btn-imprime-manifiesto" style="float:right"><i class="fa fa-print"></i> IMPRIMIR</a>
	</th>
</th>
  </tr>
</table>
<hr>
<div class="container-fluid">
<!--
<? /* $det = $ldet[0]; ?>
    <div class="row">
      <div class="col-xs-2 col-md-2">
      	<strong>Codigo Viaje <i class="fa fa-code-fork"></i></strong></div>
      <div class="col-xs-4 col-md-4"> 
      	<input type="text" value="<?=$idviaje?>" class="form-control" readonly></div>
      <div class="col-xs-2 col-md-2">
      	<strong>Ruta <i class="fa fa-exchange"></i></strong></div>
      <div class="col-xs-4 col-md-4">
      	<input type="text" value="<?=$det->NOMORI?> - <?=$det->NOMDES?>" class="form-control" readonly></div>
    </div>
    <div class="row">
      <div class="col-xs-2 col-md-2">
      	<strong>Fecha <i class="fa fa-calendar"></i></strong></div>
      <div class="col-xs-4 col-md-4"> 
      	<input type="date" value="<?=$det->D_FECPRG?>" class="form-control" readonly></div>
      <div class="col-xs-2 col-md-2">
      	<strong>Hora <i class="fa fa-clock-o"></i></strong></div>
      <div class="col-xs-4 col-md-4">
      	<input type="time" value="<?=$det->D_HORPRG?>" class="form-control" readonly></div>
    </div>     
    <div class="row">
      <div class="col-xs-2 col-md-2">
      	<strong>Bus <i class="fa fa-bus"></i></strong></div>
      <div class="col-xs-4 col-md-4"> 
      	<input type="text" value="<?=($det->C_PLABUS=="" ?  "No Asignado" : $det->C_PLABUS." / ".$det->C_MARBUS." ".$det->C_MODBUS)?>" class="form-control" readonly></div>
      <div class="col-xs-2 col-md-2">
      	<strong>Tripul. (<?=$det->NUMTRI?>) <i class="fa fa-code-fork"></i></strong></div>
      <div class="col-xs-4 col-md-4">
      <? if ($det->NUMTRI==0) { ?>
      	<input type="text" value="No hay tripulacion" class="form-control" readonly>
      <? } else { ?>
      <table class="table table-bordered">
        <? foreach($ltri as $tri) { ?>
          <tr>
            <td valign="top"><?="[".$tri->N_IDCHFR."]"?></td>
            <td><?=$tri->C_NOMCFR." [".$tri->C_LICCFR." ".$tri->C_CATLIC."]"?></td>
          </tr>
          <? } ?>
        </table>
      <? } */?></div>
    </div> -->
    <div class="row">
      <div class="col-xs-3 col-md-3">
      	<strong>Encomiendas (<?=sizeof($lenc)?>) <i class="fa fa-cubes"></i></strong></div>
      <div class="col-xs-12 col-md-12"> 
      <? if (sizeof($lenc)==0) { ?>
      	<input type="text" value="No hay encomiendas" class="form-control" readonly>
      <? }else{ $c = 0; ?>
        <table class="table table-bordered">
          <tr><th>#</th>
          <th>DESTINO</th>
          <th>REMITENTE</th>
          <th>DESTINATARIO</th>
          <th>PAQUETES</th>
          <th>FECHA ENVIO</th>
          </tr>
          <? foreach($lenc as $enc) { $c++; ?>
          <tr>
            <td><?=$c?></td>
            <td><?=$enc->NOMDES?></td>
            <td><?=$enc->DNIREM." - ".$enc->REMITE?></td>
            <td><?=$enc->DNIDES." - ".$enc->DESTIN?></td>
            <td><?=$enc->NUMDET?></td>
            <td><?=$enc->D_FECREG." - ".$enc->D_HORREG?></td>
          </tr>
          <? } ?>
        </table>
      <? } ?></div>
    </div>
</div>
</form>
<script>
	$("#cerrar-ventana").click(function(e) {
		try{
			window.parent.jQuery("#vent-multi").dialog("close");	
		}catch (exs){
        	$(this).closest('.ui-dialog-content').dialog('close'); 
		}
    });
</script>
