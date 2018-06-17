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
                    Crear dirección IP
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{ route('ip.store') }}" method="POST">
                        @include('partials.errors')
                        @csrf
                        <div class="form-group">
                            <label for="">Funcionario</label>
                            <select name="funcionary_id" class="form-control">
                                <option value="">Seleccione un funcionario...</option>
                                @foreach($funcionaries as $funcionary)
                                    <option {{ old('funcionary_id') == $funcionary->id ? 'selected':'' }} value="{{ $funcionary->id }}">{{ $funcionary->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ubicación</label>
                            <select name="ubication_id" class="form-control">
                                <option value="">Seleccione una ubicación...</option>
                                @foreach($ubications as $ubication)
                                    <option {{ old('ubication_id') == $ubication->id ? 'selected':'' }} value="{{ $ubication->id }}">{{ $ubication->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dependencia</label>
                            <select name="dependence_id" class="form-control">
                                <option value="">Seleccione una dependencia...</option>
                                @foreach($dependences as $dependence)
                                    <option {{ old('dependence_id') == $dependence->id ? 'selected':'' }} value="{{ $dependence->id }}">{{ $dependence->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dirección IP</label>
                            <select name="ip" class="form-control">
                                <option value="">Seleccione una dirección IP...</option>
                                    @foreach($ipsFree as $ip)
                                        <option {{ old('ip') == $ip ? 'selected':'' }} value="{{ $ip }}">{{ $ip }}</option>
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