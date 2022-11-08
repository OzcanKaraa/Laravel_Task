<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/homepage', [Controller::class, 'index'])->name('home');  //Homepage
Route::get('/student/register', [Controller::class, 'studentRegister'])->name('student-register');

Route::post('/store-form', [Controller::class,'kayıtOl']);  //kayıtOl işlemi

Route::get('/', function (){
    return view('login');})->name('loginView'); //

Route::get('/register-page', function (){
    return view('register');})->name('registerPage');

Route::post('/login', [Controller::class, 'girisYap'])->name('girisYap');   //login

Route::post('/studentRegister', [Controller::class, 'addStudent'])->name('add-student');

//Update
Route::get('/studentupdate/{id}', [Controller::class, 'updateStudentPage'])->name('update-student-page');

Route::post('/studentUpdate/{id}', [Controller::class, 'updateStudent'])->name('update-student');

//Delete
Route::get('/studentdelete{id}', [Controller::class, 'deleteStudent'])->name('delete-student');


Route::get('/search', [Controller::class, 'search'])->name('students');;

