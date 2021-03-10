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

Route::group(['perfix'=>'/'],function(){

    Route::group(['middleware' => 'guest'],function(){
        Route::get('/','AuthController@loginForm')->name('login');
        Route::post('login', 'AuthController@loginAction')->name('login.action');

    });
    
    Route::get('pages-404', 'NazoxController@index')->name('NotFound');

    Route::group(['middleware'=>'auth'],function(){
        Route::resource('schools', 'SchoolController');
        Route::post('/associated/{school}','SchoolController@getAssociatedPrograms')->name('associatedPrograms');
        Route::resource('programs', 'ProgramController');
        
        Route::resource('periods', 'PeriodController');
        
        //students
        Route::resource('students', 'StudentController');
        Route::put('/absence/{student}','StudentController@updateAbsenceDays');
        
        //reports
        Route::get('financial_report/{school}','SchoolController@financialReport');
        Route::get('/schools_finance','SchoolController@totalFinanceReport')->name('schools.finance');
        
        
        Route::get('/dashboard', 'HomeController@root')->name('dasboard');
        Route::get('{any}', 'HomeController@index');
        
        Route::get('index/{locale}', 'LocaleController@lang');
        
    });
    
});

