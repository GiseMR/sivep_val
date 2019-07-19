 <meta charset="utf-8">
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


 	$(function() {
		$('[data-toggle="popover"]').popover();
 		//NO TITULO
 		$(".table-label").hide();

 		//BOTON CARGAR ARCHIVO
 	

 		$(".grocery-crud-table").on('click', 'a.edit', function(e) {
 			e.preventDefault();
			var url = $(this).attr("href");
			var id = url.split("/").pop();
			window.location.replace("<?=base_url()?>contacto/edita/"+id);
 		});
		
		
 	});
 </script>