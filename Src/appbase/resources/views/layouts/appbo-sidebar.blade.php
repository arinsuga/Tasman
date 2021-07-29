<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="{{ route('home.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Home
        </p>
      </a>
    </li>

    <!-- master data -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tag"></i>
        <p>
          Master Data
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('productsubtype.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Product Sub Type</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('product.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Product</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('event.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Event</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('news.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>News</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Logout -->
    <li class="nav-item has-treeview menu-open">
      <a href="{{ route('AuthAdmin.logout') }}" class="nav-link"
         onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
         <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>

      <form id="logout-form" action="{{ route('AuthAdmin.logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

    </li>



  </ul>
</nav>
<!-- /.sidebar-menu -->
