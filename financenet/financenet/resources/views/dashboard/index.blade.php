@extends('layouts.app')
@section('content')
<form>
    <p>Bem vindo, {{ $user->name }}</p>
</form>
@endsection
