@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Direcciones IP</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Direcciones IP 
                    @can('ip.create')
                        <a href="{{ route('ip.create') }}" class="btn btn-success btn-sm ">Nuevo</a>
                    @endcan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @include('partials.messages')
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Funcionario</th>
                                    <th>Ubicación</th>
                                    <th>Dependencia</th>
                                    <th>Ip</th>
                                    <th nowrap></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ips as $ip)
                                    <tr>
                                        <td>{{ $ip->funcionary->name }}</td>
                                        <td>{{ $ip->ubication->name }}</td>
                                        <td>{{ $ip->dependence->name }}</td>
                                        <td>{{ $ip->ip }}</td>
                                        <td nowrap>
                                            @can('ip.edit')
                                            <a href="{{ route('ip.edit', $ip->id) }}" class="btn btn-default btn-sm">Editar</a>
                                            @endcan
                                            @can('ip.destroy')
                                            <a style="cursor:pointer" onclick="getElementById('delete').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                            <form id="delete" action="{{ route('ip.destroy', $ip->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
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