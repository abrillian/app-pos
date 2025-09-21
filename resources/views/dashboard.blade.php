@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="mb-4">
        <h3>Selamat Datang, {{ session('user')['nama_user'] }}</h3>
        <p>Anda login sebagai <b>{{ session('user')['level'] }}</b></p>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text display-6">{{ \App\Models\Customer::count() }}</p>
                    <i class="bi bi-people-fill fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Items</h5>
                    <p class="card-text display-6">{{ \App\Models\Item::count() }}</p>
                    <i class="bi bi-box-seam fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Sales</h5>
                    <p class="card-text display-6">{{ \App\Models\Sale::count() }}</p>
                    <i class="bi bi-receipt fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Transactions</h5>
                    <p class="card-text display-6">{{ \App\Models\Transaction::count() }}</p>
                    <i class="bi bi-cart-check fs-2"></i>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
