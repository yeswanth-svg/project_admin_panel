@extends('layouts.apps')
@section('title', 'Products')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <h1 class="display-3 text-white animated slideInRight">Services</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb animated slideInRight mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Services</li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
      <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
      <h1 class="display-5 mb-4">We Provide Best Industrial Services</h1>
    </div>
    <div class="row gy-5 gx-4">
      @foreach($services as $service)
      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.{{ $loop->index * 2 + 1 }}s">
      <div class="service-item">
        <img class="img-fluid" src="{{ asset('products_images/' . $service->image_path) }}"
        alt="{{ $service->title }}" />
        <div class="service-img">
        <img class="img-fluid" src="{{ asset('products_images/' . $service->image_path) }}"
          alt="{{ $service->title }}" />
        </div>
        <div class="service-detail">
        <div class="service-title">
          <hr class="w-25" />
          <h3 class="mb-0">{{ $service->title }}</h3>
          <hr class="w-25" />
        </div>
        <div class="service-text">
          <p class="text-white mb-0">{{ $service->description }}</p>
        </div>
        </div>
        <a class="btn btn-light" href="">Read More</a>
      </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
<!-- Service End -->

@endsection