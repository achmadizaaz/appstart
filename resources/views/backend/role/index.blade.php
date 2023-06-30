@extends('layouts.custom.app')
@section('title-page', 'Role List')
@section('content')

{{-- sweetalert success --}}
@if (session('success'))
<script>
    let sessionSuccess = "{{ session('success') }}"
    $(document).ready(function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: sessionSuccess,
            showConfirmButton: true,
            confirmButtonColor: '#7367f0',
            timer: 2000
        })
    });
  </script>   
 @endif
 {{-- sweetalert success --}}
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
    @endif

     <!-- Content row -->
     <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 border-bottom">
                        <h5 class="fw-bold">Role List</h5>
                    </div>
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    
                                    <form method="POST" action="{{ route('roles.delete', $role->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" id="role" value="{{ $role->id }}" >
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat delete_confirm" data-name="{{ $role->name }}" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 border-bottom">
                        <h5 class="fw-bold">Create Role</h5>
                    </div>
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="role" class="form-label fw-bold">Role Name</label>
                            <input type="text" class="form-control mb-2 @error('role') is-invalid @enderror" name="role" id="role" autofocus value="{{ old('role') }}">
                            @error('role')
                            <small class="fst-italic text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="SUBMIT" class="btn btn-primary">Submit</button>
                    </form>

                     
                </div>
            </div>
        </div>
    </div> 
    <!-- end Content row -->


@endsection

@section('scripts')
    <script>
        // Focus input field role name when modal show
        $('#createRole').on('shown.bs.modal', function () {
            $('#role').focus();
        })
        
        // DataTable
        $(document).ready(function() {
                $('#datatable').dataTable( {
                    "language": {
                        "paginate": {
                        "previous": '<i class="bi bi-arrow-left"></i>',
                        "next": '<i class="bi bi-arrow-right"></i>'
                        }
                    },
                    
                });
            });

        // Confirm Sweetalert Delete
        $('.delete_confirm').click(function(event) {
                let form =  $(this).closest("form");
                let deleteName = $(this).data('name');

                event.preventDefault();
                Swal.fire({
                    title: 'Deleted',
                    html: "Are you sure : <b>"+deleteName+"</b>",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#ea5455',
                    confirmButtonText: 'Yes, Delete it!',
                    cancelButtonText: 'Cancel'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
    </script>
@endsection