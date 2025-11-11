@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 mb-0">📋 Product List</h1>
    </div>
    <div class="col-md-6 text-md-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            ➕ Create New Product
        </a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($products->isEmpty())
    <div class="alert alert-info text-center">
        <p class="mb-0">No products found. <a href="{{ route('products.create') }}">Create one now!</a></p>
    </div>
@else
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 12%">Price</th>
                        <th style="width: 10%">Qty</th>
                        <th style="width: 30%">Description</th>
                        <th style="width: 23%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <span class="badge bg-secondary">{{ $product->id }}</span>
                        </td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>
                        <td>
                            <span class="text-success fw-bold">${{ number_format($product->price, 2) }}</span>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $product->qty }}</span>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($product->description, 40) }}</small>
                        </td>
                        <td>
                            <div class="btn-group-action">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection