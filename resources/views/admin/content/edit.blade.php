@extends('layouts.admin')
@section('title', 'Edit Content')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Content Management</h3>
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
                    <a href="#">Content</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Content</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Contnet</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.content.update', $content->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Content Title</label>
                                <input type="text" name="title" id="title" class="form-control" required
                                    value="{{ $content->title }}">
                            </div>


                            <div class="mb-3">
                                <label for="content" class="form-label">Content Description</label>
                                <textarea name="content" id="content" class="form-control summernote"
                                    required>{{ $content->content }}</textarea>
                            </div>

                            <!-- <p>Previous Image:</p>
                            <img src="{{ asset('testimonial_images/' . $content->image_path) }}"
                                alt="Team Member Image" width="200" height="200">

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Client Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control"
                                    accept=".jpg,.png,.jpeg">
                                <span class="text-danger">* Only png, jpg, jpeg files allowed. Max size: 2MB</span>
                            </div> -->

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Cancel</a>
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