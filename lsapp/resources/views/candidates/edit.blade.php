@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">Edit your profile</h2>
    <form action="{{url('/candidates/'.$user_id)}}" method="POST" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="first_name" class="mb-2 mr-sm-2">First Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="first_name" placeholder="Enter first name" name="first_name" value="{{$candidate->first_name,old('first_name')}}" autofocus>
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-2 mr-sm-2">Last Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="last_name" placeholder="Enter last name" name="last_name" value="{{$candidate->last_name,old('last_name')}}">
        </div>
        <div class="form-group">
            <label for="img">Profile picture:</label>
            <input type="file" id="img" name="image" value="{{$candidate->image,old('image')}}" accept="image/*">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$candidate->email,old('email')}}">
        </div>
        <div class="form-group">
            <label for="phone_no">Contact Number:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="Enter phone no" name="phone_no" value="{{$candidate->phone_no,old('phone_no')}}">
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea class="form-control" id="bio" placeholder="Enter your bio" name="bio"></textarea>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" value="{{$candidate->city,old('city')}}">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state" value="{{$candidate->state,old('state')}}">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country" value="{{$candidate->country,old('country')}}">
        </div>
        <div class="form-group">
            <label for="linkedin">LinkedIn:</label>
            <input type="url" class="form-control" id="linkedin" placeholder="Enter your LinkedIn Profile url" name="linkedin" value="{{$candidate->linkedin,old('linkedin')}}">
        </div>
        
        <div class="row">
            <div class="col-md-8 form-group">
                <label for="qualification">Highest qualification:</label>
                <select class="form-control" id="qualification" name="qualification">
                    <option>Select your Highest Qualification</option>
                    <option value="UG">Under Graduate(U.G.)</option>
                    <option value="12th passed">12th passed</option>
                    <option value="10th passed">10th passed</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="qual_pdf">Documents:</label>
                <input type="file" id="qual_pdf" name="qual_pdf">
            </div>
        </div>
        
        <div class="form-group">
            <label for="work_experience">Work Experience:</label>
            <input type="file" id="work_experience" name="work_experience">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
