@extends('../layouts.app')
@section('content')
    <p>Name:{{$category->name}}</p>
    <br>
    <br>
    <h2>Jobs present in this category:</h2>
    @foreach ($category->jobs as $job)
        <p>{{$job->name}}</p>
    @endforeach
@endsection