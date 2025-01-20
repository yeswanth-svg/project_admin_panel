@extends('layouts.admin')
@section('title', 'AboutUs')
@section('content')


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="{{ asset('js/admin/core/jquery-3.7.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Aboutus Section</h3>
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
                    <a href="#">aboutus</a>
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
                        <h4 class="card-title">Add Aboutus</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.about_us.update', $aboutUs->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('put')
                            <div class="mb3">
                                <label for="title" class="form-label">Main Title</label>
                                <input type="text" name="title" id="dishImage" class="form-control" required
                                    value="{{$aboutUs->title}}">
                            </div>
                            <div class="mb3">
                                <label for="content" class="form-label">Description</label>
                                <input type="hidden" name="content">
                                <div class="summernote" data-content='{{$aboutUs->content}}'>
                                </div>
                            </div>


                            <!--Main  Image -->
                            <p>Previous Main Image:</p>
                            <img src="{{ asset('about_images/' . $aboutUs->image_path)}}" alt="Dish Image" width="200"
                                height="200">

                            <!-- Dish Image -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Main Image</label>
                                <input type="file" name="image_path" id="dishImage" class="form-control"
                                    accept=".png,.jpg,.gif,.webp,.jpeg">
                                <span class="text-danger">* You can only upload png, jpg, jpeg.Max 2MB Files</span>
                            </div>

                            @if (!empty($aboutUs->additional_image_path))
                                <p>Previous Second Image:</p>
                                <img src="{{ asset('about_images/' . $aboutUs->additional_image_path)}}" alt="Dish Image"
                                    width="200" height="200">
                            @endif
                            <!-- Dish Image -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Second Image</label>
                                <input type="file" name="additional_image_path" id="dishImage" class="form-control"
                                    accept=".png,.jpg,.gif,.webp,.jpeg">
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


<script src="{{ asset('js/admin/core/bootstrap.min.js') }}"></script>


<script>
    $(document).ready(function () {

        $('.summernote').summernote({
            height: 400,   //set editable area's height
            codemirror: { // codemirror options
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

        if ($('.summernote').length > 0) {
            $('.summernote').each(function (index, value) {
                $(this).summernote('code', $(this).data('content'));
            });
        }


    });

</script>



@endsection