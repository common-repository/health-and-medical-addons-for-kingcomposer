<?php

add_action('init', 'nilima_department_params', 99 );
 
function nilima_department_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_department' => array(
                'name' => 'Departments',
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
                        'label'            => __( 'Department Category', 'kingcomposer' ),
                        'name'            => 'post_taxonomy',
                        'value'            => 'nilima-department',
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
                            'DESC'        => __(' DESC', 'kingcomposer'),
                            'ASC'        => __(' ASC', 'kingcomposer'),
                        )
                    ),                  
                                        
                ),                
                
                'Styling' => array(
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Title Font Size', 'kingcomposer' ),
                        'name' 			=> 'title_font_size',
                        'value'			=> 20,
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                            'show_input' => true
                        ),
                        //'description'   => __('leave for deafult font size')

                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Description Font Size', 'kingcomposer' ),
                        'name' 			=> 'desc_font_size',
                        'value'			=> 14,
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                            'show_input' => true
                        ),
                    ),                                    
                    array(
                        'name' => 'icon_color',
                        'label' => __('Icon Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'title_color',
                        'label' => __('Title Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'desc_color',
                        'label' => __('Description Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
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


function nilima_department_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'post_per_page'  => '',
        'post_taxonomy'  => '',
        'order_by'  => '',
        'order_list'  => '',
        'title_font_size'    => '',
        'desc_font_size'    => '',
        'icon_color'    => '',
        'title_color'    => '',
        'desc_color'    => '',        
        'extraclass'    => '',
        
    ), $atts) );
    
    global $post;
    $post_taxonomy_data = explode( ',', $post_taxonomy );
    $taxonomy_term = array();
    $taxonomy = '';
    $post_type = 'nilima-department';
    
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
        
    $post_per_page = isset($post_per_page) ? $post_per_page : -1;
    
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $post_per_page,
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
    
    
    $heading_styles = '';     
    if(!empty($title_font_size)){
        $heading_styles .= ' font-size: '.$title_font_size.'px; ';
    }    
    if(!empty($title_color)){
        $heading_styles .= ' color: '.$title_color.'; ';
    }
    
    $desc_styles = '';
    if(!empty($desc_font_size)){
        $desc_styles .= ' font-size: '.$desc_font_size.'px; ';
    }    
    if(!empty($desc_color)){
        $desc_styles .= ' color: '.$desc_color.'; ';
    }
    
        
    $output .= '<section class="'.$extraclass.'">
                    <div class="auto-container">
                        <div class="row clearfix">';    
    
    $nilima_department_query = new WP_Query( $args );        
    if ( $nilima_department_query->have_posts() ): while ($nilima_department_query->have_posts()) : $nilima_department_query->the_post();
    $post_id = get_the_ID();
    if ( has_post_thumbnail() ) {
        $department_image = '';
        $department_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
        $department_image = '<img src="'.$department_image_url.'" alt="">';
    }else{
        $department_image = '<h3>no image found</h3>';
    }
    
    $icon_name = get_post_meta( $post_id, 'department_icon_name', true );
    $icon_html = '';
    if (!empty($icon_name)) {
        $icon_html = '<span style="color: '.$icon_color.'" class="icon flaticon-'.$icon_name.'"></span>';
    }else{
        $icon_html = '';
    }
   
    $output .='<div class="department-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure>'.$department_image.'</figure>
                            <div class="overlay-link">                            
                                <a href="'.$department_image_url.'" class="lightbox-image" data-fancybox="Gallery"><span class="icon flaticon-add-1"></span></a>
                            </div>
                        </div>
                        <div class="lower-content">
                             <div class="title">
                                 '.$icon_html.'
                                 <h3><a style="'.$heading_styles.'" href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                             </div>
                             <p style="'.$desc_styles.'">'.wp_trim_words( get_the_content(), 20, '...' ).'</p>
                        </div>
                    </div>
                </div>'; 
    
    endwhile;
    endif; 
    wp_reset_query();
        
    $output .= '</div></div></section>';  



    return $output;
}
add_shortcode('nilima_department', 'nilima_department_shortcode');