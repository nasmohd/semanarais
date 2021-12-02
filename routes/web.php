<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\AdminComplaints;
use App\Http\Controllers\MinistryComplaints;
use App\Http\Controllers\AdminViewMinistries;
use App\Http\Controllers\MinistrySolvedComplaints;
use App\Http\Controllers\AdminViewUsers;
use App\Http\Controllers\ComplaintInfo;
use App\Http\Controllers\PresidentComplaints;
use App\Http\Controllers\PresidentFlaggedComplaints;
use App\Http\Controllers\PresidentMinistryInfo;

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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [ComplaintsController::class, 'index']);
Route::get('/Adminhome', [AdminComplaints::class, 'index']);
Route::get('/Ministryhome', [MinistryComplaints::class, 'index']);

Route::get('/Presidenthome', [PresidentComplaints::class, 'index']);
Route::get('/PresidentFlags', [PresidentFlaggedComplaints::class, 'index']);

Route::get('/MinistrySolved', [MinistrySolvedComplaints::class, 'index']);

Route::get('/AdminViewMinistries', [AdminViewMinistries::class, 'index']);
Route::get('/AdminViewUsers', [AdminViewUsers::class, 'index']);


Route::get('/PresidentMinistryInfo', [PresidentMinistryInfo::class, 'index']);


Route::get('/complaint/{complaint}/edit', 'App\Http\Controllers\ComplaintsController@edit')->name('Complaints_editControllerURL');
Route::get('/complaint/{complaint}/Viewrecord', 'App\Http\Controllers\ComplaintInfo@edit')->name('Complaints_editControllerURL');



Route::get('/complaints/view', 'App\Http\Controllers\adminViewComplaints@index')->name('adminViewComplaints');


// Route::get('/AdminAddMinistry', 'App\Http\Controllers\ComplaintsController@edit')->name('Complaints_editControllerURL');

Route::post('/store', 'App\Http\Controllers\ComplaintsController@store')->name('Complaints_storeControllerURL');

Route::post('/Adminstore', 'App\Http\Controllers\AdminViewMinistries@store')->name('AdminAddMinistryControllerURL');

// Route::post('/store', [App\Http\Controllers\ComplaintsController::class, 'store']);
// Route::get('/create', 'ComplaintsController@create');
// Route::post('/store', 'App\Http\Controllers\ComplaintsController@store');


// Route::post('/update', [App\Http\Controllers\ComplaintsController::class, 'update']);
Route::put('/complaint/{id}/{update', 'App\Http\Controllers\ComplaintsController@update')->name('Complaints_updateControllerURL');
Route::put('/Ministrycomplaint/{id}/update', 'App\Http\Controllers\MinistryComplaints@update')->name('MinistryComplaintsController');
Route::put('/Presidentflag/{id}/{ministry}/update', 'App\Http\Controllers\PresidentComplaints@update')->name('Complaints_updateControllerURL');

Route::put('/Presidentflagged/{id}/{ministry}/update', 'App\Http\Controllers\PresidentFlaggedComplaints@update')->name('Complaints_updateControllerURL');

Route::delete('/complaint/{id}/destroy', 'App\Http\Controllers\ComplaintsController@destroy')->name('Complaints_updateControllerURL');
Route::delete('/ministry/{id}/destroy', 'App\Http\Controllers\AdminViewMinistries@destroy')->name('AdminDeletes_Controller');

Route::delete('/Admincomplaint/{id}/destroy', 'App\Http\Controllers\adminViewComplaints@destroy')->name('AdminDeletes_Controller');

Route::delete('/AdminUser/{id}/destroy', 'App\Http\Controllers\AdminViewUsers@destroy')->name('AdminViewUsers_Controller');

Route::delete('/minCount/{id}/destroy', 'App\Http\Controllers\PresidentMinistryInfo@destroy')->name('AdminViewUsers_Controller');

// Route::get('/update', 'ComplaintsController@update', function(){
// 	return view('dashboard');
// });

// Route::resource('/create', 'ComplaintsController');
// Route::get ('/create', function(){
// 	return 'H';
// });

// Route::get('/home/create', [App\Http\Controllers\ComplaintsController::class, 'create'])->name('home');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
