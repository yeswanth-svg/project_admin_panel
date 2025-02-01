@extends('layouts.apps')
@section('content')

<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <!-- <div id="header-carousel" class="carousel slide" data-bs-ride="carousel"> -->
    <div class="carousel-inner">
        @foreach ($carousels as $index => $carousel)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                @if (pathinfo($carousel->image_path, PATHINFO_EXTENSION) == 'mp4')
                    <video class="w-100" autoplay loop muted>
                        <source src="{{ asset('header_section/' . $carousel->image_path) }}" type="video/mp4">
                    </video>
                @else
                    <img class="w-100" src="{{ asset('header_section/' . $carousel->image_path) }}" alt="Carousel Image">
                @endif
                <!-- <div class="carousel-caption">
                                                                                                            <div class="container">
                                                                                                                <div class="row justify-content-center">
                                                                                                                    <div class="col-lg-10 text-start">
                                                                                                                        <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">
                                                                                                                            {{ $carousel->title ?? 'Default Title' }}
                                                                                                                        </p>
                                                                                                                        <h1 class="display-1 text-white mb-5 animated slideInRight">
                                                                                                                            {{ $carousel->description ?? 'Default Description' }}
                                                                                                                        </h1>
                                                                                                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div> -->
            </div>
        @endforeach
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
</div>

<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    @if (!empty($aboutUs->additional_image_path))
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="{{ asset('about_images/' . $aboutUs->image_path) }}"
                                alt="Image 1" />
                        </div>
                        <div class="col-6 wow fadeInDown mt-5" data-wow-delay="0.1s">
                            <img class="img-fluid" src="{{ asset('about_images/' . $aboutUs->additional_image_path) }}"
                                alt="Image 2" />
                        </div>
                    @else
                        <div class="col-12 wow fadeInUp text-center" data-wow-delay="0.1s">
                            <img class="img-fluid w-100" src="{{ asset('about_images/' . $aboutUs->image_path) }}"
                                alt="Image 1" />
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

<!-- Features Start -->
<!-- <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative me-lg-4">
                    <img class="img-fluid w-100" src="img/feature.jpg" alt="" />
                    <span
                        class="position-absolute top-50 start-100 translate-middle bg-white rounded-circle d-none d-lg-block"
                        style="width: 120px; height: 120px"></span>
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">
                    Why Choosing Us!
                </p>
                <h1 class="display-5 mb-4">Few Reasons Why People Choosing Us!</h1>
                <p class="mb-4">
                    Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                    diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
                    lorem sit clita duo justo magna dolore erat amet
                </p>
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>Experienced Workers</h4>
                                <span>Clita erat ipsum et lorem et sit, sed stet lorem sit
                                    clita duo justo magna dolore erat amet</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>Reliable Industrial Services</h4>
                                <span>Clita erat ipsum et lorem et sit, sed stet lorem sit
                                    clita duo justo magna dolore erat amet</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ms-4">
                                <h4>24/7 Customer Support</h4>
                                <span>Clita erat ipsum et lorem et sit, sed stet lorem sit
                                    clita duo justo magna dolore erat amet</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Features End -->

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

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Products</p>
            <h1 class="display-5 mb-4">We Provide Best Industrial Products</h1>
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
                        <a class="btn btn-light" href="{{ route('services.show', $service->id) }}">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Project Start -->
<!-- <div class="container-fluid bg-dark pt-5 my-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px">
        <p class="fw-medium text-uppercase text-primary mb-2">Our Projects</p>
        <h1 class="display-5 text-white mb-5">
            See What We Have Completed Recently
        </h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-1.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Auto Engineering</h5>
            </div>
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-2.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Civil Engineering</h5>
            </div>
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-3.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Gas Engineering</h5>
            </div>
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-4.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Power Engineering</h5>
            </div>
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-5.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Energy Engineering</h5>
            </div>
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/project-6.jpg" alt="" />
            <div class="project-title">
                <h5 class="text-primary mb-0">Water Engineering</h5>
            </div>
        </a>
    </div>
</div> -->
<!-- Project End -->

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
                        <img class="img-fluid" src="{{ asset('team_member_images/' . $team->image_path) }}"
                            alt="{{ $team->name }}" />
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

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            <p class="fw-medium text-uppercase text-primary mb-2">Testimonial</p>
            <h1 class="display-5 mb-5">What Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach($testimonials as $testimonial) 
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5"
                            src="{{asset('testimonial_images/' . $testimonial->image_path)}}" />
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>{{$testimonial->testimonial}}</p>
                        <h5 class="mb-1">{{$testimonial->client_name}}</h5>
                        <span class="fst-italic">{{$testimonial->profession}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->

@endsection