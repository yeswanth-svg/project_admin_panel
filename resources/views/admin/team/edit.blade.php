@extends('layouts.admin')
@section('title', 'Edit Team Member')
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
                    <a href="#">Edit Member</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Team Member</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.team.update', $team->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ $team->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" name="position" id="position" class="form-control" required
                                    value="{{ $team->position }}">
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea name="bio" id="bio" class="form-control summernote"
                                    required>{{ $team->bio }}</textarea>
                            </div>

                            <p>Previous Image:</p>
                            <img src="{{ asset('team_member_images/' . $team->image_path) }}" alt="Team Member Image"
                                width="200" height="200">

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Profile Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control"
                                    accept=".jpg,.png,.jpeg">
                                <span class="text-danger">* Only png, jpg, jpeg files allowed. Max size: 2MB</span>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin/core/bootstrap.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 400,   // Set editable area's height
            codemirror: { // Codemirror options
                theme: 'monokai'
            },
            toolbar: [
                ['style', ['style']], // Style dropdown
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']], // Font family
                ['fontsize', ['fontsize']], // Font size
                ['color', ['color']], // Font color
                ['para', ['ul', 'ol', 'paragraph']], // Lists and paragraph
                ['table', ['table']], // Table
                ['view', ['fullscreen', 'codeview', 'help']], // Other view options
            ],
            callbacks: {
                onChange: function (contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });

        // If there is preloaded content, load it into the summernote editor
        if ($('.summernote').length > 0) {
            $('.summernote').each(function (index, value) {
                $(this).summernote('code', $(this).data('content'));
            });
        }
    });
</script>

@endsection