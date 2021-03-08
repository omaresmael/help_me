<?php

use App\Http\Controllers\ProgramController;
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

// Route::get('/', function () {
//     return redirect('/index');
// });

Auth::routes();
Route::resource('schools', 'SchoolController');
Route::post('/associated/{school}','SchoolController@getAssociatedPrograms')->name('associatedPrograms');
Route::resource('programs', 'ProgramController');
//


Route::resource('periods', 'PeriodController');

//students
Route::resource('students', 'StudentController');
Route::put('/absence/{student}','StudentController@updateAbsenceDays');

//reports
Route::get('financial_report/{school}','SchoolController@financialReport');



Route::get('pages-404', 'NazoxController@index');
Route::get('/', 'HomeController@root');
Route::get('{any}', 'HomeController@index');

Route::get('index/{locale}', 'LocaleController@lang');


