


$("#btn_awards").click(function(){
    load_awards($("#dires").val());
    load_filmo($("#dires").val());
});    



// funcion para preview de la imagen a subir
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#img_prev3')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes3').css("display", "block");
    }


    $('.select-dires').chosen({
      placeholder_text_multiple: 'Seleccione un director',
      max_selected_options: 1,
      disable_search_threshold: 1,
      width: "30%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

    $('.select-res').chosen({
      max_selected_options: 1,
      disable_search_threshold: 2,
      width: "30%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

    $('.select-tipo').chosen({
      max_selected_options: 1,
      disable_search_threshold: 20,
      width: "30%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });  

// codigo para trumbowyg del text area de la biografia
$('.textarea-biografia').trumbowyg();

$('#modal_award').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#exampleModalLabel').text("Awards - " + name + " - ");
  modal.find('#id_director').val(id);  
});

$('#modal_filmography').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#exampleModalLabel').text("Filmography - " + name + " - ");
  modal.find('#id_director2').val(id);
});


/* modal para eliminar award */
$('#modal_decision').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);
  
  var name = button.data('nombrepremio');

  var id_dire = button.data('iddire');
  $("#id_dire").val(id_dire);
  var id_award = button.data('idaward');
  $("#id_award").val(id_award);

  modal.find('#exampleModalLabel').text("Delete award "+name);  
});

$("#btn_si").click(function(){
    var uno = $("#id_award").val();
    var dos = $("#id_dire").val();    
    eliminarAward(uno,dos);     
}); 

/* modal para eliminar filmografia */

$('#modal_decision2').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);
  
  var name = button.data('nombrefilmo');

  var id_dire2 = button.data('iddire2');
  $("#id_dire2").val(id_dire2);
  var id_filmo = button.data('idfilmo');
  $("#id_filmo").val(id_filmo);

  modal.find('#exampleModalLabel').text("Delete movie "+name);  
});

$("#btn_si2").click(function(){
    var uno = $("#id_filmo").val();
    var dos = $("#id_dire2").val();   
    eliminarFilmo(uno,dos);     
}); 

