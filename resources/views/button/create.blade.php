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
				
			
			<div class="form-group">
				<label for="icon">Button Icon</label>
				<select name="icon" id="icon" class="form-control" style="font-family:'FontAwesome';">
					<option value="fa fa-ambulance">&#xf0f9; Ambulance</option>
					<option value="fa fa-archive">&#xf187; Archive</option>
					<option value="fa fa-area-chart">&#xf1fe; Area Chart</option>
					<option value="fa fa-automobile">&#xf1b9; Auto</option>
					<option value="fa fa-bank">&#xf19c; Bank</option>
					<option value="fa fa-bicycle">&#xf206; Bicycle</option>
					<option value="fa fa-book">&#xf02d; Book</option>
					<option value="fa fa-bullhorn">&#xf0a1; Bullhorn</option>
					<option value="fa fa-calendar">&#xf073; Calendar</option>
					<option value="fa fa-child">&#xf1ae; Child</option>
					<option value="fa fa-clock-o">&#xf017; Clock</option>
					<option value="fa fa-desktop">&#xf108; Desktop</option>
					<option value="fa fa-dribbble">&#xf17d; Sportsball</option>
					<option value="fa fa-envelope-o">&#xf003; Envelope</option>
					<option value="fa fa-eye">&#xf06e; Eye</option>
					<option value="fa fa-female">&#xf182; Female</option>
					<option value="fa fa-flask">&#xf0c3; Flask</option>
					<option value="fa fa-futbol-o">&#xf1e3; Futbol</option>
					<option value="fa fa-gavel">&#xf0e3; Gavel</option>
					<option value="fa fa-group">&#xf0c0; Group</option>
					<option value="fa fa-heartbeat">&#xf21e; Heartbeat</option>
					<option value="fa fa-hospital-o">&#xf0f8; Hospital</option>
					<option value="fa fa-institution">&#xf19c; Institution</option>
					<option value="fa fa-male">&#xf183; Male</option>
					<option value="fa fa-map-signs">&#xf277; Map Signs</option>
					<option value="fa fa-paint-brush">&#xf1fc; Paintbrush</option>
					<option value="fa fa-paper-plane">&#xf1d8; Paperplane</option>
					<option value="fa fa-paw">&#xf1b0; Paw</option>
					<option value="fa fa-plane">&#xf072; Plane</option>
					<option value="fa fa-print">&#xf02f; Print</option>
					<option value="fa fa-sitemap">&#xf0e8; Sitemap</option>
					<option value="fa fa-wheelchair">&#xf193; Wheelchair</option>


				</select>
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






