@extends('layouts.theme')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-3 mb-0 ">
                        <div class="row m-0 py-4 pe-3">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-2 py-1">
                                <img src="{{ asset('app-assets/images/pages/login.png') }}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-3 mb-0 px-2 py-5">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-3">Login</h4>
                                        </div>
                                    </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <p class="px-4">Welcome back, please login to your account.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form action="index.html">
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="email" placeholder="Username" name="email" value="{{ old('email') }}" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="email">Username</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="user-password" placeholder="Password" name="password" required autocomplete="current-password">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-start">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Remember me</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-end"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-outline-primary float-start btn-inline">Register</a>
                                                <button type="submit" class="btn btn-primary float-end btn-inline">Login</button>
                                            </form>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection