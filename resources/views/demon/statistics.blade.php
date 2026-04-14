@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Rey demonios:</strong> {{ $viewData['kingCount'] }}</p>
        <p><strong>Luna demonios:</strong> {{ $viewData['moonCount'] }}</p>
        <p><strong>Comun demonios:</strong> {{ $viewData['commonCount'] }}</p>
        <p><strong>Cantidad máxima de sangre:</strong> {{ $viewData['maxBloodAmount'] }}</p>
    </div>
</div>
@endsection