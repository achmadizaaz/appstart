@extends('layouts.custom.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-user.css') }}">
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
            confirmButtonColor: '#7367f0',
            timer: 2000
        })
    });
  </script>   
 @endif
{{-- end sweetalert success --}}

<div class="row ">
    <div class="col-md-3 mb-2 mb-md-0">
        <div id="myTab" role="tablist">
            <div class="mb-3">
              <a class=" active" id="home-tab" data-bs-toggle="tab" href="#general" type="button" role="tab" aria-selected="true">General</a>
            </div>
            <div class="mb-3">
              <a class="" id="profile-tab" data-bs-toggle="tab" href="#change-password" type="button" role="tab" aria-selected="false">Change Password</a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="tab-content card-body" id="nav-tabContent">
                {{-- General --}}
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form action="{{ route('profile.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="media d-flex align-items-center">
                            <div class="media-img me-3">
                                
                                @if ($user->image)
                                <img src="{{ asset('storage/'.$user->image) }}" width="80px" class="rounded" id="preview-image-old"/>
                                    @else
                                    <img src="https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg" width="80px" class="rounded" id="preview-image-old"/>
                                @endif
                            </div>
                            
                            <div class="media-body mt-2">
                                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                    <label class="btn btn-sm btn-primary  cursor-pointer waves-effect waves-light me-2" for="upload-image">Upload new photo</label>
                                    <input type="file" name="image" id="upload-image" hidden>
                                </div>
                                <p class="text-mute mt-2"><small>Allowed JPG, GIF or PNG. Max size of 2 MB</small></p>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" id="username" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="mb-3">
                                <label for="birth" class="form-label">Birth Day</label>
                                <input type="date" class="form-control" name="birth" value="{{ $user->profile->birth }}" id="birth">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" min="0" class="form-control" name="phone" value="{{ $user->profile->phone }}" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ $user->profile->website }}" id="website">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select select2">
                                    <option value="0" @if ($user->profile->gender == 0)
                                        selected
                                    @endif>Man</option>
                                    <option value="1" @if($user->profile->gender == 1)
                                        selected
                                    @endif>Woman</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ $user->profile->address }}</textarea>
                            </div>

                            <div class="float-end">
                                <button class="btn btn-primary" type="submit">Save Changed</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Change Password --}}
                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="information-heading mb-3">
                        <h4>Change Password</h4>
                    </div>
                    <form action="{{ route('profile.change.password', $user->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="media">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                            </div>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary">Save Changed</button>
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


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
    </script>
@endsection