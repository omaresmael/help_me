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
        //financial_years
        Route::resource('financial_years','FinancialYearController');
        Route::post('/financial_years/budget/{financial_year}','FinancialYearController@budget')->name('financial_years.budget');

        //students
        Route::get('/students/search/','StudentController@show')->name('students.search');
        Route::resource('students', 'StudentController');
        Route::get('/absence','StudentController@AddAbsenceDays')->name('absence.create');
        Route::post('/absence/','StudentController@updateAbsenceDays')->name('absence.update');


        //teachers
        Route::resource('teachers', 'TeacherController');

        //users
        Route::resource('users', 'UserController');

        //fines
        Route::resource('fines', 'FineController');

        //sittings
        Route::resource('sittings', 'SittingController');


        //reports
        Route::get('financial_report/{school}','SchoolController@financialReport')->middleware('can:show','App\Models\Report');
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

