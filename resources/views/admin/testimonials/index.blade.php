@extends('layouts.admin')
@section('title', 'Testimonials Section')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Testimonials Section</h3>
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
                    <a href="#">All Testimonials</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Testimonials List</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate">
                                <i class="fa fa-plus"></i>
                                Add Testimonials
                            </button>


                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="ShowModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ShowModalLabel">Testimonials Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><strong>Client Name:</strong></h6>
                                                <p id="clientName"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6><strong>Client Profession:</strong></h6>
                                                <p id="clientProfession"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><strong>Client Testimonial:</strong></h6>
                                                <p id="testimonial"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h6><strong>Client IMAGE:</strong></h6>
                                                <img id="clientImage" src="" alt="Profile Image" class="img-fluid"
                                                    style="max-width: 300px;">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Profession</th>
                                        <th>Testimonial</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $testimonial->client_name }}</td>
                                        <td>{{ $testimonial->profession }}</td>
                                        <td>{{ $testimonial->testimonial }}</td>
                                        <td>
                                            <img src="{{ asset('testimonial_images/' . $testimonial->image_path) }}"
                                                alt="{{ $testimonial->client_name }}" class="img-fluid"
                                                style="max-width: 100px; height: auto;">
                                        </td>
                                        <td>
                                            <div class="form-button-action">

                                                <button class="btn btn-link btn-secondary show-button"
                                                    data-bs-toggle="modal" data-bs-target="#ShowModal"
                                                    data-id="{{$testimonial->id}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>


                                                <button class="btn btn-link btn-lg ms-auto edit-button"
                                                    data-id="{{ $testimonial->id }}" title="Edit" id="openEdit">
                                                    <i class="fa fa-edit"></i>
                                                </button>


                                                <form
                                                    action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                    method="POST" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-link btn-danger btn-lg delete-btn"
                                                        data-url="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTable
        $("#add-row").DataTable({
            pageLength: 10,
        });

        // Open the create page for TeamMember
        $('#openCreate').click(function () {
            window.location.href = '{{ route('admin.testimonials.create') }}';
        });

        // Handle editing a team member
        $(document).on('click', '.edit-button', function () {
            var memberId = $(this).data('id'); // Get the team member ID from the data-id attribute
            window.location.href = '/admin/testimonials/' + memberId + '/edit'; // Redirect to the edit page
        });

        // Show team member details in modal
        document.querySelectorAll('.show-button').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');

                // Fetch team member details using AJAX
                fetch(`/admin/testimonials/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate modal fields with the team member data
                        document.getElementById('clientName').textContent = data.client_name;
                        document.getElementById('clientProfession').textContent = data.profession;
                        document.getElementById('testimonial').textContent = data.testimonial;
                        document.getElementById('clientImage').src = `/testimonial_images/${data.image_path}`;
                    })
                    .catch(error => {
                        console.error('Error fetching Testimonials details:', error);
                    });
            });
        });

        // Handle delete functionality
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                const form = this.closest('form'); // Get the associated form
                const deleteUrl = this.dataset.url; // Fetch the delete URL

                // SweetAlert confirmation for delete
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
                            "Testimonial has been deleted.",
                            "success"
                        );
                        form.submit(); // Submit the form if confirmed
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Cancelled",
                            "Your Testimonial is safe!",
                            "error"
                        );
                    }
                });
            });
        });
    });
</script>

@endsection