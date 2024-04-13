@section('title', 'Newsletter')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.newsletter') }}" method="POST" class="basic-card shadow">
                @csrf

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Newsletter
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Titulo do email</label>
                                <input type="text" class="form-control" name="titulo" value="" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mensagem</label>
                                <textarea class="form-control" name="mensagem" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">
                        Enviar para todos
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection