@extends('layouts.panel')
@section('title', 'Editar evento')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Preencha os campos</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => url('panel/categories/new'),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Nome da categoria', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('name', (Input::old('name') ? Input::old('name') : ''), ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Insira o nome da categoria']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Descrição', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::textarea('description', (Input::old('description') ? Input::old('description') : ''), ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Insira uma descrição', 'rows' => 4]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                {{ Form::submit('Salvar', ['class' => 'btn btn-success btn-raised']) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')

@endpush

@push('scripts')
@endpush
