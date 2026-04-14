@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
    <h1>Nova Categoria</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <button type="submit" class="btn">Criar Categoria</button>
        </form>
    </div>
@endsection
