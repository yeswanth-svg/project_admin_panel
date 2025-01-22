@extends('layouts.admin')
@section('title', 'Add Team Member')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Teams Section</h3>
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
                    <a href="#">Teams</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Member</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Team Member</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.team.store') }}" enctype="multipart/form-data" class="form-group">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="position" id="position" class="form-control" required value="{{ old('position') }}">
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea name="bio" id="bio" class="form-control" required>{{ old('bio') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Profile Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <span class="text-danger">* Only png, jpg, jpeg files allowed. Max size: 2MB</span>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
