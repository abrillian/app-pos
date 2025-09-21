@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="mb-4">
        <h2 class="fw-bold">Selamat Datang, {{ session('user')['nama_user'] }} 👋</h2>
        <p class="text-muted">Anda login sebagai <b>{{ session('user')['level'] }}</b></p>
    </div>

    <div class="row g-4">

        <!-- Customers -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Customers</h6>
                        <h3 class="mb-0">{{ \App\Models\Customer::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Items -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
                        <i class="bi bi-box-seam fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Items</h6>
                        <h3 class="mb-0">{{ \App\Models\Item::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
                        <i class="bi bi-receipt fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Sales</h6>
                        <h3 class="mb-0">{{ \App\Models\Sale::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
                        <i class="bi bi-cart-check fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Transactions</h6>
                        <h3 class="mb-0">{{ \App\Models\Transaction::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
