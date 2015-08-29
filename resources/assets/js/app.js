$(document).ready(function(){

	$('.button').on('click',triggerVideo);

	$('.close-btn').on('click',function(){
		var _this = this;
		$('.button').removeClass('selected');
		resetBulletins();
		$(this).addClass('selected');
		setTimeout(function(){
			$(_this).removeClass('selected');
		},200)

	});


	resetBulletins();
});

function triggerVideo()
{

	$('.button').removeClass('selected');
	$(this).addClass('selected');
	$.get($(this).attr('data-url'),{buttonId:$(this).attr('data-target')},function(result){
		// console.log(result);
	});
}

function resetBulletins()
{
	
	var buttonBarId = $('.button-container').attr('data-target');
	var url = $('.button-container').attr('data-url');
	$.get(url,{buttonBarId:buttonBarId},function(result){
		// console.log(result);
	});
}