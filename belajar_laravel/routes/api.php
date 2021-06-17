<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',function(){
	$cek_koneksi=DB::connection()->getPdo();
	if($cek_koneksi){
		echo "koneksi nyambung";
	}else{
		echo "koneksi terputus";
	}
});
Route::get('/tampilsiswa/{angka1}/{angka2}','A@tampil');
Route::post('/inputsiswa','A@input');
Route::put('/updatesiswa/{id}','A@update');
Route::delete('/deletesiswa/{id}','A@delete');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::post('/inputbuku','BukuC@book');
Route::post('/inputkategori','KategoriCo@category');
Route::put('/updatekategori/{id}','KategoriCo@upcategory');
Route::put('/updatebuku/{id}','BukuC@upbook');
Route::delete('/deletekategori/{id}','KategoriCo@delcategory');
Route::delete('/deletebuku/{id}','BukuC@delbook');

Route::get('/tampilkategori','KategoriCo@show');

Route::get('/','KategoriC@show');

Route::get('/tampildat','KategoriC@show');
Route::get('/tampildat/{id}','KategoriC@cari_data');
Route::get('/tampildata/{id}','KategoriC@detail');
Route::post('/tambahb','KategoriC@category');
Route::put('/editp/{id}','KategoriC@editpen');
Route::delete('/deletedat/{id}','KategoriC@deletepen');
