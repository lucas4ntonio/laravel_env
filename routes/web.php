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

Route::get('/', function () {
    return view('welcome');
});

// REQ PARAM
Route::get('/param1/{name}/{id}', function($name, $id) {
    echo "ID: ".$id." and name: ".$name;
});

// OPT PARAM
Route::get('/param2{name?}', function($name='Test') {
   echo "Name: ".$name; 
});

// ROLE - USING TESTCONTROLLER AND ROLEMIDDLEWARE
Route::get('/role', [
    'middleware'=>'Role:editor',
    'uses'=>'TestController@index',
]); 

// TERMINATED - USING ABCCONTROLLER AND TERMINATEDMIDDLEWARE
Route::get('terminate', [
   'middleware'=>'Terminate',
   'uses'=>'ABCController@index',
]);

// MIDDLEWARE TO CONTROLLER METHOD
Route::get('/usercontroller/path',[
    'middleware'=>'First',
    'uses'=>'UserController@showPath',
]);

// USE TO CRUD (CREATE, READ, UPDATE, DELETE)
// USE: localhost:8000/my/[method] inside the controller
Route::resource('my','MyController');

// SHOWS REQUESTS
Route::get('/foo/bar','UriController@index');

// IF ACCESS REGISTER SHOW VIEW REGISTER
Route::get('/register',function(){
    return view('register');
});

// IF POST FORM
Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));

// TESTING VIEW
Route::get('/hello', function (){
    return view('hello',['name'=>'Lucas T']);
});

// REDIRECT
// SET ROUTE user/profile NAME profile
Route::get('user/profile',['as'=>'profile', function () {
    return view("hello", ['name'=>'Lucas']);
}]);
// REDIRECT DO profile
Route::get('redirect', function () {
    return redirect()->route("profile");    
});

// REDIRECT USING CONTROLLER
Route::get('rr','RedirectController@index');
Route::get('redirectcontroller', function () {
    return redirect()->action('RedirectController@index');    
});

/*
|--------------------------------------------------------------------------
| CRUD (CREATE, READ, UPDATE, DELETE)
|--------------------------------------------------------------------------
*/

// INSERT STUDENTS
Route::get('insert_student','StudentInsert@insertform');
// POST FROM ACTION IN INSERT PAGE
Route::post('create','StudentInsert@insert');

// VIEW STUDENTS -- USING SELECT
Route::get('view_student','StudentView@index');

// SHOW STUDENTS TO UPDATE
Route::get('student_edit','StudentUpdate@index');
// EDIT PAGE
Route::get('student_editing/{id}','StudentUpdate@show');
// UPDATE USING POST
Route::post('student_editing/{id}','StudentUpdate@edit');

// SHOW STUDENTS TO DELETE
Route::get('student_delete_view','StudentDelete@index');
// DELETE STUDENT
Route::get('student_deleting/{id}','StudentDelete@destroy');

/*
|--------------------------------------------------------------------------
| FORMS USING LIBRARY ILLUMINATE/HTML
 * 
 * TO USE ILLUMINATE/HTML RENAME THE bindShared() METHOD TO 
 * singleton() -> PATH: vendor/illuminate/html/HtmlServiceProvider.php
|--------------------------------------------------------------------------
*/

// SHOW FORM
Route::get('/form', function () {
    return view('form');
});

/*
|--------------------------------------------------------------------------
| USING SESSION
|--------------------------------------------------------------------------
*/

// GET SESSION DATA
Route::get('session/get','SessionController@accessSessionData');
// STORE SESSION DATA
Route::get('session/set','SessionController@storeSessionData');
// DELETE SESSION DATA
Route::get('session/remove','SessionController@deleteSessionData');

/*
|--------------------------------------------------------------------------
| VALIDATIONS
|--------------------------------------------------------------------------
*/

Route::get('/validation','ValidationController@showForm');
Route::post('/validation','ValidationController@validateForm');

/*
|--------------------------------------------------------------------------
| UPLOAD FILES
|--------------------------------------------------------------------------
*/
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

/*
|--------------------------------------------------------------------------
| EVENTS AND HANDLERS (LISTENERS)
 * USE php artisan event:generate
 * ALTER NAME IN app/events and app/listeners
 * EDIT EVENT IN providers/eventserviceproviders.php
|--------------------------------------------------------------------------
*/
Route::get('event','CreateStudentController@insertForm');
Route::post('addstudent','CreateStudentController@insert');

/*
|--------------------------------------------------------------------------
| AUTH -- LOGIN / REGISTER
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| MY STUDENT ADD USING MODELS
|--------------------------------------------------------------------------
*/
// SHOW ADD FORM -- VIEW _student_add
Route::get('/student_add','Students\StudentController@index');
// REGISTER
Route::post('/student_add','Students\StudentController@add');
// DELETE
Route::get('/student_add/{id}','Students\StudentController@delete');
// SHOW EDIT FORM
Route::get('student_edit/{id}','Students\StudentController@showEditForm');
// EDIT STUDENT
Route::post('student_edit/{id}','Students\StudentController@edit');