@if(session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif