@extends('layouts.admin')






@section('title')
	Customer Compliment
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.compliment.index','edit',['id',$compliment->id],['class'=>'btn btn-primary']) !!}
	{!! link_to_route('admin.compliment.index','back',[],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	<div class="row sub-header newsroom">
		
		<div class="customer-quote">
					
			<div class="quote">{{ $compliment->quote }}</div>

			<div class="name">{{ $compliment->name }}</div>

			<div class="position">{{ $compliment->position }}</div>

		</div>
		
	</div>
	

@stop






