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

Route::prefix('front')->group(function() {
    Route::get('/', 'FrontController@index');

    Route::resource('materi','MateriController');
    Route::post('materi/post_comments/{id}', 'MateriController@post_comments')->name('materi.post_comments');
    Route::post('materi/post_replycomments/{id}', 'MateriController@post_replycomments')->name('materi.post_replycomments');
    Route::get('materi/post_finish/{id}', 'MateriController@post_finish')->name('materi.post_finish');
    Route::get('materi/read_materi/{id}', 'MateriController@read_materi')->name('materi.read_materi');  
    Route::get('materi/filter_category/{id}', 'MateriController@filter_category')->name('materi.filter_category');
    Route::get('materi/load_more/{id}', 'MateriController@load_more')->name('materi.load_more'); 
    
    Route::group(['middleware' => ['auth']], function() {
        Route::resource('dashboard','DashboardController');
        Route::resource('setting','SettingController');
        Route::resource('riwayat_baca','RiwayatBacaController');

        Route::resource('daftarku','DaftarkuController');
        Route::get('daftarku/disukai/{id}', 'DaftarkuController@disukai')->name('daftarku.disukai');
        Route::get('daftarku/ditandai/{id}', 'DaftarkuController@ditandai')->name('daftarku.ditandai');
        Route::get('daftarku/daftar_baca/{id}', 'DaftarkuController@daftar_baca')->name('daftarku.daftar_baca');

        Route::resource('hubungi_admin','HubungiAdminController');
        Route::post('hubungi_admin/post_comments/{id}', 'HubungiAdminController@post_comments')->name('hubungi_admin.post_comments');

        Route::resource('pengaturan','PengaturanController');
    });

    Route::resource('post_ajax','PostAjaxController');
    Route::post('post_ajax/post_rating/{id}', 'PostAjaxController@post_rating')->name('post_ajax.post_rating');
    Route::post('post_ajax/post_newsletter/', 'PostAjaxController@post_newsletter')->name('post_ajax.post_newsletter');

    Route::resource('contactus','ContactusController');

    Route::resource('verifikasi','VerifikasiController');
    Route::get('verifikasi/pendaftararan/', 'VerifikasiController@pendaftararan')->name('verifikasi.pendaftararan');
    Route::get('verifikasi/resend_code/code', 'VerifikasiController@resend_code')->name('verifikasi.resend_code');
    Route::get('verifikasi/change_email/code', 'VerifikasiController@change_email')->name('verifikasi.change_email');

    Route::resource('unsubscribe','UnsubscribeController');
    Route::get('unsubscribe/email/{id}', 'UnsubscribeController@email')->name('unsubscribe.email');

    #Route::post('front/post_contactus', 'FrontController@post_contactus')->name('front.post_contactus');

});
