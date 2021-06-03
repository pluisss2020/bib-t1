     
     $(document).ready(function(){
        var consulta;
        //hacemos focus al campo de búsqueda
        $("#txt_b_c").focus();

		
  
          $("#btn_b_c").click(function(e){
                                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#txt_b_c").val();
			  //alert (consulta);
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "busqueda_c.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#capa_L").html("<p align='center'><img src='images/ajax-loader.gif' /></p>");
					},
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#capa_L").empty();
                    $("#capa_L").append(data);                                                             
                    }
              });                                                                         
        });                                                     

	    
        //comprobamos si se pulsa una tecla
        $("#txt_b_c").keyup(function(e){
		  if (e.which != 13
                        )return;           
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#txt_b_c").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "busqueda_c.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#capa_L").html("<p align='center'><img src='images/ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#capa_L").empty();
                    $("#capa_L").append(data);                                                             
                    }
              });                                                                         
        });                                                     

 	  		
		});             
    
	
	
/*
$( "#tit_origen" ).autocomplete({
  
   source: "sugerir.php",
   minLength: 1,
   select: function(event,ui){
    
    }
   
});

*/
/*
$( "#tit_origen" ).autocomplete({
        source: function (request, response) {
        $.ajax({
        type: "POST",
        url:"sugerir.php",
        data: {tipo: 'origen'},
        success: response,
        dataType: "html",
        minLength: 2,
        delay: 100
            });
        }});	

$( "#tit_Area" ).autocomplete({
        source: function (request, response) {
        $.ajax({
        type: "POST",
        url:"sugerir.php",
        data: "tipo=area",
        success: response,
        dataType: "html",
        minLength: 2,
        delay: 50
            });
        }});	

$( "#tit_Materia" ).autocomplete({
        source: function (request, response) {
        $.ajax({
        type: "POST",
        url:"sugerir.php",
        data: "tipo=materia",
        success: response,
        dataType: "html",
        minLength: 2,
        delay: 10
            });
        }});		
   

 */ 
 function cargar(div,desde){
   $(div).load(desde);
   }  
   
function cargar_img(div,desde){
   var ruta="libros_d/"+desde;
   $.ajax({
        type: "POST",
        url: "ver_pdf.php",
        data: {archivo: ruta}
    }).done(function (html) {
        $(div).html(html);
    });
   } 

 
function editar(id) {
 		
    $.ajax({
        type: "POST",
        url: "edit_c.php",
        data: {operacion: 'edicion', id_cart: id}
    }).done(function (html) {
        $('#capa_d').html(html);
    });
}

function ver_info(id) {
 		
    $.ajax({
        type: "POST",
        url: "edit_c.php",
        data: {operacion: 'ver', id_cart: id}
    }).done(function (html) {
        $('#capa_d').html(html);
    });
}

function borrar(id) {
  
    $.ajax({
        type: "POST",
        url: "edit_c.php",
        data: {operacion: 'baja', id_cart: id}
    }).done(function (html) {
        $('#capa_d').html(html);
    });
}

function ver(id) {
    
		
    $.ajax({
        type: "POST",
        url: "edit_c.php",
        data: {operacion: 'edicion', id_cart: id}
    }).done(function (html) {
        $('#capa_d').html(html);
    });
}

function upload_image(id){//Funcion encargada de enviar el archivo via AJAX
                var msg=[".upload-msg",".upload-msg1"];
				var dest=["fileToUpload","fileToUpload1"];
				$(msg[id]).text('Cargando...');
				var inputFileImage = document.getElementById(dest[id]);
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append(dest[id],file);
				
				/*jQuery.each($('#fileToUpload')[0].files, function(i, file) {
					data.append('file'+i, file);
				});*/
							
				$.ajax({
					url: "subir_img_c.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$(msg[id]).html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove();
						});	}, 5000);
					}
				});
				
			}


/*
$( "#preview" ).click(function() {
  
  $("#capa_L").html('<div class="plantilla3"> <div style="background-image: url(images/cartelera/header.png);">        <header>            <h1>'+$("#tit_titulo").val()+'</h1>        </header>    </div>    <article> '+$("#aut_texto").val()+' </article>    <div id="cartel_imagen" class="row">        <div class="col-sm-4">'+$("#aut_texto1").val()+'</div>        <div class="col-sm-4"><img src="images/cartelera/'+$("#t_file").val()+'"></div>        <div class="col-sm-4">'+$("#aut_texto2").val()+'</div>    </div></div>');   
  
});
*/

function poner_cat(){
var opt=$("#sel_categoria option:selected").text();
//alert (opt);
$("#tit_categoria").val(opt);
 
}


function preview(datos){
   var shtml='<div class="plantilla'+$("#tit_Plantilla").val()+'">'+
             '<div style="background-image: url(images/cartelera/'+$("#t_file1").val()+');">'+
			 '<header>            <h1>'+$("#tit_titulo").val()+'</h1>        </header>    </div>';
			 
	      if($("#tit_link").val() != ''){
	        shtml=shtml+'<nav><a href="'+$("#tit_link").val()+'" target="_blank">'+$("#tit_titulo").val()+' en la web</a></nav>';
          }			
        
		shtml=shtml+'<article> '+$("#aut_texto").val()+' </article>';
		
		if($("#t_file").val() != '' && $("#aut_texto1").val() != '' && $("#aut_texto2").val()  != ''){
		shtml=shtml+'<div id="cartel_imagen" class="row">'+
			 '<div class="col-sm-4">'+$("#aut_texto1").val()+'</div>'+
			 '<div class="col-sm-4"><img src="images/cartelera/'+$("#t_file").val()+'">'+
			 '</div> <div class="col-sm-4">'+$("#aut_texto2").val()+'</div>'+
			 '</div>';
		}	 
		
		if($("#t_file").val() != '' && $("#aut_texto1").val() == '' && $("#aut_texto2").val()  == ''){
		shtml=shtml+'<div id="cartel_imagen" class="row">'+
			 '<div class="col-sm-2">'+ '  ' +'</div>'+
			 '<div class="col-sm-10"><img src="images/cartelera/'+$("#t_file").val()+'">'+
			 '</div>';
		}
		
		if($("#t_file").val() != '' && $("#aut_texto1").val() != '' && $("#aut_texto2").val()  == ''){
		shtml=shtml+'<div id="cartel_imagen" class="row">'+
			 '<div class="col-sm-6">'+$("#aut_texto1").val()+'</div>'+
			 '<div class="col-sm-6"><img src="images/cartelera/'+$("#t_file").val()+'">'+
			 '</div>';
		}	
		
		if($("#t_file").val() != '' && $("#aut_texto1").val() == '' && $("#aut_texto2").val()  != ''){
		shtml=shtml+'<div id="cartel_imagen" class="row">'+
			 '<div class="col-sm-6"><img src="images/cartelera/'+$("#t_file").val()+'">'+
			 '</div> <div class="col-sm-6">'+$("#aut_texto2").val()+'</div>'+
			 '</div>';
		}
		
		if($("#tit_fechaD").val() != '' || $("#tit_fechaH").val() != '' ){
		shtml=shtml+'<footer><h3>'+$("#tit_fechaD").val()+'  '+ $("#tit_fechaH").val() +'</h3></footer>';
		}
		
		shtml=shtml+'</div>';	 
   $('#capa_L').html(shtml);
}

function abrirPU(tit,tex){
        //alert ('CLick');
		$('#titulo_PU').html(tit);
		$('#texto_PU').html(tex);
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
    }
    
function cerrarPU(){
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    }