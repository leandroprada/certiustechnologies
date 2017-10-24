<script type="text/javascript">
    var madmin = 1;
    jQuery(document).ready(function(){
        madmin = jQuery().mapsvgadmin('init', {
            <?php
//                $out = str_replace('\n','&#13;&#10;',$js_mapsvg_options)
//$search = array('" ','">','="',"\n",'\n');
//$replace = array('\" ','\">','=\"',"\\\n",'\\n');
//$search = array("\n",'\n');
//$replace = array("\\\n",'\\n');

            ?>
            mapsvg_options : <?php echo  $js_mapsvg_options ? str_replace('\n','\\n',$js_mapsvg_options) : '{}'?>,
            map_id : "<?php echo $map_id?>",
            markerImages : <?php echo (isset($markerImages) ? json_encode($markerImages) : '[]')?>,
            map_title: "<?php echo $title?>"
        });
    })
</script>

</div>