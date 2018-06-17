@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dependencias</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear dependencia
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{ route('dependences.store') }}" method="POST">
                        @include('partials.errors')
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('dependences.index') }}" class="btn btn-danger">Cancelar</a>
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