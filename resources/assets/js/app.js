$(document).ready(function(){

	$('.button').on('click',triggerVideo);
});

function triggerVideo()
{
	$.get($(this).attr('data-url'),{button:$(this).attr('data-target')});
	$('.button').off('click');
	setTimeout(function(){$('.button').on('click',triggerVideo);},3000);
}