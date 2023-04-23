@extends('layouts.custom.app')
@section('title-page', 'Detail User: '.$user->name)

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
            confirmButtonColor: '#7367f0',
            timer: 2000
        })
    });
  </script>   
 @endif
{{-- end sweetalert success --}}

     <!-- Content row -->
     <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="user-heading">
                            <h4 class="fw-bold">Detail Account</h4>
                        </div>
                        <div class="col-md-2">
                            <div class="user-thumbnail">
                                @if ($user->image)
                                <img src="{{ asset('storage/'.$user->image) }}" width="180px" class="rounded" id="preview-image-old"/>
                                    @else
                                    <img src="https://newprofilepic2.photo-cdn.net//assets/images/article/profile.jpg" width="180px" class="rounded" id="preview-image-old"/>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="user-info">
                                <div class="title">Name</div>
                                <div class="description">{{ $user->name }}</div>
                            </div>
                            <div class="user-info">
                                <div class="title">Email</div>
                                <div class="description">{{ $user->email }}</div>
                            </div>
                            <div class="user-info">
                                <div class="title">Status</div>
                                <div class="description">{{ $user->status }}</div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="user-info">
                                <div class="title">Role</div>
                                <div class="description">
                                    @foreach ($user->getRoleNames() as $role)
                                        {{ $role  }}
                                    @endforeach
                                </div>
                            </div>
                            <div class="user-info">
                                <div class="title">Last Login</div>
                                <div class="description">
                                    @if ($user->last_login_at )
                                        {{ $user->last_login_at }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div class="user-info">
                                <div class="title">Last Login IP</div>
                                <div class="description">
                                    @if ($user->last_login_ip )
                                        {{ $user->last_login_ip }}
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>

                        

                    </div>
                    <hr>
                   <div class="user-button d-flex flex-row-reverse">
                        
                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-primary ">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                        <form method="POST" action="{{ route('user.delete', $user->slug) }}" class="me-2">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" id="kode_inventaris" value="{{ $user->id }}" >
                            <button type="submit" class="btn btn-outline-danger btn-flat delete_confirm" data-name="{{ $user->name }}" title="Hapus">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>

                        
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
                                Birth Date
                            </div>
                            <div class="col-md-8">
                                {{ $user->profile->birth }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Phone
                            </div>
                            <div class="col-md-8">
                                {{ $user->profile->phone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Website
                            </div>
                            <div class="col-md-8">
                                {{ $user->profile->website }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Gender
                            </div>
                            <div class="col-md-8">
                                @if ( $user->profile->gender == 1)
                                    Man
                                    @else
                                    Woman
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Address
                            </div>
                            <div class="col-md-8">
                                {{ $user->profile->address }}
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
                                {{ $user->socialMedia->facebook }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Instagram
                            </div>
                            <div class="col-md-8">
                                {{ $user->socialMedia->instagram }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Twitter
                            </div>
                            <div class="col-md-8">
                                {{ $user->socialMedia->twitter }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                YouTube
                            </div>
                            <div class="col-md-8">
                                {{ $user->socialMedia->youtube }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Other
                            </div>
                            <div class="col-md-8">
                                {{ $user->socialMedia->other }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- end Content row 2 -->


@section('scripts')
    <script>
        $('.delete_confirm').click(function(event) {
            let form =  $(this).closest("form");
            let deleteName = $(this).data('name');

            event.preventDefault();
            Swal.fire({
                    title: 'Deleted',
                    html: "Are you sure you : <b>"+deleteName+"</b>",
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