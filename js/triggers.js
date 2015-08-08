/*

 Triggers for various jQuery pluggins
 Version 1.0 

 	-- by alej.co
*/


(function($) {
	
	// Responsive jQuery 

	$(document).ready(function(){ 		
		if ($(".screenwidth").css("z-index") == "5.2" ) {     
		  	
		  		// windowHeight = ($(window).height())*91/100;
			  	// $('#home').css('height', (windowHeight*92/100));
			  //	$('#ribbon').css('min-height',(windowHeight*82/100));
			  	//$('#ribbon').css('top', (520));
			   $('#second-half').css('height', (windowHeight*92/100));
			   

		}
		else {
		  	

		  		windowHeight = ($(window).height())*81/100;
			  	$('#home').css('height', (windowHeight*82/100));
			  	$('#home').addClass('ie-hero');
			  	// $('#ribbon').css('min-height',(windowHeight*82/100));
			  	headerHeight = ($('#masthead').height());
	  			wpadminbar = ($('#wpadminbar').height());
	  			$('#ribbon').css('top',(headerHeight+wpadminbar+3.151));
		  
		}
	});	




	$(document).ready(function(){
	  windowHeight = ($(window).height())*91/100;
	  $('#home.hero').css('height', (windowHeight*82/100));
	  $('#second-half').css('height', (windowHeight*92/100));
	  $('#bottom-pages').css('height',(windowHeight*84/100));
	  $('#footer').css('height',(windowHeight*40/100));
	  $('#footer .footer-menu').css('top',(windowHeight*42/100));
	   
	});

	$(window).resize(function(){
	  windowHeight = ($(window).height())*91/100;
	  $('#home.hero').css('height', (windowHeight*82/100));
	  $('#ribbon').css('min-height',(windowHeight*82/100));
	  $('#second-half').css('height', (windowHeight*92/100));
	  $('#bottom-pages').css('height',(windowHeight*84/100));
	  $('#footer').css('height',(windowHeight*40/100));
	  $('#footer .footer-menu').css('top',(windowHeight*42/100));
	  headerHeight = ($('#masthead').height());
	  wpadminbar = ($('#wpadminbar').height());
	  $('#ribbon').css('top',(headerHeight+wpadminbar+3.151));
	  topFooter = '0px';
	  $('#top-footer').css('bottom',topFooter);		  
	});
	
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop();
		downHeader = ($('#masthead').height());
		if (scrollTop >= 420) {
			$('#down-header').css('min-height', downHeader);
			$('#down-header').css('height', 'auto');
			$('#down-header').addClass('fixed');
			$('#ribbon').addClass('hide');
			$('#second-button').removeClass('hide');

			
		} else if (scrollTop <= 421) {
			$('#down-header').css('height','0px');
			$('#down-header').css('min-height','0px');
			$('#down-header').removeClass('fixed');
			$('#ribbon').removeClass('hide');
			$('#second-button').addClass('hide');
			
		}
	});

/*

$( "#menu-navigation li:first-child a" ).click(function() {
  $( "#bottom-pages article:first-child" ).addClass('show');
  $('#bottom-pages article:nth-child(2)').hide();
  $('#bottom-pages article:nth-child(3)').hide();

  
});

*/


$( "#menu-navigation li:first-child a" ).click(function() {
  $( "#bottom-pages article:first-child" ).show(function(){

  		$('#bottom-pages article:nth-child(2)').hide(0,'linear');
  		$('#bottom-pages article:nth-child(3)').hide(0,'linear');

  });
});

$( "#menu-navigation li:nth-child(2) a" ).click(function() {
	$( "#bottom-pages article:nth-child(2)" ).show(0,'linear');
	$('#bottom-pages article:first-child').hide(0,'linear');
	$('#bottom-pages article:nth-child(3)').hide(0,'linear');


});

$( "#menu-navigation li:nth-child(3) a").click(function() {
	$( "#bottom-pages article:nth-child(3)").show(0,'linear');
	$('#bottom-pages article:first-child').hide(0,'linear');
	$('#bottom-pages article:nth-child(2)').hide(0,'linear');
});


 

$( "#menu-navigation-1 li:first-child a").click(function() {
  $( "#bottom-pages article:first-child").show(0,'linear');

  		$('#bottom-pages article:nth-child(2)').hide(0,'linear');
  		$('#bottom-pages article:nth-child(3)').hide(0,'linear');

});

$( "#menu-navigation-1 li:nth-child(2) a" ).click(function() {
  $( "#bottom-pages article:nth-child(2)" ).show(0,'linear');

  		
  		$('#bottom-pages article:first-child').hide(0,'linear');
  		$('#bottom-pages article:nth-child(3)').hide(0,'linear');

 
});

$( "#menu-navigation-1 li:nth-child(3) a" ).click(function() {
  $( "#bottom-pages article:nth-child(3)" ).show(0,'linear');

  		
  		$('#bottom-pages article:first-child').hide(0,'linear');
  		$('#bottom-pages article:nth-child(2)').hide(0,'linear');

 
});


$(window).load(function(){
	if ( document.location.href.indexOf('#our-services') > -1 ) {
        $('#bottom-pages article:first-child').show(0,'linear');
        $('#bottom-pages article:nth-child(2)').hide(0,'linear');  		
  		$('#bottom-pages article:nth-child(3)').hide(0,'linear');
    }
});



$(window).load(function(){
	if ( document.location.href.indexOf('#request-assistance') > -1 ) {
        $('#bottom-pages article:nth-child(2)').show();
  		$('#bottom-pages article:first-child').hide(0,'linear');
  		$('#bottom-pages article:nth-child(3)').hide(0,'linear');
    }
});

 
$(window).load(function(){
	if ( document.location.href.indexOf('#eligibility') > -1 ) {
        $('#bottom-pages article:nth-child(3)').show();
  		$('#bottom-pages article:first-child').hide(0,'linear');
  		$('#bottom-pages article:nth-child(2)').hide(0,'linear');
    }


});

 



// Smooth scroll	
	
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 560);
	        return false;
	      }
	    }
	  });
	});

// Makes all menu items equal width.


	$(document).ready(function() {
		menuWidth = $('#menu-navigation.menu').width();
		menuItemWidth = (menuWidth / 2);
		$('#menu-navigation.menu li a').css('width', menuItemWidth)
		
	});

	$(window).resize(function() {
		menuWidth = $('#menu-navigation.menu').width();
		menuItemWidth = (menuWidth / 2);
		$('#menu-navigation.menu li a').css('width', menuItemWidth)
		
	});


		$(document).ready(function() {
		menuWidth = $('#menu-footer.menu').width();
		menuItemWidth = (menuWidth / 2.7);
		$('#menu-footer.menu li a').css('width', menuItemWidth)
		
	});

	$(window).resize(function() {
		menuWidth = $('#menu-footer.menu').width();
		menuItemWidth = (menuWidth / 2.7);
		$('#menu-footer.menu li a').css('width', menuItemWidth)
		
	});

 
	
// Makes all Portfolio items same height.

	$(document).ready(function() {
	   var PmaxHeight = -1;

	   $('#work article').each(function() {
	     PmaxHeight = PmaxHeight > $(this).height() ? PmaxHeight : $(this).height();
	     PmaxHeight = PmaxHeight;
	   });

	   $('#work article').each(function() {
	     $(this).css('min-height', PmaxHeight);
	   });
	 });

	$(document).ready(function() {
	   var EmaxHeight = -1;

	   $('#experience article').each(function() {
	     EmaxHeight = EmaxHeight > $(this).height() ? EmaxHeight : $(this).height();
	     EmaxHeight = EmaxHeight;
	   });

	   $('#experience article').each(function() {
	     $(this).css('min-height', EmaxHeight);
	   });
	 });


	$(window).resize(function() {
	   var PmaxHeight = -1;

	   $('#work article').each(function() {
	     PmaxHeight = PmaxHeight > $(this).height() ? PmaxHeight : $(this).height();
	     PmaxHeight = PmaxHeight;
	   });

	   $('#work article').each(function() {
	     $(this).css('min-height', PmaxHeight);
	   });
	 });

	$(window).resize(function() {
	   var EmaxHeight = -1;

	   $('#experience article').each(function() {
	     EmaxHeight = EmaxHeight > $(this).height() ? EmaxHeight : $(this).height();
	     EmaxHeight = EmaxHeight;
	   });

	   $('#experience article').each(function() {
	     $(this).css('min-height', EmaxHeight);
	   });
	 });	


// Back to top script
	 
	 $(document).ready(function() {
				 $('#backToTop').hide();
				 
				 $(function () {
					 $(window).scroll(function() {
						 if ($(this).scrollTop() > 100){
							 $('#backToTop').fadeIn(); 
						 } else {
							 $('#backToTop').fadeOut();
						 }				 
					 });

					 	$(window).scroll(function(){
							var scrollTop = $(window).scrollTop();
							if (scrollTop >= 420) {
							var windowWidth = $(window).width();	
							$('#secondary-navigation').fadeIn();
						 	$('#secondary-navigation').css('top','0%');
						 	$('#secondary-navigation').addClass('fixed');
						 	// $('#secondary-navigation').css('width', windowWidth)
							} else if (scrollTop <= 419) {
								$('#secondary-navigation').fadeOut();
						 	$('#secondary-navigation').css('top','-25%');
						 	$('#secondary-navigation').removeClass('fixed')
							}
						});


					 
					 $('#backToTop a').click(function(){
						 $('body,html').animate({
							 scrollTop:0
						 }, 800);
						 return false;
					 });
				 });
	 });

	 // Fancybox
	 /*
	 $(document).ready(function() {
		$("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox({
			padding:10
		});

	}); */

	

})(jQuery);