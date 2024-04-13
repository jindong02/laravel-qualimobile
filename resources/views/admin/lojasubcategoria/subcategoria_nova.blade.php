@section('title', 'Nova Subcategoria')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.lojasubcategoria.post') }}" method="POST" enctype="multipart/form-data"
                class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="0">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Nova Subcategoria
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label class="form-label">Loja Categoria principal</label>
                                <select name="id_categoria" class="form-control" required="">
                                    @foreach (App\Models\lojaCategoria::all() as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ $categoria->id == old('id_categoria') ? 'selected=""' : '' }}>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Loja Nome da subcategoria</label>
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}"
                                    required="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
