@extends('layouts.custom.app')
@section('title-page', 'Permission Role')
@section('content')

{{-- {{ dd(session('success'));}} --}}
@if (session('success'))
<script>
    let sessionSuccess = "{{ session('success') }}"
    $(document).ready(function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            html: sessionSuccess,
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
            {{-- <label for="aplikasiModul" class="form-label">Aplikasi Modul</label> --}}
            <select name="modul" class="form-select select-modul" id="aplikasiModul" required>
                <option></option>
                <option value="administrasi-modul">Administrasi Modul</option>
            </select>
        </div>
        <div class="col">
            {{-- <label for="roleAplikasi" class="form-label">Role</label> --}}
            <select name="role" class="form-select select-role" id="roleAplikasi" required>
                <option></option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-body">
        <div class="mb-3 border-bottom py-2">
            <button class="btn btn-sm btn-primary" disabled>Save Permission</button>
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
                            <input class="form-check-input" type="checkbox" value="" id="aksesAdministrasi"  disabled name="sync[]">
                            <label class="form-check-label" for="aksesAdministrasi">
                            Access Administrator Modul
                            </label>
                        </div>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="fw-bold">Users</td>
                    <td>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="read-User" disabled name="sync[]">
                        <label class="form-check-label" for="read-User">
                        Read
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="create-User" disabled name="sync[]">
                            <label class="form-check-label" for="create-User">
                            Create
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="update-User" disabled name="sync[]">
                            <label class="form-check-label" for="update-User">
                            Update
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="delete-User" disabled name="sync[]">
                            <label class="form-check-label" for="delete-User">
                            Delete
                            </label>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="fw-bold" colspan="6">Role & Permission</td>
                </tr>
                <tr class="align-middle">
                    <td class="ps-4">Role</td>
                    <td>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="read-User" disabled name="sync[]">
                        <label class="form-check-label" for="read-User">
                        Read
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="create-User" disabled name="sync[]">
                            <label class="form-check-label" for="create-User">
                            Create
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="update-User" disabled name="sync[]">
                            <label class="form-check-label" for="update-User">
                            Update
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="delete-User" disabled name="sync[]">
                            <label class="form-check-label" for="delete-User">
                            Delete
                            </label>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="ps-4">Permission</td>
                    <td>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="read-User" disabled name="sync[]">
                        <label class="form-check-label" for="read-User">
                        Read
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="create-User" disabled name="sync[]">
                            <label class="form-check-label" for="create-User">
                            Create
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="update-User" disabled name="sync[]">
                            <label class="form-check-label" for="update-User">
                            Update
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="delete-User" disabled name="sync[]">
                            <label class="form-check-label" for="delete-User">
                            Delete
                            </label>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr class="align-middle">
                    <td class="fw-bold">Options</td>
                    <td>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="read-User" disabled name="sync[]">
                        <label class="form-check-label" for="read-User">
                        Read
                        </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="create-User" disabled name="sync[]">
                            <label class="form-check-label" for="create-User">
                            Create
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="update-User" disabled name="sync[]">
                            <label class="form-check-label" for="update-User">
                            Update
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="delete-User" disabled name="sync[]">
                            <label class="form-check-label" for="delete-User">
                            Delete
                            </label>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3 border-top py-2">
            <button class="btn btn-sm btn-primary" disabled>Save Permission</button>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    <script>
         $(document).ready(function() {
            // SELECT2
            $('.select-modul').select2({
                theme: 'bootstrap-5',
                placeholder: "Pilih modul aplikasi", 
            });

            $('.select-role').select2({
                theme: 'bootstrap-5',
                placeholder: "Pilih role", 
            });
        });
    </script>
@endsection