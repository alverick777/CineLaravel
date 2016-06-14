setInterval("checkMsj()",3000);

function checkMsj(){

  var route = "http://localhost:8000/admin/messages2";
  var token = $("#tokengeneral").val();

    $.ajax({      
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',       
      success:function(response){      
        $('#num_mensajes').text(response.mensaje);           
      },
    });
}

$("#click_noleidos").click(function(){
	
	  var route = "http://localhost:8000/admin/messages3";
    var token = $("#tokenmensajes").val();

    $.ajax({      
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',       
      success:function(response){   

      	$(".lili").remove();
        for (var i = 0; i < response.mensajes.length; i++) {        	                    
	        $("#mensajes_noleidos").append('<li class="message-preview lili"><a href="#" onclick="marcar_leido('+response.ids[i]+');"> <input type="hidden"><div class="media"><span class="pull-left"><img class="media-object" src="http://localhost:8000/img/avatars/' + response.avatars[i] + '" alt=""></span><div class="media-body"><h5 class="media-heading"><strong>' + response.nombres[i] + '</strong></h5><p class="small text-muted"><i class="fa fa-clock-o"></i> ' + response.fechas[i] + ' </p><p>' + response.mensajes[i] + '</p></div></div></a></li>');
        };
        
      },
    });

});	 

function marcar_leido(id_mensaje){
  var route = "http://localhost:8000/admin/leido";
  var token = $("#tokenleido").val();  
  console.log(id_mensaje);

  $.ajax({      
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{id_mensaje:id_mensaje},  
      success:function(response){        
          console.log(response);
      },
    });

}
 