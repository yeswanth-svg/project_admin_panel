@extends('layouts.admin')
@section('title', 'Create')
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
                    <a href="#">Add</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Video</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.carousel.store') }}" enctype="multipart/form-data"
                            class="form-group">
                            @csrf

                            <!--Header  Section -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Header Video</label>
                                <input type="file" name="image_path" id="dishImage" class="form-control" accept=".mp4"
                                    required value="{{old('image_path')}}">
                                <span class="text-danger">* You can only upload mp4.Max 5MB Files.Resolution must be 1920*1080</span>
                            </div>


                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection