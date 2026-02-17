@extends('layouts.app')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('product.create') }}" class="btn btn-success">Create product</a>
</div>

<div class="row">
    @foreach ($viewData["products"] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $product["id"]]) }}" class="btn bg-primary text-white">{{ $product["name"] }}</a>
                <div class="mt-2 small">Precio: {{ isset($product['price']) ? '$'. $product['price'] : 'N/A' }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection