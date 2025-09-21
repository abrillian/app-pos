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
      background-color: #f8f9fa;
    }
    .navbar-custom {
      background-color: #343a40;
    }
    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #adb5bd;
    }
    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
      color: #fff;
      background-color: #495057;
      border-radius: 5px;
    }
    .navbar-custom .navbar-brand {
      font-weight: bold;
      color: #fff;
    }
    #content {
      padding: 20px;
    }
  </style>
</head>
<body>

<!-- Navbar / Sidebar Atas -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">POS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('customers.index') }}" class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}"><i class="bi bi-people me-1"></i> Customer</a></li>
        <li class="nav-item"><a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}"><i class="bi bi-box-seam me-1"></i> Items</a></li>
        <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link {{ request()->routeIs('sales.*') ? 'active' : '' }}"><i class="bi bi-cash-stack me-1"></i> Sale</a></li>
        <li class="nav-item"><a href="{{ route('transactions.index') }}" class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}"><i class="bi bi-receipt me-1"></i> Transaksi</a></li>
        @if(session('user')['level']=='Admin')
          <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"><i class="bi bi-person-lines-fill me-1"></i> Petugas</a></li>
          <!-- <li class="nav-item"><a href="{{ route('identitas.index') }}" class="nav-link {{ request()->routeIs('identitas.*') ? 'active' : '' }}"><i class="bi bi-building me-1"></i> Identitas</a></li> -->
        @endif
      </ul>
      <form class="d-flex">
        <a href="{{ route('logout') }}" class="btn btn-danger"><i class="bi bi-box-arrow-right me-1"></i> Logout</a>
      </form>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div id="content" class="container-fluid">
  @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
