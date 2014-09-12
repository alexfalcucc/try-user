@extends('layouts.scaffold')

@section('main')

<h1>Show Pessoa</h1>

<p>{{ link_to_route('pessoas.index', 'Return to All pessoas', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
				<th>Profissao</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
