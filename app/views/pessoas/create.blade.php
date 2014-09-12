@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Pessoa</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'pessoas.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nome', Input::old('nome'), array('class'=>'form-control', 'placeholder'=>'Nome')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('profissao', 'Profissao:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('profissao', Input::old('profissao'), array('class'=>'form-control', 'placeholder'=>'Profissao')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


