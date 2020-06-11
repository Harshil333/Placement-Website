@extends('../layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a class="btn btn-primary" href="/candidates/new">New Candidate</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="/employers/new">New Employer</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="/doctors/new">New Doctor</a>
        </div>
        <div class="col-md-3">
            <a class="btn btn-primary" href="/accounts/new">New Accountant</a>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <ul class="list-group" style="width:fit-content; margin-top: auto;">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="dropdown-item" href="{{url('/reception/'.Auth::user()->id.'/dashboard')}}">Dashboard</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="dropdown-item" href="{{url('/jobs/local')}}">Browse Local Jobs</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="dropdown-item" href="{{url('/jobs/overseas')}}">Browse Overseas Jobs</a>
            <span class="badge badge-primary badge-pill" style="margin-left: 5px;">1</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="dropdown-item" href="{{url('/reception/'.Auth::user()->id.'/edit')}}">Edit Profile</a>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </div>
  
      <div class="col-md-8" style="margin-top: 70px;">
        <div class="card-columns">
          <div class="card bg-primary">
          <div class="card-body text-center">
            <p class="card-text">{{$user_count}} Active Users</p>
          </div>
        </div>
        <div class="card bg-warning" style="margin-left: 50px;">
          <div class="card-body text-center">
            <p class="card-text">{{$candidate_count}} Jobseekers</p>
          </div>
        </div>
        <div class="card bg-warning" style="margin-left: 50px;">
            <div class="card-body text-center">
              <p class="card-text">{{$employer_count}} Employers</p>
            </div>
        </div>
        <div class="card bg-warning" style="margin-left: 50px;">
            <div class="card-body text-center">
              <p class="card-text">{{$category_count}} Categories</p>
            </div>
        </div>
        <div class="card bg-warning" style="margin-left: 50px;">
            <div class="card-body text-center">
              <p class="card-text">{{$company_count}} Companies</p>
            </div>
        </div>
      </div>
    <!-- </div> -->
    
    <div style="margin-top: 20px;">
    <h2 class="text-center">Recent Activites of {{auth()->user()->first_name}}</h2>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Next</th>
          <th>Next</th>
          <th>Next</th>
          <th>Next</th>
          <th>Next</th>
          <th>Next</th>
        </tr>
      </thead>
      <tbody>
        <a href="#">
          <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
          </tr>
        </a>
        <a href="#">
          <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
          </tr>
        </a>
        <a href="#">
          <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
          </tr>
        </a>
      </tbody>
    </table>
  </div>
  </div>
  </div>
@endsection