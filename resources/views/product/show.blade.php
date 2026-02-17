@extends('layouts.app')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    @if(isset($viewData['product']['price']) && (float) $viewData['product']['price'] > 80)
                    <span class="text-danger">{{ $viewData["product"]["name"] }}</span>
                    @else
                    {{ $viewData["product"]["name"] }}
                    @endif
                </h5>
                <p class="card-text">{{ $viewData["product"]["description"] }}</p>
                <p class="card-text"><strong>Precio:</strong> {{ isset($viewData['product']['price']) ? '$'.$viewData['product']['price'] : 'N/A' }}</p>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection