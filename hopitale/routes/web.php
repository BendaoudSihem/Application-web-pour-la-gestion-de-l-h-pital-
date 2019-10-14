<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');


Route::get('Examens','ExamenController@index');
Route::post('Examens/creat','ExamenController@creat');
Route::post('Examens/{id}/edit','ExamenController@update')->where(['id'=>'[0-9]+']);
Route::delete('Examens/{id}','ExamenController@delete')->where(['id'=>'[0-9]+']);
Route::get('Chambres','ExamenController@view');
Route::post('Chambres/creat','ExamenController@store');
Route::post('Chambres/{id}','ExamenController@edit')->where(['id'=>'[0-9]+']);
Route::delete('Chambres/{id}','ExamenController@supprimer')->where(['id'=>'[0-9]+']);


Route::get('Medecin/create','ControllerMedcins@create');
Route::post('Medecin','ControllerMedcins@store');
Route::get('Medecins/{id}','ControllerMedcins@afficher')->where(['id'=>'[0-9]+']);
Route::get('Medecin/{id}','ControllerMedcins@index')->where(['id'=>'[0-9]+']);
Route::get('Medecin/{id}/edit','ControllerMedcins@edit')->where(['id'=>'[0-9]+']);
Route::post('Medecin/{id}','ControllerMedcins@update')->where(['id'=>'[0-9]+']);
Route::delete('Medecin/{id}','ControllerMedcins@destroy')->where(['id'=>'[0-9]+']);
Route::post('Rechercher/Medecin','ControllerMedcins@rechercher');
Route::get('Rechercher/Medecin/{motCle}/{id}','ControllerMedcins@rechercher1')->where(['motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::get('Patient/create','PatientController@create');
Route::get('Patients/{id}','PatientController@afficher')->where(['id'=>'[0-9]+']);
Route::delete('Patient/{id}','PatientController@destroy')->where(['id'=>'[0-9]+']);
Route::post('Patient','PatientController@store');
Route::get('Patient/{id}','PatientController@index')->where(['id'=>'[0-9]+']);
Route::get('Patient/{id}/edit','PatientController@edit')->where(['id'=>'[0-9]+']);
Route::post('Patient/{id}','PatientController@index')->where(['id'=>'[0-9]+']);
Route::post('Patient/{id}/edit','PatientController@update')->where(['id'=>'[0-9]+']);
Route::post('Rechercher/Patient','PatientController@rechercher');
Route::get('Rechercher/Patient/{motCle}/{id}','PatientController@rechercher1')->where(['motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::get('Secretaire/create','SecretaireController@create');
Route::get('Secretaires/{id}','SecretaireController@afficher')->where(['id'=>'[0-9]+']);
Route::delete('Secretaire/{id}','SecretaireController@destroy')->where(['id'=>'[0-9]+']);
Route::post('Secretaire','SecretaireController@store');
Route::get('Secretaire/{id}','SecretaireController@index')->where(['id'=>'[0-9]+']);
Route::get('Secretaire/{id}/edit','SecretaireController@edit')->where(['id'=>'[0-9]+']);
Route::post('Secretaire/{id}','SecretaireController@update')->where(['id'=>'[0-9]+']);
Route::post('Rechercher/Secretaire','SecretaireController@rechercher');
Route::get('Rechercher/Secretaire/{motCle}/{id}','SecretaireController@rechercher1')->where(['motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('home', 'HomeController@view');
Route::post('home/edit','HomeController@update');
Route::get('home/Consultation/{id}','ArchiveController@consultation')->where(['id'=>'[0-9]+']);


Route::get('Infermier/create','InfermierController@create');
Route::get('Infermiers/{id}','InfermierController@afficher')->where(['id'=>'[0-9]+']);
Route::delete('Infermier/{id}','InfermierController@destroy')->where(['id'=>'[0-9]+']);
Route::post('Infermier','InfermierController@store');
Route::get('Infermier/{id}','InfermierController@index')->where(['id'=>'[0-9]+']);
Route::get('Infermier/{id}/edit','InfermierController@edit')->where(['id'=>'[0-9]+']);
Route::post('Rechercher/Infermier','InfermierController@rechercher');
Route::get('Rechercher/Infermier/{motCle}/{id}','InfermierController@rechercher1')->where(['motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::post('Infermier/{id}','InfermierController@update')->where(['id'=>'[0-9]+']);


Route::get('Archive/Rechercher/{MotCle}/{motCle}/{id}','ArchiveController@rechercher1')->where(['MotCle'=>'[a-zA-Z]+','motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::get('Archive/{MotCle}/profile/{id}','ArchiveController@profile')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::get('Archive/Consultation/{id}','ArchiveController@consultation');
Route::get('Archive/{MotCle}/{id}','ArchiveController@index');
Route::delete('Archive/{MotCle}/{id}','ArchiveController@delete')->where(['id'=>'[0-9]+']);
Route::post('Archive/Rechercher/{MotCle}','ArchiveController@rechercher')->where(['MotCle'=>'[a-zA-Z]+']);
Route::post('Archive/{MotCle}/{id}','ArchiveController@restaurer')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::post('Recherche/Generale','ArchiveController@search');
Route::post('Recherche/Generale/{MotCle}/{motCle}/{id}','ArchiveController@search1')->where(['MotCle'=>'[a-zA-Z]+','motCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::get('Consultation/{id}','ConsultationController@index')->where(['id'=>'[0-9]+']);
Route::get('Consultation/{MotCle}/Imprimer/{id}','ConsultationController@imprimer')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::get('Consultation/{test}/{id}','ConsultationController@creat')->where(['id'=>'[0-9]+']);
Route::post('Consultation/{MotCle}/{id}/edit','ConsultationController@update')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::post('Consultation/{MotCle}/{id}','ConsultationController@store')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::post('Hospitalisation/{id}/edit','ConsultationController@edit')->where(['id'=>'[0-9]+']);
Route::post('Hospitalisation/{id}','ConsultationController@create')->where(['id'=>'[0-9]+']);
Route::delete('Hospitalisation/{id}','ConsultationController@delete')->where(['id'=>'[0-9]+']);

Route::get('Examen/{id}','ConsultationController@index')->where(['id'=>'[0-9]+']);
Route::delete('Examen/{id}','ConsultationController@supprimer')->where(['id'=>'[0-9]+']);
Route::post('Examen/{id}/create','ConsultationController@ajouter')->where(['id'=>'[0-9]+']);
Route::post('Examen/{id}/edit','ConsultationController@modifier')->where(['id'=>'[0-9]+']);

Route::post('{MotCle}/Valide/{id}','AgendaController@valider')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::post('{MotCle}/Rendez-vous/{id}/edit','AgendaController@update')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);
Route::delete('{MotCle}/Rendez-vous/{id}/delete','AgendaController@delete')->where(['MotCle'=>'[a-zA-Z]+','id'=>'[0-9]+']);

Route::post('Patient/Rendez-vous/{id}','ConsultationController@rendezVous')->where(['id'=>'[0-9]+']);

Route::get('Rendez-vous','AgendaController@index');
Route::get('Archive/Rendez-vous','ArchiveController@agenda');

Route::get('Agenda','AgendaController@agenda');

Route::get('Profile','HomeController@profile');
Route::post('Profile','HomeController@update');

Route::get('Contact','HomeController@contact');
Route::get('Urgences','HomeController@urgence');
Route::get('Aide','HomeController@aide');


