@extends('layouts.index')

@section('content')
	<div class="container">
		
		<div class="button-container">
			@foreach ($buttons as $key=>$button)
				<div class="button" data-target="{{ $button->id }}" data-url="{!! route('triggerVideo') !!}" @if($key !== 0) style="margin-left:{{ $marginLeft }}%" @endif>
					<img src="{!! asset('img/play_button.png') !!}" class="button-img">
					<p class="button-title">{{ $button->title }}</p>
				</div>
			@endforeach
		</div>
	</div>
@stop