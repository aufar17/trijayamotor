<style>
  .nav .nav-link.active {
    color: #007bff;
  }
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
        <i class="fa-solid fa-house menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Inventory -->
    <li class="nav-item">
      <a class="nav-link {{ request()->is('inventory') || request()->is('detail-inventory/*') ? 'active' : '' }}"
        href="{{ route('inventory') }}">
        <i class="fa-solid fa-screwdriver-wrench menu-icon"></i>
        <span class="menu-title">Inventory</span>
      </a>
    </li>

    <!-- Transaction -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('transaction') ? 'active' : '' }}" href="{{ route('transaction') }}">
        <i class="fa-solid fa-shop menu-icon"></i>
        <span class="menu-title">Transaction</span>
      </a>
    </li>

    <!-- Service -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}" href="{{ route('service') }}">
        <i class="fa-solid fa-receipt menu-icon"></i>
        <span class="menu-title">Service</span>
      </a>
    </li>

    <!-- Supplier -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('supplier') ? 'active' : '' }}" href="{{ route('supplier') }}">
        <i class="fa-solid fa-box menu-icon"></i>
        <span class="menu-title">Suppliers</span>
      </a>
    </li>

    <!-- Customer -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('customer') ? 'active' : '' }}" href="{{ route('customer') }}">
        <i class="fa-solid fa-person menu-icon"></i>
        <span class="menu-title">Customer</span>
      </a>
    </li>

    <!-- Customer -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('vehicle') ? 'active' : '' }}" href="{{ route('vehicle') }}">
        <i class="fa-solid fa-person menu-icon"></i>
        <span class="menu-title">Vehicle</span>
      </a>
    </li>
  </ul>
</nav>