


function load_filmo_actor(actor_id){  
  
  var route = "http://localhost:8000/admin/filmografia_actor2";
  var token = $("#tokenfilmo_actor").val();

  $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{id:actor_id},
      success:function(response){   
      $(".remove6").remove();          
      var filmogra = response.mensaje;
      console.log(filmogra);      
        for (var i = 0; i < filmogra.length; i++) {          
           $("#list_filmogra_actor").append('<tr class="remove6"><td>' + filmogra[i]["id"] + '</td><td>' + filmogra[i]["name_peli_o_serie"] + '</td><td>' + filmogra[i]["year_peli_o_serie"] + '</td><td>' + filmogra[i]["nombre_personaje"] + '</td><td><a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_decision_actor" data-idfilmoactor="'+ filmogra[i]["id"] +'" data-idactor2="'+ actor_id +'" data-nombrefilmoactor="' + filmogra[i]["name_peli_o_serie"] + '"><i class="fa fa-trash-o"> Eliminar</i></button></a></td></tr>');
        }
      },
    });
}

function eliminarFilmoActor(id_filmo,actor_id){

  var route = "http://localhost:8000/admin/filmografia_actor/"+ id_filmo +"";
  var token = $("#tokendeletefilmoactor").val();
      
        $.ajax({
          url:route,
          headers: {'X-CSRF-TOKEN': token},
          dataType:'json',      
          type:'DELETE',     
          success:function(response){               
            load_filmo_actor(actor_id);
            $('#modal_decision_actor').modal('hide');
          }
      });    
}


function load_awards_actor(actor_id){  
  
  var route = "http://localhost:8000/admin/awardsactor2";
  var token = $("#tokenaward_actor").val();

  $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{id:actor_id},
      success:function(response){   
      $(".remove").remove();          
      var awards = response.mensaje;      
        for (var i = 0; i < awards.length; i++) {          
           $("#list_award_actor").append('<tr class="remove"><td>' + awards[i]["id"] + '</td><td>' + awards[i]["nombre_premio"] + '</td><td>' + awards[i]["year_premio"] + '</td><td>' + awards[i]["resultado"] + '</td><td>' + awards[i]["tipo"] + '</td><td>' + awards[i]["nombre_pelioserie_premiada"] + '</td><td><a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_decision2" data-idaward="'+ awards[i]["id"] +'" data-idactor="'+ actor_id +'" data-nombrepremio="' + awards[i]["nombre_premio"] + '"><i class="fa fa-trash-o"> Eliminar</i></button></a></td></tr>');
        }
      },
    });
}


function eliminarAward_actor(id_award,actor_id){

  var route = "http://localhost:8000/admin/awardactor/"+ id_award +"";
  var token = $("#tokendeleteawardactor").val();
      
        $.ajax({
          url:route,
          headers: {'X-CSRF-TOKEN': token},
          dataType:'json',      
          type:'DELETE',     
          success:function(response){               
            load_awards_actor(actor_id);
            $('#modal_decision2').modal('hide');
          }
      });    
}