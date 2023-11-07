@extends('layouts.app')
@section('content')
    <h1>Lista de Clientes</h1>

    <ul class="list-group">
        @foreach($clientes as $cliente)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $cliente->nome_completo }}
                @if(auth()->check())
                    <div class="btn-group" role="group">
                        <form method="POST" action="{{ route('destroy', $cliente->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                        <a href="{{ route('edit', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
