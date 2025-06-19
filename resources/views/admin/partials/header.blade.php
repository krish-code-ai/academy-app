      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
          <!--begin::Container-->
          <div class="container-fluid">
              <!--begin::Start Navbar Links-->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                          <i class="bi bi-list"></i>
                      </a>
                  </li>
                  <li class="nav-item d-none d-md-block"><a href="{{url('/')}}" class="nav-link">Go To Site</a></li>
              </ul>
              <!--end::Start Navbar Links-->
              <!--begin::End Navbar Links-->
              <ul class="navbar-nav ms-auto">

                  <!--begin::User Menu Dropdown-->
                  <li class="nav-item dropdown user-menu">
                      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                          <img
                              src="img/avatar5.png"
                              class="user-image rounded-circle shadow"
                              alt="User Image" />
                          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                          <!--begin::User Image-->
                          <li class="user-header text-bg-primary">
                              <img
                                  src="img/avatar5.png"
                                  class="rounded-circle shadow"
                                  alt="User Image" />
                              <p>
                                  {{ Auth::user()->name }}

                              </p>
                          </li>

                          <!--begin::Menu Footer-->
                          <li class="user-footer">
                              <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat float-end"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                     <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                              <!-- <form method="POST" action="{{ route('admin.login.submit') }}">
                                  @csrf
                                  <button type="submit">Logout</button>
                              </form> -->

                          </li>
                          <!--end::Menu Footer-->
                      </ul>
                  </li>
                  <!--end::User Menu Dropdown-->
              </ul>
              <!--end::End Navbar Links-->
          </div>
          <!--end::Container-->
      </nav>
      <!--end::Header-->
