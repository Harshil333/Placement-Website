@extends('../layouts.app')
@section('content')
    <div class="container">
        @if (count($matched_jobs)>0)
            @foreach ($matched_jobs as $matched_job)
                <h2>{{$matched_job->job_title}}</h2>
            @endforeach
        @else
            <h2>You haven't matched with any job yet!</h2>
        @endif
    </div>
@endsection