<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	
// --------------------------------------------------------
	Route::group(['middleware' => 'web'], function () {
	   
// -----Vista principal
	    Route::get('/', function () {
	    if(Auth::check()){return Redirect::to('member');}
    	return view('welcome2');
		});

// -----Autenticación
	    Route::auth();

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> A D M I N I S T R A D O R
		Route::group(['prefix' => 'admin', 'middleware' => ['auth','AdminMw']],function(){
			

			// --------------> Home <------------	
			Route::get('/', ['as' => 'admin.index', function () {
			return view('admin.welcome');
			}]);
			
			// --------------> Users <---------------
			
			Route::resource('users','UsersController');
			Route::get('countUsers',[
				'uses' => 'UsersController@countUsers',
				'as'   => 'admin.countUsers'
				]);

			// --------------> Cursos <---------------
			
			Route::resource('cursos','CursosController');
			Route::get('cursos/{cursos}/destroy',[
				'uses' => 'CursosController@destroy',
				'as'   => 'admin.cursos.destroy'
				]);

			Route::get('request/cursos', 
			['as' => 'admin.request.cursos', 
			'uses' => 'CursosController@requestCursos'
			]);

			Route::get('countCursos',[
				'uses' => 'CursosController@countCursos',
				'as'   => 'admin.countCursos'
				]);

			// --------------> Lecciones <---------------
			Route::get('countLecciones',[
					'uses' => 'LeccionesController@countLecciones',
					'as'   => 'admin.countLecciones'
					]);
			
			Route::group(['prefix' => 'cursos'], function(){

					Route::resource('lecciones','LeccionesController');
					Route::get('lecciones/{curso}/create',[
						'uses' => 'LeccionesController@create',
						'as'   => 'admin.cursos.lecciones.create'
						]);

					Route::get('open/{slug}', 
						['as' => 'admin.cursos.lecciones.showLesson', 
						'uses' => 'LeccionesController@showLesson']);

					Route::get('event/{evento}', 
						['as' => 'admin.cursos.lecciones.videoEvent', 
						'uses' => 'LeccionesController@videoEvent']);

					//indexLesson

					Route::get('leccion/{leccion}/destroy',[
					'uses' => 'LeccionesController@destroy',
					'as'   => 'admin.cursos.lecciones.destroy'
					]);

					


		    // --------------> Evaluación <---------------
					Route::resource('lecciones/evaluaciones','EvaluacionesController');

					Route::post('evaluaciones/save/{evaluacion}', 
						['as' => 'admin.cursos.evaluaciones.saveEvaluacion', 
						'uses' => 'EvaluacionesController@saveEvaluacion']);

					Route::get('evaluaciones/all', 
						['as' => 'admin.cursos.evaluaciones.all', 
						'uses' => 'EvaluacionesController@index']);
					
			// --------------> Preguntas <---------------
					Route::resource('lecciones/evaluaciones/preguntas','PreguntasController');
			// --------------> Opciones <---------------
					Route::resource('lecciones/evaluaciones/preguntas/opciones','OpcionesController');
					});//Acaba grupo de Cursos

			// --------------> Perfil <--------------

					Route::get('perfil/{slug}', 
					['as' => 'admin.perfil.show', 
					'uses' => 'UsersController@showPerfil'
					]);

				// --------------> Progreso <--------------

					Route::get('progreso', 
					['as' => 'admin.progreso.index', 
					'uses' => 'ProgresoController@index'
					]);
					Route::get('progreso/leccionProgreso', 
					['as' => 'admin.progreso.leccionProgreso', 
					'uses' => 'ProgresoController@leccionProgreso'
					]);
					Route::get('progreso/evaluacionProgreso', 
					['as' => 'admin.progreso.evaluacionProgreso', 
					'uses' => 'ProgresoController@evaluacionProgreso'
					]);


			// --------------> Configuración <--------
			Route::get('configuracion', 
			['as' => 'admin.configuracion.index', 
			'uses' => 'UsersController@indexConfiguracion'
			]);
			Route::post('configuracion/validacion', 
			['as' => 'admin.configuracion.validacion', 
			'uses' => 'UsersController@passwordValidacion'
			]);
			Route::put('configuracion',
			['as' => 'admin.configuracion.update',
			'uses' => 'UsersController@updateConfiguracion'
			]);

			// ----------------> Comentarios <-----------

			Route::resource('comentarios','ComentariosController');
			Route::get('comentarios/{comentarios}/destroy',[
				'uses' => 'ComentariosController@destroy',
				'as'   => 'admin.comentarios.destroy'
				]);
			Route::get('countComentarios',[
				'uses' => 'ComentariosController@countComentarios',
				'as'   => 'admin.countComentarios'
				]);

			// --------------> Ayuda <--------
			Route::get('ayuda', 
			['as' => 'admin.ayuda.index', 
			'uses' => 'AyudaController@index'
			]);

		});

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> M E M B E R S

		Route::group(['prefix' => 'member', 'middleware' => ['auth','MemberMw']],function(){
		
			// --------------> Home <------------	
			Route::get('/', ['as' => 'member.index', function () {
			return view('member.welcome');
			}]);

			// --------------> Cursos <---------------
			
			Route::get('cursos', 
			['as' => 'member.cursos.index', 
			'uses' => 'CursosController@index'
			]);

			Route::get('request/cursos', //El nav desea consultar los cursos
			['as' => 'member.request.cursos', 
			'uses' => 'CursosController@requestCursos'
			]);

			// --------------> Lecciones <---------------
			Route::get('countLecciones',[
					'uses' => 'LeccionesController@countLecciones',
					'as'   => 'member.comentarios.countLecciones'
					]);
			
			Route::group(['prefix' => 'cursos'], function(){

					Route::resource('lecciones','LeccionesController');
					Route::get('lecciones/{curso}/create',[
						'uses' => 'LeccionesController@create',
						'as'   => 'member.cursos.lecciones.create'
						]);

					Route::get('open/{slug}', 
						['as' => 'member.cursos.lecciones.showLesson', 
						'uses' => 'LeccionesController@showLesson']);

					Route::get('event/{evento}', 
						['as' => 'member.cursos.lecciones.videoEvent', 
						'uses' => 'LeccionesController@videoEvent']);

					//indexLesson

					Route::get('leccion/{leccion}/destroy',[
					'uses' => 'LeccionesController@destroy',
					'as'   => 'member.cursos.lecciones.destroy'
					]);

					


		    // --------------> Evaluación <---------------
					Route::post('evaluaciones/save/{evaluacion}', 
						['as' => 'member.cursos.evaluaciones.saveEvaluacion', 
						'uses' => 'EvaluacionesController@saveEvaluacion']);
					
			// --------------> Preguntas <---------------
					Route::resource('lecciones/evaluaciones/preguntas','PreguntasController');

			// --------------> Opciones <---------------
					Route::resource('lecciones/evaluaciones/preguntas/opciones','OpcionesController');

			// --------------> Lecciones <---------------
					Route::get('event/{evento}', 
						['as' => 'member.cursos.lecciones.videoEvent', 
						'uses' => 'LeccionesController@videoEvent']);

					}); //------ \\\\\----Acaba grupo de Cursos

			// --------------> Perfil <--------------

					Route::get('perfil/{slug}', 
					['as' => 'member.perfil.show', 
					'uses' => 'UsersController@showPerfil'
					]);

			// --------------> Progreso <--------------

					Route::get('progreso', 
					['as' => 'member.progreso.index', 
					'uses' => 'ProgresoController@index'
					]);
					Route::get('progreso/leccionProgreso', 
					['as' => 'member.progreso.leccionProgreso', 
					'uses' => 'ProgresoController@leccionProgreso'
					]);
					Route::get('progreso/evaluacionProgreso', 
					['as' => 'member.progreso.evaluacionProgreso', 
					'uses' => 'ProgresoController@evaluacionProgreso'
					]);



			// --------------> Configuración <--------
			Route::get('configuracion', 
			['as' => 'member.configuracion.index', 
			'uses' => 'UsersController@indexConfiguracion'
			]);
			Route::post('configuracion/validacion', 
			['as' => 'member.configuracion.validacion', 
			'uses' => 'UsersController@passwordValidacion'
			]);
			Route::put('configuracion',
			['as' => 'member.configuracion.update',
			'uses' => 'UsersController@updateConfiguracion'
			]);

			// ----------------> Comentarios <-----------

			Route::resource('comentarios','ComentariosController');
			Route::get('comentarios/{comentarios}/destroy',[
				'uses' => 'ComentariosController@destroy',
				'as'   => 'member.comentarios.destroy'
				]);
			Route::get('countComentarios',[
				'uses' => 'ComentariosController@countComentarios',
				'as'   => 'member.comentarios.countComentarios'
				]);

			// --------------> Ayuda <--------
			Route::get('ayuda', 
			['as' => 'member.ayuda.index', 
			'uses' => 'AyudaController@index'
			]);

		
		});

	    
	});

// --------------------------------------------------------

	



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/











	/*Route::group(['middleware' => 'web'], function () {
	    
			Route::get('login', [
			'uses'	=> 'Auth\AuthController@showLoginForm',
			'as'	=> 'auth.login'
			]);

			Route::post('login', [
			'uses'	=> 'Auth\AuthController@login',
			'as'	=> 'auth.login'
			]);

			Route::get('logout', [
			'uses'	=> 'Auth\AuthController@logout',
			'as'	=> 'auth.logout'
			]);

	   
	});*/

