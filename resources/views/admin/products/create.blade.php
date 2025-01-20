@extends('layouts.admin')
@section('title', 'Add Product')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Products Section</h3>
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
                    <a href="#">Products</a>
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
                        <h4 class="card-title">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                            class="form-group">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required
                                    value="{{old('title')}}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                    required>{{old('description')}}</textarea>
                            </div>


                            <!--Header  Section -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Product Image</label>
                                <input type="file" name="image_path" id="dishImage" class="form-control"
                                    accept=".jpg,.png ,.jpeg" required value="{{old('image_path')}}">
                                <span class="text-danger">* You can only upload png, jpg, jpeg.Max 2MB Files</span>
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