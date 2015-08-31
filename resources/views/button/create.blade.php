@extends('layouts.admin')






@section('title')
	Create a New Button for "{{ $bar->title }}"
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.buttonBar.show','back',['id'=>$bar->id],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	
	
	
	{!! Form::open(['route'=>'admin.button.store','method'=>'post','class'=>'form']) !!}
	
		{!! Form::hidden('button_bar_id',$bar->id) !!}
		
		
		<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('title','Button Title') !!}
				
				{!! Form::text('title','',['class' => 'form-control','placeholder'=>'optional'] ) !!}
			
			</div>
				
			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('icon','Button Icon') !!}
				
				{!! Form::text('icon','',['class' => 'form-control','id'=>'icons'] ) !!}
			
			</div>

			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('order','Sort Order') !!}
				
				{!! Form::text('order','',['class' => 'form-control','placeholder'=>'alphanumeric'] ) !!}
			
			</div>
			

			<div class="form-group">
				
				<label for="bulletin_GUID">Bulletin</label>
				
				<select name="bulletin_GUID" id="bulletin_GUID" class="form-control">
					
					@foreach ($allBulletins as $bulletin)
						<option value="{{ $bulletin['Description'] }}|{{ $bulletin['GUID'] }}">{{ $bulletin['Description'] }}</option>
					@endforeach

				</select>

			</div>
			
			
		
		
		<!-- Submit Button -->
		<div class="form-group">
		
			{!! Form::submit('Submit',['class'=> 'btn btn-primary form-control']) !!}
		
		</div>
		
		
		
	
	{!! Form::close() !!}
	
	

@stop






