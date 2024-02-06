@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Detalhes da Aplicação</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Nome:</strong> {{ $aplicacao->nome }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $aplicacao->descricao }}</p>
                <p class="card-text"><strong>Link:</strong> <a href="{{ $aplicacao->link }}">{{ $aplicacao->link }}</a></p>
                @if ($aplicacao->imagem)
                    <p class="card-text"><strong>Imagem:</strong></p>
                    <img src="{{ asset('imagens/aplicacoes/' . $aplicacao->imagem) }}" alt="Imagem da Aplicação" width="200">
                @endif
            </div>
        </div>
        <br>
        <a href="{{ route('aplicacoes-index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
