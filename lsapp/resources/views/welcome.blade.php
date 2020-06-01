<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/resources/css/welcome.css">
    </head>
    <body>
        @extends('layouts.app')
        @section('content')


            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div><h2 style="margin:200px auto 15px auto;">Company Name</h2>
                        <h4>Some Tag Line</h4>
                        <p>Voh text aata jata hai voh vala part chaiye coz Victor loves it XD!</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img class="img-responsive" src="https://www.glassdoor.com/blog/app/uploads/sites/13/hire-me-sign.jpg" alt="">
                    </div>
                </div>
            </div>

            <div style="color: green; text-align: center;">
                <h2 style="margin-top:60px;"><div style="display:inline-block">Popular Categories</div></h2>
            </div>
            <div class="container" style="margin-top: 10px;">
                <div class="card-columns">
                  
                    <a href="#">
                    <div class="card card-body text-center">
                      <p class="card-text">A</p>
                    </div>
                    </a>
                    
                    <a href="#">
                    <div class="card card-body text-center">
                        <p class="card-text">B</p>
                    </div>
                    </a>
                      
                    <a href="#">
                    <div class="card card-body text-center">
                        <p class="card-text">C</p>
                    </div>
                    </a>
                        
                    <a href="#">
                    <div class="card card-body text-center">
                        <p class="card-text">D</p>
                    </div>
                    </a>
                  
                    <a href="#">
                    <div class="card card-body text-center">
                        <p class="card-text">E</p>
                    </div>
                    </a>
                  
                    <a href="#">
                    <div class="card card-body text-center">
                      <p class="card-text">F</p>
                    </div>
                    </a>
                    
                </div>
            </div>
            <div style="text-align: center;">
                <h2><a href="#" class="btn btn-lg btn-success" style="display:inline-block; color:black;">Browse All Categories</a></h2>
            </div>

            <div class="container">
                <h2 style="margin-top:60px;" class="text-center">Popular Jobs</h2>
                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>

                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>

                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>

                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>

                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>

                <div style="margin:15px;" class="card">
                    <h5 class="card-header">Featured</h5>
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    @if (!Auth::guest() and Auth::user()->type=='Candidate')
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    @endif
                    </div>
                </div>
            </div>


            <!-- Section: Testimonials v.3 -->
            <section class="container team-section text-center my-5">
            <h2 class="h1-responsive font-weight-bold my-5">What Our Users Say?</h2>

            <!-- Section description -->
            <p class="dark-grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
            eum porro a pariatur veniam.</p>

            <div class="row text-center">

            <div class="col-md-4 mb-md-0 mb-5">
                <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle z-depth-1 img-fluid">
                </div>
                <!--Content-->
                <h4 class="font-weight-bold dark-grey-text mt-4">Anna Deynah</h4>
                <h6 class="font-weight-bold blue-text my-3">Web Designer</h6>
                <p class="font-weight-normal dark-grey-text">
                    <i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                    eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
                </div>
            </div>
    
            <div class="col-md-4 mb-md-0 mb-5">
                <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle z-depth-1 img-fluid">
                </div>
                <!--Content-->
                <h4 class="font-weight-bold dark-grey-text mt-4">John Doe</h4>
                <h6 class="font-weight-bold blue-text my-3">Web Developer</h6>
                <p class="font-weight-normal dark-grey-text">
                    <i class="fas fa-quote-left pr-2"></i>Ut enim ad minima veniam, quis nostrum exercitationem ullam
                    corporis suscipit laboriosam, nisi ut aliquid commodi.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle z-depth-1 img-fluid">
                </div>
                <!--Content-->
                <h4 class="font-weight-bold dark-grey-text mt-4">Maria Kate</h4>
                <h6 class="font-weight-bold blue-text my-3">Photographer</h6>
                <p class="font-weight-normal dark-grey-text">
                    <i class="fas fa-quote-left pr-2"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                    blanditiis praesentium voluptatum deleniti atque corrupti.</p>
                </div>
            </div>
            </div>
            </section>

        @endsection
    </body>
</html>
