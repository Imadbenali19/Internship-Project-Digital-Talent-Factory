<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
// });

Route::get('/', 'HomeController@index')->name('root');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin routes
Route::get('/admin','adminManage@index')->name('admin.index');
Route::get('/usersList','adminManage@userList')->name('admin.userList');
Route::get('/schoolsList','adminManage@schoolList')->name('admin.schoolList');
Route::get('/studentsList','adminManage@studentList')->name('admin.studentList');
Route::get('/specialitiesList','adminManage@specialiteList')->name('admin.specialiteList');


//USER
//Admin add user
Route::get('/addUser', 'adminManage@addUser');
Route::post('/addUser', 'adminManage@addUser');
//Admin delete user
Route::get('/usersList/{id}', 'adminManage@deleteUser');
//Admin update user
Route::get('/addUser/{id}', 'adminManage@updateUser');
Route::post('/addUser/{id}', 'adminManage@updateUser');


//SCHOOL
//Admin add School
Route::get('/addSchool', 'adminManage@addSchool');
Route::post('/addSchool', 'adminManage@addSchool');
//Admin delete School
Route::get('/schoolsList/{id}', 'adminManage@deleteSchool');
//Admin update School
Route::get('/addSchool/{id}', 'adminManage@updateSchool');
Route::post('/addSchool/{id}', 'adminManage@updateSchool');


//SPECIALITE
//Admin add Specialite
Route::get('/addSpecialite', 'adminManage@addSpecialite');
Route::post('/addSpecialite', 'adminManage@addSpecialite');
//Admin delete Specialite
Route::get('/specialitiesList/{id}', 'adminManage@deleteSpecialite');
//Admin update Specialite
Route::get('/addSpecialite/{id}', 'adminManage@updateSpecialite');
Route::post('/addSpecialite/{id}', 'adminManage@updateSpecialite');


//STUDENT
//Admin add Student
Route::get('/addStudent', 'adminManage@addStudent');
Route::post('/addStudent', 'adminManage@addStudent');
//Admin delete Student
Route::get('/studentsList/{id}', 'adminManage@deleteStudent');
//Admin update Student
Route::get('/addStudent/{id}', 'adminManage@updateStudent');
Route::post('/addStudent/{id}', 'adminManage@updateStudent');

//About us page
Route::get('/aboutus','HomeController@aboutUS');

//Contact us page
Route::get('/contactus','HomeController@contactUS');
Route::post('/contactus','HomeController@sendContact');

//Search a school v1
Route::post('/searchSchoolV1','HomeController@search1')->name('search1');

//Search a school v2
Route::post('/searchSchoolV2','HomeController@search2')->name('search2');


Route::get('/showSchool/{id}','userManage@show');
Route::get('/UStudentList/{id}','userManage@studentTab')->middleware('auth');
Route::get('/statistiquesEcoles/{id}','userManage@statistics')->middleware('auth')->name('statistics');
Route::post('/statistiquesEcoles/{id}','userManage@statistics');