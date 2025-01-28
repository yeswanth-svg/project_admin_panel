@extends('layouts.admin')
@section('title', 'Add Testimonial')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Testimonial Section</h3>
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
                    <a href="#">Add Testimonial</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-danger fw-bold fs-5">Add Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.testimonials.store') }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf

                            <div class="mb-3">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control" required
                                    value="{{ old('client_name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="profession" class="form-label">Profession</label>
                                <input type="text" name="profession" id="profession" class="form-control" required
                                    value="{{ old('profession') }}">
                            </div>

                            <div class="mb-3">
                                <label for="testimonial" class="form-label">Testimonial</label>
                                <textarea name="testimonial" id="testimonial" class="form-control"
                                    required>{{ old('testimonial') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Profile Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control"
                                    accept=".jpg,.png,.jpeg" required>
                                <span class="text-danger"> * You can only upload png, jpg, jpeg. Max 2MB Files.
                                    Resolution must be 100*100
                                    pixels.
                                </span>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection