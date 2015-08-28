$(document).ready(function(){

	$('.button').on('click',triggerVideo);

	resetBulletins();
});

function triggerVideo()
{
	$.get($(this).attr('data-url'),{buttonId:$(this).attr('data-target')},function(return){
		console.log(return);
	});
	// $('.button').off('click');
	// setTimeout(function(){$('.button').on('click',triggerVideo);},3000);
}

function resetBulletins()
{
	var buttonBarId = $('.button-container').attr('data-target');
	var url = $('.button-container').attr('data-url');
	$.get(url,{buttonBarId:buttonBarId},function(return){
		console.log(return);
	});
}