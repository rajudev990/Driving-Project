<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ Storage::url(Auth::guard('admin')->user()->image) }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @canany(['create dashboard','edit dashboard','view dashboard','delete dashboard'])
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endcanany


                <!-- Role Managment  -->
                @canany(['create role','edit role','view role','delete role','create user','edit user','view user','delete user'])
                <li class="nav-item {{ Route::is('admin.roles.*') || Route::is('admin.users.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @canany(['create role','edit role','view role','delete role'])
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        @endcanany
                        @canany(['create user','edit user','view user','delete user'])
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcanany

                    </ul>
                </li>
                @endcanany

                @canany(['create package','edit package','view package','delete package'])
                <li class="nav-item">
                    <a href="{{ route('admin.packages.index') }}" class="nav-link {{ Route::is('admin.packages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Packages</p>
                    </a>
                </li>
                @endcanany

                @canany(['create teacher','edit teacher','view teacher','delete teacher'])
                <li class="nav-item">
                    <a href="{{ route('admin.teachers.index') }}" class="nav-link {{ Route::is('admin.teachers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Teachers</p>
                    </a>
                </li>
                @endcanany

                @canany(['create student','edit student','view student','delete student'])
                <li class="nav-item">
                    <a href="{{ route('admin.students.index') }}" class="nav-link {{ Route::is('admin.students.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Students</p>
                    </a>
                </li>
                @endcanany

                @canany(['create admission','edit admission','view admission','delete admission'])
                <li class="nav-item">
                    <a href="{{ route('admin.admissions.index') }}" class="nav-link {{ Route::is('admin.admissions.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>Admissions</p>
                    </a>
                </li>
                @endcanany

                @canany(['create schedule','edit schedule','view schedule','delete schedule'])
                <li class="nav-item">
                    <a href="{{ route('admin.schedule.index') }}" class="nav-link {{ Route::is('admin.schedule.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Schedule</p>
                    </a>
                </li>
                @endcanany

                @canany(['create attendance','edit attendance','view attendance','delete attendance'])
                <li class="nav-item">
                    <a href="{{ route('admin.attendance.index') }}" class="nav-link {{ Route::is('admin.attendance.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>Attendance</p>
                    </a>
                </li>
                @endcanany

                @canany(['create course','edit course','view course','delete course'])
                <li class="nav-item">
                    <a href="{{ route('admin.course-complete.index') }}" class="nav-link {{ Route::is('admin.course-complete.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Course Complete</p>
                    </a>
                </li>
                @endcanany

                @canany(['create report','edit report','view report','delete report'])
                <li class="nav-item">
                    <a href="{{ route('admin.reports.index') }}" class="nav-link {{ Route::is('admin.reports.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Reports</p>
                    </a>
                </li>
                @endcanany



                @canany(['create setting','edit setting','view setting','delete setting'])
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                @endcanany

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>