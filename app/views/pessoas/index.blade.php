@extends('layouts.scaffold')

@section('main')

<h1>All Pessoas</h1>

<p>{{ link_to_route('pessoas.create', 'Add New Pessoa', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($pessoas->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Profissao</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($pessoas as $pessoa)
				<tr>
					<td>{{{ $pessoa->nome }}}</td>
					<td>{{{ $pessoa->profissao }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('pessoas.destroy', $pessoa->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('pessoas.edit', 'Edit', array($pessoa->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no pessoas
@endif

@stop
