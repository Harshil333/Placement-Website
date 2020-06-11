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
use App\AppliedJob;
use App\MatchedJob;
use App\Job;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Immigration routes
Route::get('/migrate', function () {
    return view('migrate');
});



//Applied Jobs
Route::get('/jobs/applied','AppliedJobsController@index');
Route::post('/jobs/{id}/applied','AppliedJobsController@create');
Route::get('/manage_candidates','AppliedJobsController@manage_candidates');



//Matched Jobs
Route::get('/jobs/matched','MatchedJobsController@index');
Route::post('/jobs/{id}/matched','MatchedJobsController@create');
Route::post('/jobs/{id}/unmatched','MatchedJobsController@destroy');
Route::get('/manage_jobs','JobsController@manage_jobs');



//Jobs
Route::get('/jobs/local','JobsController@localjobs');
Route::get('/jobs/overseas','JobsController@overseasjobs');
Route::post('/jobs/search','JobsController@filteredjobs');
Route::get('/jobs/new','JobsController@new');
Route::post('/jobs','JobsController@create');
Route::get('/jobs/{id}/edit','JobsController@edit');
Route::get('/jobs/{id}','JobsController@show');
Route::patch('/jobs/{id}','JobsController@update');
Route::delete('/jobs/{id}','JobsController@destroy');



//Candidates
Route::get('/candidates/new','CandidatesController@new');
Route::post('/candidates','CandidatesController@create');
Route::post('/candidates/search','LocalsController@search');
Route::get('/candidates/{id}/edit','CandidatesController@edit');
Route::get('/candidates/{id}','CandidatesController@show');
Route::patch('/candidates/{id}','CandidatesController@update');
Route::get('/candidates/{id}/dashboard',function(){
    $no_of_applied_jobs = AppliedJob::where('candidate_id','id')->count();
    $no_of_matched_jobs = MatchedJob::where('candidate_id','id')->count();
    return view('candidates.dashboard')->with(['applied_jobs'=>$no_of_applied_jobs,'matched_jobs'=>$no_of_matched_jobs]);
});



//Employers
Route::get('/employers/new','EmployersController@new');
Route::post('/employers','EmployersController@create');
Route::get('/employers/{id}/edit', 'EmployersController@edit');
Route::patch('/employers/{id}', 'EmployersController@update');
Route::get('/employers/{id}/dashboard',function(){
    $no_of_applied_jobs = AppliedJob::where('employer_id',auth()->user()->id)->count();
    $no_of_jobs = Job::where('employer_name',auth()->user()->first_name.' '.auth()->user()->last_name)->count();
    return view('employers.dashboard')->with(['applied_jobs'=>$no_of_applied_jobs,'posted_jobs'=>$no_of_jobs]);
});



//Categories
Route::get('/categories','CategoriesController@index');
Route::get('/categories/new','CategoriesController@new');
Route::post('/categories','CategoriesController@create');
Route::get('/categories/{id}','CategoriesController@show');



//Companies
Route::get('/companies','CompaniesController@index');
Route::get('/companies/new','CompaniesController@new');
Route::post('/companies','CompaniesController@create');
Route::get('/companies/{id}','CompaniesController@show');



//Receptionist
Route::get('/reception/{id}/dashboard','ReceptionistController@dashboard');
Route::get('/reception/new','ReceptionistController@new');
Route::post('/reception','ReceptionistController@create');
Route::get('/reception/{id}','ReceptionistController@show');
Route::get('/reception/{id}/edit','ReceptionistController@edit');
Route::patch('/reception/{id}','ReceptionistController@update');
Route::delete('/reception/{id}','ReceptionistController@destroy');



//Doctor
Route::get('/doctors/{id}/dashboard','DoctorsController@dashboard');
Route::get('/doctors/new','DoctorsController@new');
Route::post('/doctors','DoctorsController@create');
Route::get('/doctors/manage','DoctorsController@manage_candidates');
Route::get('/doctors/{id}','DoctorsController@show');
Route::get('/doctors/{id}/edit','DoctorsController@edit');
Route::patch('/doctors/{id}','DoctorsController@update');
Route::delete('/doctors/{id}','DoctorsController@destroy');



//Account Manager
Route::get('/accounts/{id}/dashboard','AccountsController@dashboard');
Route::get('/accounts/new','AccountsController@new');
Route::post('/accounts','AccountsController@create');
Route::get('/accounts/{id}','AccountsController@show');
Route::get('/accounts/{id}/edit','AccountsController@edit');
Route::patch('/accounts/{id}','AccountsController@update');
Route::delete('/accounts/{id}','AccountsController@destroy');



//Payments
Route::get('/payments/new','PaymentsController@new');
Route::post('/payments','PaymentsController@create');
Route::get('/payments/confirmed','PaymentsController@confirmed');
Route::get('/payments/pending','PaymentsController@pending');
Route::patch('/payments/{id}/confirm_payment','PaymentsController@confirm_payment');



//Immigration Counsellor
Route::get('/immigrations/{id}/dashboard','ImmigrationsController@dashboard');
Route::get('/immigrations/new','ImmigrationsController@new');
Route::post('/immigrations','ImmigrationsController@create');
Route::get('/immigrations/check_eligibility','ImmigrationsController@check_eligibility');
Route::get('/immigrations/visa_status','ImmigrationsController@visa_status');
Route::get('/immigrations/{id}','ImmigrationsController@show');
Route::get('/immigrations/{id}/edit','ImmigrationsController@edit');
Route::patch('/immigrations/{id}','ImmigrationsController@update');
Route::delete('/immigrations/{id}','ImmigrationsController@destroy');


//LocalJobs Counsellor
Route::get('/locals/{id}/dashboard','LocalsController@dashboard');
Route::get('/locals/new','LocalsController@new');
Route::post('/locals','LocalsController@create');
Route::get('/locals/verify','LocalsController@verify');
Route::patch('/verified/{id}','LocalsController@verified');
Route::get('/locals/{id}','LocalsController@show');
Route::get('/locals/{id}/edit','LocalsController@edit');
Route::patch('/locals/{id}','LocalsController@update');
Route::delete('/locals/{id}','LocalsController@destroy');



//OverseasJobs Counsellor
Route::get('/overseas/{id}/dashboard','OverseasController@dashboard');
Route::get('/overseas/new','OverseasController@new');
Route::post('/overseas','OverseasController@create');
Route::get('/overseas/verify','OverseasController@verify');
Route::get('/overseas/{id}','OverseasController@show');
Route::get('/overseas/{id}/edit','OverseasController@edit');
Route::patch('/overseas/{id}','OverseasController@update');
Route::delete('/overseas/{id}','OverseasController@destroy');



Route::get('/home', 'HomeController@index')->name('home');
