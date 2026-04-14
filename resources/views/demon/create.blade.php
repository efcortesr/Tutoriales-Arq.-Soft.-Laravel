@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="card">
    <div class="card-header">Crear Demonio</div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('demon.save') }}">
            @csrf

            <input
                type="text"
                class="form-control mb-2"
                placeholder="Introduce el nombre del demonio"
                name="name"
                value="{{ old('name') }}" />

            <input
                type="number"
                class="form-control mb-2"
                placeholder="Introduce la cantidad de sangre del demonio"
                name="blood_amount"
                value="{{ old('blood_amount') }}"
                min="0" />

            <select name="hierarchy" class="form-control mb-3">
                <option value="">Seleccionar jerarquía del demonio</option>
                <option value="rey" {{ old('hierarchy') == 'rey' ? 'selected' : '' }}>rey</option>
                <option value="luna" {{ old('hierarchy') == 'luna' ? 'selected' : '' }}>luna</option>
                <option value="comun" {{ old('hierarchy') == 'comun' ? 'selected' : '' }}>comun</option>
            </select>

            <div class="d-flex justify-content-between">
                <a href="{{ route('home.index') }}" class="btn btn-secondary">Back</a>
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
</div>
@endsection