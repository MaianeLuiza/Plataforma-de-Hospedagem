@extends('adminlte::page')

@section('content')
    <div class="container mt-2">

        <h2>Nova Aplicação</h2>
        <hr>
        <form action="{{ route('aplicacoes-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label for="imagem">Imagem</label>
                        <div class="input-group">
                             <input type="text" class="form-control" readonly id="nomeArquivo">
                             <div class="input-group-append">
                                 <label class="btn btn-secondary">
                                 Escolher Arquivo
                                    <input type="file" name="imagem" id="imagem" style="display: none;" onchange="mostrarNomeArquivo(this)">
                                </label>
                             </div>
                        </div>
                </div>
                <script>
                    function mostrarNomeArquivo(input) {
                        document.getElementById('nomeArquivo').value = input.files[0].name;
                    }
                </script>
                <br>

                <div class="form-group">
                    <a href="{{ route('aplicacoes-index') }}" class="btn btn-primary me-2">Voltar</a>
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection