<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS Dashboard</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
  <style>
    body {
      min-height: 100vh;
      overflow-x: hidden;
    }
    #sidebar {
      width: 220px;
      min-height: 100vh;
      background-color: #343a40;
      color: #fff;
      transition: all 0.3s;
    }
    #sidebar.active {
      margin-left: -220px;
    }
    #sidebar .nav-link {
      color: #adb5bd;
    }
    #sidebar .nav-link:hover, 
    #sidebar .nav-link.active {
      color: #fff;
      background-color: #495057;
      border-radius: 5px;
    }
    #sidebar h3 {
      color: #fff;
      text-align: center;
    }
    .sidebar-footer {
      margin-top: auto;
      padding-top: 1rem;
    }
    #content {
      padding: 20px;
    }
    @media (max-width: 992px) {
      #sidebar {
        margin-left: -220px;
        position: fixed;
        z-index: 1000;
      }
      #sidebar.active {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

<div class="d-flex">

  <!-- Sidebar -->
  <nav id="sidebar" class="d-flex flex-column p-3">
    <h3 class="mb-4">POS</h3>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
      <li><a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}"><i class="bi bi-people me-2"></i>Customers</a></li>
      <li><a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}"><i class="bi bi-box-seam me-2"></i>Items</a></li>
      <li><a href="{{ route('sales.index') }}" class="nav-link {{ request()->routeIs('sales.*') ? 'active' : '' }}"><i class="bi bi-cash-stack me-2"></i>Sales</a></li>
      <li><a href="{{ route('transactions.index') }}" class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}"><i class="bi bi-receipt me-2"></i>Transactions</a></li>
      @if(session('user')['level']=='Admin')
        <li><a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"><i class="bi bi-person-lines-fill me-2"></i>Petugas</a></li>
        <li><a href="{{ route('identitas.index') }}" class="nav-link {{ request()->routeIs('identitas.*') ? 'active' : '' }}"><i class="bi bi-building me-2"></i>Identitas</a></li>
      @endif
    </ul>
    <div class="sidebar-footer mt-auto">
      <a href="{{ route('logout') }}" class="btn btn-danger w-100 mt-3"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
    </div>
  </nav>

  <!-- Page Content -->
  <div id="content" class="flex-grow-1">
    <button class="btn btn-outline-secondary d-lg-none mb-3 toggle-btn"><i class="bi bi-list fs-3"></i></button>
    @yield('content')
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle sidebar on small screens
  document.querySelector('.toggle-btn')?.addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('active');
  });
</script>

</body>
</html>
