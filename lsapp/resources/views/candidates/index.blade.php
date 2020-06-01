@extends('../layouts.app')
@section('content')
    @if (count($candidates)>0)
        @foreach ($candidates as $candidate)
            <p>{{$candidate->first_name}}</p>
        @endforeach
    @else
        <h2>No Candidates Registered yet!</h2>
    @endif    
@endsection
