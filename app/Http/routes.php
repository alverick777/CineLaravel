<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* RUTA A LA PAGINA PRINCIPAL DEL PROJECTO */
// ********************************************

Route::get('/', [
	'as' => 'principal.index',
	'uses' => 'PrincipalController@index'
]);

Route::get('genres/{name}', [
	'as' => 'principal.filter',
	'uses' => 'PrincipalController@filter'
]);

Route::get('genres2/{name}', [
	'as' => 'principal.filterSeries',
	'uses' => 'PrincipalController@filterSeries'
]);

Route::get('peliculaporletra/{letra}', [
	'as' => 'principal.filterporletra',
	'uses' => 'PeliculasController@filterLetra'
]);

Route::get('seriesletra/{letra}', [
	'as' => 'principal.filterseriesporletra',
	'uses' => 'SeriesController@filterseriesporletra'
]);

Route::get('actoresletra/{letra}', [
	'as' => 'principal.filteractoresporletra',
	'uses' => 'ActoresController@filteractoresporletra'
]);

Route::get('directoresletra/{letra}', [
	'as' => 'principal.filterdirectorporletra',
	'uses' => 'DirectorController@filterdirectorporletra'
]);

Route::get('actoressexo/{sexo}', [
	'as' => 'principal.filterSexo',
	'uses' => 'ActoresController@filterSexo'
]);

Route::get('directorsexo/{sexo}', [
	'as' => 'principal.filterSexoDirector',
	'uses' => 'DirectorController@filterSexoDirector'
]);

/* //////////////////////////////////////////////// */

/* frefijo panel de administracion */

Route::group(['prefix' => 'admin'], function(){

	Route::get('/', ['as' => 'admin.index' ,function () {
    	return view('admin.index');
	}]);
	
	Route::get('perfil', [
		'uses' => 'PerfilController@index',
		'as' => 'admin.perfil'
	]);

	/* RUTAS PARA LA CREACION DE las noticias */
	Route::resource('noticias','NoticiasPrincipalController');
	Route::get('noticias/{id}/destroy', [
			'uses' => 'NoticiasPrincipalController@destroy',
			'as' => 'admin.noticias.destroy'
	]);

	Route::get('noticias_peliculas', [
			'uses' => 'NoticiasPrincipalController@noticias_peliculas',
			'as' => 'admin.noticias.noticias_peliculas'
	]);

	/* RUTAS PARA LA CREACION DE LAS NOTICIAS DE SERIES*/
	Route::resource('noticias2','NoticiasSeriesController');
	Route::get('noticias2/{id}/destroy', [
			'uses' => 'NoticiasSeriesController@destroy',
			'as' => 'admin.noticias2.destroy'
	]);

	Route::get('noticias_series', [
			'uses' => 'NoticiasPrincipalController@noticias_series',
			'as' => 'admin.noticias.noticias_series'
	]);

	// RUTAS PARA LA CREACION DE NOTICIAS DE ACTORES
	
	Route::resource('noticias3','NoticiasActoresController');
	Route::get('noticias3/{id}/destroy', [
			'uses' => 'NoticiasActoresController@destroy',
			'as' => 'admin.noticias3.destroy'
	]);

	Route::get('noticias_actores', [
			'uses' => 'NoticiasPrincipalController@noticias_actores',
			'as' => 'admin.noticias.noticias_actores'
	]);
	
	
	/* RUTAS PARA LA CREACION DE USUARIOS */
	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy', [
			'uses' => 'UsersController@destroy',
			'as' => 'admin.users.destroy'
	]);

	/* RUTAS PARA LA CREACION DE GENEROS */
	Route::resource('generos','GenerosController');
	Route::get('generos/{id}/destroy', [
			'uses' => 'GenerosController@destroy',
			'as' => 'admin.generos.destroy'
	]);	

	/* RUTAS PARA LA CREACION DE PELICULAS */
	Route::resource('peliculas','PeliculasController');
	Route::get('peliculas/{id}/destroy', [
			'uses' => 'PeliculasController@destroy',
			'as' => 'admin.peliculas.destroy'
	]);

	/* RUTAS PARA LA CREACION DE DIRECTORES */
	Route::resource('directores','DirectorController');
	Route::get('directores/{id}/destroy', [
			'uses' => 'DirectorController@destroy',
			'as' => 'admin.directores.destroy'
	]);

	/* RUTAS PARA LOS TRAILERS */
	Route::resource('trailers','TrailerController');
	Route::get('trailers/{id}/destroy', [
			'uses' => 'TrailerController@destroy',
			'as' => 'admin.trailer.destroy'
	]);

	Route::get('trailers/{id}/download', [
			'uses' => 'TrailerController@download',
			'as' => 'admin.trailer.download'
	]);

	/* RUTAS PARA LA CREACION DE Awards */
	Route::resource('awards','AwardsDirectorController');
	Route::resource('awards2','AwardsDirectorController@load');	

	/* RUTAS PARA LA CREACION DE filmofgrafia de directores */
	Route::resource('filmografia','FilmografiaDirectorController');
	Route::resource('filmografia2','FilmografiaDirectorController@load');	

	/* /////////////////////////////////////////////////////////////// */

	/* RUTAS PARA LA CREACION DE filmofgrafia de actores */
	Route::resource('filmografia_actor','FilmografiaActorController');
	Route::resource('filmografia_actor2','FilmografiaActorController@load');

	/* RUTA CREACION DE AWARD DE ACTORES */
	Route::resource('awardactor','AwardActorController');
	Route::resource('awardsactor2','AwardActorController@load');

	/* RUTAS PARA LA CREACION DE ACTORES */
	Route::resource('actores','ActoresController');	
	Route::get('actores/{id}/destroy', [
			'uses' => 'ActoresController@destroy',
			'as' => 'admin.actores.destroy'
	]);

	// IMAGENES DE CAPITULOS DE SERIES
	Route::resource('imagenescapitulos','ImagenesCapitulosController');

	// PELICULAS CON DATOS O POSTER PENDIENTES
	Route::get('pendientes', [
		'uses' => 'PeliculasController@pendientes',
		'as' => 'peliculas.pendientes'		
	]);

	Route::get('actorespendientes', [
		'uses' => 'ActoresController@actorespendientes',
		'as' => 'actores.actorespendientes'		
	]);

	Route::get('seriespendientes', [
		'uses' => 'SeriesController@seriespendientes',
		'as' => 'series.seriespendientes'		
	]);

	// INGRESO DE CANDIDATAS AL OSCAR QUE PERDIERON CON LA GANADORA
	Route::resource('candidates','CandidateController');

	// CAPITULOS DE SERIES
	Route::resource('capitulos','CapitulosSeriesController');
	Route::get('capitulos/{id}/loadCapitulos', [
			'uses' => 'CapitulosSeriesController@loadCapitulos',
			'as' => 'admin.capitulos.loadCapitulos'
	]);
	Route::get('capitulos/{id}/destroy', [
			'uses' => 'CapitulosSeriesController@destroy',
			'as' => 'admin.capitulos.destroy'
	]);
	
	Route::resource('puntuacion','CapitulosSeriesController@calc_Puntuacion');	

	// SERIES
	Route::resource('series','SeriesController');
	Route::resource('serie_puntuacion','SeriesController@calc_Puntuacion');

	// PELICULAS
	Route::resource('pelis_puntuacion','PeliculasController@calc_Puntuacion');
		

	/* RUTAS PARA LA CREACION DE mensajes */
	Route::resource('messages','MensajesController');	
	Route::resource('messages2','MensajesController@revisa_mensajes');	
	Route::resource('messages3','MensajesController@retorna_mensajes');	
	Route::resource('leido','MensajesController@marcar_leido');

});

/* FIN panel de administracion */


/*  ////////////////////// RUTAS PARA LAS PAGINAS DEL FRONTEND ///////////////////////////*/

	Route::get('frontend/peliculas', [
		'uses' => 'PeliculasController@indexFront',
		'as' => 'frontend.peliculas'		
	]);

	Route::get('frontend/actores', [
		'uses' => 'ActoresController@indexFront',
		'as' => 'frontend.actores'		
	]);

	Route::get('frontend/directores', [
		'uses' => 'DirectorController@indexFront',
		'as' => 'frontend.directores'		
	]);

	Route::get('frontend/oscars', [
		'uses' => 'OscarsController@indexFront',
		'as' => 'frontend.oscars'		
	]);

	Route::get('frontend/trailer', [
		'uses' => 'TrailerController@index',
		'as' => 'frontend.trailer'		
	]);

	Route::get('frontend/series', [
		'uses' => 'SeriesController@indexFrontSeries',
		'as' => 'frontend.series'		
	]);

	Route::get('frontend/noticias_peliculas', [
		'uses' => 'NoticiasPrincipalController@frontNoticias',
		'as' => 'frontend.noticias_peliculas'		
	]);

	Route::get('frontend/noticias_series', [
		'uses' => 'NoticiasSeriesController@frontNoticias',
		'as' => 'frontend.noticias_series'		
	]);

	Route::get('frontend/noticias_actores', [
		'uses' => 'NoticiasActoresController@frontNoticias',
		'as' => 'frontend.noticias_actores'		
	]);

	Route::get('frontend/noticia_pelicula_individual/{id}', [
		'uses' => 'NoticiasPrincipalController@noticia_pelicula_individual',
		'as' => 'frontend.noticia_pelicula_individual'		
	]);

	Route::get('frontend/noticia_serie_individual/{id}', [
		'uses' => 'NoticiasSeriesController@noticia_serie_individual',
		'as' => 'frontend.noticia_serie_individual'		
	]);

	Route::get('frontend/noticia_actor_individual/{id}', [
		'uses' => 'NoticiasActoresController@noticia_actor_individual',
		'as' => 'frontend.noticia_actor_individual'		
	]);

	Route::get('frontend/pelicula_individual/{id}', [
		'uses' => 'PeliculasController@individual',
		'as' => 'frontend.pelicula_individual'		
	]);

	Route::get('frontend/serie_individual/{id}', [
		'uses' => 'seriesController@individual',
		'as' => 'frontend.serie_individual'		
	]);

	Route::get('frontend/actores_individual/{id}', [
		'uses' => 'ActoresController@individual',
		'as' => 'frontend.actores_individual'		
	]);

	Route::get('frontend/directores_individual/{id}', [
		'uses' => 'DirectorController@individual',
		'as' => 'frontend.directores_individual'		
	]);

	Route::get('frontend/capitulo_indiv/{id}', [
		'uses' => 'CapitulosSeriesController@capi_indiv',
		'as' => 'frontend.capitulo_indiv'		
	]);
	
/* ////////////////////////////////////////////////////////////////////////////////////// */



/* RUTAS PARA EL LOGIN (GET Y POST) Y LOGOUT,  */
/* ///////////////////////////////////////////////////////// */

Route::get('admin/auth/login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'admin.auth.login'
]);

Route::post('admin/auth/login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'admin.auth.login'
]);

Route::get('admin/auth/logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'admin.auth.logout'
]);

/* FIN LOGIN LOGOUT */

/* Ruta para el formulario de contacto */
Route::get('contact', [
	'as' => 'contact',
	'uses' => 'ContactController@index'
]);
