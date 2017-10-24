
var BOO = BOO || {};

(function($) {

	"use strict";

	var $rt = '';

	BOO.init = {

		slick_sliders: function(){
			
			var runSlick = function() {
	
				if($('.oc-carousel').length > 0){
					
					$('.oc-carousel').each(function(){
						var slides_n 	= parseInt($(this).attr('data-slidesnum'),10),
							sscrol 		= parseInt($(this).attr('data-scamount'),10),
							t_infinite 	= $(this).attr('data-infinite'),
							t_arr 		= $(this).attr('data-arrows'),
							t_type		= $(this).attr('data-type'),
							speed_n 	= $(this).attr('data-speed'),
							t_fade 		= $(this).attr('data-fade'),
							t_dots 		= $(this).attr('data-dots'),
							t_auto 		= $(this).attr('data-auto'),
							//t_center	= $(this).attr('data-center-mode'),
							t_nx_ic		= $(this).attr('data-next-icon'),
							t_pv_ic		= $(this).attr('data-prev-icon'),
							t_bul_st	= $(this).attr('data-bullet-style'),
							t_bul_col	= $(this).attr('data-bullet-color'),
							ar_shape	= $(this).attr('data-arrow-shape'),
							gp			= $(this).attr('data-gap'),
							rtls		= $(this).attr('data-rtl'),
							fd 			= false,
							rt 			= false,
							typ 		= false,
							tinfinite 	= false,
							aut 		= false,
							cen 		= false,
							arr 		= false,
							tdots 		= false,
							resp_n 		= 1,
							nv 			= '';
						
						if(t_infinite == '1'){
							tinfinite = true;
						}
						if(t_auto == '1'){
							aut = true;
						}
						if(t_fade == '1'){
							fd = true;
						}
						if(t_arr == '1'){
							arr = true;
						}
						if(t_dots == '1'){
							tdots = true;
						}				
						if(slides_n > 2){
							resp_n = 2;
						}
						if( $(this).parent().is('.oc-cont-auto') ){
							cen = true;
							nv = '.oc-carousel_dup';
						}
						if(t_type == 'vertical'){
							typ = true;
						}
						if(rtls == '1'){
							rt = true;
						}

						if( $(this).parent().is('.oc-cont-auto') ){
							$(this).on('init', function(event, slick, direction){
								var img = $(this).find('.testi_img').outerWidth() + 10;
								$(this).parent('.oc-cont-auto').css('max-width',slides_n * img+'px');
								$(this).find('.oc-block').css('max-width',img+'px');
								$(this).find('.slick-list').css('max-width',slides_n * img+'px');
							});
						}

						$(this).slick({
							slidesToShow: slides_n,
							slidesToScroll: sscrol,
							dots: tdots,
							infinite: tinfinite,
							speed: speed_n,
							vertical: typ,
							slide: 'div,li,article',
							prevArrow: '<a href="#" class="slick-prev '+t_pv_ic+' '+ar_shape+'"></a>',
							nextArrow: '<a href="#" class="slick-next '+t_nx_ic+' '+ar_shape+'"></a>',
							centerMode:cen,
							asNavFor: nv,
							rtl: rt,
							fade: fd,
							dotsClass: 'slick-dots '+t_bul_st,
							autoplay: aut,
							arrows: arr,
							focusOnSelect: true,
							responsive: [
							{
								breakpoint: 1024,
								settings: {
									slidesToShow: resp_n,
									slidesToScroll: resp_n
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
						    }
						  ]
						});

					});
				}

				if ( $('.oc-carousel_dup').length > 0 ){
					$('.oc-carousel_dup').each(function(){
						var nn = '';
						if($(this).prev().is('.oc-cont-auto')){
							nn = $(this).prev().find('.oc-carousel');
						}

						$(this).slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false,
							slide: 'div',
							asNavFor: nn,
							dots: true,
							centerMode: true,
							focusOnSelect: true
						});
					});
					
				}

				if($('.horizontal-slider').length > 0){
					
					$('.horizontal-slider').each(function(){
						var slides_n 	= parseInt($(this).attr('data-slidesnum'),10),
							sscrol 		= parseInt($(this).attr('data-scamount'),10),
							t_infinite 	= $(this).attr('data-infinite'),
							t_arr 		= $(this).attr('data-arrows'),
							speed_n 	= $(this).attr('data-speed'),
							t_fade 		= $(this).attr('data-fade'),
							t_dots 		= $(this).attr('data-dots'),
							t_auto 		= $(this).attr('data-auto'),
							t_center	= $(this).attr('data-center-mode'),
							fd 			= false,
							tinfinite 	= false,
							aut 		= false,
							cen 		= false,
							arr 		= false,
							tdots 		= false,
							resp_n 		= 1;
						
						
						if(t_infinite == '1'){
							tinfinite = true;
						}
						if(t_auto == '1'){
							aut = true;
						}
						if(t_fade == '1'){
							fd = true;
						}
						if(t_arr == '1'){
							arr = true;
						}
						if(t_dots == '1'){
							tdots = true;
						}				
						if(slides_n > 2){
							resp_n = 2;
						}
						if(t_center == '1'){
							cen = true;
							$(this).addClass('center');
						}
						
						$(this).slick({
							slidesToShow: slides_n,
							slidesToScroll: sscrol,
							dots: tdots,
							infinite: tinfinite,
							speed: speed_n,
							centerMode:cen,
							rtl: $rt,
							fade: fd,
							autoplay: aut,
							arrows: arr,
							responsive: [
							{
								breakpoint: 1024,
								settings: {
									slidesToShow: resp_n,
									slidesToScroll: resp_n
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
						    }
						  ]
						});
					});
				}
				
				if($('.vertical-slider').length > 0){
					
					$('.vertical-slider').each(function(){
						var slides_n 	= parseInt($(this).attr('data-slidesnum'),10),
							sscrol 		= parseInt($(this).attr('data-scamount'),10),
							t_infinite 	= $(this).attr('data-infinite'),
							t_arr 		= $(this).attr('data-arrows'),
							speed_n 	= $(this).attr('data-speed'),
							t_fade 		= $(this).attr('data-fade'),
							t_dots 		= $(this).attr('data-dots'),
							t_auto 		= $(this).attr('data-auto'),
							fd 			= false,
							tinfinite 	= false,
							aut 		= false,
							arr 		= true,
							tdots 		= true,
							resp_n 		= 1;
						
						
						if(t_infinite == '1'){
							tinfinite = true;
						}
						if(t_auto == '1'){
							aut = true;
						}
						if(t_fade == '1'){
							fd = true;
						}
						if(t_arr == ''){
							arr = false;
						}
						if(t_dots == ''){
							tdots = false;
						}				
						if(slides_n > 2){
							resp_n = 2;
						}
						
						$(this).slick({
							slidesToShow: slides_n,
							slidesToScroll: sscrol,
							dots: tdots,
							infinite: tinfinite,
							speed: speed_n,
							vertical: true,
							fade: fd,
							autoplay: aut,
							arrows: arr,
						});
					});
				}
				
				$('.slick-gal').slick({
					dots: true,
					rtl: $rt,
					arrows: false,
				});		
						
				$('.break-news-slider').slick({
					dots: false,
					arrows: true,
					vertical: true,
					slidesToShow: 1,
					touchMove: true,
					slidesToScroll: 1,
					autoplay:true
				});
				
				$('.banner-slick').slick({
					dots: false,
					arrows: false,
					vertical: true,
					rtl: $rt,
					slidesToShow: 1,
					touchMove: true,
					slidesToScroll: 1,
					autoplay:true
				});
				
				$('.t_slider-1').each(function(){
					$(this).find('.slick-dots,.slick-prev,.slick-next').wrapAll('<div class="slider_controls" />');
				});
				$('.lg-slider .slick-prev,.lg-slider .slick-next').append('<i></i>');
			}
			runSlick();

			$('.posts-gal').slick({
				dots: true,
				arrows: false,
				slidesToShow: 1,
				touchMove: true,
				slidesToScroll: 1,
				autoplay:true,
				infinite: true,
				speed: 500,
			});
		},

		camera_sliders: function(){
			if($('.camera-slider').length){
				$('.camera-slider').each(function(){
					var thisFX = $(this).attr('data-fx'),
						thisAlign = $(this).attr('data-alignment'),
						thisHeight = $(this).attr('data-height'),
						thisPag = $(this).attr('data-pagination'),
						thisThumbs = $(this).attr('data-thumbnails'),
						thisLoader = $(this).attr('data-loader'),
						thisDIR = $(this).attr('data-bardirection'),
						thisNav = $(this).attr('data-navigation'),
						thisPL = $(this).attr('data-playPause'),
						thisPOS = $(this).attr('data-barposition');
						
					var th_p = false,th_thumb = false,th_nv = false,th_pl = false;
					
					if(thisPag == '1'){
						th_p = true
					}
					
					if(thisThumbs == '1'){
						th_thumb = true
					}
					
					if(thisNav == '1'){
						th_nv = true
					}
					
					if(thisPL == '1'){
						th_pl = true
					}
					
						
					$(this).camera({
						height: thisHeight,
						alignment: thisAlign,
						loader: thisLoader,
						pagination: th_p,
						thumbnails: th_thumb,
						navigation: th_nv,
						barPosition: thisPOS,
						barDirection: thisDIR,
						fx: thisFX,
						playPause: th_pl
					});
				});
			}
			
			if($('.camera-slider-boxed').length){
				$('.camera-slider-boxed').camera({
					height: '600px',
					loader: 'none',
					pagination: false,
					thumbnails: true,
					fx: 'scrollTop'
				});
			}
		},

		swipper_func: function(){
			$('.swiper-container').each(function(){
				var th = $(this),
					swslides = th.data('slides'),
					s_type = th.data('stype'),
					s_speed = th.data('speed'),
					s_loop = th.data('loop'),
					s_space = th.data('space'),
					s_efct = th.data('effect');

				var loop = false;

				if(s_loop == '1'){
					loop = true;
				}

				if( s_type == 'v' ){
					var swiperV = new Swiper(th, {
				        direction: 'vertical',
				        slidesPerView: swslides,
				        speed: s_speed,
				        spaceBetween: s_space,
				        loop: loop,
				        nextButton: '.swiper-up',
				        prevButton: '.swiper-down',
				        effect: s_efct,
				        cube: {
							slideShadows: true,
							shadow: true,
							shadowOffset: 20,
							shadowScale: 0.94
						},
						coverflow: {
							rotate: 50,
							stretch: 0,
							depth: 100,
							modifier: 1,
							slideShadows : true
						},
						flip: {
							slideShadows : false,
							limitRotation: true
						},
						fade: {
							crossFade: false
						},
				        grabCursor: true,
				        breakpoints: {
						    320: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 10
						    },
						    480: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 20
						    },
						    640: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 30
						    }
					  	}
				    });	
				} else {
					var swiperH = new Swiper(th, {
				        slidesPerView: swslides,
				        speed: s_speed,
				        spaceBetween: s_space,
				        loop: loop,
				        nextButton: '.swiper-next',
				        prevButton: '.swiper-prev',
				        effect: s_efct,
				        cube: {
							slideShadows: true,
							shadow: true,
							shadowOffset: 20,
							shadowScale: 0.94
						},
						coverflow: {
							rotate: 50,
							stretch: 0,
							depth: 100,
							modifier: 1,
							slideShadows : true
						},
						flip: {
							slideShadows : false,
							limitRotation: true
						},
						fade: {
							crossFade: false
						},
				        grabCursor: true,
				        breakpoints: {
						    320: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 10
						    },
						    480: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 20
						    },
						    640: {
						      slidesPerView: 1,
						      spaceBetweenSlides: 30
						    }
					  	}
				    });
				}    
			});
		},

		thmb_gallery: function(){
			$(".just-gallery").each(function(){
				var th = $(this),
					rh = $(this).attr('data-row-height'),
					mr = $(this).attr('data-margins'),
					mrr = 1,
					rhh = 120;
				if (typeof rh !== typeof undefined && rh !== 'false') {
					rhh = $(this).attr('data-row-height');
				}
				if (typeof mr !== typeof undefined && mr !== 'false') {
					mrr = $(this).attr('data-margins');
				}
				th.justifiedGallery({
					rowHeight: rhh,
					margins: mrr
				});	
			});
			
			$('.anim-imgs.just-gallery').each(function(){
			
				var delay = 0;
				var bxs = $(this).find('a');
				bxs.each(function(){
					$(this).appear(function() {
						$(this).css({transform: 'scale(1)',transitionDelay: delay+'ms',opacity: 1});
						delay += 180;
					},{accY: -150});
				});
			});
		},

		careers_func: function(){
			$('.app-btn').each(function(){
				var thid = $(this).find('a').attr('title');
				
				$(this).find('a').click(function(e){
					e.preventDefault();
					$("html, body").animate({ scrollTop: $('.contact-form').offset().top }, 1000);
					$(".contact-form").addClass("activ-form").delay(5000).queue(function(next){
					    $(this).removeClass("activ-form");
					    next();
					});
					$('select[name="position"]').val(thid).focus();
				});
			});
		},

		globals: function(){
			
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover();
			$('[data-toggle="dropdown"]').dropdown();

			$('.oc-cont-auto').each(function(){
				var th = $(this),
					thP = th.parent(),
					WW = parseInt(thP.outerWidth(),10) - 30;
				th.find('.slick-list').css('width',WW+'px');
			});

			/* ================ Progress Bars ================= */
			$('.progress-bar').each(function(){
				$(this).appear(function() {
					var num = $(this).attr('data-value');
					$(this).find('> span').animate({opacity:'1'},0);
					$(this).find('> i').animate({opacity:'1'},0)
					$(this).css('width',num+'%').animate({left:'0%',opacity:'1'},num*20);
					if(num <= 40){
						$(this).find('> span').addClass('sm-progress');
					}
				},{accY: -100});
			});

			$('.st-container:not(.steps-3-container)').each(function(){
				var th = $(this),
					st = 100 / th.find('.step').length;
				th.find('.step').css('width',st+'%');
			});

			$('.cont-steps-1').each(function(){
				$(this).find('.oc-step:odd').each(function(){
					var ths = $(this),
						thH = ths.find('h4').html(),
						thI = ths.find('i').attr('class'),
						thP = ths.find('p').html();
					ths.addClass('alter');thP+thH+
					ths.html('<p>'+thP+'</p><h4 class="main-color">'+thH+'</h4><i class="'+thI+'"></i>');
				});
			});

			// iframe video in popup..
			var trigger = $("body").find('[data-toggle="modal"]');
			trigger.on("click",function () {
				var theModal = $(this).data("target"),
					iframeSRC = $(theModal + ' iframe').attr('src');
				
				$(theModal + ' iframe').attr('src', iframeSRC);
				
				$(theModal + ' button.close,'+theModal+' button[data-dismiss="modal"]').on("click",function () {
					$(theModal + ' iframe').attr('src', iframeSRC);
					//$(theModal + ' video')[0].pause();
				});

			});

		},
	}

	BOO.docLoad = {
		init: function(){
			BOO.init.slick_sliders();
			BOO.init.camera_sliders();
			BOO.init.swipper_func();
			BOO.init.thmb_gallery();
			BOO.init.careers_func();
			BOO.init.globals();
		}
	};

	BOO.ready = {
		globals: function(){

			/* ================= Animate Numbers Counter =============== */
			$('.odometer').each(function(){
				var the = $(this),
					tm = the.attr('data-timer'),
					af = the.attr('data-after'),
					vl = the.attr('data-value'),
					t = $(this).attr('data-theme'),
					them = '';

				if (typeof t !== typeof undefined && t !== 'false') {
					them = t; // 'car','default','digital','minimal','plaza','slot-machine','train-station'.
				}else{
					them = 'default';
				}

				var od = new Odometer({
					el: this,
					theme: them
				});
				od.render();

				$(this).appear(function() {
					setInterval(function(){
						od.update(vl);
					}, tm);
				},{accY: 0});
			});

			$('.swiper-wrapper > div').addClass('swiper-slide');

			$('.just-gallery a.zoom').magnificPopup({
				type:'image',
				gallery: {
					enabled: true
				}
			});

			$('.modal[role="dialog"]').on('show.bs.modal', function (event) {
				$('.pageWrapper,#contentWrapper,.section,[class*="-padding"] > .container,.relative').addClass('pos-static');
			});
			
			$('.modal[role="dialog"]').on('hide.bs.modal', function (event) {
				$('.pageWrapper,#contentWrapper,.section,[class*="-padding"] > .container,.relative').removeClass('pos-static');
			});

			/* ================= Icon Hover Animation =================== */
			$('.oc-icon[class*="anim"] i').each(function(){
				var th = $(this),
					cl = th.clone().addClass('alt');
		    	th.after(cl);
			});

			/* ================ Appear: on scroll down animations. =============== */
			$('.fx').appear(function() {
				var anim = $(this).attr('data-animate'),
					del = $(this).attr('data-animation-delay');
				$(this).addClass('animated '+anim).css({animationDelay: del + 'ms'});
			},{accY: -100});
		}
	}

	BOO.docReady = {
		init: function(){
			BOO.ready.globals();
		}
	}


	/* ================ Document.ready Functions. ================ */
	$(document).ready(	BOO.docReady.init );

	/* ================ Window.Load Functions. ================ */
	$(window).load(	BOO.docLoad.init );


})(jQuery);