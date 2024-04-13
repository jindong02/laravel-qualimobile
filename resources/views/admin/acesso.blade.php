@section('title', 'Configurações de acesso')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.configuracoes.acesso') }}" method="POST" class="basic-card shadow">
                @csrf

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Configurações de acesso
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nome do site</label>
                                <input type="text" class="form-control" name="login" value="{{ $usuario->login }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nova senha</label>
                                <input type="password" class="form-control" name="nova_senha">
                                <label class="small text-muted">Deixe em branco para não atualizar</label>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="form-label">Senha atual</label>
                                <input type="password" class="form-control" name="senha" required="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection