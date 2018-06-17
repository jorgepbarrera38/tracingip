@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Funcionarios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Funcionarios
                    @can('funcionaries.create')
                    <a href="{{ route('funcionaries.create') }}" class="btn btn-success btn-sm ">Nuevo</a>
                    @endcan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('partials.messages')
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($funcionaries as $funcionary)
                                    <tr>
                                        <td>{{ $funcionary->name }}</td>
                                        <td>
                                            @can('funcionaries.destroy')
                                            <form action="{{ route('funcionaries.destroy', $funcionary->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
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