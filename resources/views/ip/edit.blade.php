@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Direcciónes IP</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                        <form action="{{ route('ip.put', $ip->id) }}" method="post">
                            @include('partials.errors')
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group">
                                    <label for="">Funcionario</label>
                                    <select name="funcionary_id" class="form-control">
                                        @foreach($funcionaries as $funcionary)
                                            <option {{ $ip->funcionary_id == $funcionary->id ? 'selected':'' }} value="{{ $funcionary->id }}">{{ $funcionary->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Ubicación</label>
                                    <select name="ubication_id" class="form-control">
                                        @foreach($ubications as $ubication)
                                            <option {{ $ip->ubication_id == $ubication->id ? 'selected':'' }} value="{{ $ubication->id }}">{{ $ubication->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dependencia</label>
                                    <select name="dependence_id" class="form-control">
                                        @foreach($dependences as $dependence)
                                            <option {{ $ip->dependence_id == $dependence->id ? 'selected':'' }} value="{{ $dependence->id }}">{{ $dependence->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección IP</label>
                                    <select name="ip" class="form-control">
                                            <option value="{{ $ip->ip }}">{{ $ip->ip }}</option>
                                            @foreach($ipsFree as $iptemp)
                                                <option value="{{ $iptemp }}">{{ $iptemp }}</option>
                                            @endforeach
                                    </select>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('ip.index') }}" class="btn btn-danger">Cancelar</a>
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