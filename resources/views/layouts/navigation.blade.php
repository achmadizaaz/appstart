<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-start bookmark-wrapper d-flex align-items-center ">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    {{-- ICON Kiri --}}
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Hari ini">
                            <i class="ficon feather icon-calendar"></i> {{ date('D, d M Y') }}
                        </a>
                        </li>
                    </ul>
                    
                </div>
                <ul class="nav navbar-nav float-right">           
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">Hai, {{ Auth::user()->name }}</span><span class="user-status">Available</span></div><span><img class="round" src="{{asset('app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="feather icon-user"></i> Profile</a>
                            <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> Change Password</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button  type="submit" class="btn btn-danger btn-block "><i class="feather icon-power"></i> Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">START UP</h2>
                </a>
            </li>                
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class="navigation-header"><span>DATA MASTER</span>
            </li>
            <li class="nav-item has-sub"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
                <ul class="menu-content" style="">
                    <li class="is-shown"><a href="{{ route('user.index') }}"><span class="menu-item" data-i18n="List">List</span></a>
                    </li>
                    <li class="is-shown"><a href="app-user-view.html"><span class="menu-item" data-i18n="View">View</span></a>
                    </li>
                    <li class="is-shown"><a href="app-user-edit.html"><span class="menu-item" data-i18n="Edit">Edit</span></a>
                    </li>
                </ul>
            </li>                
        </ul>
    </div>
</div>
<!-- END: Main Menu-->