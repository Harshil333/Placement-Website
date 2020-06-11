@extends('../layouts.app')
@section('content')
    <div class="container">
        @if (count($applied_jobs)>0)
            @foreach ($applied_jobs as $applied_job)
                <h2>{{$applied_job->job_title}}</h2>
            @endforeach
        @else
            <h2>You haven't applied for any jobs yet!</h2>
        @endif
    </div>
@endsection