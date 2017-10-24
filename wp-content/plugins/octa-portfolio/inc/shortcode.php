<?php

function OCTA_Shortcode($alias) {
    
    global $wpdb, $post;
    $configs = new OCTA_Config();
    $conficArr = $configs->configArray();
    $result = $wpdb->get_results("SELECT * FROM ".PLUGIN_TBL." WHERE alias='{$alias}'", ARRAY_A);
    
    foreach ($conficArr as $key => $value){
        if( $value['name'] != 'oldalias' ){
            ${$value['name']} = $result[0][$value['name']];
        }
    }
    
    $tax = $shonums = $filselect = $dn = $slider_atts = $ex_class = $output = $witbg = $mainbg = '';
    $count_post = array();
    $rt          = ( $rtl == '1' ) ? ' rtl' : '';
    $post_type   = explode(',', $post_type);
    $taxs        = explode(',', $select_taxonomy);
    $ratio_x     = explode('|', $img_ratio);
    $ratio_y     = substr($img_ratio, strpos($img_ratio, "|") + 1);
            
    if ( $alias == $alias ) {
        if ($maximum_entries != 0) {
            
            if ($grid_layout != 'slider' && $grid_layout != 'onecolumn') {                
                
                // Grids pre-loader...
                if($preloader != '-1'){
                    $output .= '<div class="loader-port">';
                        $output .= '<div class="cp-spinner ' . $preloader . '">';
                        $output .= '</div>';
                    $output .= '</div>';    
                }
                
                $output .= '<div class="portfolio-container">';
            }

            // Nav filter...
            if ($taxs && $nav_filter != 'none' && $grid_layout != 'slider' && $grid_layout != 'onecolumn') {
                if( $nav_layout == 'dropdown' ){$filselect = ' filter_select';}
                $output .= '<div class="filter-by ' . $nav_filter . $filselect . $rt . '">';
                    if( $nav_layout == 'inline' ){
                        $output .= '<ul id="filters">';
                        if ($show_all == '1') {
                            $output .= '<li class="selected"><a href="#" class="hov_eff filter" data-filter="*"><span>' . esc_attr($all_text) . '</span></a></li>';
                        }
                                                
                        foreach ($taxs as $tt){   
                            $tar = explode('||',$tt);
                            if( $num_style == 'inline' ){
                                $inl = 'inline';    
                            } else {
                                $inl = 'popup';    
                            }
                            if( $els_num == '1' ){
                                $shonums = '<b class="'.$inl.'">'.$tar[3].'</b>';    
                            }
                            $output .= '<li><a href="#" class="hov_eff filter" data-filter=".' . $tar[1] . '"><span>' . $tar[2] . $shonums . '</span></a></li>';
                        }
                        
                        $output .= '</ul>';
                    } else {
                        $output .= '<select id="filters">';
                        if ($show_all == '1') {
                            $output .= '<option value="*" selected="selected">' . esc_attr($all_text) . '</option>';
                        }
                                                
                        foreach ($taxs as $tt){   
                            $tar = explode('||',$tt);
                            $output .= '<option value=".' . $tar[1] . '">' . $tar[2] . ' '. $tar[3] . '</option>';
                        }
                        
                        $output .= '</select>';
                    }
                $output .= '</div>';
            }
            
            if ($grid_layout == 'slider') {
                $slider_type = ' ' . $slider_type . '-slider';
                $slider_atts = 'data-slidesnum="' . $slide_to_show . '" data-scamount="' . $slide_to_scroll . '" data-fade="' . $fade . '" data-speed="' . $slide_speed . '" data-arrows="' . $show_arrows . '" data-infinite="' . $infinite . '" data-dots="' . $show_bullets . '" data-auto="' . $auto_play . '"';
            }

            if ($enable_pagination == '1') {
                $dn = $items_per_page;
            } else {
                $dn = $maximum_entries;
            }
            
            if ($grid_layout == 'onecolumn') {
                $output .= '<div class="octa_grid p-1-col ' . $ex_class . $rt . '" data-spacing="' . $item_spacing . '" id="octa_grid_' . $id . '" data-num="' . $dn . '">';
            } else if ($grid_layout == 'slider') {
                $output .= '<div class="octa_grid ' . $ex_class . $rt . $choose_skin . $slider_type . '" data-margins="' . $item_spacing . '" data-num="' . $dn . '" data-layout="' . $grid_layout . '" id="octa_grid_' . $id . '"' . $slider_atts . '>';
            } else {
                $output .= '<div class="octa_grid p-' . $number_of_columns . '-cols ' . $grid_layout . ' ' . $choose_skin . $ex_class . $rt . '" data-spacing="' . $item_spacing . '" data-cols="' . $number_of_columns . '" id="octa_grid_' . $id . '" data-layout="' . $grid_layout . '" data-num="' . $dn . '">';
            }

            if (get_query_var('page') > 1) {
                $paged = get_query_var('page');
            } elseif (get_query_var('paged') > 1) {
                $paged = get_query_var('paged');
            } else {
                $paged = 1;
            }                                

            wp_reset_query();                    
            $custom_args = array(
                'post_type' => $post_type,
                'tax_query' => array(),
                'posts_per_page' => $dn,
                'orderby' => "$order_by",
                'order' => "$order_type",
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
                'paged' => $paged,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true,
            );
            
            $custom_args['tax_query'] = array(
                'relation' => 'OR',
            );
            foreach ( $taxs as $tx ) {
                $tt = explode('||',$tx);
                $tax = $tt[0];
                $ter = $tt[1];
                $custom_args['tax_query'][]=  array(
                    'taxonomy' => $tax,
                    'terms' => $ter,
                    'field' => 'slug',
                    'include_children' => true,
                    'operator' => 'IN'
                );
            }    
            
            $query = new WP_Query($custom_args);
            
            if ($choose_skin != 'ivy') {
                $witbg = ' white-bg';
                $mainbg = ' main-bg';
            }
            
            $arr = array();

            foreach( $taxs as $txx ){
                $arr[] = explode('||',$txx);
            }

            for ($i = 0; $i < sizeof($arr); $i++) {
                $taxo = $arr[$i][0];                
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post();
                        $terms = get_the_terms( get_the_ID(), $taxo );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            if (!in_array($post->ID, $count_post)) {
                                array_push($count_post, $post->ID);
                                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

                                $termArr = $termTax = array();

                                foreach ( $terms as $term ) {
                                    $term_link = get_term_link( $term );
                                    $termArr[] = $term->slug;
                                    $termTax[] = '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                                }

                                $output .= '<div class="portfolio-item ' . implode ( ' ', $termArr) . '" data-ratio-x="'.$ratio_x[0].'" data-ratio-y="'.$ratio_y.'">';
                                if ($grid_layout == 'onecolumn') {
                                    if (has_post_thumbnail()) {
                                        $output .= '<div class="img-holder">';
                                            $output .= '<a href="' . get_the_permalink() . '">';
                                                $output .= get_the_post_thumbnail(null, $image_source, '');
                                            $output .= '</a>';
                                        $output .= '</div>';
                                    } else {
                                        $output .= '<div class="img-holder">';
                                            $output .= post_media(get_the_content());
                                        $output .= '</div>';
                                    }
                                    $output .= '<div class="name-holder">';
                                        $output .= '<h4><a class="main-color" href="' . get_the_permalink() . '">';
                                            if ($show_title == '1') {
                                                $output .= get_the_title();
                                            }
                                        $output .= '</a></h4>';
                                        $output .= '<div class="description">';
                                            if (has_excerpt()) {
                                                $output .= get_the_excerpt();
                                            } else {
                                                $content = get_the_content('', false, '');
                                                $output .= apply_filters('the_content', $content);
                                            }
                                        $output .='</div>';
                                        $output .= '<div class="meta">';
                                            $output .= '<ul class="list">';
                                                if ($show_categories == '1') {
                                                    $output .= '<li><i class="fa fa-folder-open-o main-color"></i> <strong>' . __('Categories', PLUGIN_SLUG) . ': </strong>';
                                                        $output .= implode ( ' , ', $termTax);
                                                    $output .= '</li>';
                                                }
                                                $output .= '<li><i class="fa fa-user main-color"></i> <strong>' . __('By', PLUGIN_SLUG) . ' :</strong> <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_meta('display_name') . '</a></li>';
                                                $output .= '<li><i class="fa fa-clock-o main-color"></i> <strong>' . __('Created on', PLUGIN_SLUG) . ': </strong> ' . get_the_date() . '</li>';
                                            $output .= '</ul>';
                                        $output .= '</div>';
                                    $output .= '</div>';

                                } else {
                                    $output .= '<div class="port-container">';
                                        if (has_post_thumbnail()) {
                                            $output .= '<div class="port-img">';
                                                if ( $choose_skin != 'transit' && $choose_skin != 'rotato' ){
                                                    $output .= '<div class="icon-links">';
                                                        if ($show_link_to_post == '1') {
                                                            $output .= '<a href="' . get_the_permalink() . '" class="oc_link' . $witbg . '"><i class="lineaico-uni18C"></i></a>';
                                                        }
                                                        if ($show_zoom_image == '1') {
                                                            $output .= '<a href="' . $feat_image . '" class="oc_zoom' . $mainbg . '" title="' . get_the_title() . '"><i class="lineaico-uniE0B6"></i></a>';
                                                        }
                                                    $output .= '</div>';    
                                                }
                                                $output .= get_the_post_thumbnail(null, $image_source, '');
                                            $output .= '</div>';
                                        } else {
                                            $output .= '<div class="media-cont">';
                                                $output .= post_media(get_the_content());
                                            $output .= '</div>';    
                                        }
                                                                                
                                        $output .= '<div class="port-captions">';
                                            $output .= '<div class="port-inner-cell">';
                                                if ( $choose_skin == 'transit' || $choose_skin == 'rotato' ){
                                                    $output .= '<div class="icon-links">';
                                                        if ($show_link_to_post == '1') {
                                                            $output .= '<a href="' . get_the_permalink() . '" class="oc_link' . $witbg . '"><i class="lineaico-uni18C"></i></a>';
                                                        }
                                                        if ($show_zoom_image == '1') {
                                                            $output .= '<a href="' . $feat_image . '" class="oc_zoom' . $mainbg . '" title="' . get_the_title() . '"><i class="lineaico-uniE0B6"></i></a>';
                                                        }
                                                    $output .= '</div>';    
                                                }

                                                if ($show_title == '1') {
                                                    $output .= '<h4><a href="' . get_the_permalink() . '">';
                                                        $output .= get_the_title();
                                                    $output .= '</a></h4>';
                                                }
                                                
                                                if ($show_categories == '1') {
                                                    $output .= '<p class="description">';
                                                        $output .= implode ( ' , ', $termTax);
                                                    $output .= '</p>';
                                                }
                                                
                                                if ($show_excerpt == '1') {
                                                    $output .= '<div class="port-excerpt">';
                                                        $output .= oc_summary(20);
                                                    $output .= '</div>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }
                                $output .= '</div>';
                                
                            }
                        }
                    }  
                }
            
            }    
            
            
            $output .= '</div>';

            $big = 999999999;
            $page_args = array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $query->max_num_pages,
                'type' => 'list',
                'paged' => $paged,
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'
            );

            if ($enable_pagination == '1' && $grid_layout != 'slider') {
                if ($pagination_type == 'numeric') {
                    
                    $output .='<div class="pager oc_pag ' . $pagination_alignment . '">';
                        $output .= '<ul class="pagination style2">';
                            $output .= paginate_links($page_args);
                        $output .= '</ul>';
                    $output .= '</div>';
                    
                } else if ($pagination_type == 'nextprev') {
                    
                    $output .='<div class="oldnewpager ' . $pagination_alignment . '">';
                        $output .='<div class="nxt-link">' . get_next_posts_link(__('&laquo; Older', PLUGIN_SLUG), $query->max_num_pages) . '</div>';
                        $output .='<div class="prv-link">' . get_previous_posts_link(__('Newer &raquo; ', PLUGIN_SLUG), $query->max_num_pages) . '</div>';
                    $output .='</div>';
                    
                } else if ($pagination_type == 'loadmore') {


                    $output .='<div class="oc_load_more ' . $pagination_alignment . '">';
                        $output .='<a href="#" class="vc_general vc_btn3 vc_btn3-shape-rounded vc_btn3-style-3d vc_btn3-icon-left vc_btn3-color-default">' . esc_attr($load_more_button_text) . ' <span class="pager_loading"><span class="uil-ring"><span></span></span></span></a>';
                        $output .= '<div class="hidden pgnum">' . $query->max_num_pages . '</div>';
                        $output .= '<div class="load_msg">' . __('No More Posts To Show !!',PLUGIN_SLUG) . '</div>';
                    $output .='</div>';
                }
            }

            if ($grid_layout != 'slider' && $grid_layout != 'onecolumn') {
                $output .= '</div>';
            }
        } else {
            $output .= '<div class="alert alert-warning t-center m-b-0">' . __('No Posts To Show!!', PLUGIN_SLUG) . '</div>';
        }
    } else {
        $output .= '<div class="alert alert-danger t-center m-b-0">' . __('No grid with alias ( ' . $alias . ' ) were found!, Please Create it first.', PLUGIN_SLUG ) . '</div>';
    }

    return $output;
}