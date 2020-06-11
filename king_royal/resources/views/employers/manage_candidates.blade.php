@extends('../layouts.app')
@section('content')
    <div class="container">
    @if(count($jobs)>0)
        @foreach ($jobs as $job)
            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <h3>{{$job->title}}</h3>
                        <p>Candidate ID: {{$job->candidate_id}}</p>
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="col-md-5">
                        <form action="{{url('/jobs/'.$job->id.'/matched')}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{url('/jobs/'.$job->id.'/unmatched')}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h3>No candidates have applied for your jobs yet!</h3>
    @endif
    </div>
@endsection