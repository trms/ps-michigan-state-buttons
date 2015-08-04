@extends('layouts.admin')






@section('title')
	Video Buttons
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.button.create','Create New',[],['class'=>'btn btn-success']) !!}
@stop








@section('content')
	
	<table class="table">
		
		<thead>
			<tr>
				<th>Button Title</th>
				<th>Bulletin Tag</th>
				<th>Duration</th>
				<th>Sort Order</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			
			@foreach ($buttons as $button)
				
				<tr>
					<td>{{ $button->title }}</td>
					<td>{{ $button->tag }}</td>
					<td>{{ $button->length }}</td>
					<td>{{ $button->order }}</td>
					<td>{!! link_to_route('admin.button.edit','edit',[$button->id],['class'=>'btn btn-primary']) !!}</td>
					<td>
						
						
						{!! Form::open(['route'=>['admin.button.destroy',$button->id],'method'=>'DELETE','onsubmit'=>'return deleteSubmit();']) !!}
						
							{!! Form::submit('delete',['class'=> 'btn btn-danger']) !!}
						
						{!! Form::close() !!}
						
						
					</td>
				</tr>

			@endforeach

		</tbody>

	</table>
	

@stop






