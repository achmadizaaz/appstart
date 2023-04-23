@extends('layouts.custom.app')
@section('title-page', 'User List')
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
{{-- end sweetalert success --}}

     <!-- start page title -->
    <div class="row mb-2">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold">USER LIST</h4>

                {{-- Breadcrumb --}}
                <div class="page-title-right">
                    <!-- Button trigger modal -->
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div> 

            </div>
        </div>
    </div>
    <!-- end page title -->

     <!-- Content row -->
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Last Login</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }} </td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">
                                    @if ($user->last_login_at)
                                        {{ $user->last_login_at }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="d-flex ">
                                    
                                    <a href="{{ route('user.show', $user->slug) }}" class="btn btn-sm btn-info text-white me-1" data-id="{{ $user->id }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form method="POST" action="#" class="me-1">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="hidden" id="user_id" value="{{ $user->id }}" >
                                        <button type="submit" class="btn btn-sm btn-success btn-flat reset_confirm" data-name="{{ $user->name }}" title="Hapus">
                                            <i class="bi bi-shield-lock"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-sm btn-warning text-white me-1 " data-id="{{ $user->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form method="POST" action="{{ route('user.delete', $user->slug) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="hidden" id="user_id" value="{{ $user->id }}" >
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat delete_confirm" data-name="{{ $user->name }}" title="Hapus">
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
    </div> 
    <!-- end Content row -->


    @section('scripts')
        <script>
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

            $('.reset_confirm').click(function(event) {
                let form =  $(this).closest("form");
                let deleteName = $(this).data('name');

                event.preventDefault();
                Swal.fire({
                    title: 'Reset Password',
                    html: "Are you sure : <b>"+deleteName+"</b>",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#ea5455',
                    confirmButtonText: 'Yes, Reset it!',
                    cancelButtonText: 'Cancel'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });

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


@endsection