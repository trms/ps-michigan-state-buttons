@extends('layouts.index')

@section('content')
	<div class="container">
		
		<div class="button-container" data-target="{{ $buttonBar->id }}" data-url="{!! route('cancelVideos') !!}">

			@foreach ($buttonBar->buttons as $key=>$button)
				<div class="button" data-target="{{ $button->id }}" data-url="{!! route('triggerVideo') !!}" @if($key !== 0) style="margin-left:{{ $marginLeft }}%" @endif>
					<i class="{{ $button->icon }}"></i>
					<p class="button-title">{{ $button->title }}</p>
				</div>
			@endforeach
			
		</div>
	</div>
@stop