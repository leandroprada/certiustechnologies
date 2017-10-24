<?php

class OCTA_Field {

    public function __construct() {
        
    }

    public function oc_taxonomy($id) {
        
        $dbObj = new OCTA_Tables();
        if (isset($id) && $id != '') {
            $getDb = $dbObj->oc_selectWithId($id);
            $ct = $getDb[0]->oc_cats;
            $tgg = $getDb[0]->oc_tags;
        } else {
            $ct = $tgg = '';
        }

        // Custom Categories List
        $oc_cats = get_terms('oc-categories', array(
            'hide_empty' => false,
        ));
        if ($oc_cats && !is_wp_error($oc_cats)) {
            $output.= "<div id='cats_select'>";
                $output.= "<select multiple class='form-control'>";
                foreach ($oc_cats as $cat) {
                    if ($cat->count == 1) {
                        $catno = ' (' . $cat->count . ' Item)';
                    } else {
                        $catno = ' (' . $cat->count . ' Items)';
                    }
                    $output.= "<option value='" . $cat->slug . "'>" . $cat->name . $catno . "</option>";
                }
                $output.= '</select>';
            $output.= '<input name="oc_data[oc_cats]" type="hidden" id="cats_vl"  value="' . $ct . '"   class="" /></div>';
        } else {
            $output.= " <div id='cats_select'>";
                $output.= '<span class="in-message msg-danger">'.__('Please insert categories in the Portfolio Posts to be shown here.', PLUGIN_SLUG).'</span>';
            $output.= '</div>';
        }

        // Custom Tags List
        $oc_tags = get_terms('oc-tags', array(
            'hide_empty' => false,
        ));
        if ($oc_tags && !is_wp_error($oc_tags)) {

            $output.= "<div id='tags_select'>";
                $output .= "<select multiple class='form-control'>";
                foreach ($oc_tags as $tg) {
                    if ($tg->count == 1) {
                        $tgno = ' (' . $tg->count . ' Item)';
                    } else {
                        $tgno = ' (' . $tg->count . ' Items)';
                    }
                    $output .= "<option value='" . $tg->slug . "'>" . $tg->name . $tgno . "</option>";
                }
                $output.= "</select>";
            $output.= "<input name='oc_data[oc_tags]' type='hidden' id='tags_vl' value='" . $tgg . "'  class='' /></div>";
        } else {
            $output.= "<div id='tags_select'>";
                $output.= '<span class="in-message msg-danger">'.__('Please insert tags in the Portfolio Posts to be shown here.', PLUGIN_SLUG).'</span>';
            $output.= '</div>';
        }

        return $output;
    }

    public function oc_display_field($id, $section_slug, $config_data) {

        extract($config_data);
        
        $dbObj = new OCTA_Tables();

        $val = $std;
        if (isset($id) && $id != '') {
            $getDb = $dbObj->oc_selectWithId($id);
            if ($name == 'oldalias') {
                $val = $getDb[0]->alias;
            } else {
                $val = $getDb[0]->$name;
            }
        }

        switch ($type) {
            case 'text':
                echo "<input type='text' name='oc_data[" . $name . "]' class='dep-field form-control " . $class . "' id='" . $name . "' placeholder='" . $placeholder . "' value='" . $val . "' />";
                break;
                
            case 'disabledtext':
                echo "<input type='text' readonly name='oc_data[" . $name . "]' class='dep-field form-control " . $class . "' id='" . $name . "' placeholder='" . $placeholder . "' value='" . $val . "' />";
                break;

            case 'hidden':
                echo "<input type='hidden' name='oc_hidden[" . $name . "]' class='dep-field form-control " . $class . "' id='" . $name . "'  value='" . $val . "'  />";
                break;

            case 'radio':

                foreach ($choices as $key => $value) {
                    echo ' <div class="' . $class . '"><input id="' . $name . '" data-name="' . $value . '" type="radio" name="oc_data[' . $name . ']" value="' . $key . '"';
                    if ($key == $val) {
                        echo 'checked="checked"';
                    }
                    echo '><label class="radio-lbl">'.$value.'</label></div>';
                }
                break;

            case 'dropdown':
                if ($name == 'oc_select_taxonomy') {
                    echo '<select name="oc_data[' . $name . ']" id="' . $name . '" class="dep-field form-control ' . $class . '"  id="nav_select">';
                } else {
                    echo '<select name="oc_data[' . $name . ']" id="' . $name . '" class="dep-field form-control ' . $class . '">';
                }
                foreach ($choices as $key => $value) {
                    echo '<option value="' . $key . '" ';

                    if ($val == $key) {
                        echo ' selected="selected"';
                    }
                    echo ' >' . $value . '</option>';
                }
                echo '</select>';
                break;
                
            case 'multidropdown':

                echo '<select multiple="multiple" data-nam="' . $name . '" class="dep-field form-control">';
                    foreach ($choices as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    }
                echo '</select>';
                echo "<input type='hidden' name='oc_data[" . $name . "]' class='dep-field form-control " . $class . "' id='" . $name . "'  value='" . $val . "'  />";
                break;
            
            case 'taxsdropdown':

                echo '<select multiple="multiple" data-nam="' . $name . '" class="dep-field form-control">';

                    foreach ( oc_post_types() as $post_typ => $typ ) {

                        $taxonomies = get_object_taxonomies( $post_typ );
                                                
                        foreach ($taxonomies as $tax){
                            $terms = get_terms( $tax, array( 'hide_empty' => false ));
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                                echo '<option class="'.$tax.' dis_opt" data-type="'.$post_typ.'" disabled> -- '.$tax.' -- </option>';
                                foreach ( $terms as $term ) {
                                    echo '<option class="'.$tax.'" data-type="'.$post_typ.'" value="' . $tax . '||' . $term->slug . '||' . $term->name . '||' . $term->count . '">' . $term->name . ' ('. $term->count .' Items)'. ' [ Slug: '.$term->slug. ']</option>';
                                }
                            }
                        }
                    }
                
                echo '</select>';
                echo "<input type='hidden' name='oc_data[" . $name . "]' class='dep-field form-control " . $class . "' id='" . $name . "'  value='" . $val . "'  />";
                break;

            case 'number':

                echo '<div class="slidernum" data-min="' . $min . '" data-max="' . $max . '"></div>';
                echo '<input type="number" name="oc_data[' . $name . ']" id="' . $name . '" class="num-txt dep-fld form-control ' . $class . '" id="' . $name . '" placeholder="' . $placeholder . '" value="' . $val . '" />';
                break;
                
            case 'twonumber':
                $firstVal = explode('|', $val );
                $lastVal = substr( $val , strpos( $val , "|") + 1);
                    echo '<input class="form-control num-txt no-slider firstVL" type="number" placeholder="' . $firstVal[0] . '" value="' . $firstVal[0] . '" /> : ';
                    echo '<input class="form-control num-txt no-slider lastVL" type="number" placeholder="' . $lastVal . '" value="' . $lastVal . '" />';
                    echo '<input class="hid_two_num ' . $class . '" type="hidden" id="' . $name . '" name="oc_data[' . $name . ']" placeholder="' . $placeholder . '" value="' . $val . '" />';
                break;

            case 'checkbox':

                echo '<input type="hidden" id="'.$name.'" class="dep-field checktxt ' . $class . '" value= "' . $val . '" name="oc_data[' . $name . ']"  />';
                echo '<span class="it_bx custom-checkbox"><span class="switcher"></span></span>';
                break;

            case 'textarea':
            
                echo '<textarea type="text" id="' . $name . '" placeholder="' . $placeholder . '"  class="form-control ' . $class . '" name="oc_data[' . $name . ']" style="width: 100%">' . $val . '</textarea>';
                break;

            default:
                break;
        }
        
    }

}

new OCTA_Field();