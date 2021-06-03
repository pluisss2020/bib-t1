$(document).ready(function(){
 
// Login Ajax:
// Php mysql Ajax,
// Copyright 2015 bloguero-ec.
// Usese cómo mas le convenga no elimine estas líneas (http://www.bloguero-ec.com)
 
// tiempo de el slide en segundos  
    var timeSlide = 1000;
//posicionamos el puntero en el campo de usuario
    $('#login_username').focus();
//posicionamos el tiempo de ajax en cero
    $('#timer').hide(0);
//por el momento no mostramos el ajax
    $('#timer').css('display','none');
//damos clic en boton inicio de sesion
    $('#login_userbttn').click(function(){
//posicionamos el ajax de cero a 300 en fade
        $('#timer').fadeIn(300);
//mostramos las clases creadas dentro del css para mostrar los mensajes
        $('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
//configuramos y creamos la condicion
        setTimeout(function(){
            if ( $('#login_username').val() != "" && $('#login_userpass').val() != "" ){
                 
                $.ajax({
                    type: 'POST',
                    url: 'log.inout.ajax.php',
                    data: 'login_username=' + $('#login_username').val() + '&login_userpass=' + $('#login_userpass').val(),
                     
//si la sesion se inicia correctamente presentamos el mensaje
                    success:function(msj){
                        if ( msj == 1 ){
						//if ( msj == 'administrador' ){
                            $('#alertBoxes').html('<div class="box-success"></div>');
                            $('.box-success').hide(0).html('Espera un momento…');
                            $('.box-success').slideDown(timeSlide);
                            setTimeout(function(){
                                window.location.href = ".";
                            },(timeSlide + 500));
							
                        }
                         
//caso contrario los datos son incorrectos
                        else{
                            $('#alertBoxes').html('<div class="box-error"></div>');
                            $('.box-error').hide(0).html('Lo sentimos, pero los datos son incorrectos: ' + msj);
                            $('.box-error').slideDown(timeSlide);
							
                        }
                        $('#timer').fadeOut(300);
                    },
//si se pierden los datos presentamos error de ejecucion.
                    error:function(){
                        $('#timer').fadeOut(300);
                        $('#alertBoxes').html('<div class="box-error"></div>');
                        $('.box-error').hide(0).html('Ha ocurrido un error durante la ejecución');
                        $('.box-error').slideDown(timeSlide);
                    }
                });
                 
            }
             
//caso cantrario si los campos estan vacios debemos llenarlos
            else{
                $('#alertBoxes').html('<div class="box-error"></div>');
                $('.box-error').hide(0).html('Los campos estan vacios');
                $('.box-error').slideDown(timeSlide);
                $('#timer').fadeOut(300);
            }
        },timeSlide);
         
        return false;
         
    });
     
     
//funcion para destruir la sesion iniciada 
    $('#sessionKiller').click(function(){
        $('#timer').fadeIn(300);
        $('#alertBoxes').html('<div class="box-success"></div>');
        $('.box-success').hide(0).html('Espera un momento');
        $('.box-success').slideDown(timeSlide);
        setTimeout(function(){
            window.location.href = "logout.php";
        },2500);
    });
     

//REGISTRO
$('#rec_userbttn').click(function(){
//posicionamos el ajax de cero a 300 en fade
        $('#timer').fadeIn(300);
//mostramos las clases creadas dentro del css para mostrar los mensajes
        $('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
//configuramos y creamos la condicion
        setTimeout(function(){
            if ( $('#rec_username').val() != "" && $('#rec_userpass').val() != "" && $('#rec_userpass').val() == $('#rec_userpass_1').val() && $('#rec_email').val() != "" ){
                 
                $.ajax({
                    type: 'POST',
                    url: 'log.inout.ajax.php',
                    data: 'rec_username=' + $('#rec_username').val() + '&rec_userpass=' + $('#rec_userpass').val() + '&rec_email=' + $('#rec_email').val(),
                     
//si la sesion se inicia correctamente presentamos el mensaje
                    success:function(msj){
                        if ( msj == 1 ){
						    $('#alertBoxes').html('<div class="box-success"></div>');
                            $('.box-success').hide(0).html('Espera un momento…');
                            $('.box-success').slideDown(timeSlide);
                            setTimeout(function(){
                                window.location.href = ".";
                            },(timeSlide + 500));
							
                        }
                         
//caso contrario los datos son incorrectos
                        else{
                            $('#alertBoxes').html('<div class="box-error"></div>');
                            $('.box-error').hide(0).html('Lo sentimos, pero los datos son incorrectos: ' + msj);
                            $('.box-error').slideDown(timeSlide);
							
                        }
                        $('#timer').fadeOut(300);
                    },
//si se pierden los datos presentamos error de ejecucion.
                    error:function(){
                        $('#timer').fadeOut(300);
                        $('#alertBoxes').html('<div class="box-error"></div>');
                        $('.box-error').hide(0).html('Ha ocurrido un error durante la ejecución');
                        $('.box-error').slideDown(timeSlide);
                    }
                });
                 
            }
             
//caso cantrario si los campos estan vacios debemos llenarlos
            else{
                $('#alertBoxes').html('<div class="box-error"></div>');
                $('.box-error').hide(0).html('Los campos estan vacios o Faltan Datos');
                $('.box-error').slideDown(timeSlide);
                $('#timer').fadeOut(300);
            }
        },timeSlide);
         
        return false;
         
    });
     
    
	 
	 });