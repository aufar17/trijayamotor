<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('index')}}">
        <i class="fa-solid fa-house menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="fa-solid fa-screwdriver-wrench menu-icon"></i>
        <span class="menu-title">Inventory</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('inventory') }}">Spareparts</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Spareparts Usage</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('transaction')}}">
        <i class="fa-solid fa-shop menu-icon"></i>
        <span class="menu-title">Transaction</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('service')}}">
        <i class="fa-solid fa-receipt menu-icon"></i>
        <span class="menu-title">Service</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('supplier')}}">
        <i class="fa-solid fa-box menu-icon"></i>
        <span class="menu-title">Suppliers</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('customer')}}">
        <i class="fa-solid fa-person menu-icon"></i>
        <span class="menu-title">Customer</span>
      </a>
    </li>
  </ul>
</nav>