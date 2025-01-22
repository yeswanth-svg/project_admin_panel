@extends('layouts.admin')
@section('title', 'Edit Testimonial')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Testimonials Section</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Testimonials</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Testimonial</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control" required
                                    value="{{ $testimonial->client_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession</label>
                                <input type="text" name="profession" id="profession" class="form-control" required
                                    value="{{ $testimonial->profession }}">
                            </div>

                            <div class="mb-3">
                                <label for="testimonial" class="form-label">Testimonial</label>
                                <textarea name="testimonial" id="testimonial" class="form-control summernote"
                                    required>{{ $testimonial->testimonial }}</textarea>
                            </div>

                            <p>Previous Image:</p>
                            <img src="{{ asset('testimonial_images/' . $testimonial->image_path) }}"
                                alt="Team Member Image" width="200" height="200">

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Client Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control"
                                    accept=".jpg,.png,.jpeg">
                                <span class="text-danger">* Only png, jpg, jpeg files allowed. Max size: 2MB</span>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin/core/bootstrap.min.js') }}"></script>



@endsection