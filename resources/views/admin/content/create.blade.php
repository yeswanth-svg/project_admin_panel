@extends('layouts.admin')
@section('title', 'Add Content')
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
                    <a href="#">Add Content</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Content</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.content.store') }}" enctype="multipart/form-data"
                            class="form-group">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Content Title</label>
                                <input type="text" name="title" id="title" class="form-control" required
                                    value="{{ old('title') }}">
                            </div>


                            <div class="mb-3">
                                <label for="content" class="form-label">Content Description</label>
                                <textarea name="content" id="content" class="form-control"
                                    required>{{ old('content') }}</textarea>
                            </div>


                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.content.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection