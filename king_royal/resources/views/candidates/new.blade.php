@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">New Candidate</h2>
    <form action="{{url('/employers')}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="first_name" class="mb-2 mr-sm-2">First Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="first_name" placeholder="Enter first name" name="first_name" autofocus>
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-2 mr-sm-2">Last Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="last_name" placeholder="Enter last name" name="last_name">
        </div>
        <div class="form-group">
            <label for="img">Profile picture:</label>
            <input type="file" id="img" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="phone_no">Contact Number:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="Enter phone no" name="phone_no">
        </div>
        <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea class="form-control" id="bio" placeholder="Enter your bio" name="bio"></textarea>
        </div>
        <div class="form-group">
            <label for="linkedin">LinkedIn:</label>
            <input type="url" class="form-control" id="linkedin" placeholder="Enter your LinkedIn Profile url" name="linkedin">
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
        <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection