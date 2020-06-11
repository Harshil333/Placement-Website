@extends('../layouts.app')
@section('content')
    @if(count($categories)>0)
        @foreach ($categories as $category)
            <p>Name:{{$category->name}}</p>
        @endforeach
    @else
        <h1>No Categories in the Database yet!</h1>
    @endif
@endsection