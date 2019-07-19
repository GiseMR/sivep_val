 
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
                                        <input type="hidden" name="idvaluacion" id="idvaluacion">
                                        <input type="text" class="form-control" id="nombres" name="nombres" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="APELLIDOS" >Apellidos:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="DNI" >Dni:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="dni" name="dni" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="FENAC">Fecha Nacimiento:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fenac" name="fenac" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="CORREO" >Correo:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="correo" name="correo" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="TELEFONO" >Teléfono:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="telefono" name="telefono" readonly>
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
                                    <input type="text" class="form-control" id="costo" name="costo" readonly>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                    <hr>
                            </div>
                            <h5 class="card-title">Registro de Pagos</h5>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="monto">Pago S/.</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="monto" name="monto" >
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <label for="FECHA" >Fecha:</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-2">
                                    <br>
                                     <button type="button" class="btn btn-success" onclick="registerpay()"><i class="mdi mdi-check"></i>Agregar</button>
                                </div>
                            </div>
                            <div class="row">                         
                                <div class="col-sm-12">
                                    <label for="descripcion" >Descripción:</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="content-result-pay" class="row">
                            </div>    
                
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="mdi mdi-close"></i>Cerrar</button>
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


 	 function openPay(idvaluacion, idcontacto, costo) {
                $("#nombres").val('');
                $('#apellidos').val('');
                $('#dni').val('');
                $('#fenac').val('');
                $('#correo').val('');
                $('#telefono').val('');
                $('#idvaluacion').val('');
                $('#costo').val('');

            $.ajax({
                type: "post",
                url: " <?php echo base_url(); ?>pago/getdata",
                data: { idvaluacion: idvaluacion, idcontacto:idcontacto },
                success: function(response) {
                    let data = JSON.parse(response);
                    if (data) {
                        data.contacto;
                        if(data.contacto){
                            clearFields();
                            const contacto= data.contacto;
                            $("#nombres").val(contacto.NOM_CONT);
                            $('#apellidos').val(contacto.APP_CONT+' '+contacto.APM_CONT)
                            $('#dni').val(contacto.DNI_CONT)
                            $('#fenac').val(contacto.FENAC_CONT)
                            $('#correo').val(contacto.EMAIL_CONT)
                            $('#telefono').val(contacto.TEL_CONT)
                            $('#idvaluacion').val(idvaluacion);
                            $('#costo').val(costo);
                        }
                        loadResultPayments(idvaluacion);
                        $('#modalFormPay').modal('show');
                    }
                },
                error: function() {
                    alert("Error al registrar el contacto");
                }
            });
    }

    function loadResultPayments(idvaluacion){
        $.ajax({
                type: "GET",
                url: " <?php echo base_url(); ?>pago/getdataresult/"+idvaluacion,
                success: function(response) {
                    if (response) {
                        $('#content-result-pay').text('')
                        $("#content-result-pay").append(response);
                    }
                },
                error: function() {
                    alert("Error al registrar el contacto");
                }
            });
    }

    function registerpay(){
        
        $.ajax({
                type: "post",
                url: " <?php echo base_url(); ?>pago/registrar",
                data: { 
                        idvaluacion: $('#idvaluacion').val(),
                        monto: $("#monto").val(),
                        registro: $("#fecha").val(),
                        persona: $("#nombres").val(),
                        COD_USU: '<?php  if (isset($this->session->userdata['logged_in'])) { echo $this->session->userdata['nombres'];} ?>',
                        descripcion: $('#descripcion').val()
                    },
                success: function(response) {
                    if (response) {
                        loadResultPayments($('#idvaluacion').val());
                        clearFields();
                    }
                },
                error: function() {
                    alert("Error al registrar el contacto");
                }
            });
    }

    function clearFields(){
        $("#monto").val('');
        $("#fecha").val('');
        $('#descripcion').val('');
    }
 </script>