$(document).ready(function(){

	//RUTA DE NUESTRO PROYECTO... IMPORTANTE!!!! CAMBIARLO CUANDO SE CAMBIA DE CARPETA O SE PONE EN UN SERVIDOR ****
    //****EN TU CASO ABIGAL CHA  JEJE MENTIRA ABI .. LO CAMBIAS CON TU PUERTO ;)PDT.. BORRA ESTA PARTE
  	var base_url ='http://localhost/salita_penal/index.php/';
    
  


  	//Funcion que captura cuando se cambia la seleccion del combo DEPARTAMENTO
	$("#departamento").change(function(event){ 

        
		//Capturamos ID del departamento seleccionado
       	var valor = $("#departamento option:selected").val();

        $("#provincia").find('option').remove(); //Limpiamos los combos para que no se sobrecargen los datos
        $("#distrito").find('option').remove();//Limpiamos los combos para que no se sobrecargen los datos

        //Consultamos a la BD via AJAX
        $.ajax({
                url: base_url+'ubigeo/cargar_provincia',
                type:'POST',
                dataType: 'json',
                data: { id : valor },
                success:function (data) {
                    
                    var datos = data.consulta_provincia;
                    for(i in datos){
                        $("#provincia").append("<option value="+datos[i].C_CODPROV+">"+datos[i].C_NOMUBIGEO+"</option>")
                    }
                }, 
                error:function (error) {
                    console.log('Error al obtener los datos');
                }
            });
            return false;                
	});


    //Funcion que captura cuando se cambia la seleccion del combo PROVINCIA
    $("#provincia").change(function(event){ 

        //Capturamos ID del departamento seleccionado
        var id_dep = $("#departamento option:selected").val();
        var id_prov = $("#provincia option:selected").val();

        $("#distrito").find('option').remove();//Limpiamos los combos para que no se sobrecargen los datos

        $.ajax({
                url: base_url+'ubigeo/cargar_distrito',
                type:'POST',
                dataType: 'json',
                data: { id_dep : id_dep , id_prov : id_prov},
                success:function (data) {
                    
                    var datos = data.consulta_distrito;
                    for(i in datos){
                        $("#distrito").append("<option value="+datos[i].C_CODDIST+">"+datos[i].C_NOMUBIGEO+"</option>")
                    }
                }, 
                error:function (error) {
                    console.log('Error al obtener los datos');
                }
            });
            return false;                
    });
})
