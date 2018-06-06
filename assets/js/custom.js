
(function($) {
 "use strict"; // Start of use strict
 /* ---------------------------------------------- /*
	 * Preloader
	/* ---------------------------------------------- */

	$(window).on('load', function() {
        $('#loading').fadeOut();
        $('#preloader').delay(300).fadeOut('slow')
});
/*--------------------------
	counter
---------------------------- */	
      // start all the timers
      $('.timer').each(count);
     
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }      

    // Fit Text Plugin for Main Header
    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

/*--------------------------
	Scrolling Animations
---------------------------- */	
    // Initialize WOW.js Scrolling Animations
    new WOW().init();
    
/*------------------------------------------------
 * owlCarousel    
------------------------------------------------*/  
$(function () {
              var owl = $(".owl-carousel");
 
  owl.owlCarousel({
  		 autoPlay: 3000,
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 var owl = $(".owl-carousel2");
 
  owl.owlCarousel({
  		 autoPlay: 3000,
      items : 3, //10 items above 1000px browser width     
  });
 var owl = $(".owl-carousel3");
 
  owl.owlCarousel({
  		 autoPlay: 3000,
      items : 1, //10 items above 1000px browser width    
  });
  // Custom Navigation Events
  $(".next").on('click', function(){
    owl.trigger('owl.next');
  });
  $(".prev").on('click', function(){
    owl.trigger('owl.prev');
  });
        });         

})(jQuery); // End of use strict


