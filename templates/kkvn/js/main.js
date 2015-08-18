$(document).ready(function () {
    updateArrangeImages();
	$(window).on('resize', function(){
		updateArrangeImages();
	});
});
function updateArrangeImages() {
	$(function() {
		
		var $container 	= $('#am-container'),
			$imgs		= $container.find('.arrange-img').hide(),
			totalImgs	= $imgs.length,
			cnt			= 0;
		
		$imgs.each(function(i) {
			var $img	= $(this);
			$('<img/>').load(function() {
				++cnt;
				if( cnt === totalImgs ) {
					$imgs.show();
					$container.montage({
						margin					: 1,	
						fillLastRow				: true,
						alternateHeight			: true,
						minw					: 150,	
						alternateHeightRange	: {
							min	: 230,
							max	: 230
						}
					});
				}
			}).attr('src',$img.attr('src'));
		});	
	});
	
	$(function() {
		
		var $container 	= $('#am-container2'),
			$imgs		= $container.find('.arrange-img').hide(),
			totalImgs	= $imgs.length,
			cnt			= 0;
		
		$imgs.each(function(i) {
			var $img	= $(this);
			$('<img/>').load(function() {
				++cnt;
				if( cnt === totalImgs ) {
					$imgs.show();
					$container.montage({
						margin					: 1,	
						fillLastRow				: true,
						alternateHeight			: true,
						minw					: 150,	
						alternateHeightRange	: {
							min	: 230,
							max	: 230
						}
					});
				}
			}).attr('src',$img.attr('src'));
		});	
	});
	
	$(function() {
		
		var $container 	= $('#am-container3'),
			$imgs		= $container.find('.arrange-img').hide(),
			totalImgs	= $imgs.length,
			cnt			= 0;
		
		$imgs.each(function(i) {
			var $img	= $(this);
			$('<img/>').load(function() {
				++cnt;
				if( cnt === totalImgs ) {
					$imgs.show();
					$container.montage({
						margin					: 1,	
						fillLastRow				: true,
						alternateHeight			: true,
						minw					: 150,	
						alternateHeightRange	: {
							min	: 230,
							max	: 230
						}
					});
				}
			}).attr('src',$img.attr('src'));
		});	
	});
	
	$(function() {
		
		var $container 	= $('#am-container4'),
			$imgs		= $container.find('.arrange-img').hide(),
			totalImgs	= $imgs.length,
			cnt			= 0;
		
		$imgs.each(function(i) {
			var $img	= $(this);
			$('<img/>').load(function() {
				++cnt;
				if( cnt === totalImgs ) {
					$imgs.show();
					$container.montage({
						margin					: 1,	
						fillLastRow				: true,
						alternateHeight			: true,
						minw					: 150,	
						alternateHeightRange	: {
							min	: 230,
							max	: 230
						}
					});
				}
			}).attr('src',$img.attr('src'));
		});	
	});
}
$(window).scroll(function() {
    var height = $(window).scrollTop();

    if(height  > 60) {
		$('.main-navbar').addClass("main-navbar-scroll");
    }
	else{
		$('.main-navbar').removeClass("main-navbar-scroll");
	}
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip({
					delay: { "show": 900, "hide": 100 }	
					
				});
})
$('#ModalLogin').modal('hide');