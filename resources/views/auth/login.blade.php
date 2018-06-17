@extends('auth.layouts.main')
@section('content')
    <form role="form" action="{{ route('login') }}" method="POST">
        @include('partials.errors')
        @csrf
        <fieldset>
            <div class="form-group">
                <input class="form-control" value="{{ old('username') }}" placeholder="Usuario" name="username" type="text" autofocus>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
        </fieldset>
    </form>
@endsection