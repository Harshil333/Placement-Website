@extends('../layouts.app')
@section('content')
    <div class="container">
    <form action="/categories" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="mb-2 mr-sm-2">Category Name:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="name" placeholder="Enter the name of your company" name="name" autofocus>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
    </div>
@endsection