@extends('layouts.admin')






@section('title')
	Edit {{ $button->title }}
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.button.index','back',[],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	
	
	
	{!! Form::open(['route'=>['admin.button.update',$button->id],'method'=>'put','class'=>'form']) !!}
	
		
		
		<!-- Form Input -->
		
		
			
			
			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('title','Button Title') !!}
				
				{!! Form::text('title',$button->title,['class' => 'form-control','placeholder'=>'optional'] ) !!}
			
			</div>
			
			
			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('tag','Bulletin Tag') !!}
				
				{!! Form::text('tag',$button->tag,['class' => 'form-control','placeholder'=>'required and make sure its unique per screen'] ) !!}
			
			</div>
			
			
			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('length','Bulletin Length') !!}
				
				{!! Form::text('length',$button->length,['class' => 'form-control','placeholder'=>'required'] ) !!}
			
			</div>
			
			<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('order','Sort Order') !!}
				
				{!! Form::text('order',$button->order,['class' => 'form-control','placeholder'=>'alphanumeric'] ) !!}
			
			</div>
		
		
		
		
		<!-- Submit Button -->
		<div class="form-group">
		
			{!! Form::submit('Submit',['class'=> 'btn btn-primary form-control']) !!}
		
		</div>
		
		
		
	
	{!! Form::close() !!}
	
	

@stop






