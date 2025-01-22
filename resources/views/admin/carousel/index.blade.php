@extends('layouts.admin')
@section('title', 'Header Section')
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
                    <a href="#">Header Section</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">All Photos</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">All Dishes</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate">
                                <i class="fa fa-plus"></i>
                                Add Video
                            </button>


                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Video</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carousels as $carousel)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <video src="{{ asset('header_section/' . $carousel->image_path) }}"
                                                alt="videos" class="img-fluid" controls
                                                style="max-width: 300px; height: auto;">
                                        </td>

                                        <td>
                                            <div class="form-button-action">

                                                <button class="btn btn-link btn-secondary show-button"
                                                    data-bs-toggle="modal" data-bs-target="#ShowModal"
                                                    data-id="{{$carousel->id}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>


                                                <button class="btn btn-link btn-lg ms-auto edit-button"
                                                    data-id="{{ $carousel->id }}" title="Edit" id="openEdit">
                                                    <i class="fa fa-edit"></i>
                                                </button>


                                                <form action="{{ route('admin.carousel.destroy', $carousel->id) }}"
                                                    method="POST" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-link btn-danger btn-lg delete-btn"
                                                        data-url="{{ route('admin.carousel.destroy', $carousel->id) }}"
                                                        data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{asset('js/admin/core/jquery-3.7.1.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('js/admin/plugin/datatables/datatables.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/admin/plugin/sweetalert/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function () {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 10,
        });

        $('#openCreate').click(function () {
            window.location.href = '{{ route('admin.carousel.create') }}';
        })


    });



    document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to all delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                const form = this.closest('form'); // Get the associated form
                const deleteUrl = this.dataset.url; // Fetch the delete URL

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Deleted!",
                            "Your dish has been deleted.",
                            "success"
                        );
                        form.submit(); // Submit the form if confirmed
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Cancelled",
                            "Your dish is safe!",
                            "error"
                        );
                    }
                });
            });
        });
    });


</script>

@endsection