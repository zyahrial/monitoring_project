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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index');

	Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
	Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});

	//Rekanan Route
	Route::resource('rekanan','RekananController');
	Route::group(['prefix' => 'rekanan'], function(){
	Route::get('/', 'RekananController@index');
    Route::get('/create', 'RekananController@create');
	Route::post('/store', 'RekananController@store');
	Route::get('/show/{kd_rekanan}', 'RekananController@show');
	Route::patch('/update/{kd_rekanan}', 'RekananController@update');
	Route::patch('/destroy/{kd_rekanan}', 'RekananController@destroy');
    Route::get('/query', 'RekananController@loadData');  
    Route::get('/rekanan', 'RekananController@auth'); 
    Route::get('lookup/lookup_klien', 'LookupController@lookup_klien');
});
	Route::get('/rekanan_export', 'RekananController@export');
//End Rekanan Route

//Klien Route
	Route::resource('klien','KlienController');
	Route::group(['prefix' => 'klien'], function(){
	Route::get('/', 'KlienController@index');
	Route::get('/create', 'KlienController@create');
	Route::post('/store', 'KlienController@store');	
	Route::get('/show/{kd_klien}', 'KlienController@show');
	Route::patch('/update/{kd_klien}', 'KlienController@update');
	Route::patch('/destroy/{kd_klien}', 'KlienController@destroy');
	Route::patch('/destroy/notif/{id}', 'KlienController@destroy_notif');
    Route::get('/query', 'KlienController@loadData');  
    Route::get('/klien', 'KlienController@auth'); 

	Route::get('/detail/{kd_klien}', 'KlienController@detail');
    Route::get('/cetak', 'KlienController@pdfview')->name('cetak');
    Route::get('library/create_sektor', 'LookupController@create_sektor');

    Route::get('library/ops_bagian', 'LookupController@ops_bagian');
    Route::post('/store_ops_bagian', 'LookupController@store_ops_bagian');
    Route::patch('/destroy_ops/{id}', 'LookupController@destroy_ops');

    Route::get('library/adm_bagian', 'LookupController@adm_bagian');
    Route::post('/store_adm_bagian', 'LookupController@store_adm_bagian');
    Route::patch('/destroy_adm/{id}', 'LookupController@destroy_adm');

    Route::get('/library/sektor', 'LookupController@sektor');
    Route::post('/store_sektor', 'LookupController@store_sektor');
    Route::patch('/destroy_sektor/{id}', 'LookupController@destroy_sektor');

    Route::get('/library/sub_sektor', 'LookupController@sub_sektor');
    Route::post('/store_sub_sektor', 'LookupController@store_sub_sektor');
    Route::patch('/destroy_sub_sektor/{id}', 'LookupController@destroy_sub_sektor');

	Route::post('uploadfile','KlienController@uploadFilePost');
});
	Route::get('klien_export', 'KlienController@export');
//End Klien Route

//Ta Route
	Route::resource('ta','TaController');
	Route::group(['prefix' => 'ta'], function(){
	Route::get('/', 'TaController@index');
    Route::get('/create', 'TaController@create');
	Route::post('/store', 'TaController@store');
	Route::get('/show/{kd_ta}', 'TaController@show');
	Route::get('/view/{kd_ta}', 'TaController@view');
	Route::patch('/update/{kd_ta}', 'TaController@update');
	Route::patch('/destroy/{kd_ta}', 'TaController@destroy');

    Route::get('lookup/kompetensi', 'LookupController@lookup_kompetensi');
    Route::post('/store_kompetensi', 'LookupController@store_kompetensi');
    Route::patch('/destroy_kompetensi/{id}', 'LookupController@destroy_kompetensi');
});
	Route::get('/ta_export', 'TaController@export');
//End Ta Route

//Tender Route
	Route::resource('pem_tender','Pem_tenderController');
	Route::group(['prefix' => 'pem_tender'], function(){
	Route::get('/', 'Pem_tenderController@index');
    Route::get('/create', 'Pem_tenderController@create');
	Route::post('/store', 'Pem_tenderController@store');
	Route::get('/show/{kd_pn_tender}', 'Pem_tenderController@show');
	Route::get('/detail/{kd_pn_tender}', 'Pem_tenderController@detail');

	Route::patch('/update/{kd_pn_tender}', 'Pem_tenderController@update');
	Route::patch('/destroy/{kd_pn_tender}', 'Pem_tenderController@destroy');
    Route::get('/query', 'Pem_tenderController@loadData');  
    Route::get('/rekanan', 'Pem_tenderController@auth');

    Route::get('lookup/lookup_klien', 'LookupController@lookup_klien2');
    Route::get('lookup/lookup_karyawan', 'LookupController@lookup_karyawan');
    Route::get('lookup/lookup_pm', 'LookupController@pem_tender_pm');
    Route::get('lookup/lookup_konsultan', 'LookupController@pem_tender_konsultan');

    Route::get('lookup/lookup_jasa', 'LookupController@lookup_jasa');
    Route::post('/store_jasa', 'LookupController@store_jasa');
    Route::patch('/destroy_jasa/{kd_jasa}', 'LookupController@destroy_jasa');

    Route::get('lookup/ket_kalah', 'LookupController@create_ket_kalah');
    Route::post('lookup/store_ket_kalah', 'LookupController@store_ket_kalah');
    Route::patch('/destroy_ket_kalah/{id}', 'LookupController@destroy_ket_kalah');

  	Route::get('/close_menang/{kd_pn_tender}', 'Pem_tenderController@close_menang');
	Route::get('/close_kalah/{kd_pn_tender}', 'Pem_tenderController@close_kalah');  
    Route::patch('/proses_close_menang/{kd_pn_tender}', 'Pem_tenderController@proses_close_menang');
    Route::patch('/proses_close_kalah/{kd_pn_tender}', 'Pem_tenderController@proses_close_kalah');

});
	Route::get('pem_tender_user', 'Pem_tenderController@user');
	Route::get('pem_tender_user/create', 'Pem_tenderController@user_create');
	Route::post('pem_tender_user/store', 'Pem_tenderController@user_store');
//End Tender Route

//Non Tender Route
	Route::resource('pem_non_tender','Pem_non_tenderController');
	Route::group(['prefix' => 'pem_non_tender'], function(){
	Route::get('/', 'Pem_non_tenderController@index');
    Route::get('/create', 'Pem_non_tenderController@create');
	Route::post('/store', 'Pem_non_tenderController@store');
	Route::get('/show/{kd_pn_non_tender}', 'Pem_non_tenderController@show');
	Route::get('/detail/{kd_pn_non_tender}', 'Pem_non_tenderController@detail');
	Route::patch('/update/{kd_pn_non_tender}', 'Pem_non_tenderController@update');
	Route::get('/close/{kd_pn_non_tender}', 'Pem_non_tenderController@close');
	Route::patch('/destroy/{kd_pn_non_tender}', 'Pem_non_tenderController@destroy');

    Route::get('lookup/lookup_klien', 'LookupController@lookup_klien2');
    Route::get('lookup/lookup_pm', 'LookupController@pem_tender_pm');
    Route::get('lookup/lookup_konsultan', 'LookupController@pem_tender_konsultan');

    Route::get('lookup/lookup_jasa', 'LookupController@lookup_jasa');
    Route::post('/store_jasa', 'LookupController@store_jasa');
    Route::patch('/destroy_jasa/{kd_jasa}', 'LookupController@destroy_jasa');

    Route::get('lookup/ket_kalah', 'LookupController@create_ket_kalah');
    Route::post('lookup/store_ket_kalah', 'LookupController@store_ket_kalah');

    Route::get('lookup/lookup_karyawan', 'LookupController@lookup_karyawan');
  	Route::get('/close_menang/{kd_pn_non_tender}', 'Pem_non_tenderController@close_menang');
	Route::get('/close_kalah/{kd_pn_non_tender}', 'Pem_non_tenderController@close_kalah');  
    Route::patch('/proses_close_menang/{kd_pn_non_tender}', 'Pem_non_tenderController@proses_close_menang');
    Route::patch('/proses_close_kalah/{kd_pn_non_tender}', 'Pem_non_tenderController@proses_close_kalah');
});
	Route::get('pem_non_tender_user', 'Pem_non_tenderController@user');
	Route::get('pem_non_tender_user/create', 'Pem_non_tenderController@user_create');
	Route::post('pem_non_tender_user/store', 'Pem_non_tenderController@user_store');
	Route::get('/pem_non_tender_export', 'Pem_non_tenderController@export');
//End Non Tender Route

//Pengalaman Route
	Route::resource('pengalaman','PengalamanController');
	Route::group(['prefix' => 'pengalaman'], function(){
	Route::get('/', 'PengalamanController@index');
    Route::get('/create', 'PengalamanController@create');
	Route::post('/store', 'PengalamanController@store');
	Route::get('/show/{kd_pengalaman}', 'PengalamanController@show');
	Route::get('/detail/{kd_pengalaman}', 'PengalamanController@detail');
	Route::patch('/update/{kd_pengalaman}', 'PengalamanController@update');
	Route::patch('/destroy/{kd_pengalaman}', 'PengalamanController@destroy');
    Route::get('/query', 'PengalamanController@loadData');  
    Route::get('/pengalaman', 'PengalamanController@auth'); 
    Route::get('lookup/lookup_klien', 'LookupController@lookup_klien');
});
	Route::get('pengalaman_user', 'PengalamanController@user');
	Route::get('pengalaman_user/create', 'PengalamanController@user_create');
	Route::post('pengalaman_user/store', 'PengalamanController@user_store');
	Route::get('/pengalaman_export', 'PengalamanController@export'); 
//End Pengalaman Route

	Route::resource('mail','Mail_rekananController');
	Route::group(['prefix' => 'mail'], function(){
	Route::get('/', 'Mail_rekananController@index');
	Route::get('/{id}', 'Mail_rekananController@show');
	Route::patch('/update/{id}', 'Mail_rekananController@update');
	Route::patch('/destroy/{id}', 'Mail_rekananController@destroy');
    Route::post('/store', 'Mail_rekananController@store');
});
	Route::get('/user_export', 'UserController@export');

//User Route
	Route::resource('user','UserController');
	Route::group(['prefix' => 'user'], function(){
	Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
	Route::post('/store', 'UserController@store');
	Route::get('/show/{kode}', 'UserController@show');
	Route::patch('/update/{kode}', 'UserController@update');
	Route::patch('/destroy/{kode}', 'UserController@destroy');
	Route::get('/show/{id}', 'UserController@show');
	Route::patch('/update/{id}', 'UserController@update');
	Route::patch('/destroy/{id}', 'UserController@destroy');
    Route::get('/query', 'UserController@loadData');  
    Route::get('/user', 'UserController@auth'); 
});
	Route::get('/user_export', 'UserController@export');
	Route::get('profile', 'UserController@profile');
//End User Route

//history Route
	Route::get('/history/pem_tender', 'Pem_tenderController@history_pem_tender');
	Route::get('/history/pem_tender/{kd_pn_tender}', 'Pem_tenderController@detail_history');
	Route::get('/history/pem_non_tender', 'Pem_non_tenderController@history_pem_non_tender');
	Route::get('/history/pem_non_tender/{kd_pn_non_tender}', 'Pem_non_tenderController@detail_history');
//End history Route


Route::get('/reminder_tender', 'Pem_tenderController@reminder');
Route::get('/reminder_non_tender', 'Pem_non_tenderController@reminder');
Route::get('/reminder_pengalaman', 'PengalamanController@reminder');

Route::get('/mail_rekanan', 'MailerController@mail_rekanan');
Route::get('/mail_tender', 'MailerController@mail_tender');
Route::get('/mail_non_tender', 'MailerController@mail_non_tender');
Route::get('/mail_pengalaman', 'MailerController@mail_pengalaman');

Route::resource('file','File');

Route::get('/home', 'DashboardController@home');
Route::patch('/notif/destroy', 'NotifController@destroy_notif');
