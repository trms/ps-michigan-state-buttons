@extends('layouts.admin')






@section('title')
	Create a New Button for "{{ $button->buttonBar->title }}"
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.buttonBar.show','back',['id'=>$button->buttonBar->id],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	
	
	
	{!! Form::open(['route'=>['admin.button.update',$button->id],'method'=>'put','class'=>'form']) !!}
	
		{!! Form::hidden('button_bar_id',$button->button_bar_id) !!}
		
		
		<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('title','Button Title') !!}
				
				{!! Form::text('title',$button->title,['class' => 'form-control','placeholder'=>'optional'] ) !!}
			
			</div>
				
			
			<div class="form-group">
				<label for="icon">Button Icon</label>
				{!! Form::select('icon',$icons,$button->icon,['class'=>'form-control']) !!}
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
						<option value="{{ $bulletin['Description'] }}|{{ $bulletin['GUID'] }}" @if($bulletin['GUID'] === $button->bulletin_GUID) selected @endif>{{ $bulletin['Description'] }}</option>
					@endforeach

				</select>

			</div>
			
			
		
		
		<!-- Submit Button -->
		<div class="form-group">
		
			{!! Form::submit('Submit',['class'=> 'btn btn-primary form-control']) !!}
		
		</div>
		
		
		
	
	{!! Form::close() !!}
	
	

@stop






