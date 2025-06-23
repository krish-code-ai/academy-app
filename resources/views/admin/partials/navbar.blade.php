<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">

            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Academy</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./generate/theme.html" class="nav-link {{ Request::is('admin/blogs') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Blogs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/courses')}}" class="nav-link {{ Request::is('admin/courses') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book"></i>
                        <p>Courses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/success_stories')}}" class="nav-link {{ Request::is('admin/success_stories') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-"></i>
                        <p>Success Stories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/gallery')}}" class="nav-link {{ Request::is('admin/gallery') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-image"></i>
                        <p>Gallery</p>
                    </a>
                </li>


            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
