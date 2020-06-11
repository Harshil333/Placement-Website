@extends('../layouts.app')
@section('content')
    <div class="container">
    @if(count($jobs)>0)
        @foreach ($jobs as $job)
            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h3>{{$job->title}}</h3>
                        <p>Posted by: {{$job->employer_name}}</p>
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="col-md-5">
                        <a class='btn btn-warning' href="{{url('/jobs/'.$job->id.'/edit')}}">Edit</a>
                        <form action="{{url('/jobs/'.$job->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h3>No jobs have been posted by you yet!</h3>
    @endif
    </div>
@endsection