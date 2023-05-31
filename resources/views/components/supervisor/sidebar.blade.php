        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sticky top-0 z-[20]  sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('supervisor.index') }}">

                <div class="sidebar-brand-text mx-3">UDR-Superisor </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('supervisor.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('supervisor.index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Home</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item {{ request()->routeIs('create.report') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create.report') }}">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Report</span>
                </a>
            </li> --}}

            <li class="nav-item {{ request()->routeIs('supervisor.profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('supervisor.profile') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Profile</span>
                </a>
            </li>



        </ul>
        <!-- End of Sidebar -->
