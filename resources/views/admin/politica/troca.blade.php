@section('title', 'Política de Troca')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data"
                class="basic-card shadow">
                @csrf

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Política de Troca
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')


                    <div class="form-group">
                        <textarea name="politica_troca" rows="3">{{ Config::get('config.politica_troca') }}</textarea>
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


@push('scripts')
<script src="https://cdn.tiny.cloud/1/rin4rlj2ti3mqvhbll5yxrymrggzirmcdi57qsczy6x244yh/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        width: "100%",
        height: 800,
        menubar: false
    });
</script>

@endpush
