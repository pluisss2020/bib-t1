function cargar_txt(div,desde){
   
   var ruta="txts/" + desde;
   $.ajax({
        type: "POST",
        url: "ver_txt.php",
        data: {archivo: ruta}
    }).done(function (html) {
        $(div).html(html);
    });
   } 
   
   function cargar(div,desde)
   {
   $(div).load(desde);
   } 
   
 