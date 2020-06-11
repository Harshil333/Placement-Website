@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">New Company</h2>
    <form action="{{url('/companies')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name" class="mb-2 mr-sm-2">Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="first_name" placeholder="Enter the name of your company" name="name" autofocus>
        </div>
        <div class="form-group">
            <label for="img">Logo:</label>
            <input type="file" id="img" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="phone_no">Contact Number:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="Enter phone no" name="phone_no">
        </div>
        <div class="form-group">
            <label for="bio">Description:</label>
            <textarea class="form-control" id="bio" placeholder="Enter a tag line" name="description"></textarea>
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