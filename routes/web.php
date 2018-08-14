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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');


Route::post('/submit', function(\Illuminate\Http\Request $request){
	$content = $request['content'];
	return view('output', ['content' => $content]);
})->name('submit');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Frontend'], function () {
	
	Route::get('/', array('as' => 'frontend-home-index', 'uses' => 'HomeController@index'));
	Route::get('/content_article/{id}', array('as' => 'frontend-content_article-index', 'uses' => 'Content_ArticleController@index'));
	Route::get('/content_article_image/{id}', array('as' => 'frontend-content_article-index-image', 'uses' => 'Content_ArticleController@image'));
	
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');





//backend
//dashboard

//home
// Route::get('dashboard', 'BackHome@index');
Route::get('admin', 'BackHome@index');

Route::group(['namespace' => 'Backend'], function () {
	//home
	Route::get('home', array('as' => 'backend-home-index', 'uses' => 'BackHomeController@index'));
	
	//siswa
	Route::get('datatables_siswa', array('as' => 'datatables-data', 'uses' => 'SiswasController@anyData'));
	Route::get('siswa', array('as' => 'backend-siswa-index', 'uses' => 'SiswasController@index'));
	Route::get('siswa/edit/{id}', array('as' => 'backend-siswa-edit', 'uses' => 'SiswasController@edit'));
	Route::get('siswa/update/{id}', array('as' => 'backend-siswa-update', 'uses' => 'SiswasController@update'));
	Route::get('siswa/create', array('as' => 'backend-siswa-create', 'uses' => 'SiswasController@create'));
	Route::get('siswa/store', array('as' => 'backend-siswa-store', 'uses' => 'SiswasController@store'));
	Route::delete('siswa/delete/{id}', array('as' => 'backend-siswa-delete', 'uses' => 'SiswasController@destroy'));


	//ekstrakulikuler
	
	Route::get('datatables_ekstrakulikuler', array('as' => 'datatables-data-ekstrakulikuler', 'uses' => 'ekstrakulikulerController@anyData'));
	Route::get('ekstrakulikuler', array('as' => 'backend-ekstrakulikuler-index', 'uses' => 'ekstrakulikulerController@index'));
	Route::get('ekstrakulikuler/edit/{id}', array('as' => 'backend-ekstrakulikuler-edit', 'uses' => 'ekstrakulikulerController@edit'));
	Route::get('ekstrakulikuler/update/{id}', array('as' => 'backend-ekstrakulikuler-update', 'uses' => 'ekstrakulikulerController@update'));
	Route::get('ekstrakulikuler/create', array('as' => 'backend-ekstrakulikuler-create', 'uses' => 'ekstrakulikulerController@create'));
	Route::get('ekstrakulikuler/store', array('as' => 'backend-ekstrakulikuler-store', 'uses' => 'ekstrakulikulerController@store'));
	Route::delete('ekstrakulikuler/delete/{id}', array('as' => 'backend-ekstrakulikuler-delete', 'uses' => 'ekstrakulikulerController@destroy'));


	//kelas
	
	Route::get('datatables_kelas', array('as' => 'datatables-data-kelas', 'uses' => 'kelasController@anyData'));
	Route::get('kelas', array('as' => 'backend-kelas-index', 'uses' => 'kelasController@index'));
	Route::get('kelas/edit/{id}', array('as' => 'backend-kelas-edit', 'uses' => 'kelasController@edit'));
	Route::get('kelas/update/{id}', array('as' => 'backend-kelas-update', 'uses' => 'kelasController@update'));
	Route::get('kelas/create', array('as' => 'backend-kelas-create', 'uses' => 'kelasController@create'));
	Route::get('kelas/store', array('as' => 'backend-kelas-store', 'uses' => 'kelasController@store'));
	Route::delete('kelas/delete/{id}', array('as' => 'backend-kelas-delete', 'uses' => 'kelasController@destroy'));


	//Article
	Route::get('article', array('as' => 'backend-article-index', 'uses' => 'ArticlesController@index'));
	Route::get('article/create', array('as' => 'admin-create-article', 'uses' => 'ArticlesController@create'));
	Route::delete('article/delete/{id}', array('as' => 'admin-delete-article', 'uses' => 'ArticlesController@destroy'));
	Route::get('article/edit/{id}', array('as' => 'admin-edit-article', 'uses' => 'ArticlesController@edit'));
	Route::get('article/store', array('as' => 'admin-store-article', 'uses' => 'ArticlesController@store'));
	Route::get('article/update/{id}', array('as' => 'admin-update-article', 'uses' => 'ArticlesController@update'));
	Route::get('article/form_image/{id}', array('as' => 'admin-form-image-article', 'uses' => 'ArticlesController@form_image'));

	// Route::get('datatables_user', array('as' => 'datatables-data', 'uses' => 'ArticlesController@anyData'));

});



// Route::group(['namespace' => 'layout'], function () {
// 	dashboard
// 	Route::get('dashboard', 'DashboardController@index');
// });

// Route::get('article', 'ArticlesController@index');
// Route::get('datatables_user', array('as' => 'datatables-data', 'uses' => 'ArticlesController@anyData'));

