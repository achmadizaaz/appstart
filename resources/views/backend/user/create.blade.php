@extends('layouts.custom.app')
@section('title-page', 'Add User')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user-profile.css') }}">
@endsection

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
            confirmButtonColor: '#243992',
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
                <h4 class="mb-sm-0 fw-bold">Add User</h4>
                <div class="page-title-right">
                    <!-- Button trigger modal -->
                    <button type="submti" class="btn btn-primary" form="createForm">
                        Save
                    </button>
                </div> 

            </div>
        </div>
    </div>
    <!-- end page title -->

     <!-- Content row -->
     <form action="{{ route('user.store') }}" method="POST" id="createForm" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="user-heading">
                                <h4 class="fw-bold">Create Account</h4>
                            </div>
                            <hr>
                        
                            <div class="col-md-3 ">

                                <div class="user-thumbnail mb-2 text-center ">
                                    <img src="https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg" width="180px" class="rounded" id="preview-image-old"/>
                                </div>
                                <div class="text-center">
                                    <label class="custom-file-upload btn btn-sm btn-primary align-middle" for="upload-image">
                                        <input type="file" id="upload-image" name="image" style="display: none"/>
                                        <i class="bi bi-cloud-arrow-up"></i> Upload Image
                                    </label>
                                    {{-- <button class="btn btn-sm btn-primary align-middle">Upload Image</button>  --}}
                                </div>
                            </div>
                        

                        <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="name" class="form-label fw-bold">Name <small class="text-danger">*</small></label>
                                            </div>
                                            <div class="description">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Your name" autofocus>
                                            </div>
                                            @error('name')
                                                <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="email" class="form-label fw-bold">Email <small class="text-danger">*</small></label>
                                            </div>
                                            <div class="description">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="your-mail@example.com">
                                            </div>
                                            @error('email')
                                                <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="status" class="form-label fw-bold">Status<small class="text-danger">*</small></label>
                                            </div>
                                            <div class="description">
                                                <select name="status"  class="form-select select2 @error('status') is-invalid @enderror">
                                                    <option value=""></option>
                                                    <option value="active">Active</option>
                                                    <option value="deactivated">Deactivated</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="role" class="form-label fw-bold">Role<small class="text-danger">*</small></label>
                                            </div>
                                            <div class="description">
                                                <select name="role_name" id="role" class="form-select select2 @error('role_name') is-invalid @enderror">
                                                    <option value=""></option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('role_name')
                                                <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="role" class="form-label fw-bold">Password Default</label>
                                            </div>
                                            <div class="description">
                                               <input type="text" name="password_default" class="form-control" placeholder="123">
                                            </div>
                                        </div>
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="password" class="form-label fw-bold">Password</label>
                                            </div>
                                            <div class="description">
                                                <div class="input-group">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                                        <div class="btn btn-outline-secondary"  onclick="showPassword()">
                                                            <i class="bi bi-eye-slash" id="icon-password"></i>
                                                        </div>
                                                </div>
                                            </div>
                                            @error('password')
                                                    <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="user-info">
                                            <div class="title">
                                                <label for="password_confirm" class="form-label fw-bold">Password Confirm</label>
                                            </div>
                                            <div class="description">
                                                <div class="input-group">
                                                    <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm" id="password_confirm">
                                                        <div class="btn btn-outline-secondary" onclick="showPassword()">
                                                            <i class="bi bi-eye-slash" id="icon-password-confirm"></i>
                                                        </div>
                                                </div>
                                            </div>
                                            @error('password_confirm')
                                                    <small class="text-danger fst-italic">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> 
        <!-- end Content row -->

        <!-- start Content row 2 -->
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="information-heading">
                            <h4>Information</h4>
                        </div>
                        <hr>
                        <div class="information-content">
                            <div class="row">
                                <div class="col-md-4">
                                    Birth Date <small class="text-danger">*</small>
                                </div>
                                <div class="col-md-8">
                                <input type="date" name="birth" class="form-control @error('birth') is-invalid @enderror" value="{{ old("birth") }}">
                                    @error('birth')
                                        <small class="text-danger fst-italic">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Phone
                                </div>
                                <div class="col-md-8">
                                    <input type="number" name="phone" class="form-control" min="0" value="{{ old("phone") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Website
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="website" class="form-control" value="{{ old("website") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Gender <small class="text-danger">*</small>
                                </div>
                                <div class="col-md-8">
                                    <select name="gender"  class="form-select select2 @error('gender') is-invalid @enderror">
                                        <option value=""></option>
                                        <option value="1">Man</option>
                                        <option value="0">Woman</option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger fst-italic">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Address
                                </div>
                                <div class="col-md-8">
                                    <textarea name="address" cols="30" rows="1" class="form-control">{{ old("address") }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="social-heading">
                            <h4>Social Media</h4>
                        </div>
                        <hr>
                        <div class="social-content">
                            <div class="row">
                                <div class="col-md-4">
                                Facebook
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="facebook" class="form-control" value="{{ old("facebook") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Instagram
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="instagram" class="form-control" value="{{ old("instagram") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Twitter
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="twitter" class="form-control" value="{{ old("twitter") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    YouTube
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="youtube" class="form-control" value="{{ old("youtube") }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Other
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="other" class="form-control" value="{{ old("other") }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <!-- end Content row 2 -->
    </form>

@section('scripts')
    <script>
        $(document).ready(function() {
                
            // SELECT2
            $('.select2').select2({
                theme: 'bootstrap-5',
                placeholder: "Cari dan Pilih", 
            });
          
           $('#upload-image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#preview-image-old').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
           });
        });

         function showPassword() {
    
            let iconPassword = document.getElementById("icon-password");
            let iconPasswordConfirm = document.getElementById("icon-password-confirm");
            
            let password = document.getElementById("password");
            let passwordConfirm = document.getElementById("password_confirm");

           
            if (password.type  && passwordConfirm.type === "password") {
                
                // Change Icon Password
                iconPassword.classList.remove('bi-eye-slash');
                iconPassword.classList.add('bi-eye');
                // Change Icon Password Confirm
                iconPasswordConfirm.classList.remove('bi-eye-slash');
                iconPasswordConfirm.classList.add('bi-eye');
                
                // Change type field from password to text
                password.type = "text";
                passwordConfirm.type = "text";
               
            } else {
                
                // Change Icon Password
                iconPassword.classList.remove('bi-eye');
                iconPassword.classList.add('bi-eye-slash');
                // Change Icon Password Confirm
                iconPasswordConfirm.classList.remove('bi-eye');
                iconPasswordConfirm.classList.add('bi-eye-slash');
                
                // Change type field from text to password
                password.type = "password";
                passwordConfirm.type = "password";
                
            }
        }
    
    </script>
@endsection


@endsection