

function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#img_prev5')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes5').css("display", "block");
    }

    $('.select-genero6').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 4 Generos',
      max_selected_options: 4,
      search_contains: true,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    }); 

    $('.select-actor6').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 15 Actores',
      max_selected_options: 15,
      search_contains: true,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

    $('.select-director6').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 3 Directores',
      max_selected_options: 3,
      search_contains: true,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

    



$("#btn_si3").click(function(){    
    var id_serie = $("#id_serie").val();    
    eliminarSerie(id_serie);     
}); 

function eliminarSerie(serie_id){

  var route = "http://localhost:8000/admin/series/"+ serie_id +"";
  var token = $("#tokendeleteserie").val();
      
        $.ajax({
          url:route,
          headers: {'X-CSRF-TOKEN': token},
          dataType:'json',      
          type:'DELETE',     
          success:function(response){    
            $('#modal_delete').modal('hide');
            location.href="http://localhost:8000/admin/series";
          }
      });    
}



