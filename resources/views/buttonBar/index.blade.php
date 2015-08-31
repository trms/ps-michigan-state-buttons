@extends('layouts.admin')






@section('title')
	Button Bars
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.buttonBar.create','New Button Bar',[],['class'=>'btn btn-success']) !!}
@stop








@section('content')
	
	<table class="table">
		
		<thead>
			<tr>
				<th>Title</th>
				<th>Button Count</th>
				<th>Interactive URL</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			
			@foreach ($buttonBars as $bar)
				
				<tr>
					<td>{{ $bar->title }}</td>
					<td>{{ $bar->buttons->count() }}</td>
					<td>{!! url('/') !!}/{{ $bar->title }}</td>
					<td>{!! link_to_route('admin.buttonBar.edit','edit',[$bar->id],['class'=>'btn btn-primary']) !!}</td>
					<td>
						
						
						{!! Form::open(['route'=>['admin.buttonBar.destroy',$bar->id],'method'=>'DELETE','onsubmit'=>'return deleteSubmit();']) !!}
						
							{!! Form::submit('delete',['class'=> 'btn btn-danger']) !!}
						
						{!! Form::close() !!}
						
						
					</td>
				</tr>

			@endforeach

		</tbody>

	</table>
	

@stop






