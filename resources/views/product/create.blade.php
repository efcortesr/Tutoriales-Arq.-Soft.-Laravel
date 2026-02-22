@extends('layouts.app')

@section("title", $viewData["title"])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create product</div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('product.save') }}">
                        @csrf

                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />

                        <input type="number" step="0.01" min="0.01" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                            <input type="submit" class="btn btn-primary" value="Send" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection