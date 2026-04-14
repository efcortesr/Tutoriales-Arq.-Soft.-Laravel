@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="text-center">
    <div class="mb-3">
        <a href="{{ route('demon.create') }}" class="btn btn-primary">
            Registrar Demonios
        </a>
    </div>

    <div class="mb-3">
        <a href="{{ route('demon.index') }}" class="btn btn-success">
            Listar Demonios
        </a>
    </div>

    <div class="mb-3">
        <a href="{{ route('demon.statistics') }}" class="btn btn-secondary">
            Estadísticas de Demonios
        </a>
    </div>
</div>
@endsection