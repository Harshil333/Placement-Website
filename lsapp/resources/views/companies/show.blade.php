@extends('../layouts.app')
@section('content')
    <p>Name:{{$company->name}}</p>
    <p>Description:{{$company->description}}</p>
    <p>Banaya Kaun hai:{{$company->employer_name}}</p>
    <p>Helpline Desk:{{$company->phone_no}}</p>
    <p>Country:{{$company->country}}</p>
    <br>
    <br>
    <h2>Jobs provided by this company:</h2>
    @foreach ($company->jobs as $job)
        <p>{{$job->name}}</p>
    @endforeach
@endsection