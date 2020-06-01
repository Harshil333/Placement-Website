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

Route::get('/', function () {
    return view('welcome');
});


//Immigration routes
Route::get('/migrate', function () {
    return view('migrate');
});
Route::get('/migrate/A',function(){
    return view('migrate.A');
});
Route::get('/migrate/B',function(){
    return view('migrate.B');
});
Route::get('/migrate/C',function(){
    return view('migrate.C');
});
Route::get('/migrate/D',function(){
    return view('migrate.D');
});
Route::get('/migrate/E',function(){
    return view('migrate.E');
});
Route::get('/migrate/F',function(){
    return view('migrate.F');
});

//Applied Jobs
Route::get('/jobs/applied','AppliedJobsController@index');
Route::post('/jobs/{job}/applied','AppliedJobsController@create');
Route::get('/manage_candidates','AppliedJobsController@manage_candidates');

//Matched Jobs
Route::get('/jobs/matched','MatchedJobsController@index');
Route::post('/jobs/{job}/matched','MatchedJobsController@create');
Route::get('/manage_jobs','JobsController@manage_jobs');


//Jobs
Route::get('/jobs/local','JobsController@localjobs');
Route::get('/jobs/overseas','JobsController@overseasjobs');
Route::post('/jobs/search','JobsController@filteredjobs');
Route::get('/jobs/new','JobsController@new');
Route::post('/jobs','JobsController@create');
Route::get('/jobs/{job}/edit','JobsController@edit');
Route::get('/jobs/{job}','JobsController@show');
Route::patch('/jobs/{job}','JobsController@update');
Route::delete('/jobs/{job}','JobsController@delete');



//Categories
Route::get('/categories','CategoriesController@index');
Route::get('/categories/new','CategoriesController@new');
Route::post('/categories','CategoriesController@create');
Route::get('/categories/{category}','CategoriesController@show');


//Companies
Route::get('/companies','CompaniesController@index');
Route::get('/companies/{company}','CompaniesController@show');


//Employers
Route::get(url('/employers/{employer}/edit'), 'EmployersController@edit');
Route::patch('/employers/{employer}', 'EmployersController@update');
Route::get('/{user}/dashboard',function(){
    if(auth()->user()->type=="Candidate")
        return view('candidates.dashboard');
    return view('employers.dashboard');
});


//Candidates
Route::get('/candidates','CandidatesController@index');
Route::get('/candidates/{candidate}/edit','CandidatesController@edit');
Route::patch('/candidates/{candidate}','CandidatesController@update');



Route::post('/sendemail/send','MailsController@send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
