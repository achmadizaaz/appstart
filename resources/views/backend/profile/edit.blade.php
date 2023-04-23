@extends('layouts.app')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-user.css') }}">
@endsection

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                            </ul>
                            <form action="" method="POST">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            <a class="mr-2 my-25" href="#">
                                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-18.jpg') }}" alt="users avatar" class="users-avatar-shadow rounded" height="100" width="100">
                                            </a>
                                            <div class="media-body mt-50">
                                                <h4 class="media-heading">{{ $profile->name }}</h4>
                                                <div class="col-12 d-flex mt-1 px-0">
                                                    <div class="mb-1">
                                                        <input class="form-control" type="file" id="formFile">
                                                        <label for="formFile" class="form-label">Change Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Username</label>
                                                            <input class="form-control" placeholder="Username" value="{{ $profile->email }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" placeholder="Name" value="{{ old('name', $profile->name)}}" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <input type="email" class="form-control" placeholder="Email" value="{{ $profile->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">

                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control">
                                                            <option>Laki-Laki</option>
                                                            <option>Perempuan</option>
                                                            <option>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Handphone</label>
                                                        <input type="number" class="form-control" placeholder="62821234xxx" value="{{ $profile->handphone }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" class="form-control" value="{{ old('alamat', 'Alamat rumah') }}" placeholder="Company name">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        Changes</button>
                                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection