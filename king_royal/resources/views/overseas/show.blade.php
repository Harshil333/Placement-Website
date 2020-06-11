@extends('../layouts.app')
@section('content')
    <p>First Name: {{$user->first_name}}</p>
    <p>Last Name: {{$user->last_name}}</p>
@endsection