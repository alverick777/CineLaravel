
$('#exampleModal').on('show.bs.modal', function (event) {
		  var modal = $(this);
		  var button = $(event.relatedTarget);
		  var guion = button.data('guion');
		  var musica = button.data('musica');
		  var produccion = button.data('produccion');
		  var distribuidora = button.data('distribuidora');
		  var rating = button.data('rating');
		  var oscar = button.data('oscar');
		  var sinopsis = button.data('sinopsis');
 		  var objeto_peli_dire = button.data('pelisdire');
 		  var objeto_peli_cast = button.data('peliscast'); 	
 		  var objeto_peli_genres = button.data('pelisgenres');

 		  var name_peli = button.data('name');
 		  
 		  modal.find('#name_peli').text(name_peli);

 		  /* mostrar directores de la pelicula */	  
 		  $(".remove").remove();    
 		  for (var i = 0; i < objeto_peli_dire.length; i++) {	 		  	
		 		dire = objeto_peli_dire[i]["nombre"] + ", ";

		 		if(i == (objeto_peli_dire.length - 1)){
	 		 		$("#dir").append("<span class='remove'> " + dire.slice(0, -2) + " </span>");
		 		} else{
	 		 		$("#dir").append("<span class='remove'> " + dire + " </span>");
		 		}
 		  }	

 		  /* FIN MOSTRAR DIRECTORES */

 		   /* mostrar Actores de la pelicula */	  
 		  $(".remove2").remove();    
 		  for (var i = 0; i < objeto_peli_cast.length; i++) {	 		  	
		 		cast = objeto_peli_cast[i]["nombre"] + ", ";

		 		if(i == (objeto_peli_cast.length - 1)){
	 		 		$("#cast666").append("<span class='remove2'> " + cast.slice(0, -2) + " </span>");
		 		} else{
	 		 		$("#cast666").append("<span class='remove2'> " + cast + " </span>");
		 		}
 		  }	

 		  /* FIN MOSTRAR Actores */

 		     /* mostrar Actores de la pelicula */	  
 		  $(".remove3").remove();    
 		  for (var i = 0; i < objeto_peli_genres.length; i++) {	 		  	
		 		genre = objeto_peli_genres[i]["genero"] + ", ";

		 		if(i == (objeto_peli_genres.length - 1)){
	 		 		$("#genre666").append("<span class='remove3'> " + genre.slice(0, -2) + " </span>");
		 		} else{
	 		 		$("#genre666").append("<span class='remove3'> " + genre + " </span>");
		 		}
 		  }	

 		  /* FIN MOSTRAR Actores */

		 
		  modal.find('#guion').text(guion);
		  modal.find('#musica').text(musica);
		  modal.find('#produccion').text(produccion);
		  modal.find('#distribuidora').text(distribuidora);
		  //modal.find('#rating').text(rating);

		  $(".remove_star").remove();
		  for (var i = 0; i < rating; i++) {
		  	$("#rating").append("<i class='fa fa-star remove_star'></i>");
		  };

		  modal.find('#info_data').text(rating+"/10");

		  modal.find('#oscar').text(oscar);
		  modal.find('#sinopsis').val(sinopsis);		  
});

$('.select-oscar').chosen({
      max_selected_options: 1,
      disable_search_threshold: 2,
      width: "12%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });


$('#trailerModal').on('show.bs.modal', function (event) {
	var modal = $(this);
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var titulo = button.data('titulo');

	modal.find('#movie_id').val(id);
	modal.find('#titulo_trailer').text("Add Trailer - "+titulo);
});

$('#candidatasModal').on('show.bs.modal', function (event) {
	var modal = $(this);
	var button = $(event.relatedTarget);
	var id = button.data('id');
	var titulo = button.data('titulo');

	modal.find('#movie_id2').val(id);
	modal.find('#titulo_pelicula').text("Add oscar candidates loose against - " +titulo);
});

