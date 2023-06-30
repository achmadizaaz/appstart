@extends('layouts.custom.app')
@section('title-page', 'Permission Role')
@section('content')
{{-- {{ dd(session('success'));}} --}}
@if (session('success'))
<script>
    let sessionSuccess = "{{ session('success') }}"
    $(document).ready(function () {
        Swal.fire({
            icon: 'info',
            title: 'Info',
            html: 'Role active: <b>'+sessionSuccess+'</b>',
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText:'Close',
            cancelButtonColor: '#EA5455',
            timer: 1500
        })
    });
  </script>   
 @endif
{{-- end sweetalert success --}}


<form action="{{ route('permissions.create') }}" method="POST" class="mb-3">
    @csrf
    <div class="row">
        <div class="col">
            <label for="aplikasiModul" class="form-label">Aplikasi Modul</label>
            <select name="modul" class="form-select" id="aplikasiModul">
                <option value="administrasi-modul">Administrasi Modul</option>
            </select>
        </div>
        <div class="col">
            <label for="roleAplikasi" class="form-label">Role</label>
            <select name="role" class="form-select" id="roleAplikasi">
                <option></option>
                @foreach ($allRoles as $allRole)
                    <option value="{{ $allRole->name }}" @if ($allRole->name == $role->name)
                        selected
                    @endif >{{ $allRole->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button class="btn btn-sm btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>

<form action="{{ route('permissions.store') }}" method="POST">
    @csrf
    <input type="hidden" name="role" value="{{ $role->name}}">
    <input type="hidden" name="modul" value="{{ $modul }}">
    <div class="card">
        <div class="card-body">
            <div class="mb-3 border-bottom py-2">
                <button class="btn btn-sm btn-primary">Save Permission</button>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>Name Permission</th>
                    <th>Create</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Other</th>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <td class="fw-bold">Administrasi Modul</td>
                        <td colspan="5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                        @foreach ($permissions as $permission)    
                                            @if ( $permission->name == 'administrasi-modul')
                                                {{ $permission->id }}
                                            @endif
                                        @endforeach
                                " id="administrasi-modul" 
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'administrasi-modul')
                                            checked
                                        @endif
                                    @endforeach
                                name="sync[]">
                                <label class="form-check-label" for="administrasi-modul">
                                Access Administrator Modul
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="fw-bold">Users</td>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="
                                @foreach ($permissions as $permission)    
                                    @if ( $permission->name == 'read user-administrasi')
                                        {{ $permission->id }}
                                    @endif
                                @endforeach
                        " id="read-user"
                                @foreach ($role->permissions as $permission)
                                    @if ( $permission->name == 'read user-administrasi')
                                        checked
                                    @endif
                                @endforeach  
                            name="sync[]">
                            <label class="form-check-label" for="read-user">
                            Read
                            </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                @foreach ($permissions as $permission)    
                                    @if ( $permission->name == 'create user-administrasi')
                                        {{ $permission->id }}
                                    @endif
                                @endforeach
                                " id="create-user"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'create user-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="create-user">
                                Create
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                @foreach ($permissions as $permission)    
                                    @if ( $permission->name == 'update user-administrasi')
                                        {{ $permission->id }}
                                    @endif
                                @endforeach
                                " id="update-user"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'update user-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="update-user">
                                Update
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                @foreach ($permissions as $permission)    
                                    @if ( $permission->name == 'delete user-administrasi')
                                        {{ $permission->id }}
                                    @endif
                                @endforeach
                                " id="delete-user" 
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'delete user-administrasi')
                                            checked
                                        @endif
                                    @endforeach 

                                name="sync[]">
                                <label class="form-check-label" for="delete-user">
                                Delete
                                </label>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-dark text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Other User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body p-4">
                                        <div class="row p-2 border-bottom">
                                            <div class="col-md-4 form-check ">
                                                <input class="form-check-input" type="checkbox" value="
                                                @foreach ($permissions as $permission)    
                                                    @if ( $permission->name == 'reset user-administrasi')
                                                        {{ $permission->id }}
                                                    @endif
                                                @endforeach
                                                " id="reset-user"
                                                    @foreach ($role->permissions as $permission)
                                                        @if ( $permission->name == 'reset user-administrasi')
                                                            checked
                                                        @endif
                                                    @endforeach 
                                                name="sync[]">
                                                <label class="form-check-label" for="reset-user">
                                                Reset Sandi
                                                </label>
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="fw-bold" colspan="1">Role & Permission</td>
                        <td colspan="5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)    
                                        @if ( $permission->name == 'menu role-permission-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach
                                " id="menu-role-permission" 
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'menu role-permission-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="menu-role-permission">
                                Tampilkan di menu
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="ps-4">Role</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'read role-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="read-role"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'read role-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="read-role">
                                Read
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'create role-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="create-role"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'create role-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="create-role">
                                Create
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'update role-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="update-role"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'update role-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="update-role">
                                Update
                                </label>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'delete role-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="delete-role"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'delete role-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="delete-role">
                                Delete
                                </label>
                            </div>
                        </td>
                        
                    </tr>
                    <tr class="align-middle">
                        <td class="ps-4">Permission</td>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'read permission-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="read-permission"  
                                @foreach ($role->permissions as $permission)
                                    @if ( $permission->name == 'read permission-administrasi')
                                        checked
                                    @endif
                                @endforeach 
                            name="sync[]">
                            <label class="form-check-label" for="read-permission">
                            Read
                            </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'create permission-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="create-permission"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'create permission-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="create-permission">
                                Create
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'update permission-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="update-permission"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'update permission-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="update-permission">
                                Update
                                </label>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="
                                    @foreach ($permissions as $permission)
                                        @if ( $permission->name == 'delete permission-administrasi')
                                            {{ $permission->id }}
                                        @endif
                                    @endforeach 
                                    " id="delete-permission"  
                                    @foreach ($role->permissions as $permission)
                                        @if ( $permission->name == 'delete permission-administrasi')
                                            checked
                                        @endif
                                    @endforeach 
                                name="sync[]">
                                <label class="form-check-label" for="delete-permission">
                                Delete
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3 border-top py-2">
                <button class="btn btn-sm btn-primary">Save Permission</button>
            </div>
        </div>
    </div>
</form>



@endsection

@section('scripts')
    <script>
         $(document).ready(function() {
            // SELECT2
            $('.form-select').select2({
                theme: 'bootstrap-5',
                placeholder: "Cari dan Pilih", 
            });
        });
    </script>
@endsection