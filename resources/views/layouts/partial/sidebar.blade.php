<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">HR Portal </span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('backend')}}/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->f_name }}</a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"  role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>  Dashboard  </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('category.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Category</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              SubCategories
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('subcategory.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add SubCategory</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('subcategory.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All SubCategory</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Countries
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('country.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Country</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('country.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Countries</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-header">PROFILE</li>

         {{-- <li class="nav-item">
          <a href="{{ route('admin.profile') }}" class="nav-link">
            <i class="fas fa-user" aria-hidden="true"></i>
            {{-- <i class="fa fa-key" aria-hidden="true"></i> --}}
            {{-- <p>View Profile</p>
          </a>
         </li>

        <li class="nav-item">
          <a href="{{ route('password.change') }}" class="nav-link">
            <i class="fa fa-key" aria-hidden="true"></i>
            <p>Password Change</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <i class='fas fa-sign-out-alt'></i>
            <p>Logout</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        {{-- </li> --}}  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
