@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios del sistema</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ver usuario <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Atrás</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('partials.messages')
                    <form-group>
                        <label for="">Nombres</label>
                        <p>{{ $user->name }}</p>
                        <label for="">Nombre de usuario</label>
                        <p>{{ $user->username }}</p>
                        <label for="">Permisos</label>
                        @foreach($user->permissions()->get() as $permission)
                            <li>{{ $permission->name }}</li>
                        @endforeach
                    </form-group>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
<!-- /.row -->
@endsection