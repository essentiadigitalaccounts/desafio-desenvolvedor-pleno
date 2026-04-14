@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select id="category_id" name="category_id">
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input type="number" id="price" name="price" step="0.01" min="0">
            </div>

            <div class="form-group">
                <label for="available">Disponível</label>
                <select id="available" name="available">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <button type="submit" class="btn">Criar Produto</button>
        </form>
    </div>
@endsection
