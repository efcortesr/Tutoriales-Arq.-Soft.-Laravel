@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['subtitle'])

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Cantidad de Sangre</th>
            <th>Jerarquía</th>
        </tr>
    </thead>
    <tbody>
        @foreach($viewData['demons'] as $demon)
        <tr>
            <td>{{ $demon->getId() }}</td>
            <td>
                {{ $demon->getName() }}
                @if($demon->getBreathingMessage() !== '')
                - {{ $demon->getBreathingMessage() }}
                @endif
            </td>
            <td>{{ $demon->getDisplayedBloodAmount() }}</td>
            <td>
                @if($demon->getHierarchy() === 'comun')
                común
                @else
                {{ $demon->getHierarchy() }}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection