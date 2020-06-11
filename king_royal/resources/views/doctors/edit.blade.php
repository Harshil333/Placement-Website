@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">Edit your profile</h2>
    <form action="{{url('/doctors/'.$user_id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="first_name" class="mb-2 mr-sm-2">First Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="first_name" placeholder="Enter first name" name="first_name" value="{{old('first_name',$user->first_name)}}" autofocus>
        </div>
        <div class="form-group">
            <label for="last_name" class="mb-2 mr-sm-2">Last Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="last_name" placeholder="Enter last name" name="last_name" value="{{old('last_name',$user->last_name)}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email',$user->email)}}">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" value="{{old('city',$user->city)}}">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state" value="{{old('state',$user->state)}}">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" placeholder="Enter your country" name="country" value="{{old('country',$user->country)}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection