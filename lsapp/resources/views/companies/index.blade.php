@extends('../layouts.app')
@section('content')
    @if(count($companies)>0)
        @foreach ($companies as $company)
            <p>Name:{{$company->name}}</p>
        @endforeach
    @else
        <h1>No Companies Registered yet!</h1>
    @endif
@endsection