<?php
function it_countdown_timer($atts, $content=null){

    extract(shortcode_atts( array(
        'countdown_style'        => 'simple',
        'countdown_simple'       => 'simple-count',
        'count_date'             => '2018/2/5',
        'count_time'             => '',
        'it_animation'           => '',
        'delay'                  => '',
        'duration'               => '',
        'el_class'               => '',
    ), $atts));
    
    $fx = $anim = $class = '';
    
    static $i = 1;
    
    // animation styling...
    $data_anim = ($it_animation != '') ? ' data-animate="'.esc_js($it_animation).'"' : '';
    $data_dur = ($duration != '') ? ' data-animation-duration="'.esc_js($duration).'"' : '';
    $data_del = ($delay != '') ? ' data-animation-delay="'.esc_js($delay).'"' : '';
    $animation = $data_anim.$data_del.$data_dur;
    
    if($countdown_style == 'simple'){
        $class .= $countdown_simple;
    }else{
        $class .= $countdown_style;
    }
    $class .= ($it_animation != '') ? " fx " : "";
    $class .= ($el_class != '') ? " ".$el_class : "";
    if( ! empty( $count_time )){
        $tim = ' '.$count_time;
    }else{
        $tim = '';
    }
    
    $output ='<div id="count-'.$i.'" class="'.$class.'"'.$animation.'></div>'; 
    
    ?>    
    <script type="text/javascript">
        jQuery(document).ready(function(){
            <?php if($countdown_style == 'simple' && $countdown_simple == 'simple-count'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<span>%w</span> weeks '
                    + '<span>%d</span> days '
                    + '<span>%H</span> hr '
                    + '<span>%M</span> min '
                    + '<span>%S</span> sec'));
                });
           <?php }else if($countdown_style == 'simple' && $countdown_simple == 'months-style'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<span>%m</span> Months <i class="main-color fa fa-arrows-h"></i> '
                    + '<span>%d</span> Days <i class="main-color fa fa-arrows-h"></i> '
                    + '<span>%H</span> hr <i class="main-color fa fa-arrows-h"></i> '
                    + '<span>%M</span> min <i class="main-color fa fa-arrows-h"></i> '
                    + '<span>%S</span> sec'));
                });
           <?php }else if($countdown_style == 'simple' && $countdown_simple == 'font-25 bold'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>').on('update.countdown', function(event) {
                var format = '<span class="main-color">%H:%M:%S</span>';
                if(event.offset.days > 0) {
                    format = '%-d day%!d ' + format;
                }
                if(event.offset.weeks > 0) {
                    format = '%-w week%!w ' + format;
                }
                jQuery(this).html(event.strftime(format));
            }).on('finish.countdown', function(event) {
                jQuery(this).html('This offer has expired!').parent().addClass('disabled'); 
            });           
           <?php }else if($countdown_style == 'simple' && $countdown_simple == 'legacy-count'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<span class="main-color">%w</span> weeks '
                    + '<span class="main-color">%d</span> days '
                    + '<span class="main-color">%H</span> hr '
                    + '<span class="main-color">%M</span> min '
                    + '<span class="main-color">%S</span> sec'));
                });
           <?php }else if($countdown_style == 'simple' && $countdown_simple == 'separated-cells'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span class="main-color">%m</span> Months</div>'
                    + '<div><span class="main-color">%d</span> Days</div>'
                    + '<div><span class="main-color">%H</span> Hours</div>'
                    + '<div><span class="main-color">%M</span> Minutes</div>'
                    + '<div><span class="main-color">%S</span> Seconds</div>'));
                });
           <?php }else if($countdown_style == 'simple' && $countdown_simple == 'separated-cells lg'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span class="main-color">%m</span> Months</div>'
                    + '<div><span class="main-color">%d</span> Days</div>'
                    + '<div><span class="main-color">%H</span> Hours</div>'
                    + '<div><span class="main-color">%M</span> Minutes</div>'
                    + '<div><span class="main-color">%S</span> Seconds</div>'));
                });
           <?php }else if($countdown_style == 'cells-countdown'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span style="background-color:#ec8820;color:#fff">%-m</span> Months</div>'
                    + '<div><span style="background-color:#6fbd51;color:#fff">%-d</span> Days</div>'
                    + '<div><span style="background-color:#b8535b;color:#fff">%-H</span> Hours</div>'
                    + '<div><span style="background-color:#a06aa3;color:#fff">%-M</span> Minutes</div>'
                    + '<div><span class="main-bg">%-S</span> Seconds</div>'));
                });
           <?php }else if($countdown_style == 'lg-countdown style-1'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span>%m</span> <b class="main-bg c-bg">Months</b></div>'
                    + '<div><span>%d</span> <b class="main-bg c-bg">Days</b></div>'
                    + '<div><span>%H</span> <b class="main-bg c-bg">Hours</b></div>'
                    + '<div><span>%M</span> <b class="main-bg c-bg">Minutes</b></div>'
                    + '<div><span>%S</span> <b class="main-bg c-bg">Seconds</b></div>'));
                });
           <?php }else if($countdown_style == 'lg-countdown style-1 light'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span>%m</span> <b class="main-bg c-bg">Months</b></div>'
                    + '<div><span>%d</span> <b class="main-bg c-bg">Days</b></div>'
                    + '<div><span>%H</span> <b class="main-bg c-bg">Hours</b></div>'
                    + '<div><span>%M</span> <b class="main-bg c-bg">Minutes</b></div>'
                    + '<div><span>%S</span> <b class="main-bg c-bg">Seconds</b></div>'));
                });
           <?php }else if($countdown_style == 'lg-countdown style-1 dark'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span>%m</span> <b class="main-bg c-bg">Months</b></div>'
                    + '<div><span>%d</span> <b class="main-bg c-bg">Days</b></div>'
                    + '<div><span>%H</span> <b class="main-bg c-bg">Hours</b></div>'
                    + '<div><span>%M</span> <b class="main-bg c-bg">Minutes</b></div>'
                    + '<div><span>%S</span> <b class="main-bg c-bg">Seconds</b></div>'));
                });
           <?php }else if($countdown_style == 'lg-countdown style-2'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div><span class="main-color">%m</span> Months</div>'
                    + '<div><span class="main-color">%d</span> Days</div>'
                    + '<div><span class="main-color">%H</span> Hours</div>'
                    + '<div><span class="main-color">%M</span> Minutes</div>'
                    + '<div><span class="main-color">%S</span> Seconds</div>'));
                });
           <?php }else if($countdown_style == 'lg-countdown style-3'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div class="main-bg"><span>%m</span> Months</div>'
                    + '<div class="main-bg"><span>%d</span> Days</div>'
                    + '<div class="main-bg"><span>%H</span> Hours</div>'
                    + '<div class="main-bg"><span>%M</span> Minutes</div>'
                    + '<div class="main-bg"><span>%S</span> Seconds</div>'));
                });
           <?php }else if($countdown_style == 'count-box'){ ?>
                jQuery('#count-<?php echo $i; ?>').countdown('<?php echo esc_attr($count_date); ?><?php echo esc_attr($tim); ?>', function(event) {
                    var $this = jQuery(this).html(event.strftime(''
                    + '<div class="dark-bg white"><i class="fa fa-clock-o"></i><div><span>%-D</span> <h4>Days</h4></div></div>'
                    + '<div class="red-bg white"><i class="fa fa-clock-o"></i><div><span>%-H</span> <h4>Hours</h4></div></div>'
                    + '<div class="pink-bg white"><i class="fa fa-clock-o"></i><div><span>%-M</span> <h4>Minutes</h4></div></div>'
                    + '<div class="green-bg white"><i class="fa fa-clock-o"></i><div><span>%-S</span> <h4>Seconds</h4></div></div>'));

                });
           <?php } ?>
        });
    </script>
    <?php    
       
    $i++; 
    
    return $output; 
 
}
add_shortcode('it_countdown', 'it_countdown_timer');