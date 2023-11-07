@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Cliente</h2>
        <form method="POST" action="{{ route('update', $cliente->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ $cliente->nome_completo }}" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $cliente->data_nascimento }}">
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->cpf }}" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefone }}">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}">
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{ $cliente->estado }}">
            </div>

            <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" value="{{ $cliente->rua }}">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $cliente->bairro }}">
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" value="{{ $cliente->numero }}">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
        </form>
    </div>
@endsection
