$(document).ready(function () {
    updateArrangeImages();
	$(window).on('resize', function(){
		updateArrangeImages();
	});
	
	$('#ImageDetailModal').on('shown.bs.modal', function() {
		$('html').addClass('removeScroll');
	})
	$('#ImageDetailModal').on('hidden.bs.modal', function () {
	   $('html').removeClass('removeScroll');
	})
	
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
});


$(function() {

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    cb(moment().subtract(29, 'days'), moment());

    $('#reportrange').daterangepicker({
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

});
