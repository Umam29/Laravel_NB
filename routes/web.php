<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BlogController@index')->name('blog');
Route::get('/content/{slug}', 'BlogController@getPost')->name('blog.content');
Route::get('/list-category/{category}', 'BlogController@ListCategory')->name('blog.content.category');
Route::get('/list-user/{users_id}', 'BlogController@ListUser')->name('blog.content.user');

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/editor', function () {
//     return view('editor');
// });
Auth::routes();

// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
// Route::get('/login/editor', 'Auth\LoginController@showEditorLoginForm');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Route::get('/register/editor', 'Auth\RegisterController@showEditorRegisterForm');

// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::post('/login/editor', 'Auth\LoginController@EditorLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
// Route::post('/register/editor', 'Auth\RegisterController@createEditor');

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => 'auth:admin'], function() {
    
//     Route::get('/admin/profile', 'AdminController@adminProfile')->name('admin.profile');
//     Route::put('/admin/updateProfile', 'AdminController@changePorfile')->name('admin.updateProfile');
//     Route::get('/admin/editor', 'AdminController@editorIndex')->name('admin.editor');
//     Route::get('/admin/editor/create', 'AdminController@editorCreate')->name('admin.createEditor');
//     Route::post('/admin/editor/store', 'AdminController@editorStore')->name('admin.storeEditor');
//     Route::get('/admin/editor/edit/{id}', 'AdminController@editorEdit')->name('admin.editEditor');
//     Route::put('/admin/editor/update/{id}', 'AdminController@editorUpdate')->name('admin.updateEditor');
//     Route::delete('/admin/editor/delete/{id}', 'AdminController@editorDestroy')->name('admin.destroyEditor');
//     Route::get('/admin/writer', 'AdminController@writerIndex')->name('admin.writer');
//     Route::get('/admin/writer/create', 'AdminController@writerCreate')->name('admin.createWriter');
//     Route::post('/admin/writer/store', 'AdminController@writerStore')->name('admin.storeWriter');
//     Route::get('/admin/writer/edit/{id}', 'AdminController@writerEdit')->name('admin.editWriter');
//     Route::put('/admin/writer/update/{id}', 'AdminController@writerUpdate')->name('admin.updateWriter');
//     Route::delete('/admin/writer/delete/{id}', 'AdminController@writerDestroy')->name('admin.destroyWriter');
// });

// Route::group(['middleware' => 'auth:editor'], function() {
//     Route::view('/editor', 'editor');
//     Route::resource('/editor/category', 'CategoryController');
//     Route::get('/editor/profile', 'EditorController@editorProfile')->name('editor.profile');
//     Route::put('/editor/updateProfile', 'EditorController@changePorfile')->name('editor.updateProfile');
//     Route::get('/editor/post', 'PostController@articleEditorIndex')->name('editor.post');
//     Route::get('/editor/post/publish', 'PostController@articlePublishEditorIndex')->name('editor.postPublish');
//     Route::get('/editor/post/edit/{id}', 'PostController@articleEditorEdit')->name('editor.postEdit');
//     Route::put('/editor/post/update/{id}', 'PostController@articleEditorUpdate')->name('editor.postUpdate');
// });

Route::group(['middleware' => 'auth'], function() {
    Route::view('/admin', 'admin');
    Route::get('/admin/profile', 'AdminController@adminProfile')->name('admin.profile');
    Route::put('/admin/updateProfile', 'AdminController@changePorfile')->name('admin.updateProfile');
    Route::get('/admin/editor', 'AdminController@editorIndex')->name('admin.editor');
    Route::get('/admin/editor/create', 'AdminController@editorCreate')->name('admin.createEditor');
    Route::post('/admin/editor/store', 'AdminController@editorStore')->name('admin.storeEditor');
    Route::get('/admin/editor/edit/{id}', 'AdminController@editorEdit')->name('admin.editEditor');
    Route::put('/admin/editor/update/{id}', 'AdminController@editorUpdate')->name('admin.updateEditor');
    Route::delete('/admin/editor/delete/{id}', 'AdminController@editorDestroy')->name('admin.destroyEditor');
    Route::get('/admin/writer', 'AdminController@writerIndex')->name('admin.writer');
    Route::get('/admin/writer/create', 'AdminController@writerCreate')->name('admin.createWriter');
    Route::post('/admin/writer/store', 'AdminController@writerStore')->name('admin.storeWriter');
    Route::get('/admin/writer/edit/{id}', 'AdminController@writerEdit')->name('admin.editWriter');
    Route::put('/admin/writer/update/{id}', 'AdminController@writerUpdate')->name('admin.updateWriter');
    Route::delete('/admin/writer/delete/{id}', 'AdminController@writerDestroy')->name('admin.destroyWriter');
    Route::resource('/admin/user-types', 'UserTypeController');
    Route::view('/editor', 'editor');
    Route::resource('/editor/category', 'CategoryController');
    Route::get('/editor/profile', 'EditorController@editorProfile')->name('editor.profile');
    Route::put('/editor/updateProfile', 'EditorController@changePorfile')->name('editor.updateProfile');
    Route::get('/editor/post', 'PostController@articleEditorIndex')->name('editor.post');
    Route::get('/editor/post/publish', 'PostController@articlePublishEditorIndex')->name('editor.postPublish');
    Route::get('/editor/post/edit/{id}', 'PostController@articleEditorEdit')->name('editor.postEdit');
    Route::put('/editor/post/update/{id}', 'PostController@articleEditorUpdate')->name('editor.postUpdate');
    Route::view('/writer', 'writer');
    Route::get('/writer/profile', 'WriterController@writerProfile')->name('writer.profile');
    Route::get('/writer/post', 'PostController@articleWriterIndex')->name('writer.post');
    Route::get('/writer/post/publish', 'PostController@articlePublishIndex')->name('writer.postPublish');
    Route::get('/writer/post/create', 'PostController@articleWriterCreate')->name('writer.postCreate');
    Route::post('/writer/post/store', 'PostController@articleWriterStore')->name('writer.postStore');
    Route::get('/writer/post/edit/{id}', 'PostController@articleWriterEdit')->name('writer.postEdit');
    Route::put('/writer/post/update/{id}', 'PostController@articleWriterUpdate')->name('writer.postUpdate');
    Route::delete('/writer/post/delete/{id}', 'PostController@articleWriterDestroy')->name('writer.postDelete');
    Route::get('/writer/draft', 'DraftController@draftWriterIndex')->name('writer.draft');
});
