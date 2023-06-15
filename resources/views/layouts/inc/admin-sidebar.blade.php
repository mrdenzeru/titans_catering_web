<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;">
    <a href="dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4 logo-admin ml-2"><span class="text-primary">TITANS CATERING </span><span class="text-warning">ADMIN</span></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }} nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('admin.product') }}" class="{{ Request::is('admin/product') ? 'active' : '' }} nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="{{ route('admin.customer') }}" class="{{ Request::is('admin/customer') ? 'active' : '' }} nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
      <li>
        <a href="{{ route('admin.users') }}" class="{{ Request::is('admin/users') ? 'active' : '' }} nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          User
        </a>
      </li>
    </ul>
  </div>