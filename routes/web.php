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

	//Jasa Route
	Route::resource('jasa','JasaController');
	Route::group(['prefix' => 'jasa'], function(){
	Route::get('/', 'JasaController@index');
    Route::get('/create', 'JasaController@create');
	Route::post('/store', 'JasaController@store');
	Route::get('/show/{kd_jasa}', 'JasaController@show');
	Route::patch('/update/{kd_jasa}', 'JasaController@update');
	Route::patch('/destroy/{kd_jasa}', 'JasaController@destroy');
});

		//Prj_activity Route
	Route::resource('activity','Prj_activityController');
	Route::group(['prefix' => 'activity'], function(){
	Route::get('/', 'Prj_activityController@index');
    Route::get('/create', 'Prj_activityController@create');
	Route::post('/store', 'Prj_activityController@store');
	Route::get('/show/{kd_activity}', 'Prj_activityController@show');
	Route::patch('/update/{kd_activity}', 'Prj_activityController@update');
	Route::patch('/destroy/{kd_activity}', 'Prj_activityController@destroy');
});

	Route::get('proyek/close', 'PrjController@close');
    Route::get('proyek/notif', 'PrjController@notif');
	Route::get('proyek/index_user', 'PrjController@user');

//Prj_proyek route
	Route::resource('proyek','PrjController');
	Route::group(['prefix' => 'proyek'], function(){
	Route::get('/', 'PrjController@index');
    Route::get('/create', 'PrjController@create');
	Route::post('/store', 'PrjController@store');
	Route::get('/detail/{kd_proyek}', 'PrjController@detail');
	Route::patch('/destroy/{kd_proyek}', 'PrjController@destroy');
		Route::post('/update/{kd_proyek}', 'PrjController@update');


//manage_ib
	Route::get('/add_ib/{kd_proyek}', 'PrjController@add_ib');
	Route::get('/edit_ib/{kd_proyek}/{kode_ib}', 'PrjController@edit_ib');
	Route::get('/edit_ib_cost/{kd_proyek}/{kode_ib}/{kd_cost}', 'PrjController@edit_ib_cost');
//manage termin
	Route::get('/add_termin/{kd_proyek}', 'PrjController@add_termin');
	Route::get('/edit_termin/{kd_proyek}/{kode_termin}/{kd_termin}', 'PrjController@edit_termin');
//manage_team
	Route::get('/add_team/{kd_proyek}', 'PrjController@add_team');
	Route::get('/edit_team/{kd_proyek}/{kode_ib}', 'PrjController@edit_team');
	Route::patch('/update_personil/{kd_proyek}', 'PrjController@update_personil');
//manage uudp
	Route::get('/uudp/{kd_proyek}', 'PrjController@uudp');
		Route::get('/pertanggungjawaban_uudp/{kd_proyek}/{kd_uudp}', 'PrjController@edit_uudp');

//manage sppd
	Route::get('/sppd/{kd_proyek}', 'PrjController@sppd');
			Route::get('/pertanggungjawaban_sppd/{kd_proyek}/{kd_sppd}', 'PrjController@edit_sppd');
//manage notif
		Route::patch('/update_notif/{id}', 'PrjController@update_notif');
Route::post('notif/store', 'PrjController@store_notif');
	Route::patch('/notif/destroy/{id}', 'PrjController@destroy_notif');

//lookup personel
	    Route::get('/lookup/lookup_pm', 'PrjController@lookup_pm');
	    	    Route::get('/lookup/lookup_konsultan1', 'PrjController@lookup_konsultan1');
	    	    Route::get('/lookup/lookup_konsultan2', 'PrjController@lookup_konsultan2');
	    	   Route::get('/lookup/lookup_konsultan3', 'PrjController@lookup_konsultan3');
	    	    Route::get('/lookup/lookup_konsultan4', 'PrjController@lookup_konsultan4');
	    	   Route::get('/lookup/lookup_konsultan5', 'PrjController@lookup_konsultan5');
	    	    Route::get('/lookup/lookup_ta1', 'PrjController@lookup_ta1');
	    	    Route::get('/lookup/lookup_ta2', 'PrjController@lookup_ta2');
	    	    Route::get('/lookup/lookup_ta3', 'PrjController@lookup_ta3');
	    	    Route::get('/lookup/lookup_ta4', 'PrjController@lookup_ta4');
	    	    Route::get('/lookup/lookup_ta5', 'PrjController@lookup_ta5');

});

//project lookup
Route::get('add_ib/lookup_activity', 'Prj_activityController@lookup_activity');
Route::post('add_ib/lookup_activity/store', 'Prj_activityController@lookup_activity_store');
Route::get('add_termin/lookup_ib/{kd_proyek}', 'Prj_ibController@lookup_ib');
Route::get('add_ib/lookup_cost_ib/{kd_proyek}', 'Prj_ibController@lookup_cost_ib');
Route::get('proyek/lib/lookup_item_biaya', 'Prj_ibController@lookup_item_biaya');
Route::post('/proyek/store_lib_cost/', 'Prj_ibController@store_item_biaya');

			//Prj IB route
	Route::resource('ib','Prj_ibController');
	Route::group(['prefix' => 'ib'], function(){
	Route::post('/store/{kd_proyek}', 'Prj_ibController@store');
	Route::post('/store_cost/{kd_proyek}', 'Prj_ibController@store_cost');
	Route::post('/update/{kode_ib}', 'Prj_ibController@update');
	Route::post('/update_cost/{kd_cost}', 'Prj_ibController@update_ib_cost');
	Route::patch('/destroy/{kode_ib}', 'Prj_ibController@destroy');
	Route::patch('/destroy_cost/{kd_cost}', 'Prj_ibController@destroy_cost');

Route::get('/lib/lib_item_biaya', 'Prj_ibController@lib_item_biaya');
Route::get('/lib/update/{kd_cost}', 'Prj_ibController@show_lib_item_biaya');
Route::patch('/lib/destroy/{kd_cost}', 'Prj_ibController@destroy_lib_item_biaya');
	Route::post('/lib/update/lib_item_biaya/{kd_cost}', 'Prj_ibController@update_lib_item_biaya');

});
				//Prj termin route
	Route::resource('termin','Prj_terminController');
	Route::group(['prefix' => 'termin'], function(){
	Route::post('/store/{kd_proyek}', 'Prj_terminController@store');
	Route::post('/update/{kd_termin}', 'Prj_terminController@update');
	Route::patch('/destroy/{kode_ib}', 'Prj_terminController@destroy');
	Route::get('/print/{kd_proyek}/{kd_termin}', 'Prj_PrintController@print_termin');

});

					//Prj UUDP route
	Route::resource('uudp','Prj_uudpController');
	Route::group(['prefix' => 'uudp'], function(){
	Route::get('/', 'Prj_uudpController@index');
	Route::post('/store/{kd_proyek}', 'Prj_uudpController@store');
	Route::post('/update/{kd_uudp}', 'Prj_uudpController@update');
	Route::get('/lookup1/cost/{kd_proyek}', 'Prj_uudpController@lookup_cost1');
	Route::get('/lookup2/cost/{kd_proyek}', 'Prj_uudpController@lookup_cost2');
	Route::get('/lookup3/cost/{kd_proyek}', 'Prj_uudpController@lookup_cost3');
	Route::get('/lookup4/cost/{kd_proyek}', 'Prj_uudpController@lookup_cost4');
	Route::get('/lookup5/cost/{kd_proyek}', 'Prj_uudpController@lookup_cost5');
	Route::patch('/destroy/{kd_uudp}', 'Prj_uudpController@destroy');
	Route::get('/print/{kd_uudp}', 'Prj_PrintController@print_uudp');

});
						//Prj SPPD route
	Route::resource('sppd','Prj_sppdController');
	Route::group(['prefix' => 'sppd'], function(){
	Route::get('/', 'Prj_sppdController@index');
	Route::post('/store/{kd_proyek}', 'Prj_sppdController@store');
	Route::post('/update/{kd_sppd}', 'Prj_sppdController@update');
	Route::get('/lookup1/cost/{kd_proyek}', 'Prj_sppdController@lookup_cost1');
	Route::get('/lookup2/cost/{kd_proyek}', 'Prj_sppdController@lookup_cost2');
	Route::get('/lookup3/cost/{kd_proyek}', 'Prj_sppdController@lookup_cost3');
	Route::get('/lookup4/cost/{kd_proyek}', 'Prj_sppdController@lookup_cost4');
	Route::get('/lookup5/cost/{kd_proyek}', 'Prj_sppdController@lookup_cost5');

	Route::patch('/destroy/{kd_sppd}', 'Prj_sppdController@destroy');
	Route::get('/print/{kd_sppd}', 'Prj_PrintController@print_sppd');

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
	Route::get('/generate/{kd_pengalaman}', 'PengalamanController@generate');
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
Route::get('/mail_proyek_prt_uudp', 'Mailer_projectController@mail_prt_uudp');
Route::get('/mail_proyek_prt_sppd', 'Mailer_projectController@mail_prt_sppd');
Route::get('/mail_proyek_activity', 'Mailer_projectController@mail_activity');
Route::resource('file','File');

Route::get('/home', 'DashboardController@home2');
Route::get('/dashboard2', 'DashboardController@home');

Route::patch('/notif/destroy', 'NotifController@destroy_notif');
