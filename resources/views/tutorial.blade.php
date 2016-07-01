@extends('main')

@section('content')
	<div class="row">
		<div class="col-md-4">
			{!! Form::open(array('route' => 'files.store', 'enctype' =>"multipart/form-data")) !!}
				<div class="form-group">
					<label for="file">Arquivo</label>
					<input type="file" name="file">
					<p class="help-block">Clique no botão acima para selecionar um arquivo.</p>
				</div>
			  	<button type="submit" class="btn btn-primary">Enviar Arquivo</button>
			{!! Form::close() !!}
		</div> <!-- end col md 4 -->
		<div class="col-md-8">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Arquivo</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@forelse($files as $file)
					<tr>
						<td>
							<a href="/files/{{$file}}" target="_blank">{{ $file }}</a>
						</td>
						<td>
							{{ Form::open(['route' => ['files.destroy', $file], 'method' => 'delete']) }}
								<button type="submit" class="btn btn-danger">Remover</button>
							{{ Form::close() }}
						</td>
					</tr>
					@empty
						<h4 class="text-info">Nenhum arquivo encontrado!</h4>
					@endforelse
				</tbody>
			</table><!-- end table -->
		</div> <!-- end col md 8 -->
	</div> <!-- end row -->
@endsection