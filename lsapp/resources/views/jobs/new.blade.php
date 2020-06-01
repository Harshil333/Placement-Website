@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">Post a New Job</h2>
    <form action="{{url('/jobs')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title" class="mb-2 mr-sm-2">Title:</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="title" placeholder="Job title goes here" name="title" autofocus>
        </div>
        <div class="form-group">
          <label for="type" class="mb-2 mr-sm-2">Type:</label>
            <select name="type" class="form-control mb-2 mr-sm-2" id="type">
                <option>Select a type for your job</option>
                <option value="part time">Part Time</option>
                <option value="full time">Full Time</option>
                <option value="internship">Internship</option>
            </select>
        </div> 
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" placeholder="Enter a sweet and small description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="vacancies">Vacancies:</label>
            <input type="number" class="form-control" id="vacancies" placeholder="Enter the number of vacancies" name="vacancies">
        </div>
        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" id="company" placeholder="Enter your company name" name="company_name">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>   
@endsection