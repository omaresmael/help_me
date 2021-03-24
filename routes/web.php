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

Route::group(['perfix'=>'/'],function(){

    Route::group(['middleware' => 'guest'],function(){
        Route::get('/','AuthController@loginForm')->name('login');
        Route::post('login', 'AuthController@loginAction')->name('login.action');

    });

    Route::get('pages-404', 'NazoxController@index')->name('NotFound');

    Route::group(['middleware'=>'auth'],function(){
        Route::get('logout', 'AuthController@logout')->name('logout.action');

        Route::resource('schools', 'SchoolController');
		Route::get('/city/{country}', 'SchoolController@getCities')->name('countries.cities');
        Route::post('/associated/{school}','SchoolController@getAssociatedPrograms')->name('associatedPrograms');
        Route::resource('programs', 'ProgramController');

        Route::resource('periods', 'PeriodController');

        //students
        Route::resource('students', 'StudentController');
        Route::put('/absence/{student}','StudentController@updateAbsenceDays');

        //teachers
        Route::resource('teachers', 'TeacherController');

        //fines
        Route::resource('fines', 'FineController');

        //sittings
        Route::resource('sittings', 'SittingController');


        //reports
        Route::get('financial_report/{school}','SchoolController@financialReport');
        Route::get('/schools_finance','SchoolController@totalFinanceReport')->name('schools.finance.report');
        Route::get('/students_report/{school}','SchoolController@studentsReport')->name('school.students.report');
        Route::get('/programs_report/{school}','SchoolController@programsReport')->name('school.programs.report');
        Route::get('/teachers_report/{school}','SchoolController@teachersReport')->name('school.teachers.report');
        Route::get('/sittings_report/{school}','SchoolController@sittingsReport')->name('school.sittings.report');
        Route::get('/periods_report/{school}','SchoolController@periodsReport')->name('school.periods.report');




        Route::get('/dashboard', 'HomeController@root')->name('dashboard');
        Route::get('{any}', 'HomeController@index');

        Route::get('index/{locale}', 'LocaleController@lang');



    });

});

