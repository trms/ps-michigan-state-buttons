@extends('layouts.admin')






@section('title')
	Button Bar "{{ $bar->title }}"
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.button.create','New Button',['barId'=>$bar->id],['class'=>'btn btn-primary']) !!}
	{!! link_to_route('admin.buttonBar.index','back',[],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	
	<table class="table">
		
		<thead>
			<tr>
				<th>Title</th>
				<th>Bulletin Name</th>
				<th>Sorting</th>
				<th>Icon</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			@if ($bar->buttons)
		
				@foreach ($bar->buttons as $button)
					
					<tr>
						<td>{{ $button->title }}</td>
						<td>{{ $button->bulletin_name }}</td>
						<td>{{ $button->order }}</td>
						<td><i class="{{ $button->icon }}"></i></td>
						<td>{!! link_to_route('admin.button.edit','edit',[$button->id],['class'=>'btn btn-primary']) !!}</td>
						<td>
							
							
							{!! Form::open(['route'=>['admin.button.destroy',$button->id],'method'=>'DELETE','onsubmit'=>'return deleteSubmit();']) !!}
							
								{!! Form::submit('delete',['class'=> 'btn btn-danger']) !!}
							
							{!! Form::close() !!}
							
							
						</td>
					</tr>

				@endforeach

			@endif
		</tbody>

	</table>

@stop






