<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="menu-title">DATA MASTER</li>
                <li>
                    <a href="{{ route('user.index')}}" class=" waves-effect">
                        <i class="bi bi-people"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bi bi-database-lock"></i>
                        <span>Role & Permission</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    </ul>
                </li>
                <li class="menu-title">SETTINGS</li>
                
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bi bi-gear"></i>
                        <span>Options</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->