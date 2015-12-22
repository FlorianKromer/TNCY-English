(function($) {

    $.material.init();
    
    $(document).ready(function() {
		$('#fullpage').fullpage({
			// anchors: ['firstPage', 'secondPage', '3rdPage','4rdPage'],
			sectionsColor: ['#f6e5e4', '#fec24a', '#ae2a2f', '#f6e5e4'],
			responsive: 900,
			verticalCentered: false,
			// menu: '.cl-effect-8',
			// navigation: false,
	  //       navigationPosition: 'right',
	  //       navigationTooltips: ['firstSlide', 'secondSlide'],
	  //       showActiveTooltip: false,
	  //       slidesNavigation: false,
	  //       slidesNavPosition: 'bottom',
	        // afterLoad: function(anchorLink, index){
	        //     var loadedSection = $(this);

	        //     //using index
	        //     if(index == 3){
	        //         alert("Section 3 ended loading");
	        //     }

	        //     //using anchorLink
	        //     if(anchorLink == 'firstPage'){
	        //         $('.section1__icons').addClass('animated bounce');
	        //         $('.arrow-down img').addClass('animated pulse');
	        //     }
	        // }

		});
	});


})(jQuery);