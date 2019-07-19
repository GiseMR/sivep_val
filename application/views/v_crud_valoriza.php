 
 <?php foreach ($css_files as $file) : ?>
 	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 <?php endforeach; ?>
 <?php foreach ($js_files as $file) : ?>
 	<script src="<?php echo $file; ?>" type="text/javascript"></script>
 <?php endforeach; ?>

 <h2 style="font-family:Arial;margin-top:14px;margin-left:1%; font-size:20px; font-weight: bold;"><?= $titulo ?></h2>
 <hr style="margin-top: 0; margin-bottom:0;">
 <div class="container-fluid">
 	<div><?php echo $output; ?></div>
 </div>
 <div class="modal fade" id="modalFormPay" role="dialog">
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
                                        <input type="text" class="form-control" id="dni" name="dni">
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
 <script src="<?= base_url(); ?>assets/codigos/js/tooltip.js"></script>
 <script src="<?= base_url(); ?>assets/codigos/js/popper.js"></script>  
 <script src="<?= base_url(); ?>assets/codigos/js/jquery-3.2.0.min.js"></script>
 <script src="<?= base_url(); ?>assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.js"></script>
 
 <script type="text/javascript">
	 //Growl notification
	

 	function showNotif(content, tipo) {
 		try {
 			$.growl(content, {
 				type: tipo
 			});
 		} catch (ex) {
 			//using this for edit, add, view catch error
 		}
 	}

	 function showPropietarios(){
		$('[data-toggle="popover"]').popover();
	 }

 	$(function() {
		$('[data-toggle="popover"]').popover();
 		//NO TITULO
 		$(".table-label").hide();

 		//BOTON CARGAR ARCHIVO
 		$(".header-tools").find("a.add").html("<i class=\"el el-plus\"></i> Nueva valuación");
 		$(".header-tools").find("a.add").attr("href", "<?= base_url('valoriza/nuevo') ?>");

 		$(".grocery-crud-table").on('click', 'a.edit', function(e) {
 			e.preventDefault();
			var url = $(this).attr("href");
			var id = url.split("/").pop();
			window.location.replace("<?=base_url()?>valoriza/edita/"+id);
 		});
		 $(".grocery-crud-table").on('click', 'a.read', function(e) {
 			e.preventDefault();
			var url = $(this).attr("href");
			var id = url.split("/").pop();
			window.location.replace("<?=base_url()?>valoriza/leer/"+id);
		 });
		
 	});
 	 function openPay(idvaluacion, idcontacto) {
 	     
            $.ajax({
                type: "post",
                url: " <?php echo base_url(); ?>pago/getdata",
                data: { idvaluacion: idvaluacion, idcontacto:idcontacto },
                success: function(response) {
                    let data = JSON.parse(response);
                    if (data) {
                        data.contacto;
                        if(data.contacto){
                            const contacto= data.contacto;
                            $("#nombres").val(contacto.NOM_CONT);
                            $('#apellidos').val(contacto.APP_CONT+' '+contacto.APM_CONT)
                            $('#dni').val(contacto.DNI_CONT)
                            $('#fenac').val(contacto.FENAC_CONT)
                            $('#correo').val(contacto.EMAIL_CONT)
                            $('#telefono').val(contacto.TEL_CONT)
                        }
                        $('#modalFormPay').modal('show');        
                    }
                },
                error: function() {
                    alert("Error al registrar el contacto");
                }
            });
    }
 </script>