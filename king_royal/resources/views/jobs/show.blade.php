@extends('../layouts.app')
@section('content')
    <h1 class='text-center'>Job Detail Page</h1>
    <p>Job title:{{$job->title}}</p>
    <p>Job type:{{$job->type}}</p>
    <p>Job Description:{{$job->description}}</p>
    <p>Vacancies:{{$job->vacancies}}</p>
    <p>Posted By:{{$job->employer}}</p>
    <p>Country:{{$job->country}}</p>
@endsection