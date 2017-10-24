(function ($) {

    "use strict";

    $('body').append('<span class="oc_msg"></span><span class="oc_loading"><span class="oc_loader-in"></span></span><div id="boo-overlay"></div>');

    var admURL = $('.hidden.adm').text();

    $('.oc_form').each(function () {
        var th = $(this);
        $(this).submit(function (e) {
            e.preventDefault();
            var $thisAction = $(this).attr('action');
            var submit = true;

            var b = $(this).serialize();
            var el = $('.oc_msg');

            if (submit) {
                $('.oc_loading').show();
            }

            $.post($thisAction, b).success(function () {

                if (submit) {

                    $('.oc_msg').text('Seccessfuly saved').addClass('success').fadeIn();
                    $('.oc_loading').fadeOut(500);
                    setTimeout(function () {
                        $('.oc_msg').fadeOut();
                    }, 1500);

                    $(this).submit();

                    if (th.find('.oc_save_btn').length) {
                        window.location.href = admURL + 'admin.php?page=octa_portfolio';
                    }
                } else {
                    $('.oc_loading').fadeOut(500);
                }

            }).error(function () {
                el.text('Error saving data').addClass('error').fadeIn();
                setTimeout(function () {
                    el.fadeOut();
                }, 3000);
            });

            $('.form-control[data-valiation-text]').each(function () {
                var $attr = $(this).attr('data-valiation-text');
                $(this).parent().next('.alert').text($attr);
            });

            return false;
        });
    });

    var options = {
        beforeSubmit: beforeSubmit,
        success: afterSuccess,
        uploadProgress: OnProgress,
        resetForm: false
    };

    $('.import_form').submit(function () {

        $(this).ajaxSubmit(options);
        return false;
    });

    function beforeSubmit() {

        var submit = true,
                impf = $('#impFile');

        // evaluate the form using generic validaing
        /*if (!validator.checkAll($('.import_form'))) {
            submit = false;
        }*/

        if (submit) {
            $('.oc_loading').show();
        } else {
            var $attr = impf.attr('data-valiation-text');
            impf.parent().next('.alert').text($attr);
            return false;
        }
    }

    function afterSuccess() {

        $('.oc_msg').text('Seccessfuly Imported').addClass('success').fadeIn();
        $('.oc_loading').fadeOut(500);
        setTimeout(function () {
            $('.oc_msg').fadeOut();
            window.location.href = admURL + 'admin.php?page=octa_portfolio';
        }, 1500);
    }

    function OnProgress() {

        $('.oc_loading').show();
    }

    $('.clone_form').submit(function (e) {
        var tht = $(this);
        e.preventDefault();
        var $thisAction = $(this).attr('action');
        var parent = tht.parent().parent();

        var b = tht.serialize();

        $.post($thisAction, b).success(function () {

            window.location.href = admURL + 'admin.php?page=octa_portfolio';
            $(this).submit();

        }).error(function () {

        });

        return false;
    });

    $(window).scroll(function(){
        var sticky = $('.top-btns'),
            scroll = $(window).scrollTop();

        if (scroll >= 100){
            sticky.addClass('fixed_btns');
        } else {
            sticky.removeClass('fixed_btns');
        }
    });

    $('.del_form').each(function () {
        var tht = $(this);
        tht.submit(function (e) {
            e.preventDefault();
            var $thisAction = $(this).attr('action');
            var parent = tht.parent().parent();
            var submit = true;

            // evaluate the form using generic validaing
            /*if (!validator.checkAll($(this))) {
                submit = false;
            }*/

            var retVal = confirm("Do you want to Delete this grid ?");
            if (retVal == true) {

                var b = tht.serialize();
                var el = $('.oc_msg');
                if (submit) {
                    tht.find('.cs-lod').show();
                    parent.css({'backgroundColor': '#fffad1'}, 500);
                }
                $.post($thisAction, b).success(function () {

                    if (submit) {
                        setTimeout(function () {
                            parent.fadeOut(500, function () {
                                parent.remove();
                                tht.find('.cs-lod').hide();
                            });
                        }, 500);

                        $(this).submit();


                    } else {
                        tht.find('.cs-lod').hide();
                    }

                }).error(function () {

                });
            }
            else {
                return false;
            }

            return false;

        });
    });

    $('.oc_data_table').dataTable();

    $(window).load(function () {

    	$("ul.oc_tabs li").eq(0).addClass("active");

        $("ul.oc_tabs li").click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass("active")) {
                var tabNum = $(this).index();
                var nthChild = tabNum + 1;
                $("ul.oc_tabs li.active").removeClass("active");
                $(this).addClass("active");
                $(".oc_tab_content .tab-pane.active").removeClass("active");
                $(".oc_tab_content .tab-pane:nth-child(" + nthChild + ")").addClass("active");

                
                if($(this).find('a').attr('href') == '#oc_skins'){
                    var $grid = $('#oc_skins > .form-group > .control-input').isotope({
                        layoutMode: 'masonry',
                        filter: '.even',
                        masonry: {
                            columnWidth: 5
                        },
                        itemSelector : '.portfolio-item'
                    });
                }

                

            }
        });

        $('#alias').on('keyup input focus', function () {
	        var vll = $(this).val();
	        vll = vll.replace(/\s+/g, '-').toLowerCase();
	        $('.shortcode_txt').val('[octa_portfolio alias="' + vll + '"]');
	    });

        imp_exp();

        $('.top_imp').click(function () {
            $(".oc_tab_content .tab-pane.active").removeClass("active");
            $("#import_gr").addClass("active");
            $("ul.oc_tabs li.active").removeClass("active");
            $("ul.oc_tabs li:nth-child(2)").addClass("active");
        });

        function imp_exp() {
            if (window.location.href.indexOf("#tab=import_gr") > -1) {
                $(".oc_tab_content .tab-pane.active").removeClass("active");
                $("#import_gr").addClass("active");
                $("ul.oc_tabs li.active").removeClass("active");
                $("ul.oc_tabs li:nth-child(2)").addClass("active");
            }
        }

        // Meta boxes functions
        up_sc();
        del_sc();
        del_ic();

        $('#add_screen').click(function () {

            var bar_box = $('#scrsnum'),
                    v = bar_box.val();

            if (v == '') {

                $('.inner-screens').append('<div class="screen-item" id="screen-item-0"><p><a class="del_screen button" href="#">x</a><input class="upload_im" name="screens0" type="text" value="" /><input class="up-image" type="button" value="Upload Image" /></p></div>');
                bar_box.val(0);

            } else {

                var l = bar_box.val().split(',').pop().trim();
                l++;
                v += ',' + l;

                var xx = l;

                bar_box.val(v.replace(/^,/, ''));

                var clo = $('.inner-screens .screen-item:last').children('p'),
                    cloned = clo.clone(true);


                cloned.appendTo('.inner-screens').wrapAll('<div class="screen-item" id="screen-item-' + l + '"></div>');
                cloned.find('.upload_im').attr('name', 'screens' + l).attr('id', 'screens' + l).attr('value', '');
                cloned.find('.logo-im,.remove-img').hide(0);
            }

            up_sc();
            del_sc();
        });

        function up_sc() {
            $('.up-image').each(function () {
                var txtb = $(this).prev(),
                    formfield, imgurl;
                $(this).click(function(e) {
                    e.preventDefault();
                    wp.media.editor.send.attachment = function(props, attachment) {
                        txtb.val(attachment.url);
                        txtb.parent().find('img.logo-im').attr('src',attachment.url);
                        txtb.parent().find('img.logo-im').fadeIn(500);
                        txtb.parent().find('.remove-img').show();

                        var dep     = txtb.attr('name'),
                            deps    = txtb.attr('id');
                        
                        $("div[data-dep='"+deps+"']").fadeIn(200);

                    }
                    wp.media.editor.open(this);
                    return false;
                });
            });
        }

        $('[data-nam="select_taxonomy"] option').hide();

        $('[data-nam="post_type"]').change(function () {
        	var vlt = $(this).val();
        	$('[data-nam="select_taxonomy"] option').hide();
        	$('[data-nam="post_type"] option:selected').each(function() {
	        	var t = $(this).val();
	        	$('[data-nam="select_taxonomy"] option[data-type="' + t + '"]').show();
	        });
	        $(this).next().attr('value', vlt);
        });
        
        if($('#select_taxonomy').length){
            $('[data-nam="select_taxonomy"]').change(function(){
                var vlt = $(this).val();
                $(this).next().attr('value', vlt);
            });
            var txt_tax = $('#select_taxonomy').val();
            var temp = new Array();
            temp = txt_tax.split(",");
            for (var i = temp.length - 1; i >= 0; i--) {
                $('[data-nam="select_taxonomy"]').find('option[value="' + temp[i] + '"]').attr('selected', 'selected');
            }

            var txt_type = $('#post_type').val();
            var temp2 = new Array();
            temp2 = txt_type.split(",");
            for (var g = temp2.length - 1; g >= 0; g--) {
                $('[data-nam="post_type"]').find('option[value="' + temp2[g] + '"]').attr('selected', 'selected');
                $('[data-nam="select_taxonomy"] option[data-type="' + temp2[g] + '"]').show();
            }
        }

        function del_sc() {
            $('.del_screen').each(function () {

                var th = $(this);

                th.unbind('click').on('click', function (e) {
                    e.preventDefault();
                    var vll = $('#scrsnum').val(),
                            th = $(this);

                    var ind = th.next('.upload_im').attr('name').replace('screens', '');

                    vll = vll.replace(ind, '').replace(',,', ',');

                    if (vll == '') {
                        vll = 0;
                    } else {
                        var lastChar = vll.slice(-1);
                        if (lastChar == ',') {
                            vll = vll.slice(0, -1);
                        }
                    }
                    th.next('.upload_im').val('');
                    th.parent().parent().remove();
                    $('#scrsnum').val(vll);
                });
            });
        }

        $('#add_icons').click(function () {

            var bar_box = $('#iconsnum'),
                    v = bar_box.val();

            if (v == '') {

                $('.inner-icons').append('<div class="icon-item" id="icon-item-0"><div class="ics"><a class="del_icon button" href="#" title="Remove"><i class="dashicons dashicons-trash"></i></a><input placeholder="Title" class="ic_title" name="icons_title0" type="text" value=""> <input placeholder="Number" class="ic_value" name="icons_value0" type="number" value=""> <div class="bot-icon"><i class="ico"></i><a class="button button-primary btn_icon" href="#">Add Icon</a> <input type="hidden" name="icons_icon0" class="icon_cust" value=""><a class="button icon-remove" title="Remove Icon"><i class="fa fa-times"></i></a></div></div></div>');
                bar_box.val(0);
                OCTA.init.load_icons();

            } else {

                var l = bar_box.val().split(',').pop().trim();
                l++;
                v += ',' + l;

                var xx = l;

                bar_box.val(v.replace(/^,/, ''));

                var clo = $('.inner-icons .icon-item:last').children('.ics'),
                    cloned = clo.clone(true);

                cloned.appendTo('.inner-icons').wrapAll('<div class="icon-item" id="icon-item-' + l + '"></div>');
                cloned.find('.ic_title').attr('name', 'icons_title' + l).attr('value', '');
                cloned.find('.ic_value').attr('name', 'icons_value' + l).attr('value', '');
                cloned.find('.icon_cust').attr('name', 'icons_icon' + l).attr('value', '');
                cloned.find('.bot-icon > i').removeAttr('class').removeAttr('style').addClass('ico');
                cloned.find('.icon-remove').removeAttr('style');
                cloned.find('.btn_icon').html('<i class="fa fa-plus-square"></i> Add Icon');
                OCTA.init.load_icons();
            }

            del_ic();
        });

        function del_ic() {
            $('.del_icon').each(function () {

                var th = $(this);

                th.unbind('click').on('click', function (e) {
                    e.preventDefault();
                    var vll = $('#iconsnum').val(),
                            th = $(this);

                    var ind = th.next('.ic_title').attr('name').replace('icons_title', '');

                    vll = vll.replace(ind, '').replace(',,', ',');

                    if (vll == '') {
                        vll = '';
                    } else {
                        var lastChar = vll.slice(-1);
                        if (lastChar == ',') {
                            vll = vll.slice(0, -1);
                        }
                    }
                    th.next('.ic_title').val('');
                    th.next('.ic_value').val('');
                    th.next('.icon_cust').val('');
                    th.parent().parent().remove();
                    $('#iconsnum').val(vll);
                });
            });
        }

        $('.portfolio-item').each(function () {
            
            var that = $(this),
                cl = that.find('input[type="radio"]').val(),
                thName = that.find('input[type="radio"]').attr('data-name');

            that.addClass(cl);

            that.find('.radio-lbl').append('<a href="#" class="edit_skin" data-toggle="modal" data-target="#skin_edit" title="">Edit</a>');
            that.append('<div class="port-container"><div class="port-img"><div class="ov-div"></div><div class="icon-links"><a href="#" class="oc_link white-bg"><i class="fa fa-link"></i></a><a href="#" class="oc_zoom main-bg" title="GRID TITLE"><i class="fa fa-search-plus"></i></a></div></div><div class="port-captions"><h4 class="uppercase"><a href="#">GRID TITLE</a></h4><p class="description"><a href="#">Computers</a> , <a href="http:#">Development</a> , <a href="#">Just Food</a></p></div></div>');

            if (that.find('input[type="radio"]').attr('checked') == "checked") {
                that.addClass('selected-skin');
            }

            that.click(function () {

                $('.portfolio-item input[type="radio"]').removeAttr('checked');
                that.find('input[type="radio"]').attr('checked', 'checked');

                $('.portfolio-item').removeClass('selected-skin');
                that.addClass('selected-skin');

            });

            that.find('.edit_skin').click(function(){
                var h = parseInt($('.edit-sk').outerHeight(),10)/2;
                $('#boo-overlay').fadeIn();
                $('.edit-sk').fadeIn().css('margin-top',-h+'px');
                $('.edit-sk').find('.close-login').click(function(){
                    $(this).parent().parent().fadeOut();
                    $('#boo-overlay').fadeOut();
                });
            });

        });

        $('#oc_skins > .item').not(':first').wrapAll('<div class="edit-sk"></div>');
        $('.edit-sk').prepend('<h3 class="titl">Edit Selected Skin Settings <a class="close-login" href="#"><i class="fa fa-times"></i></a></h3>');

        $('#oc_skins > .item:first-child .lbl').html('<div class="filter-by"><ul id="filters"><li class="selected"><a href="#" class="filter" data-filter=".even">Even</a></li><li><a href="#" class="filter" data-filter=".mas">Masonry</a></li></ul></div>');

        $('.kara,.hub,.ivy,.krosh,.impress,.transit,.neuron,.onair,.rotato,.agent,.rolly,.mass,.marbele,.astro').addClass('even');
        $('.paleo,.sublime,.resort,.gemini,.solo,.focus,.zilla').addClass('mas');
                
        var $grid = $('#oc_skins > .form-group > .control-input').isotope({
            layoutMode: 'masonry',
            filter: '.even',
            masonry: {
                columnWidth: 5
            },
            itemSelector : '.portfolio-item'
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

    });
})(jQuery);