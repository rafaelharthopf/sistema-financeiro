@extends('layouts.app')
@section('content')
    <h1>Lista de Clientes</h1>

    <ul>
        @foreach($clientes as $cliente)
            <li>
                <a href="{{ route('edit', $cliente->id) }}">{{ $cliente->nome_completo }}</a>
                @if(auth()->check())
                    <form method="POST" action="{{ route('destroy', $cliente->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
