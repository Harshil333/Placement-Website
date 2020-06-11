@extends('../layouts.app')
@section('content')
<div class="container">
    <h3>Filter Jobs by?</h3>
        <form action="{{url('/jobs/search')}}" method="POST">
            {{ csrf_field() }}
            <label class="radio-inline"><input type="radio" name="search" value="company">Company</label>
            <label class="radio-inline"><input type="radio" name="search" value="category">Category</label>
            <label class="radio-inline"><input type="radio" name="search" value="city">City</label>
            <div class="row">
                <input class="col-md-10 form-control" type="text" placeholder="Search" name="queryString">
                <button class="col-md-2 btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
    @if(count($jobs)>0)
        @foreach ($jobs as $job)
            <p>{{$job->title}}</p>
        @endforeach
    @else
        <h2>No jobs for you!</h2>
    @endif
</div>
@endsection