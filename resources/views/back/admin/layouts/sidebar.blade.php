<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('front.home') }}" class="brand-link">
        <img src="{{ asset('assets/back/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Go To Site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/back/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ route('back.admin.home') }}"
                        class="nav-link {{ request()->is('back/admin/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Categories</li>
                <li
                    class="nav-item {{ request()->is('back/admin/majors/*') || request()->is('back/admin/majors') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('back/admin/majors/*') || request()->is('back/admin/majors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Majors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.admin.majors.index') }}"
                                class="nav-link {{ request()->is('back/admin/majors') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Majors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('back.admin.majors.create') }}"
                                class="nav-link {{ request()->is('back/admin/majors/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Major</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->is('back/admin/doctors/*') || request()->is('back/admin/doctors') ? 'menu-open' : '' }}">
                    {{--  menu-open --}}
                    <a href="#"
                        class="nav-link {{ request()->is('back/admin/doctors/*') || request()->is('back/admin/doctors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Doctors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.admin.doctors.index') }}"
                                class="nav-link {{ request()->is('back/admin/doctors') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('back.admin.doctors.create') }}"
                                class="nav-link {{ request()->is('back/admin/doctors/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">CONTACTS</li>
                <li class="nav-item">
                    <a href="{{ route('back.admin.contacts.index') }}"
                        class="nav-link {{ request()->is('back/admin/contacts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-header">LOGOUT</li>
                <li class="nav-item">
                    <a href="{{ route('back.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
