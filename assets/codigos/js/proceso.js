$(document).ready(function(){

	//RUTA DE NUESTRO PROYECTO... IMPORTANTE!!!! CAMBIARLO CUANDO SE CAMBIA DE CARPETA O SE PONE EN UN SERVIDOR ****
    var base_url ='http://localhost/sivep/';
       
  	//Funcion que captura cuando se cambia la seleccion del combo DEPARTAMENTO
	$("#a203a").change(function(event){  //Departamento

        
		//Capturamos ID del departamento seleccionado
       	var valor = $("#a203a option:selected").val();

        $("#a203b").html("<option>Seleccione...</option>"); //Limpiamos los combos para que no se sobrecargen los datos
        $("#a203c").html("<option>Seleccione...</option>");//Limpiamos los combos para que no se sobrecargen los datos

        //Consultamos a la BD via AJAX
        $.ajax({
                url: base_url+'ubigeo/cargar_provincia',
                type:'POST',
                dataType: 'json',
                data: { id : valor },
                success:function (data) {
                    
                    var datos = data.consulta_provincia;
                    for(i in datos){
                        $("#a203b").append("<option value="+datos[i].C_CODPROV+">"+datos[i].C_NOMUBIGEO+"</option>")
                    }
                }, 
                error:function (error) {
                    console.log('Error al obtener los datos');
                }
            });
            return false;                
	});


    //Funcion que captura cuando se cambia la seleccion del combo PROVINCIA
    $("#a203b").change(function(event){ //provincia

        //Capturamos ID del departamento seleccionado
        var id_dep = $("#a203a option:selected").val();
        var id_prov = $("#a203b option:selected").val();

        $("#a203c").html("<option>Seleccione...</option>");//Limpiamos los combos para que no se sobrecargen los datos

        $.ajax({
                url: base_url+'ubigeo/cargar_distrito',
                type:'POST',
                dataType: 'json',
                data: { id_dep : id_dep , id_prov : id_prov},
                success:function (data) {
                    
                    var datos = data.consulta_distrito;
                    for(i in datos){
                        $("#a203c").append("<option value="+datos[i].C_CODDIST+">"+datos[i].C_NOMUBIGEO+"</option>")
                    }
                }, 
                error:function (error) {
                    console.log('Error al obtener los datos');
                }
            });
            return false;                
    });
})
