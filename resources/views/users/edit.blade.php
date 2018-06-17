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
                    Editar usuario
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @include('partials.errors')
                        {{ method_field('put') }}
                        @csrf
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input name="name" value="{{ $user->name }}" type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre de usuario</label>
                            <input name="username" value="{{ $user->username }}" type="text" class="form-control" name="">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input name="password" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Permisos</label><br>
                            @foreach($permissions as $permission)
                                <label>
                                <input {{ $user->permissions()->get()->contains('id',$permission->id) ? 'checked':'' }} type="checkbox" name="permissions[]" id="" value="{{ $permission->id }}">{{ $permission->name }} 
                                </label> <br>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
<!-- /.row -->
@endsection