<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/admin-assets')}}/assets/img/admin-avatar.png" width="45px"/>
            </div>
            <div class="admin-info">
                <div class="font-strong">
                    <a class="text-white" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                    </div>
                <small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">User Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('add-user') }}">Add User</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-user') }}">Manage User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Outlet Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('add-outlet') }}">Add Outlet</a>
                    </li>
                    <li>
                        <a href="{{ route('manage-outlet') }}">Manage Outlet</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
