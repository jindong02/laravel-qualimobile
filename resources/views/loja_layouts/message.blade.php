@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('error') }}
</div>
@endif

@if (Session::has('warning'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('warning') }}
</div>
@endif

@if (Session::has('info'))
<div class="alert alert-secondary" role="alert">
    {{ Session::get('info') }}
</div>
@endif

@foreach ($errors->all() as $message)
<div class="alert alert-danger" role="alert">
    {{ $message }}
</div>
@endforeach