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
                    Usuarios del sistema 
                    @can('users.create')
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }} ">Nuevo</a>
                    @endcan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('partials.messages')
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>Nombres</th>
                                <th>Nombre de usuario</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            @can('users.show')
                                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">Ver</a>
                                            @endcan
                                            @can('users.edit')
                                            <a class="btn btn-default btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
<!-- /.row -->
@endsection