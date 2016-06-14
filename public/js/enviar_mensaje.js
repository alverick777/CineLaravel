
function send_message(user_id,user_sender){  
  var mensaje = $("#mensaje").val();  
  var route = "http://localhost:8000/admin/messages";
  var token = $("#token").val();

  $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{mensaje:mensaje,user_id:user_id,user_sender:user_sender},
      success:function(response){        
        $("#msj-success").fadeIn();
        $("#user_id").val('');
      },
    });
}



