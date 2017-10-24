
var OCTA = OCTA || {};

(function($) { 

	"use strict";

	OCTA.init = {

		patterns: function(){
			/* ============= Patterns Select Functions. ============= */
			var currentVal = $('input.patterns').val();
			$('.pattern-img').each(function(){
				var th = $(this),
					thisSrc = th.attr('src');
				if (thisSrc == currentVal){
					th.addClass('selected-im');
				}
				th.click(function(){
					$('.pattern-img').removeClass('selected-im');
					th.addClass('selected-im');
					$('input.patterns').val(thisSrc);
				});
			});
		},

		import_demo: function(){
			/* ================== Import Demo Data. ================= */
			var $import_true = '',
				_attachment = $('#import_data'),
		    	_is_attachment  = null;
			$('.import_btn').click(function(e){
				e.preventDefault();
				var th = $(this);
				$import_true = confirm('Are you sure ? This will overwrite the existing data!');
		        if($import_true === false) return;
		        if( _attachment.is(':checked') ) {
		        	_is_attachment = true;
		        }
		        $('.noticeImp').fadeIn();
		        th.next('.loader').html('<span class="spinner"></span>');
		        $('.attachments').fadeOut();
		        $.ajax({
		            type  : 'POST',
		            url   : ajaxurl,
		            data  : { action: 'my_action', attachment: _is_attachment },
		            success : function( data ) {              
		              	th.next('.loader').html('');
		            	$('.noticeImp').fadeOut();
		            	$('.import_message').html('<div class="import_message_success">Successfully Imported</div>');
				    	window.location.reload(true);
		            }
		        });
		    });
		},

		mainform: function(){
			/* ============== Ajax Save Form Functions. ============= */
			var adminurl = $('.adm').text();

			$('button.reset_btn[name="reset"]').click(function(){
				var $reset_true = confirm('Click OK to reset. Any theme settings will be lost!');
				if($reset_true === false) return false;
			});

			$('.save_btn').click( function () {
				var b =  $(this).parent().parent('.main-options-form').serialize();
				var el = $('.msg');

				$('.loader-in').css('display','inline-block');
					$.post( adminurl +'options.php', b ).error(function() {
					el.text('Error saving data').addClass('error').fadeIn();
					setTimeout(function () {
						el.fadeOut(500);
					}, 3000);
				}).success( function() {
					el.text('Seccessfuly saved').addClass('success').fadeIn(500);
					$('.loader-in').fadeOut(0);
					$('.it_bx').customcheck()
					setTimeout(function () {
						el.fadeOut(500);
					}, 1500);
				});
				return false;    
			});
		},

		custom_css_js: function(){
			if($('#custom_css').length){
		    	var csseditor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
					extraKeys: {"Ctrl-Space": "autocomplete"},
					theme: 'mdn-like',
					lineNumbers: true,
					autoRefresh: true,
				    styleActiveLine: true,
				    matchBrackets: true,
				    foldGutter: true,
				    gutters: ["CodeMirror-foldgutter"],
				    mode: 'text/css'
				});
				
				function updateTextArea() {
					csseditor.save();
				}
				csseditor.on('change', updateTextArea);
		    }

		    if($('#custom_js').length){

				var jsseditor = CodeMirror.fromTextArea(document.getElementById("custom_js"), {
					theme: 'mdn-like',
					lineNumbers: true,
					matchBrackets: true,
					styleActiveLine: true,
					foldGutter: true,
					mode: 'text/javascript',
					autoRefresh: true,
					gutters: ["CodeMirror-foldgutter"],
					extraKeys: {"Ctrl-Q": "toggleComment"}
				});
				
				function updateTextArea() {
					jsseditor.save();
				}
				jsseditor.on('change', updateTextArea);
		    }
		},

		globals: function(){
			
			$('.sec-heading').each(function(){
				var $ids = $(this).attr('data-id');
				var idd = '';
				if(typeof $ids !== typeof undefined && $ids !== false){
					 idd = ' id="'+$ids+'"';
				}
				$(this).nextUntil('.sec-heading').wrapAll('<div class="acc-content"'+idd+'></div>');
			});

			$('.it-sec').each(function(){
				var that 	= $(this),
					grp 	= that.find('> .group'),
					idd 	= that.attr('data-id'),
					subs 	= $(".sub-section."+idd);
				subs.appendTo(grp).wrapAll('<div class="subs"></div>');
				$('.subs').find('.subs').removeClass('subs').find('.sub-section').removeClass('sub-section').addClass('child-sec');
			});

			$('.boo-tabs-nav li a').each(function(){
				var th = $(this),
					ur = th.attr('href');
				$('.boo-tabs-nav li').eq(0).addClass('boo-state-active');
				$('.boo-tabs-panel').eq(0).show(0);

				th.on('click',function(e){
					e.preventDefault();
					if($(ur).is(':hidden')){
						$('.boo-tabs-panel').fadeOut(0);
						$('.boo-tabs-nav li').removeClass('boo-state-active');
						th.parent().addClass('boo-state-active');
						$(ur).fadeIn(200);
					}
				});
			});

			$(".slidernum").each(function(){
				var th 		= $(this),
					thP 	= th.next().attr('value'),
					thMin	= th.data('min'),
					thMax	= th.data('max');

				if(thMin == '' & thMax == ''){
					
					th.remove();

				}else {

					th.slider({
						range: "min",
						value: thP,
						step: 1,
						min: thMin,
						max: thMax,
						slide: function (event, ui) {
			                var thPre = th.next();
			                thPre.val(ui.value);
			            }
					});

				}
				
			});

			$('.hid_two_num').each(function(){
				var t = $(this),
					input = $('.num-txt'),
					tFirst = t.parent().find('.firstVL'),
					tLast = t.parent().find('.lastVL');
				
				input.on('input',function(){
					var val1 = (isNaN(parseInt(tFirst.val()))) ? 0 : parseInt(tFirst.val());
    				var val2 = (isNaN(parseInt(tLast.val()))) ? 0 : parseInt(tLast.val());
					t.val(val1+'|'+val2);
				});

			});

			$('.arraySelect img').each(function(){
				var th = $(this),
					thVl = th.data('value'),
					part = th.parent().parent().find('.hiddenSelect'),
					partv = part.val();
				
				if(partv == thVl){
					th.parent().addClass('active');
				}

				th.click(function(){
					part.val($(this).data('value')).trigger('change');
					$('.sel_block').removeClass('active');
					th.parent().addClass('active');
				});
				
			});

			$(window).scroll(function(){
				var sticky = $('.form-btns'),
					wid = parseInt($('.boo_tabs_wrap').outerWidth(),10)-20,
				scroll = $(window).scrollTop();

				if (scroll >= 100){
					sticky.addClass('fixed_btns');
					sticky.css('width',wid+'px');
				} else {
					sticky.removeClass('fixed_btns');
					sticky.css('width','auto');
				}
			});

			$('.select_boxes').each(function(){
				var th = $(this),
					act = '';
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
				
			});

			$('.num-txt:not(.no-slider)').change(function () {
				var value = this.value,
				selector = $(this).next();
				selector.slider("value", value);
			});

			/* ================= Color Picker Options. ================= */
			var colorOpts = {
			    defaultColor: false,
			    change: function(event, ui){
			    	var hexcolor = $( this ).wpColorPicker( 'color' );
			    	$(this).parent().parent().parent().find('.hexa-color').attr('value',hexcolor);
			    },
			    clear: function() {
			    	$(this).parent().parent().parent().find('.hexa-color').attr('value','');
			    },
			    hide: true,
			    palettes: true
			};
			$('.color-field,.color-chooser,.colorpicker_field').wpColorPicker(colorOpts);

			$('.boo-tabs-panel').each(function(){
				$(this).find('.acc-content').eq(0).show(0);
				var thP = $(this);
				if(thP.find('.sec-heading').length > 0){
					$(this).prepend('<ul class="inner-menu"></ul>');
			    	$(this).find('.acc-content').each(function(){
			    		var tt = $(this).prev('.sec-heading').text();
			    		var $tid = $(this).attr('id');
			    		thP.find('.inner-menu').append('<li><a href="#'+$tid+'">'+tt+'</a></li>');
			    		thP.find('.inner-menu').find('li').eq(0).addClass('selected');
			    	});
				}
		    });
		    
		    $('.inner-menu > li > a').on('click',function(e){
				e.preventDefault();
				var aID = $(this).attr('href');
				if($(aID).is(':hidden')){
					$(this).parent().parent().find('li').removeClass('selected');
					$(this).parent().addClass('selected');
					$(this).parent().parent().parent().find('.acc-content').fadeOut(0);
			    	$(aID).fadeIn(200);
		    	}
		    });
		},

		add_boxes: function(){
			$('.add_btn').each(function(){
		    	var that 		= $(this),
		    		subss 		= that.parent().find('.subs'),
		    		bar_box 	= that.find('.hid_txt'),
		    		subs_sec 	= subss.find('.sub-section');

		    	if(subss.length){
			    	that.after('<div class="clearfix"></div>');
			    	subss.addClass('sortable');
			    }else{
			    	that.after('<div class="subs sortable"></div>');
			    }
			    		    
			    // social icons
				if($(this).find('.hid_txt').is('.socials')){
		    		for(var i = 0; i < subs_sec.length; i+=3) {
						subs_sec.slice(i, i+3).wrapAll('<div class="grup"></div>');
					}
		    		subs_sec.each(function(){
				    	$(this).removeClass('sub-section').addClass('in-item');
				    });

		    	// custom fonts
		    	}else if($(this).find('.hid_txt').is('.fontat')){
		    		for(var i = 0; i < subs_sec.length; i+=6) {
						subs_sec.slice(i, i+6).wrapAll('<div class="grup"></div>');
					}
		    		subs_sec.each(function(){
				    	$(this).removeClass('sub-section').addClass('in-item');
				    });
		    	
		    	// sidebars
		    	} else {
		    		subs_sec.each(function(){
				    	$(this).removeClass('sub-section').addClass('in-item').wrap('<div class="grup"></div>');
				    });
		    	}

		    	subss.find('.grup').each(function(index){
		    		$(this).addClass('section_group').attr('data-id',$(this).index());
		    	});

			    that.find('.add_box').on('click', function(e){
			    	e.preventDefault();					
					var v = bar_box.val();
					v++;
					bar_box.val(v);

			    	// clone and add bar boxes...
					OCTA.init.cloneitems( subss,v );

			    	that.parent().parent().find('.subs').find('.section_group').removeClass('open selected');
			    	that.parent().parent().find('.subs').find('.section_group[data-id="'+v+'"]').addClass('open selected');

					OCTA.init.indVal();
					OCTA.init.load_icons();
					OCTA.init.remove_box();
					OCTA.init.collap();
					OCTA.init.sorting();

			    	return false;
			    });
		    });
		},

		add_modules: function(){
			$('.add_mod').each(function(){
		    	var that 		= $(this),
		    		subss 		= that.parent().parent().find('.subs'),
		    		bar_box 	= that.find('.hid_txt'),
		    		subs_sec 	= subss.find('.sub-section');

		    	if(subss.length){
			    	that.after('<div class="clearfix"></div>');
			    	subss.addClass('sortable');
			    }else{
			    	that.after('<div class="subs sortable"></div>');
			    }

		    	// top bar    			
	    		subs_sec.each(function(index){
			    	$(this).removeClass('sub-section').addClass('in-item').wrap('<div class="section_group" data-id="'+$(this).index()+'"></div>');
			    });

			    that.find('.add_module').on('click', function(e){
			    	e.preventDefault();
					var v = bar_box.val();
					v++;
					bar_box.val(v);

					// clone and add bar modules...
			    	OCTA.init.cloneitems( subss,v );

			    	that.parent().parent().find('.subs').find('.section_group').removeClass('open selected');
			    	that.parent().parent().find('.subs').find('.section_group[data-id="'+v+'"]').addClass('open selected');

					OCTA.init.itemdepend();
					OCTA.init.selVal();
					OCTA.init.load_icons();
					OCTA.init.remove_box();
					OCTA.init.collap();
					OCTA.init.sorting();

			    	return false;
			    });
		    });
		},

		subsections: function(){
			$('.section_group').each(function(){
				$(this).prepend('<h4 class="th_title collapse_row"><span></span><a class="remove_box" href="#" title="Remove"><i class="fa fa-times"></i></a><a class="tgl" href="#" title=""><i class="fa fa-chevron-down"></i></a></h4>');
			});
		},

		itemdepend: function(){

			$('.dep-field').each(function(){
				var t 		= $(this),
					vl 		= t.val(),
					deps 	= t.attr('id');
		    	
		    	if( t.attr('type') == 'text' ) {
		    		
		    		if( t.val() == '' ){
		    			$("[data-dep='"+deps+"']").hide(0);
		    		} else {
		    			$("[data-dep='"+deps+"']").show(0).css('display','table');
		    		}

		    		t.on('input',function(){
						if(t.val() == ''){
			    			$("[data-dep='"+deps+"']").fadeOut(200);
			    		} else {
			    			$("[data-dep='"+deps+"']").fadeIn(200).css('display','table');
			    		}
		    		});

		    	} else if( t.attr('type') == 'hidden' ) {
		    		
		    	} else {		    		
					
					$("[data-dep='"+deps+"']").hide(0);
		    		$("[data-dep='"+deps+"'][data-vl*='"+vl+"']").show(0).css('display','table');

		    		t.on('change',function(){
						var vl2 = t.val();
						$("[data-dep='"+deps+"']").fadeOut(200);
						$("[data-dep='"+deps+"'][data-vl*='"+vl2+"']").fadeIn(200).css('display','table');
					});

		    	}
			});
		},

		add_vls: function(){
			$('.hid-vl').each(function(){
				var th = $(this),
					thv = th.val(),
					prv = th.prev();
							
				prv.find('option[value="'+thv+'"]').attr('selected','selected');

				prv.change(function(){
					var v = $(this).val();
					th.val(v);
				});

			});

			$('.hid-widget').each(function(){
				var th = $(this),
					thv = th.val(),
					sel = th.prev();

				sel.val(thv);

				sel.on('change',function(){
					var vl = $(this).val();
					th.val(vl);
				});
			});
		},

		uploads: function(){
			$('.section .upload_image_button,.edit_form_line .upload_image_button,.btn-banner,.btn-image').each(function(){
				var txtb = $(this).prev();

				txtb.on('input',function(){
					var dep 	= txtb.attr('name'),
						deps 	= txtb.attr('id');
			    	if( txtb.val() == ''){
			    		$('img.logo-im').hide();
			    	}
				});

				$(this).click(function(e) {
					e.preventDefault();
					wp.media.editor.send.attachment = function(props, attachment) {
						txtb.val(attachment.url);
						txtb.parent().find('img.logo-im').attr('src',attachment.url);
						txtb.parent().find('img.logo-im').fadeIn(500);
						txtb.parent().find('.remove-img').show();

						var dep 	= txtb.attr('name'),
							deps 	= txtb.attr('id');
				    	
				    	$("div[data-dep='"+deps+"']").fadeIn(200);

					}
					wp.media.editor.open(this);
					return false;
				});
			});

			$('.section .upload_button,.edit_form_line .upload_button').each(function(){
				var txtb = $(this).parent().find('.regular-text');
				txtb.on('input',function(){
					var dep 	= txtb.attr('name'),
						deps 	= txtb.attr('id');
			    	if( txtb.val() == ''){
			    		$('img.logo-im').hide();
			    	}
				});
				$(this).click(function(e) {
					e.preventDefault();
					wp.media.editor.send.attachment = function(props, attachment) {
						txtb.val(attachment.url);
						txtb.next().show().css('display','inline-block');
					}
					wp.media.editor.open(this);
					return false;
				});
			});
		
			$('.remove-val').each(function(){
				if($(this).prev().val() === ''){
					$(this).hide();
				}
				$(this).click(function(e){
					e.preventDefault();
					$(this).prev().val('');
					$(this).hide();

					var dep 	= $(this).prev().attr('name'),
						deps 	= $(this).prev().attr('id');
			    	
			    	$("div[data-dep='"+deps+"']").fadeOut(200);

				});
			});

			$('.remove-img').each(function(){
				$(this).click(function(e){
					e.preventDefault();
					$(this).parent().find('img.logo-im').fadeOut(500).attr('src','');
					$(this).parent().parent().find('.regular-text').val('');
					$(this).hide();

					var dep 	= $(this).parent().parent().find('.regular-text').attr('name'),
						deps 	= $(this).parent().parent().find('.regular-text').attr('id');
			    	
			    	$("div[data-dep='"+deps+"']").fadeOut(200);
				});
			});
			
			$('img.logo-im').each(function(){
				if($(this).attr('src') === ""){
					$(this).parent().find('.remove-img').fadeOut(500);
					$(this).fadeOut(500);
				}
			});
		},

		indVal: function(){
			$('.indval').each(function(){
		    	
		    	var th = $(this),
		    		thhold = th.attr('placeholder'),
		    		thv = th.val();

		    	th.parents('.section_group').find('h4.th_title').find('span').text(thv);		    	
		    	th.keyup(function(){
		    		th.parents('.section_group').find('h4.th_title span').text('');
		    		var vlc = th.val();
		    		th.parents('.section_group').find('h4.th_title span').text(vlc);
		    	});
		    });
		},

		selVal: function(){
			$('.selVal').each(function(){
		    	var th = $(this),
		    		thv = th.find("option:selected").text();

		    	if(thv == '-- Select Box --')thv = 'New Module';

		    	th.parents('.section_group').find('h4.th_title').find('span').text(thv);
		    	
		    	th.on('change',function(){
		    		th.parents('.section_group').find('h4.th_title span').text('');
		    		var vlc = th.val(),
		    			thT = th.find("option:selected").text();

		    		if( thT == '-- Select Box --' ){
		    			thT = 'New Module';
		    		} else {
		    			th.parents('.section_group').find('h4.th_title').find('span').text(thT);
		    		}
		    		th.val(vlc);	    		
		    	});

		    });
		},

		load_icons: function(){
			// this variable to get the template directory path.
			var themeurl = '';
			if($('#it-framework-css').length > 0){
				themeurl = $('#it-framework-css').attr('href').split('/it-framework')[0];
			}else if($('.themeURI').length > 0){
				themeurl = $('.themeURI').text();
			}
			
			OCTA.init.icons_init();

			//if($('.it_add_icon').length == 0){
				$('body').append('<div id="icon-overlay"></div>');
			//}
			
			var dw = parseInt($(window).width())/2,
				mw = parseInt($('.it_add_icon').width())/2,
				dh = parseInt($(window).height())/2,
				mh = parseInt($('.it_add_icon').height())/2,
				lft = dw-mw+'px',
				tp = dh-mh+'px';
			$('.it_add_icon').css({left:lft,top:tp});
			OCTA.init.click_icons();
			$.ajax({
				type: "GET",
				url: ajaxurl,
				success: function(data) {
					//$('.it_add_icon').html(data);
					var iconSearch = $('.iconSearch'),
						iconLoad     = $('.icons_set');
					    iconSearch.keyup( function(){
					    var $this = $(this),
					        val   = $this.val(),
					        list_icon  = iconLoad.find('a');
					    list_icon.each(function() {
					      var $ico = $(this);
					      if ( $ico.data('icon').search( new RegExp(val, "i") ) < 0 ) {
					        $ico.hide();
					      } else {
					        $ico.show();
					      }
					    });
					});
				}
			});
		},

		icons_init: function(){
			$('.icon_cust').each(function(){
				if($(this).val() != ''){
					$(this).next('.icon-remove').fadeIn().css('display','inline-block');
					$(this).parent().find('.ico').fadeIn();
					var ic = $(this).val();
					$(this).parent().find('.ico').addClass(ic);
					$(this).parent().find('.btn_icon').text('Change Icon');
				}else{
					$(this).next('.icon-remove').fadeOut();
					$(this).parent().find('.ico').fadeOut();
				}
			});
		},

		click_icons: function(){
			$('.btn_icon').each(function(){
				var th = $(this);
				th.on('click', function(e){
					e.preventDefault();
					$('#icon-overlay').fadeIn(200);
					$('.it_add_icon').fadeIn(300);
					$('.btn_icon').removeClass('clicked');
					th.addClass('clicked');
					$('.icons_set a').each(function(){
						$(this).click(function(e){
							e.preventDefault();
							var icon = $(this).find('i').attr('class');
							$('.btn_icon.clicked').next('.icon_cust').val(icon);
							$('.btn_icon.clicked').prev('.ico').removeAttr('class').addClass(icon+' ico');
							$('#icon-overlay,.it_add_icon').fadeOut(400);
							th.parent().find('.icon-remove').fadeIn().css('display','inline-block');
							th.parent().find('.ico').fadeIn();
							th.text('Change Icon');
							th.removeClass('clicked');
							return false;
						});
					});			
										
					$('.close-login').click(function(e){
						e.preventDefault();
						$('.btn_icon').removeClass('clicked');
						$('#icon-overlay,.it_add_icon').fadeOut(400);
					});
				});	
			});
					
					
			$('.icon-remove').each(function(){
				$(this).click(function(e){
					e.preventDefault();
					$(this).parent().find('.icon_cust').val('');
					$(this).parent().find('.ico').removeAttr('class').addClass('ico');
					$(this).fadeOut(200);
					$(this).parent().find('.ico').fadeOut(200);
					$(this).parent().find('.btn_icon').text('Add Icon');
				});
			});
			
			$('.select_icon').change(function(){
				var thisVal = $(this).val();
				$('.icons_set > div').hide();
				$('.icons_set').find('.'+thisVal).show();
			});
		},

		remove_box: function(){
			$('.theme-options .remove_box').each(function(){
		    	var th  = $(this);
		    	th.unbind('click').on('click',function(e){
		    		e.preventDefault();
					var txt = th.parents('.section').find('.hid_txt'),
						ind = th.parent().parent().data('id'),
			    		vll = txt.val();

			        vll--;
		    		txt.val(vll);
		    		var all = th.parent().parent().nextAll('.section_group');
		    		all.each(function(){
		    			var tt = $(this),
		    				idd = tt.attr('data-id'),
		    				ne = idd-1;

		    			tt.attr('data-id',ne);
		    			tt.find('[data-id*="_'+idd+'"]').each(function(){ $(this).attr('data-id',$(this).attr('data-id').replace('_'+idd,'_'+ne)); });
		    			tt.find('[class*="_'+idd+'"]').each(function(){ $(this).attr('class',$(this).attr('class').replace('_'+idd,'_'+ne)); });
						tt.find('[name*="_'+idd+'"]').each(function(){ $(this).attr('name',$(this).attr('name').replace('_'+idd,'_'+ne)); });
						tt.find('[id*="_'+idd+'"]').each(function(){ $(this).attr('id',$(this).attr('id').replace('_'+idd,'_'+ne)); });
						tt.find('[data-parent*="_'+idd+'"]').each(function(){ $(this).attr('data-parent',$(this).attr('data-parent').replace('_'+idd,'_'+ne)); });
						tt.find('[data-dependency*="_'+idd+'"]').each(function(){ $(this).attr('data-dependency',$(this).attr('data-dependency').replace('_'+idd,'_'+ne)); });
						tt.find('[data-dep*="_'+idd+'"]').each(function(){ $(this).attr('data-dep',$(this).attr('data-dep').replace('_'+idd,'_'+ne)); });
						
		    		});
	    			th.parents('.section_group').slideUp(300, function() { $(this).remove(); });
			    	//return false;
		    	});
		    });
		},

		collap: function(){
			$('.theme-options .collapse_row').each(function(){
				var th = $(this);
	    		th.nextAll('.in-item').wrapAll('<div class="coll"></div>');
	    		$('.theme-options .coll').slideUp(0);
				$('.theme-options .collapse_row').removeClass('selected');
				$(this).unbind('click').on('click',function(e){
		    		e.preventDefault();
		    		var tt = th.next('.coll');
		    		if(tt.is(':hidden')){
		    			$('.section_group').removeClass('open');
		    			th.parents('.subs').find('.coll').slideUp(300);
		    			tt.slideDown(300);
		    			th.parent().addClass('selected');
		    			th.parents('.subs').find('.collapse_row').not(th).parent().removeClass('selected');
		    		}else{
		    			$('.section_group').removeClass('open');
		    			tt.slideUp(300);
		    			$(this).parent().removeClass('selected');
		    		}
		    	});	
			});
		},

		cloneitems: function( subss,l ){
			var orgclone = subss.find('.section_group[data-id="0"]'),
				cloned = orgclone.clone().attr('data-id', l ).removeAttr('style');
			
			cloned.find('.indval').val('');
			cloned.find('[class*="_0"]').each(function(){ $(this).attr('class',$(this).attr('class').replace('_0','_'+l)); });
			cloned.find('[name*="_0"]').each(function(){ $(this).attr('name',$(this).attr('name').replace('_0','_'+l)); });
			cloned.find('[id*="_0"]').each(function(){ $(this).attr('id',$(this).attr('id').replace('_0','_'+l)); });
			cloned.find('[data-parent*="_0"]').each(function(){ $(this).attr('data-parent',$(this).attr('data-parent').replace('_0','_'+l)); });
			cloned.find('[data-dependency*="_0"]').each(function(){ $(this).attr('data-dependency',$(this).attr('data-dependency').replace('_0','_'+l)); });
			cloned.find('[data-dep*="_0"]').each(function(){ $(this).attr('data-dep',$(this).attr('data-dep').replace('_0','_'+l)); });
			cloned.find('[data-id*="_0"]').each(function(){ $(this).attr('data-id',$(this).attr('data-id').replace('_0','_'+l)); });
			
			cloned.find('.it_bx').customcheck();

			cloned.appendTo(subss);
		},

		sorting: function(){
			$( ".theme-options .sortable" ).each(function(){
				$(this).sortable({
					connectWith: ".connectedSortable",
					update: function( event, ui ) {
						$(this).find('.section_group').each(function(i) { 
							var tt = $(this),
			           			idd = tt.attr('data-id');

							tt.attr('data-id', i);
							tt.find('[data-id*="_'+idd+'"]').each(function(){ $(this).attr('data-id',$(this).attr('data-id').replace('_'+idd,'_'+i)); });
							tt.find('[class*="_'+idd+'"]').each(function(){ $(this).attr('class',$(this).attr('class').replace('_'+idd,'_'+i)); });
							tt.find('[name*="_'+idd+'"]').each(function(){ $(this).attr('name',$(this).attr('name').replace('_'+idd,'_'+i)); });
							tt.find('[id*="_'+idd+'"]').each(function(){ $(this).attr('id',$(this).attr('id').replace('_'+idd,'_'+i)); });
							tt.find('[data-parent*="_'+idd+'"]').each(function(){ $(this).attr('data-parent',$(this).attr('data-parent').replace('_'+idd,'_'+i)); });
							tt.find('[data-dependency*="_'+idd+'"]').each(function(){ $(this).attr('data-dependency',$(this).attr('data-dependency').replace('_'+idd,'_'+i)); });
							tt.find('[data-dep*="_'+idd+'"]').each(function(){ $(this).attr('data-dep',$(this).attr('data-dep').replace('_'+idd,'_'+i)); });
				           
				        });
					}
				});
			});
		},

		countdate: function(){
			$('.count_date').each(function(){
				$(this).attr('readonly','readonly').attr('autocomplete','off');
				$(this).datepicker({
			        dateFormat : 'yy/mm/dd'
			    });	
			});
		},

		sidebars: function(){
			$('.sidebar_imgs').find('.radio').each(function(){
				var thissrc = $(this).attr('data-src');
				$(this).before('<img alt="" src="'+thissrc+'" />');
				$('.radio:checked').prev('img').addClass('selected');
				$('.sidebar_imgs').find('img').each(function(){
					$(this).click(function(){
						$('.sidebar_imgs img').removeClass('selected');
						$(this).addClass('selected');
						$(this).next('.radio').attr('checked','checked');
						if($('.sidebar-right').prev().hasClass('selected') || $('.sidebar-left').prev().hasClass('selected')){
							$('.custom_side').show(0);
						}else{
							$('.custom_side').hide(0);
						}
					});
				});
				if($('.sidebar-right').prev().hasClass('selected') || $('.sidebar-left').prev().hasClass('selected')){
					$('.custom_side').show(0);
				}
			});
		}
		
	}

	OCTA.docLoad = {
		init: function(){
			OCTA.init.patterns();
			OCTA.init.import_demo();
			OCTA.init.mainform();
			OCTA.init.custom_css_js();
			OCTA.init.globals();
			OCTA.init.add_boxes();
			OCTA.init.add_modules();
			OCTA.init.subsections();
			OCTA.init.itemdepend();
			OCTA.init.indVal();
			OCTA.init.selVal();
			OCTA.init.uploads();
			OCTA.init.add_vls();
			OCTA.init.load_icons();
			OCTA.init.collap();
			OCTA.init.remove_box();
			OCTA.init.sidebars();
			OCTA.init.sorting();
			$('.it_bx').customcheck();
			$('.chosen-select').chosen();
			$('.date-soon').attr('readonly','readonly').attr('autocomplete','off').datepicker({dateFormat : 'yy/mm/dd'});
		}
	};

	/* ================ Window.Load Functions. ================ */
	$(window).load(	OCTA.docLoad.init );

	/* ================ AjaxComplete Functions. ================ */
	$(document).unbind('ajaxComplete').ajaxComplete(function(){
		OCTA.init.uploads();
		OCTA.init.icons_init();
		OCTA.init.click_icons();
		OCTA.init.add_vls();
		OCTA.init.countdate();
		$('.it_bx').customcheck();
	});

})(jQuery);