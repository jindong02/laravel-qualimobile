@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p style="color: #5e5e5e">{{ session()->get('success') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger" role="alert">
    <p>{{ session()->get('error') }}</p>
</div>
@endif

@if (session()->has('warning'))
<div class="alert alert-warning" role="alert">
    <p>{{ session()->get('warning') }}</p>
</div>
@endif

@if (session()->has('info'))
<div class="alert alert-secondary" role="alert">
    <p>{{ session()->get('info') }}</p>
</div>
@endif

@foreach ($errors->all() as $message)
<div class="alert alert-danger" role="alert">
    <p>{{ $message }}</p>
</div>
@endforeach