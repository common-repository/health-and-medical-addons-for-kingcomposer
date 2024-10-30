<?php

add_action('init', 'nilima_blog_params', 99 );
 
function nilima_blog_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_blog' => array(
                'name' => 'Blog',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                
                'params' => array(
                   
                'General' => array(
                    array(
                        'type'            => 'number_slider',
                        'label'            => __( 'Number of posts displayed', 'kingcomposer' ),
                        'name'            => 'post_per_page',
                        'description'    => __( 'The number of posts you want to show.', 'kingcomposer' ),
                        'value'            => '6',
                        'admin_label'    => true,
                        'options' => array(
                            'min' => 1,
                            'max' => 12
                        )
                    ),
                    array(
                        'type'            => 'post_taxonomy',
                        'label'            => __( 'Blog Category', 'kingcomposer' ),
                        'name'            => 'post_taxonomy',
                        'value'            => 'post',
                        'description'    => __( '', 'kingcomposer' ),
                        'admin_label'    => true
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Order by', 'kingcomposer' ),
                        'name'            => 'order_by',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'ID'        => __(' Post ID', 'kingcomposer'),
                            'author'    => __(' Author', 'kingcomposer'),
                            'title'        => __(' Title', 'kingcomposer'),
                            'name'        => __(' Post name (post slug)', 'kingcomposer'),
                            'type'        => __(' Post type (available since Version 4.0)', 'kingcomposer'),
                            'date'        => __(' Date', 'kingcomposer'),
                            'modified'    => __(' Last modified date', 'kingcomposer'),
                            'rand'        => __(' Random order', 'kingcomposer'),
                            'comment_count'    => __(' Number of comments', 'kingcomposer')
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Order post', 'kingcomposer' ),
                        'name'            => 'order_list',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'DESC'        => __('DESC', 'kingcomposer'),
                            'ASC'        => __('ASC', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'text',
                        'label'            => __( 'Read more text', 'kingcomposer' ),
                        'name'            => 'readmore_text',
                        'description'    => __( 'Edit the text that appears on the "Read more" button.', 'kingcomposer' ),
                        'value'            => 'Read more'
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Show Thumbnail', 'kingcomposer' ),
                        'name'            => 'thumbnail',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'yes'        => __('Yes', 'kingcomposer'),
                            'no'        => __('No', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Hide Author Name', 'kingcomposer' ),
                        'name'            => 'hide_author',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'no'        => __('No', 'kingcomposer'),
                            'yes'        => __('Yes', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Hide Post Date', 'kingcomposer' ),
                        'name'            => 'hide_date',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'no'        => __('No', 'kingcomposer'),
                            'yes'        => __('Yes', 'kingcomposer'),
                        )
                    ),                    
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Hide Post Categories', 'kingcomposer' ),
                        'name'            => 'hide_categories',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'no'        => __('No', 'kingcomposer'),
                            'yes'        => __('Yes', 'kingcomposer'),
                        )
                    ),                    
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Hide Comments Count', 'kingcomposer' ),
                        'name'            => 'hide_comments',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'no'        => __('No', 'kingcomposer'),
                            'yes'        => __('Yes', 'kingcomposer'),
                        )
                    ),                    
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Hide Read More Link', 'kingcomposer' ),
                        'name'            => 'hide_morelink',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'no'        => __('No', 'kingcomposer'),
                            'yes'        => __('Yes', 'kingcomposer'),
                        )
                    ),                                                           
                                        
                ),                
                
                'Layout' => array(
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Blog Layout', 'kingcomposer' ),
                        'name'            => 'layout',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'large'        => __('Large Layout', 'kingcomposer'),
                            'list'        => __('List Layout', 'kingcomposer'),
                            'grid'        => __('Grid Layout', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Pagination', 'kingcomposer' ),
                        'name'            => 'pagination',
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'hide'        => __('Hide', 'kingcomposer'),
                            'pagination'        => __('Pagination', 'kingcomposer'),
                            'infinite'        => __('Infinite Scroll', 'kingcomposer'),
                        )
                    ),
                    array(
                        'type'            => 'dropdown',
                        'label'            => __( 'Blog Grid Columns', 'kingcomposer' ),
                        'name'            => 'columns',
                        'admin_label'    => true,
                        'description'    => __( '', 'kingcomposer' ),
                        'options'         => array(
                            'two'        => __('2 Columns', 'kingcomposer'),
                            'three'        => __('3 Columns', 'kingcomposer'),
                            'four'        => __('4 Columns', 'kingcomposer'),
                        ),
                        'relation' => array(
                            'parent' => 'layout',
                            'show_when' => 'grid'
                        )
                    ),                    
                    
                ),
                
                                                                    
                'Extraa Class' => array(
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),
                ),
                                                                            
                 
                      
                                      
                    
                )
            )
        )
    );
} 


function nilima_blog_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'post_per_page'  => '',
        'post_taxonomy'  => '',
        'order_by'  => '',
        'order_list'  => '',
        'readmore_text'  => '',
        'thumbnail'  => '',
        'hide_author'  => '',
        'hide_date'  => '',
        'hide_categories'  => '',
        'hide_comments'  => '',
        'hide_morelink'  => '',
        'layout'  => '',
        'pagination'  => '',
        'columns'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    global $post, $noor_options;
    
    $post_taxonomy_data = explode( ',', $post_taxonomy );
    $taxonomy_term = array();
    $taxonomy = '';
    $post_type = 'post';
    
    if( isset($post_taxonomy_data) ){
        $post_taxonomy_tmp = explode( ':', $post_taxonomy_data[0] );
        if( count($post_taxonomy_tmp) > 1 || !isset($post_taxonomy_tmp[1]))
            $post_type = $post_taxonomy_tmp[0];
            
            
            foreach( $post_taxonomy_data as $post_taxonomy ){
                $post_taxonomy_tmp = explode( ':', $post_taxonomy );

                if( isset($post_taxonomy_tmp[1]) ){
                    $taxonomy_term[] = $post_taxonomy_tmp[1];
                }
            }          
    
        $taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
        $taxonomy = key( $taxonomy_objects );        
        
        
    }
    
    if( ( is_front_page() || is_home() ) ) {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
    } else {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }
        
    $post_per_page = isset($post_per_page) ? $post_per_page : 10;
    
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $post_per_page,
        'paged' 			=> $paged,
        'order'             => $order_list,
    );
    
    if( count($taxonomy_term) )
    {
        $tax_query = array(
            'relation' => 'OR'
        );

        foreach( $taxonomy_term as $term ){
            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term,
            );
        }

        $args['tax_query'] = $tax_query;
    }
    
    
    
    $output ='';
    
    $post_class = $container_class = $scroll_type = $scroll_type_class = '';
    $post_type_layout = $excerpt_limit = '';
    
    if( $layout == 'grid' ) {	
        if( $columns != '' ) {
            if( $columns == 'two' ) {
                $container_class = 'grid-layout grid-col-2';
            } elseif ( $columns == 'three' ) {
                $container_class = 'grid-layout grid-col-3';
            } elseif ( $columns == 'four' ) {
                $container_class = 'grid-layout grid-col-4';
            }
        }
        $post_class = 'grid-posts';
        $image_size = 'blog-medium';
        $page_type_layout = 'grid';
        $excerpt_limit = $noor_options['noor_blog_excerpt_length_grid'];
        
    } elseif( $layout == 'large' ) {
        $container_class = 'large-layout';
        $post_class = 'large-posts';
        $image_size = 'blog-large';
        $post_type_layout = 'large';
        $excerpt_limit = $noor_options['noor_blog_excerpt_length_large'];
        
    } elseif( $layout == 'list' ) {
        $container_class = 'list-layout';
        $post_class = 'list-posts clearfix';	
        $image_size = 'blog-medium';
        $page_type_layout = 'list';
        $excerpt_limit = apply_filters( 'noor_blog_list_excerpt_length', 30 );
    }
    
    if( $pagination == "infinite" ) {
        $scroll_type = "infinite";
        $scroll_type_class = " scroll-infinite";
    } 
    elseif( $pagination == "pagination" ) {
        $scroll_type = "pagination";
        $scroll_type_class = " scroll-pagination";
    }
    
    
    $output = '<div class="noor-blog-posts-wrapper'.$extraclass.'">';
        $output .= '<div id="archive-posts-container" class="noor-posts-container '. esc_attr($container_class . $scroll_type_class) .' clearfix">';

    $post_count = 1;    
    $nilima_blog_query = new WP_Query( $args );        
    if ( $nilima_blog_query->have_posts() ): while ($nilima_blog_query->have_posts()) : $nilima_blog_query->the_post();
    
        $post_id = get_the_ID();
        $post_timestamp = strtotime($post->post_date);
        $post_month = date('n', $post_timestamp);
        $post_year = get_the_date('o');
        $current_date = get_the_date('o-n');
    
        $post_format = get_post_format();
        
        $post_format_class = '';
        if( $post_format == 'image' ) {
            $post_format_class = 'image-format';
        } elseif( $post_format == 'quote' ) {
            $post_format_class = 'quote-image';
        }
        
        if( has_post_format('link') ) {
            $external_url = '';
            $external_url = get_post_meta( $post_id, 'noor_external_link_url', true );
            if( isset( $external_url ) && $external_url == '' ) {
                $external_url = get_permalink( $post_id );
            }
        } 
                                    
        $output .= '<article id="post-'.$post_id.'" ';
        ob_start();
            post_class($post_class);
        $output .= ob_get_clean() .'>';
        
        $output .= '<div class="post-inner-wrapper">';
        
            if ( $thumbnail == 'yes' ) {
                ob_start();
                include( locate_template( 'templates/blog/post-slider.php' ) );
                $output .= ob_get_clean();
            }
            
            $output .= '<div class="posts-content-container">';
            
                if( has_post_format('quote') ) {
                    
                    $output .= '<div class="entry-summary clearfix">
                        <div class="entry-quotes quote-format">
                            <blockquote>';
                    $output .= '<p>';
                    $output .= noor_blog_trim_excerpt( $excerpt_limit );
                    $output .= '</p>';
                    $output .= '<footer>
                                    <h2 class="entry-title">';
                            $output .= '<a href="'. get_permalink($post_id) .'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a>';
                        $output .= '</h2>
                                </footer>';
                    $output .= '</blockquote>										
                        </div>
                    </div>';
                
                } else {							
                    
                    $output .= '<div class="entry-header">
                        <h2 class="entry-title">';
                        if( has_post_format('link') ) {
                            $output .= '<a href="'. esc_url($external_url) .'" rel="bookmark" title="'.get_the_title().'" target="_blank">'.get_the_title().'</a>';
                        } else {
                            $output .= '<a href="'. get_permalink($post_id) .'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a>';
                        }
                    $output .= '</h2>
                    </div>';
                    
                    $output .= '<div class="entry-summary clearfix">';
                    $output .= '<p>'. noor_blog_trim_excerpt( $excerpt_limit ) .'</p>';
                    $output .= '</div>';
                    
                
                    if( $hide_author != 'yes' || $hide_date != 'yes' || $hide_categories != 'yes' || $hide_comments != 'yes' ) {
                        $output .= '<div class="entry-meta-wrapper">';							
                        $output .= '<ul class="entry-meta">';
                            
                            if( $hide_author != 'yes' ) {
                                $output .= '<li class="author"><i class="fa fa-user"></i>';
                                ob_start();
                                the_author_posts_link();
                                $output .= ob_get_clean() . '</li>';
                            }
                                                                                                    
                            if( $hide_date != 'yes' ) {
                                $output .= '<li class="posted-date"><i class="fa fa-calendar"></i>' .get_the_time( $noor_options['noor_blog_date_format'] ).'</li>';
                            }
                            
                            if( $hide_categories != 'yes' ) {
                                $output .= '<li class="category"><i class="fa fa-folder"></i>'.get_the_category_list(', ').'</li>';
                            }
                                                                    
                            if( $hide_comments != 'yes' ) {							
                                if ( comments_open() ) {
                                    $output .= '<li class="comments-link"><i class="fa fa-comments"></i>';
                                    ob_start();
                                    comments_popup_link( '<span class="leave-reply">' . esc_html__( '0 Comment', 'noorthemes' ) . '</span>', esc_html__( '1 Comment', 'noorthemes' ), esc_html__( '% Comments', 'noorthemes' ) );
                                    $output .= ob_get_clean();
                                    
                                    $output .= '</li>';
                                }
                            }																			
                            
                        $output .= '</ul>';	
                        $output .= '</div>';							
                    }
                
                    if( $hide_morelink != 'yes' ) {
                        $output .= '<div class="entry-footer clearfix">';
                            $output .= '<div class="read-more">';
                                if( has_post_format('link') ) {
                                    $output .= '<a href="'. esc_url($external_url) .'" class="btn-more read-more-link" target="_blank">';
                                } else {
                                    $output .= '<a href="'. get_permalink($post_id) .'" class="btn-more read-more-link">';
                                }
                                
                                if( ! $noor_options['noor_blog_read_more_text'] ) {
                                    $output .= esc_html__('Read more', 'noorthemes'); 
                                } else { 
                                    $output .= $noor_options['noor_blog_read_more_text'];
                                }
                                $output .= '</a>';
                            $output .= '</div>';
                        $output .= '</div>';									
                    }
                }
            $output .= '</div>';
            
        $output .= '</div>';
                                
        $output .= '</article>';
        
        $prev_post_timestamp = $post_timestamp;
        $prev_post_month = $post_month;
        $post_count++; 
        
        endwhile;
    endif;
    $output .= '</div>';
    if( $pagination != "hide" ) {
        $output .= noor_pagination( $nilima_blog_query->max_num_pages, $scroll_type );
    }
    $output .= '</div>'; 
    wp_reset_postdata();
    
    return $output;
}
add_shortcode('nilima_blog', 'nilima_blog_shortcode');