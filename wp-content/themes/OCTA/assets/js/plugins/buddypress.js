(function($) {

	"use strict";

	$(window).on("load", function(){
		var actgreet_txt = $('.activity-greeting').text();
		$('.activity-greeting').remove();
		$('#whats-new').attr('placeholder',actgreet_txt);
		$('body').append('<div class="bud_over"></div>');

		$('#whats-new').on('focus',function() {
	        $('.bud_over').fadeIn(200);
	        $('#whats-new-form').addClass('shaded');
	    });

		$('body').click(function(evt){    
			if(evt.target.id == "whats-new-form")
			return;
			if($(evt.target).closest('#whats-new-form').length)
			return;             
			
			$('.bud_over').fadeOut(200);
	    	$('#whats-new-form').removeClass('shaded');

		});

		$('#aw-whats-new-submit,#profile-group-edit-submit,a.friendship-button,form.standard-form input[type="submit"],.bbp-submit-wrapper button').addClass('btn main-bg-import');


	});

})(jQuery);