@extends('layouts.app')

@section('title', $viewData['title'] ?? 'Contact')

@section('subtitle', $viewData['subtitle'] ?? 'Contact')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Contact</h5>
                <p class="card-text"><strong>Name:</strong> {{ $viewData['name'] }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $viewData['address'] }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $viewData['phone'] }}</p>
            </div>
        </div>
    </div>
</div>

@endsection