

$("#btn_filmo_actor").click(function(){    
    load_filmo_actor($("#actores").val());
});   

$('#modal_filmography_actor').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#exampleModalLabel').text("Filmography - " + name + " - ");
  modal.find('#actor_id').val(id);
});

$("#btn_award_actor").click(function(){    
    load_awards_actor($("#actores2").val());
});   

$('#modal_award_actor').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#name_actor').text("Awards of - " + name + " - ");
  modal.find('#actor_id').val(id);
});




$('#modal_decision_actor').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);
  
  var name = button.data('nombrefilmoactor');

  var id_actor2 = button.data('idactor2');
  $("#id_actor2").val(id_actor2);
  var id_filmo = button.data('idfilmoactor');
  $("#id_filmo_actor").val(id_filmo);

  modal.find('#exampleModalLabel').text("Delete work "+name);  
});

$("#btn_si_actor").click(function(){
    var uno = $("#id_filmo_actor").val();
    var dos = $("#id_actor2").val();   
    eliminarFilmoActor(uno,dos);     
}); 



$('#modal_decision2').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);
  
  var name = button.data('nombrepremio');

  var id_actor3 = button.data('idactor');
  $("#id_actor3").val(id_actor3);
  var id_award3 = button.data('idaward');
  $("#id_award3").val(id_award3);

  modal.find('#exampleModalLabel').text("Delete award "+name);  
});

$("#btn_si2").click(function(){
    var uno = $("#id_award3").val();
    var dos = $("#id_actor3").val();   
    eliminarAward_actor(uno,dos);     
}); 
