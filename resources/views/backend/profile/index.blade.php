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
        <div class="col-md-8 mb-2 mb-md-0">
            <div class="card">
               <div class="card-body">
                <div class="mb-3 border-bottom">
                    <h5>My Profile</h5>
                </div>
                <form action="{{ route('profile.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="media d-flex align-items-center">
                                <div class="media-img me-3">
                                    @if ($user->image)
                                    <img src="{{ asset('storage/'.$user->image) }}" width="150px" class="rounded box-shadow" id="preview-image-old"/>
                                        @else
                                        <img src="https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg" width="150px" class="rounded box-shadow" id="preview-image-old"/>
                                    @endif
                                </div>
                                
                                <div class="media-body mt-2">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                        <label class="btn btn-sm btn-primary  cursor-pointer waves-effect waves-light me-2" for="upload-image">Change Image</label>
                                        <input type="file" name="image" id="upload-image" hidden>
                                    </div>
                                    <p class="text-mute mt-2"><small>Allowed JPG, GIF or PNG. Max size of 2 MB</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
                                </div>
                                
                                <div class="mb-3">
                                    <div class="form-label">Username</div>
                                    <div class="fw-bold" style="font-size: 16px">{{ $user->email }}</div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                   
                    <div class="mb-3 border-bottom">
                        <h5>Information</h5>
                    </div>

                    <div class="media">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="birth" class="form-label">Birth Day</label>
                                <input type="date" class="form-control" name="birth" value="{{ $user->profile->birth }}" id="birth">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" min="0" class="form-control" name="phone" value="{{ $user->profile->phone }}" id="phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ $user->profile->website }}" id="website">
                            </div>
                            
                            <div class="col-md-6 ">
                                <div class="form-label mb-3">Gender</div>
                                <div class="form-check form-check-inline align-middle">
                                    <input class="form-check-input" type="radio" name="gender" id="radioMan" value="0" @if($user->profile->gender == 0)
                                    checked
                                    @endif>
                                    <label class="form-check-label" for="radioMan">Man</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="radioWoman" value="1" @if($user->profile->gender == 1)
                                    checked
                                    @endif>
                                    <label class="form-check-label" for="radioWoman" >Woman</label>
                                </div>
                               
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ $user->profile->address }}</textarea>
                        </div>
                        <div class="mb-3 d-flex flex-row-reverse">
                            <button class="btn btn-success" type="submit">Update Profile</button>
                        </div>
                       
                    </div>
                </form>
               </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3 border-bottom">
                        <h5>Change Password</h5>
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
                            <button type="submit" class="btn btn-success">Change Password</button>
                            {{-- <button type="reset" class="btn btn-outline-danger">Reset</button> --}}
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3 border-bottom">
                        <h5>Social Media</h5>
                    </div>
                    <form action="{{ route('profile.update.social', $user->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="media">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $user->socialMedia->facebook)}}">
                            </div>
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ old('instagram', $user->socialMedia->instagram)}}">
                            </div>
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $user->socialMedia->twitter)}}">
                            </div>
                            <div class="mb-3">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input type="text" class="form-control" name="youtube" value="{{ old('youtube', $user->socialMedia->youtube)}}">
                            </div>
                            <div class="mb-3">
                                <label for="other" class="form-label">Other</label>
                                <input type="text" class="form-control" name="other" value="{{ old('other', $user->socialMedia->other)}}">
                            </div>
                            
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-success">Update Social Media</button>
                            {{-- <button type="reset" class="btn btn-outline-danger">Reset</button> --}}
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>

    



@endsection
{{-- END CONTENT SECTION --}}


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
{{-- END SCRIPTS SECTION --}}