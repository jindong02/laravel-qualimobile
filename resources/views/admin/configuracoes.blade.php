@section('title', 'Configurações do site')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.configuracoes') }}" method="POST" enctype="multipart/form-data" class="basic-card shadow">
                @csrf

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Configurações do site
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nome do site</label>
                                <input type="text" class="form-control" name="nome_site" value="{{ $config->nome_site }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" value="{{ $config->descricao }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Palavras-chave (Keywords)</label>
                                <input type="text" class="form-control" name="keywords" value="{{ $config->keywords }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Número de contato</label>
                                <input type="tel" class="form-control" name="telefone" value="{{ $config->telefone }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email de contato</label>
                                <input type="email" class="form-control" name="email" value="{{ $config->email }}" required="">
                                <small class="text-sm">Mesmo utilizado para receber e-mails da página de "contato"</small>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" name="cidade" value="{{ $config->cidade }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Endereço completo</label>
                                <input type="text" class="form-control" name="endereco" value="{{ $config->endereco }}" required="">
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Catálogo</label>
                                <div class="custom-file" style="height: calc(2.75rem + 2px);">
                                    <input type="file" class="custom-file-input" name="catalogo" accept="application/pdf">
                                    <label class="custom-file-label">Selecione um arquivo PDF</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Link whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" value="{{ $config->whatsapp }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ $config->instagram }}" required="">
                                <small class="text-sm">Apenas nome de usuário</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pinterest</label>
                                <input type="text" class="form-control" name="pinterest" value="{{ $config->pinterest }}" required="">
                                <small class="text-sm">Apenas nome de usuário</small>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Youtube</label>
                                <input type="text" class="form-control" name="youtube" value="{{ $config->youtube }}" required="">
                                <small class="text-sm">Apenas nome de usuário</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label">TinyMCE TOken</label>
                                <input type="text" class="form-control" name="tiny" value="{{ $config->tiny }}" required="">
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
