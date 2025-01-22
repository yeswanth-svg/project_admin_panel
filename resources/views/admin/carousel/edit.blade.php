@extends('layouts.admin')
@section('title', 'Edit Header Section')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Header Section</h3>
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
                    <a href="#">Video</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Video</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Video</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.carousel.update', $carousel->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <p>Previous Video:</p>
                            <video src="{{ asset('header_section/' . $carousel->image_path) }}" alt="videos"
                                class="img-fluid" controls style="max-width: 300px; height: auto;"></video>

                            <div class="mb-3 mt-2">
                                <label for="image_path" class="form-label">New Video</label>
                                <input type="file" name="image_path" id="image_path" class="form-control" accept=".mp4">
                                <span class="text-danger">* Only mp4 files allowed. Max size: 5MB</span>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary">Cancel</a>
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