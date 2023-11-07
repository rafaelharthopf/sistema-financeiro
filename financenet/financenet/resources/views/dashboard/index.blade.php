@extends('layouts.app')
@section('content')
<form>
    <form class="form-control">
        <p>Bem vindo, {{ $user->name }}</p>
    </form>
</form>
@endsection
