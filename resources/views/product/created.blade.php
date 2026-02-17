@extends('layouts.app')

@section('title', $viewData['title'] ?? 'Product created')

@section('subtitle', $viewData['subtitle'] ?? '')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $viewData['message'] ?? 'Product created successfully!' }}</h3>
                <a href="{{ route('product.index') }}" class="btn btn-primary mt-3">Back to products</a>
            </div>
        </div>
    </div>
</div>

@endsection