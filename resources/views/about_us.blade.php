@extends('layouts.apps')
@section('title', 'Products')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <h1 class="display-3 text-white animated slideInRight">About Us</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb animated slideInRight mb-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/aboutus">About Us</a></li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->
<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6">
        <div class="row gx-3 h-100">
          @if (!empty($aboutUs->additional_image_path))
        <div class="col-6 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid" src="{{ asset('about_images/' . $aboutUs->image_path) }}" alt="Image 1" />
        </div>
        <div class="col-6 wow fadeInDown mt-5" data-wow-delay="0.1s">
        <img class="img-fluid" src="{{ asset('about_images/' . $aboutUs->additional_image_path) }}" alt="Image 2" />
        </div>
      @else
      <div class="col-12 wow fadeInUp text-center" data-wow-delay="0.1s">
      <img class="img-fluid w-100" src="{{ asset('about_images/' . $aboutUs->image_path) }}" alt="Image 1" />
      </div>
    @endif
        </div>
      </div>
      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
        <p class="fw-medium text-uppercase text-primary mb-2">About Us</p>
        <h1 class="display-5 mb-4">{{ $aboutUs->title }}</h1>
        <p class="mb-4">{!! $aboutUs->content !!}</p>

        <div class="row pt-2">
          <div class="col-sm-6">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                <i class="fa fa-envelope-open text-white"></i>
              </div>
              <div class="ms-3">
                <p class="mb-2">Email Address</p>
                <h5 class="mb-0">{{ $emailContent->content ?? 'Email not available' }}</h5>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                <i class="fa fa-phone-alt text-white"></i>
              </div>
              <div class="ms-3">
                <p class="mb-2">Phone Number</p>
                <h5 class="mb-0">{{ $phoneContent->content ?? 'Phone number not available' }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- About End -->


<!-- Facts Start -->
<!-- <div class="container-fluid facts my-5 p-5">
  <div class="row g-5">
    <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
      <div class="text-center border p-5">
        <i class="fa fa-certificate fa-3x text-white mb-3"></i>
        <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">
          25
        </h1>
        <span class="fs-5 fw-semi-bold text-white">Years Experience</span>
      </div>
    </div>
    <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
      <div class="text-center border p-5">
        <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
        <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">
          135
        </h1>
        <span class="fs-5 fw-semi-bold text-white">Team Members</span>
      </div>
    </div>
    <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
      <div class="text-center border p-5">
        <i class="fa fa-users fa-3x text-white mb-3"></i>
        <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">
          957
        </h1>
        <span class="fs-5 fw-semi-bold text-white">Happy Clients</span>
      </div>
    </div>
    <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
      <div class="text-center border p-5">
        <i class="fa fa-check-double fa-3x text-white mb-3"></i>
        <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">
          1839
        </h1>
        <span class="fs-5 fw-semi-bold text-white">Projects Done</span>
      </div>
    </div>
  </div>
</div> -->
<!-- Facts End -->

<!-- Team Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
      <p class="fw-medium text-uppercase text-primary mb-2">Our Team</p>
      <h1 class="display-5 mb-5">Dedicated Team Members</h1>
    </div>
    <div class="row g-4">
      @foreach($teams as $team)
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
      <div class="team-item">
        <img class="img-fluid" src="{{ asset('team_member_images/' . $team->image_path) }}" alt="{{ $team->name }}" />
        <div class="d-flex">
        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px">
          <i class="fa fa-2x fa-share text-white"></i>
        </div>
        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
          style="height: 90px">
          <h5>{{ $team->name }}</h5>
          <span class="text-primary">{{ $team->position }}</span>
          <!-- <p>{{ $team->bio }}</p> -->
          <div class="team-social">
          <p class="text-white">{{ $team->bio }}</p>
          <!-- <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
      class="fab fa-facebook-f"></i></a>
      <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
      class="fab fa-twitter"></i></a>
      <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
      class="fab fa-instagram"></i></a> -->
          </div>
        </div>
        </div>
      </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
<!-- Team End -->

<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- 16:9 aspect ratio -->
        <div class="ratio ratio-16x9">
          <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
            allow="autoplay"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Video Modal End -->
@endsection