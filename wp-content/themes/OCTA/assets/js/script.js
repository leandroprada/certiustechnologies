var OCTA = OCTA || {};

(function($) {

	"use strict";		

	/* ================ Document.ready Functions. ================ */
	OCTA.ready = {
		
		oc_loadinit: function(){
			if($('.page-loader').length){
				if($('.page-loader').find('.line_with_Dots').length > 0){
					$('.circlesload').append('<i></i><i></i><i></i><i></i>');
				} else if($('.page-loader').find('.loader_img').length > 0){
					var im = $('.loader_img').find('img'),
						imW = im.outerWidth()/2,
						imH = im.outerHeight()/2;
					$('.loader_img').css('margin', -imH+'px 0 0 '+-imW+'px' );
				}
			}
		},

		oc_globals: function(){
			// Add the same icon for social icons.
			$('.social-list a i').each(function(){
		    	var contt = window.getComputedStyle(this,':before').content.replace(/\'/g, "").replace(/\"/g, "");
		    	$(this).attr('data-hover',contt);
			});

			// Remove widget title if empty.
			$('.widgettitle').each(function(){
				var th = $(this);
				if(th.text() == '' || th.text() == ' '){
					th.hide();
				}
			});

			// Add classes for some links on hover in out for animations.
			$('a.hov_eff').on({
			    mouseenter: function() {
					var th = $(this);
					th.removeClass("leave").addClass("enter"), setTimeout(function() {
						th.addClass("out");
					}, 400);
			    },
			    mouseleave: function() {
					var th = $(this);
					th.removeClass("enter").addClass("leave"), setTimeout(function() {
						th.removeClass("leave");
					}, 400);
			    }
			});

		}
	};

	OCTA.docReady = {
		init: function(){
			OCTA.ready.oc_loadinit();
			OCTA.ready.oc_globals();
		}
	};
	$(document).ready( OCTA.docReady.init );

	/* ================ Window.Load Functions. ================ */
	OCTA.load = {
		
		oc_globals: function(){
			// Animate the scroll to top
			$('#to-top').click(function(e) {
				e.preventDefault();
				$('html, body').animate({scrollTop: 0}, 300);
			});

			$(".main-nav a[href*='#']:not([href='#'])").mPageScroll2id({
				offset:54,
				scrollEasing:"easeInOutExpo",
				highlightClass:"active",
			});
		},

		videoBGS: function(){
			var vid = $('.video-wrap:has(video)');
			if( vid.length > 0 ) {
				vid.each(function(){
					var el = $(this).find('video'),
						elW = $(this).outerWidth(),
						elH = $(this).outerHeight(),
						vidW = el.outerWidth(),
						vidH = el.outerHeight();
					if( vidH < elH ) {
						var rat = vidW/vidH,
							newW = elH * rat,
							pos = (newW - elW) / 2;
						el.css({'width': newW+'px','height':elH+'px','left':-pos+'px'});
					} else {
						var elPos = (vidH - elH) / 2;
						el.css({'width': vidW+'px','height':vidH+'px','top':-elPos+'px'});
					}
				});
			}
		},
		
		oc_dynamicmenu: function(){
			var mainnav = $('.main-nav > ul');
			mainnav.find('li').not('.mega-menu li').each(function(){
				$(this).on('hover', function(){
					var submenu = $(this).find('> ul');
					if (submenu.length){
						var $sub = $(this).find('> ul'),
							$contain = $('.top-head .container');
						if($sub.length && $contain.length){
							var $c = $contain.width() + $contain.offset().left;
							$sub.each(function(){
								var $lft = $(this).offset().left + $(this).outerWidth();
								if( $lft > $c){
									$(this).addClass('rit-menu');
								}
							});
						}else{
							var $ww = $(window).width();
							$sub.each(function(){
								var $lt = $(this).offset().left + $(this).outerWidth();
								if( $lt > $ww){
									$(this).addClass('rit-menu');
								}
							});
						}
					}
				});
			});
		},

		oc_stickyheader: function(){
			if($('.top-bar').length){
				var offs = $('.top-bar').height();
			} else {
				var offs = $('.top-head').height();
			}

			if ( $('.top-head').hasClass('bottom') ) {
				var offf = $('.top-head').outerHeight(),
					doch = $(window).height(),
					offs = doch - offf;
			}

			$('.top-head.affix-top').affix({ offset: { top: offs} });
		},

		oc_megamenu: function(){
			$('.mega-menu').each(function(){
				var cl = $(this).data('mega');
				$(this).find('> .sub-menu').wrap('<div class="mega-content"><div class="row"></div></div>');
				$(this).find('.row > .sub-menu > li').addClass('col-md-'+cl);
				$(this).parents('.topbar-box').css('position','static');
			});
		},

		oc_fixed_footer: function(){
			if($('.pageContent').length){
				var winH = $(window).height(),
					headH = parseInt($('.top-head').outerHeight(),10),
					footH = parseInt($('#footWrapper').outerHeight(),10),
					mtop = winH - 200,
					H = winH -(headH + footH);
				
				if($('.fixed-footer').length){
					$('.pageContent').addClass('white-bg').css('margin-bottom',footH+"px");
					$('html,body,.pageWrapper').addClass('auto-height')
				}

			}
		},

		oc_backtotop: function(){
			var winScroll = $(window).scrollTop();
			if (winScroll > 200) {
				$('#to-top').css({transform: 'translateX(0px)',WebkitTransform: 'translateX(0px)'});
			} else {
				$('#to-top').css({transform: 'translateX(50px)',WebkitTransform: 'translateX(50px)'});
			}
		},

		oc_tweets: function(){
			if($('.tweet').length){
				$('.tweet').each(function(){
					var th = $(this),
						tw_num  = th.data('tweets-num');

					th.prepend('<div class="oc-preload"><i class="main-color icmon-spinner9"></i></div>');
					setTimeout( function() {		
						var _html = th.next('iframe').contents().find("body").html();
						th.append(_html);
						th.find('.timeline-LoadMore,iframe,.timeline-Header,.new-tweets-bar,.timeline-Footer,.timeline-Tweet-brand,.u-url.permalink.customisable-highlight,.retweet-credit,.inline-media,.footer.customisable-border,.timeline-Tweet-actions,.timeline-Tweet-metadata').remove();

						th.find('.timeline-TweetList').slick({
							dots: false,
							infinite: true,
							arrows:true,
							speed: 500,
							vertical:true,
							slide: 'li',
							autoplay:false,
							slidesToShow: tw_num,
							touchMove: true,
							slidesToScroll: tw_num
						});

						th.find('.oc-preload').hide();
					}, 1500);
				});
			}

			if($('.tw_slider').length){
				$('.tw_slider').find('.tw_shortcode').each(function(){
					var th = $(this),
						slshow = th.data('slidesnum'),
						slscrl = th.data('scamount');
					th.prepend('<div class="oc-preload"><i class="main-color icmon-spinner9"></i></div>');
					setTimeout( function() {
						var _html = th.next('iframe').contents().find("body").html();
						th.append(_html);
						th.find('.timeline-LoadMore,iframe,.timeline-Header,.new-tweets-bar,.timeline-Footer,.timeline-Tweet-brand,.u-url.permalink.customisable-highlight,.retweet-credit,.inline-media,.footer.customisable-border,.timeline-Tweet-actions,.timeline-Tweet-metadata').remove();
						th.find('.timeline-TweetList').each(function(){
							$(this).slick({
								dots: false,
								infinite: true,
								arrows:true,
								speed: 500,
								vertical:true,
								autoplay:true,
								slidesToShow: slshow,
								touchMove: true,
								slidesToScroll: slscrl
							});
						});
						$('.oc-preload').hide();
					}, 1500);
				});
			}

			$('.tweeter_wrap').each(function(){
				var h = $(this).data('height');
				$(this).css('height',h);
			});
		},

		oc_flickr: function(){
			if ($('.flickDiv').length > 0){    
				$('.flickDiv').each(function(){
					var thisID = $(this).find('.wid_id').val(),
						thisLmt = $(this).find('.wid_limit').val(),
						thisFlick = $(this).find('.flick_id').val();
					$(this).find(' > ul').jflickrfeed({
						limit: thisLmt,
						qstrings: {
						id: thisFlick
					},
					itemTemplate: '<li><a href="{{image_b}}" class="zoom"><img src="{{image_s}}" alt="{{title}}" /><span class="img-overlay"></span></a></li>',
					}, function(data) {
						$('.flickDiv a.zoom').magnificPopup({
							type:'image',
							gallery: {
								enabled: true
							}
						});
					});
				});
			}
		},

		oc_slidingbar: function(){
			if($('.slbar').length){
				var icc = $('.slbar_btn').find('span').data('icon'),
					cols = $('.slbar').data('columns');

				$('.slbar').find('.widget').addClass('col-md-'+cols);

				$('.slbar_btn').find('span').addClass(icc);
				$('.slbar_btn').on('click',function(e){
					e.preventDefault();
					var th = $(this).find('span'),
						ic = th.data('icon'),
						ictg = th.data('tgl-icon');
					
					if( !$('.slbar').hasClass("left") && !$('.slbar').hasClass("right") ){
						if($('.sl_bar_content').is(":hidden")){
							$('.slbar').addClass('active');
							$('.sl_bar_content').slideDown();
							th.removeAttr('class').addClass(ictg);
						}else{
							$('.slbar').removeClass('active');
							$('.sl_bar_content').slideUp();
							th.removeAttr('class').addClass(ic);
						}
					} else {
						
						if($('.sl_bar_content').is(":hidden")){
							$('.sl_bar_content').show(0);
							
							if($('.slbar').is('.right.cont_push')){
								$('.pageWrapper').addClass('transformed right');
							} else if($('.slbar').is('.left.cont_push')){
								$('.pageWrapper').addClass('transformed left');
							}
							
							$('body').addClass('slbar-push-body opened-slid').append('<div class="body-overlay"></div>');
							$('.slbar').addClass('active').css('transform','translate3d(0,0,0)');
							th.removeAttr('class').addClass(ictg);

						}else{
							setTimeout(function(){
					        	$('.sl_bar_content').hide();
					        },500);
							$('.slbar').removeClass('active').removeAttr('style');
							$('.pageWrapper').removeClass('transformed right left');
							$('body').removeClass('slbar-push-body opened-slid').find('.body-overlay').remove();
							th.removeAttr('class').addClass(ic);
						}

					}

					$(document).mouseup(function (e) {
					    var container = $(".slbar");
					    if (!container.is(e.target) && container.has(e.target).length === 0 && $('.sl_bar_content').is(":visible")){
					        if(container.is('.right') || container.is('.left')){
								container.hide();
						        $('body').removeClass('slbar-push-body opened-slid').find('.body-overlay').remove();
						        setTimeout(function(){
						        	$('.sl_bar_content').hide();
						        },500);
						        var ic = $('.slbar_btn').find('span').data('icon'),
									ictg = $('.slbar_btn').find('span').data('tgl-icon');
								$('.slbar').removeClass('active').removeAttr('style');
								$('.slbar_btn').find('span').removeAttr('class').addClass(ic);
								$('.pageWrapper').removeClass('transformed right left');
					        }
					    }
					});

					$('.hid-btn-head').on('click',function(){
					    if ($('.sl_bar_content').is(":visible")){
					        $('body').removeClass('slbar-push-body opened-slid').find('.body-overlay').remove();
					        $('.sl_bar_content').slideUp();
					        var ic = $('.slbar_btn').find('span').data('icon'),
								ictg = $('.slbar_btn').find('span').data('tgl-icon');
							$('.slbar').removeClass('active').removeAttr('style');
							$('.slbar_btn').find('span').removeAttr('class').addClass(ic);
							$('.pageWrapper').removeClass('transformed right left');
					    }
					});
					
				});
			}
		},

		oc_parallax: function(){
			if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1){
			}else{			
				$.stellar({
					horizontalScrolling: false,
					verticalScrolling: true,
					responsive: true,
					parallaxElements: true,
					verticalOffset:-4,
					hideDistantElements: false
				});
			}
		},

		oc_isotope: function(){
			if($('#content.masonry').length){
				var $masonry = $('#content.masonry').isotope({
					layoutMode: 'masonry',
					isFitWidth: true
				});
				$masonry.imagesLoaded( function() {
					$masonry.isotope();
				});	
			}

			if($('#content.grid').length){
				var $grid = $('#content.grid').isotope({
					layoutMode: 'fitRows',
					isFitWidth: true
				});
				$grid.imagesLoaded( function() {
					$grid.isotope();
				});	
			}	
		},

		oc_pageloader: function(){
			if($(".page-loader").length){
				$(".page-loader").fadeOut();
			}
		},

		oc_animsition: function(){
			if($('.animsition').length > 0){
				var thisIn 	= $('.animsition').data('anim-in-class'),
					thisOut = $('.animsition').data('anim-out-class'),
					inDur 	= $('.animsition').data('anim-in-duration'),
					outDur 	= $('.animsition').data('anim-out-duration'),
					lods = '';

				if($('.page-loader').length){
					lods = true;
				} else {
					lods = false;
				}

				$(".animsition").animsition({
					inClass					: thisIn,
					outClass				: thisOut,
					inDuration				: inDur,
					outDuration				: outDur,
					linkElement				: 'a:not([target="_blank"]):not([href^="#"]):not(.zoom):not(.oc_zoom)',
					loading					: lods,
					loadingParentElement	: 'body',
					loadingClass			: 'page-loader',
					loadingInner			: '',
					overlay					: false
				});
			}
		},

		oc_loadmore: function(){
			var n = 1,
				pgnum = $('.loadmore .pgnum').text(),
				url = window.location.href,
				$cont = $('#content');
	        $('.loadmore a').on('click', function(e){
	        	e.preventDefault();
	        	if (n < pgnum) {
					
					$('.loadmore .pager_loading').fadeIn(100);

	        		setTimeout(function () {
		        		var response;
						$.ajax({ type: "GET",   
							url: url+'/page/'+n,   
							async: false,
							success : function(text){
								response= text;
								var $result = $(response).find('#content').html();
								$cont.append($result);
								if($cont.is('.masonry') || $cont.is('.grid')){
									$cont.isotope('destroy');
									OCTA.load.oc_isotope();	
								}
					           	var $res = $(text).find('.posts-gal');
					           	if($res.length){
						           	$cont.find('.posts-gal').slick({
										dots: true,
										arrows: false,
										slidesToShow: 1,
										touchMove: true,
										slidesToScroll: 1,
										autoplay:true,
										infinite: true,
										speed: 500,
									});
					           	}
								$('.loadmore .pager_loading').fadeOut();
							}
						});
					}, 300);
	        	} else {
	        		$('.loadmore .load_msg').fadeIn(500,function(){
	        			setTimeout(function () {
		                    $('.loadmore .load_msg').fadeOut();
		                }, 3000);
	        		});
	        	}
	        	n++;
	        });
		}

	};

	OCTA.docLoad = {
		init: function(){
			OCTA.load.oc_globals();
			OCTA.load.oc_dynamicmenu();
			OCTA.load.videoBGS();
			OCTA.load.oc_stickyheader();
			OCTA.load.oc_megamenu();
			OCTA.load.oc_slidingbar();
			OCTA.load.oc_fixed_footer();
			OCTA.load.oc_backtotop();
			OCTA.load.oc_tweets();
			OCTA.load.oc_flickr();
			OCTA.load.oc_parallax();
			OCTA.load.oc_isotope();
			OCTA.load.oc_pageloader();
			OCTA.load.oc_animsition();
			OCTA.load.oc_loadmore();
		}
	};
	$(window).load(	OCTA.docLoad.init );

	/* ================ Window.Scroll Functions. ================ */
	OCTA.winScrl = {
		init: function(){
			OCTA.load.oc_backtotop();
		}
	};
	$(window).scroll( OCTA.winScrl.init );

})(jQuery);

