@extends('layouts.admin')






@section('title')
	Create a New Button Bar
@stop







@section('search')
@stop








@section('action')
	{!! link_to_route('admin.buttonBar.index','back',[],['class'=>'btn btn-default']) !!}
@stop








@section('content')
	
	
	
	{!! Form::open(['route'=>['admin.buttonBar.update',$bar->id],'method'=>'put','class'=>'form']) !!}
	
		
		
		<!-- Form Input -->
			
			<div class="form-group">
				
				{!! Form::label('title','Button Title') !!}
				
				{!! Form::text('title',$bar->title,['class' => 'form-control','placeholder'=>'required to be unique and a single word only'] ) !!}
			
			</div>
			
			
			
			<!-- Form Input -->
			
			<div class="form-group">
				<label for="zone_GUID">Bulletin Zone</label>
				<select name="zone_GUID" id="zone_GUID" class="form-control">
					@foreach ($bulletinZones as $zone)
						<option value="{{ $zone['ZoneID'] }}" @if($bar->zone_GUID === $zone['ZoneID']) selected @endif>{{ $zone['ZoneName'] }}</option>
					@endforeach
				</select>
			</div>
			
			{{-- <div class="form-group">
				<label for="alert">Alert Zone</label>
				<select name="alert_GUID" id="alert_GUID" class="form-control">
					@foreach ($alertZones as $zone)
						<option value="{{ $zone['ZoneID'] }}" @if($bar->alert_GUID === $zone['ZoneID']) selected @endif>{{ $zone['ZoneName'] }}</option>
					@endforeach
				</select>
			</div> --}}
			
		
		
		<!-- Submit Button -->
		<div class="form-group">
		
			{!! Form::submit('Submit',['class'=> 'btn btn-primary form-control']) !!}
		
		</div>
		
		
		
	
	{!! Form::close() !!}
	
	

@stop






