
var OCTA = OCTA || {};

(function ($) {

    "use strict";

    OCTA.init = {
    	
    	iconboxes: function(){
	    	// Portfolio Details Icon Boxes
	        $('.ics-row').each(function(){
	            var th = $(this),
	                iners = th.find('.ic-cell'),
	                inlen = iners.length,
	                ww = parseInt(th.outerWidth(),10),
	                w = ww/inlen;

	            th.find('.ic-cell:nth-child(even)').addClass('white-tr-bg');
	            th.find('.ic-cell:nth-child(even)').find('.m-b-2,.odometer,.m-t-1').addClass('black');

	            iners.each(function(){
	                $(this).css('width',w+'px');
	            });
	        });	
    	},

    	globals: function(){

    		/* ================= Magnific popup =============== */
	        $('a.oc_zoom:not(.port-zoom)').magnificPopup({
	            type: 'image',
	            gallery: {
	                enabled: true
	            }
	        });
	        $('a.zoom_screens').magnificPopup({
	            type: 'image',
	            gallery: {
	                enabled: true
	            }
	        });

    	},

    	zoomFun: function(){
    		$('.port-zoom').each(function(){
	        	var th = $(this),
	        		thP = th.parent().parent().parent().find('.post-media'),
	        		thPH = thP.html();
	        	
	        	if(thP.find('iframe').length){
	        		
	        		var ifr = thP.find('iframe').attr('src');
	        		th.attr('href',ifr);
	        		th.magnificPopup({
						type: 'iframe',
		        	});

	        	} else if(thP.find('video').length){
	        		
	        		var vHT = thP.find('.mejs-mediaelement').html();

	        		var idd = thP.find('video').attr('id');

	        		th.magnificPopup({
						items: {
							src: '<div class="vid-mgf">'+vHT+'</div>',
						},
						type: 'inline',
						callbacks: {
							open: function() {
					        	$('.vid-mgf .wp-video-shortcode').mediaelementplayer();
							}
						}
		        	});

		        	

	        	} else if(thP.find('.posts-gal').length){
	    			
					var imgs = thP.find('.posts-gal').html();

					thP.find('.posts-gal').prepend('<div class="hidden imgs-arr">'+imgs+'</div>');

					var sl = thP.find('.imgs-arr');
	        		var items = [];
	        		sl.find('div figure img').unwrap();
					sl.find('div figure').each(function() {
						items.push( {
							src: $(this)
						});
					});

					th.magnificPopup({
						items:items,
						gallery: {
						  enabled: true 
						},
						callbacks: {
						   markupParse: function(template, values, item) {
						       template.find('img').addClass('bad-site-class');
						   }
						}
					});
	    			
	    			var thim = sl.find(' > div:last').find('img').attr('src');
	        		th.attr('href',thim);

	        	}
	        });
    	},

    	paginate: function(){

    		var n = 1,
				pgnum = $('.pgnum').text(),
				url = window.location.href,
				$cont = $('.octa_grid');
	        
	        $('.oc_load_more a').on("click",function(e){
	        	e.preventDefault();
	        	if (n < pgnum) {
					
					$('.pager_loading').fadeIn(100);

	        		setTimeout(function () {
		        		var response;
						$.ajax({ type: "GET",   
							url: url+'/page/'+n,   
							async: false,
							success : function(text){
								response= text;
								var $result = $(response).find('.octa_grid').html();
								$cont.append($result);
								$cont.isotope('destroy');
					           	OCTA.init.isotopeFun();
								$('.pager_loading').fadeOut();
							}
						});
					}, 300);
	        	} else {
	        		$('.load_msg').fadeIn(500,function(){
	        			setTimeout(function () {
		                    $('.load_msg').fadeOut();
		                }, 3000);
	        		});
	        	}
	        	n++;
	        });

	        $('.oc_pag').find('ul').addClass('pagination style2');

	        $('.resort .port-captions h4 a').addClass('main-color');


	        $('.gemini .portfolio-item,.onair .portfolio-item').each(function(){ 
	        	$(this).find('.port-img').append('<div class="por-hover"></div>');
	        	$(this).hoverdir(); 
	        });

    	},

    	isotopeFun: function(){

            $('.octa_grid:not(.p-1-col)').each(function () {
                var tot 	= 0,
                	tim 	= 0,
                	that 	= $(this),
                    thID 	= that.attr('id'),
                    itm 	= that.find('.portfolio-item'),
                    cols 	= that.data('cols'),
                    num 	= itm.length,
                    sp 		= that.data('spacing'),
                    spC 	= that.data('margins'),
                    lay 	= that.data('layout'),
                    im 		= '';

                if( lay == 'slider' ){
                    itm.find('.port-container').css('margin', '0 '+spC+'px');
                } else {
                    itm.css('margin',sp+'px');
                    that.css('margin',-sp+'px');
                }

                var mr = sp*2,
                	w = parseInt(that.outerWidth(),10),
                	tw = (w/cols) - mr;

                itm.css('width', tw+'px');

				itm.each(function(){
                    
                    var th 	= $(this),
                    	ww 	= th.width(),
                    	hh 	= th.height(),
                    	imP = th.find('.port-img'),
                        mmP = th.find('.media-cont'),
                    	im 	= imP.find('img').attr('src'),
                    	rX 	= th.attr('data-ratio-x'),
                    	rY 	= th.attr('data-ratio-y'),
                        nH 	= ww*rY/rX;

                    if( lay == 'grid' || lay == 'slider' ){    	
                    	
                        if( imP.length ){
                            imP.prepend('<div class="ov-div" style="background-image:url('+im+')"></div>');
                            imP.css('height',nH+'px');  

                        } else if ( mmP.length ){
                            mmP.find('iframe,video,.wp-video').css('height',ww).css('width',ww);
                            mmP.css('height',nH+'px');
                        }

                    }     
                    
                });

				if( lay == 'masonry' || lay == 'grid' || lay == 'justify' ) {
                    
                    var rt = true;

                    if( that.hasClass('rtl') ){
                        rt = false;
                    }

                    if( lay == 'grid' ){
                        
                        var $grid = that.isotope({
                            layoutMode: 'fitRows',
                            isFitWidth: true,
                            originLeft: rt,
                            resizable: false,
                        });

                    }else if ( lay == 'masonry' ) {
                        
                        var $grid = that.isotope({
                            layoutMode: 'masonry',
                            isFitWidth: true,
                            originLeft: rt,
                            resizable: false,
                        });

                    } else if ( lay == 'justify' ) {
                        
                        $('.portfolio-item').each(function(){
                            var ww = $(this).find('.port-img img').attr('width');
                            $(this).css('width',ww+'px');
                        });

                        var $grid = that.isotope({
                            layoutMode: 'masonry',
                            originLeft: rt,
                            isFitWidth: false,
                            resizable: false,
                            masonry: {
                                columnWidth: 1
                            }
                        });
                        
                    }

                    

                    $grid.imagesLoaded(function () {
                        $grid.isotope();
                    });

                    $grid.on( 'layoutComplete', function( event, laidOutItems ) {
						$('.loader-port').hide();
						$('.portfolio-container').css('visibility','visible').css('height','auto');
					});

                    $('#filters').on('click', 'a.filter', function (e) {
                        e.preventDefault();
                        var filterValue = $(this).attr('data-filter');
                        $grid.isotope({filter: filterValue});
                        var $this = $(this);
                        if ($this.parent().hasClass('selected')) {
                            return false;
                        }
                        var $optionSet = $this.parents('#filters');
                        $optionSet.find('.selected').removeClass('selected');
                        $this.parent().addClass('selected');
                    });

                    $('#filters2').on('click', 'a.filter2', function (e) {
                        e.preventDefault();
                        var filterValue = $(this).attr('data-filter2');
                        $grid.isotope({filter: filterValue});
                        var $this = $(this);
                        if ($this.parent().hasClass('selected')) {
                            return false;
                        }
                        var $optionSet = $this.parents('#filters');
                        $optionSet.find('.selected').removeClass('selected');
                        $this.parent().addClass('selected');
                    });

                    $('.filter_select select').change(function () {
                        var selected = [];
                        $('.filter_select select option').filter(':selected').each(function () {
                            if (this.value != "*") {
                                selected.push(this.value);
                            }
                        });
                        if (selected.length == 0) {
                            selected.push("*");
                        }
                        selected = $(selected.join(''));
                        $grid.isotope({
                            filter: selected
                        });
                    });

                }

            });
    	},

        portfolio_styles: function(){
            $('.port-captions').each(function(){
                var thH = parseInt($(this).outerHeight(),10) / 2,
                    inH = parseInt($(this).find('.port-inner-cell').outerHeight(),10) / 2,
                    tot = thH - inH - 5;
                    $(this).find('.port-inner-cell').css('top',tot+'px');

            });
        }

    }

    OCTA.docLoad = {
		init: function(){
			OCTA.init.iconboxes();
			OCTA.init.globals();
			OCTA.init.zoomFun();
			OCTA.init.paginate();
			OCTA.init.isotopeFun();
            OCTA.init.portfolio_styles();
		}
	};

    /* ================ Window.Load Functions. ================ */
	$(window).load(	OCTA.docLoad.init );

})(jQuery);