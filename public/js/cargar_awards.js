


function load_awards(director_id){  
  
  var route = "http://localhost:8000/admin/awards2";
  var token = $("#tokenawards").val();

  $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{id:director_id},
      success:function(response){   
      $(".remove").remove();          
      var awards = response.mensaje;      
        for (var i = 0; i < awards.length; i++) {          
           $("#list_awards").append('<tr class="remove"><td>' + awards[i]["id"] + '</td><td>' + awards[i]["nombre_premio"] + '</td><td>' + awards[i]["year_premio"] + '</td><td>' + awards[i]["resultado"] + '</td><td>' + awards[i]["tipo"] + '</td><td>' + awards[i]["nombre_pelioserie_premiada"] + '</td><td><a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_decision" data-idaward="'+ awards[i]["id"] +'" data-iddire="'+ director_id +'" data-nombrepremio="' + awards[i]["nombre_premio"] + '"><i class="fa fa-trash-o"> Eliminar</i></button></a></td></tr>');
        }
      },
    });
}


function eliminarAward(id_award,director_id){

  var route = "http://localhost:8000/admin/awards/"+ id_award +"";
  var token = $("#tokendeleteaward").val();
      
        $.ajax({
          url:route,
          headers: {'X-CSRF-TOKEN': token},
          dataType:'json',      
          type:'DELETE',     
          success:function(response){               
            load_awards(director_id);
            $('#modal_decision').modal('hide');
          }
      });    
}


function load_filmo(director_id){  
  
  var route = "http://localhost:8000/admin/filmografia2";
  var token = $("#tokenfilmo").val();

  $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': token},
      dataType:'json',      
      type:'POST',     
      data:{id:director_id},
      success:function(response){   
      $(".remove2").remove();          
      var filmogra = response.mensaje;      
        for (var i = 0; i < filmogra.length; i++) {          
           $("#list_filmogra").append('<tr class="remove2"><td>' + filmogra[i]["id"] + '</td><td>' + filmogra[i]["nombre_pelicula"] + '</td><td>' + filmogra[i]["year_pelicula"] + '</td><td><a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_decision2" data-idfilmo="'+ filmogra[i]["id"] +'" data-iddire2="'+ director_id +'" data-nombrefilmo="' + filmogra[i]["nombre_pelicula"] + '"><i class="fa fa-trash-o"> Eliminar</i></button></a></td></tr>');
        }
      },
    });
}

function eliminarFilmo(id_filmo,director_id){

  var route = "http://localhost:8000/admin/filmografia/"+ id_filmo +"";
  var token = $("#tokendeletefilmo").val();
      
        $.ajax({
          url:route,
          headers: {'X-CSRF-TOKEN': token},
          dataType:'json',      
          type:'DELETE',     
          success:function(response){               
            load_filmo(director_id);
            $('#modal_decision2').modal('hide');
          }
      });    
}
