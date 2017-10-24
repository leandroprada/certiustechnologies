var OCTACORE = OCTACORE || {};

(function($) { 

	"use strict";

	OCTACORE.init = {
		shortcodes: function(){
			/*$('.vc_edit_form_elements .vc_description').each(function(){
				var th = $(this),
					thCon = th.text();
				th.html('<i class="fa fa-info-circle ic_desc"></i><span class="txt_desc">'+thCon+'</span>');
				th.find('.ic_desc').on('hover', function (){
					if( th.find('.txt_desc').is(':hidden') ){
						th.find('.txt_desc').fadeIn();
					} else {
						th.find('.txt_desc').fadeOut();
					}
				});
			});*/
		},

		gfonts: function(){
			$('.fontSel select').each(function(){
				var va = $(this).val();
				$(this).parent().parent().next('.gfonts').append("<link rel='stylesheet' href='//fonts.googleapis.com/css?family="+va+":100,200,300,400,500,600,700,900&#038;subset=latin,latin-ext' type='text/css' media='all' />");
				$(this).parent().parent().next('.gfonts').css('font-family',va);
				
				$(this).on("change",function(){
					var th = $(this),
						vl = th.val();

					$(this).parent().parent().next('.gfonts').append("<link rel='stylesheet' href='//fonts.googleapis.com/css?family="+vl+":100,200,300,400,500,600,700,900&#038;subset=latin,latin-ext' type='text/css' media='all' />");
					$(this).parent().parent().next('.gfonts').css('font-family',vl);
				});
			});
		},

		custom_select: function(){
			$('.select_bxs').each(function(){
				var thP = $(this),
					th = thP.find('.edit_form_line select'),
					act = '';
				if(thP.find('.sel_opts').length == 0){
					th.before('<ul class="sel_opts"></ul>');
					var opts = th.parent().find('.sel_opts');
					th.find('option').each(function(){
						if(this.selected) {
							opts.append('<li class="active" data-value="'+$(this).val()+'">'+$(this).text()+'</li>');
						} else {
							opts.append('<li data-value="'+$(this).val()+'">'+$(this).text()+'</li>');
						}
						
					});

					opts.find('li').click(function(){
						th.val($(this).data('value')).trigger('change');
						opts.find('li').removeClass('active');
						$(this).addClass('active');
					});
				}
				
			});
		}

	};

	/* ================ Window.Load Functions. ================ */
	$(document).ajaxComplete(function(){
		OCTACORE.init.shortcodes();
		OCTACORE.init.gfonts();
		OCTACORE.init.custom_select();
	});

})(jQuery);