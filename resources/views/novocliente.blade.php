<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Validações Cliente</title>
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body>

    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente</label>
                                <input type="text" 
                                    id="nome" 
                                    name="nome" 
                                    class="form-control {{ $errors->has('nome') ? 'is-invalid':'' }}" 
                                    placeholder="Nome do Cliente" />
                            @if($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nome') }}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do Cliente</label>
                                <input type="number" id="idade" name="idade" class="form-control {{ $errors->has('idade') ? 'is-invalid':'' }}" placeholder="Idade do Cliente" />
                            @if($errors->has('idade'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('idade') }}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço do Cliente</label>
                                <input type="text" id="endereco" name="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid':'' }}" placeholder="Endereço do Cliente" />
                            @if($errors->has('endereco'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('endereco') }}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail do Cliente</label>
                                <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="E-mail do Cliente" />
                            </div>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-primary btn-sm">Cancelar</button>
                        </form>
                    </div>
                    @if($errors->any())
                        <div class="card-footer">
                            @foreach ($errors->all() as $erro)
                                <div class="alert alert-danger" role="alert">
                                    {{$erro}}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>