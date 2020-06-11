@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">Edit your profile</h2>
    <form action="{{url('/employers/'.$user_id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="first_name" class="mb-2 mr-sm-2">First Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="first_name" placeholder="Enter first name" name="first_name" value="{{old('first_name',$employer->first_name)}}" autofocus>
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-2 mr-sm-2">Last Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="last_name" placeholder="Enter last name" name="last_name" value="{{old('last_name',$employer->last_name)}}">
        </div>
        <div class="form-group">
            <label for="company_name" class="mb-2 mr-sm-2">Company Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="company_name" placeholder="Enter your company name" name="company_name" value="{{old('company_name',$employer->company_name)}}">
        </div>
        <div class="form-group">
            <label for="img">Profile picture:</label>
            <input type="file" id="img" name="image" accept="image/*" value="{{old('image',$employer->image)}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email',$employer->email)}}">
        </div>
        <div class="form-group">
            <label for="phone_no">Contact Number:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="Enter phone no" name="phone_no" value="{{old('phone_no',$employer->phone_no)}}">
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea class="form-control" id="bio" placeholder="Enter your bio" name="bio">{{$employer->bio}}</textarea>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" value="{{old('city',$employer->city)}}">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state" value="{{old('state',$employer->state)}}">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country" value="{{old('country',$employer->country)}}">
        </div>
        <div class="form-group">
            <label for="linkedin">LinkedIn:</label>
            <input type="url" class="form-control" id="linkedin" placeholder="Enter your LinkedIn Profile url" name="linkedin" value="{{old('linkedin',$employer->linkedin)}}">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="url" class="form-control" id="facebook" placeholder="Enter your Facebook Profile url" name="facebook" value="{{old('facebook',$employer->facebook)}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection