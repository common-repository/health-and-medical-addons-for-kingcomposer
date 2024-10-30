<?php

add_action('init', 'nilima_testimonial_carousel_shortcode_init', 99 );
 
function nilima_testimonial_carousel_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_testimonial_carousel' => array(
                'name' => 'Testimonal Carousel',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
                                
            
                'Testimonals' => array(             
                    array(
                        'type'            => 'group',
                        'label'           => __('Testimonial Items', 'KingComposer'),
                        'name'            => 'testimonials',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'image',
                                'label' => 'Client Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library for before.", "kingcomposer")
                            ),
                            array(
                                'name' => 'name',
                                'label' => __('Name', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),
                            array(
                                'name' => 'designation',
                                'label' => __('Designation', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                                
                            array(
                                'name' => 'description',
                                'label' => __('Content', 'kingcomposer'),
                                'type' => 'textarea',
                                'value' => __('', 'kingcomposer'),
                            ),                                                                                                
                        ),
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
                                
                'Extra Class' => array(                    
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


function nilima_testimonial_carousel_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'testimonials'  => '',
        'title_font_size'    => '',
        'desc_font_size'    => '',
        'title_color'    => '',
        'desc_color'    => '',        
        'extraclass'    => '',
        
    ), $atts) );
    

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
        
    $output ='<div class="testimonial-carousel-two '.$extraclass.'">';
        
        
    $testimonials = $atts['testimonials'];
    if( isset( $testimonials ) ){
        foreach( $testimonials as $testimonial ){

            $image = wp_get_attachment_image_src( $testimonial->image, 'full' );

            $name = !empty($testimonial->name) ? $testimonial->name : '';
            $designation = !empty($testimonial->designation) ? $testimonial->designation : '';
            
            $output .= '<div class="testimonial-block-two">
                            <div class="inner-box">
                                <div class="thumb"><img src="'.$image[0].'" alt=""></div>
                                <h3 style="'.$heading_styles.'" class="name">'.$name.'</h3>
                                <span class="address">'.$designation.'</span>
                                <p style="'.$desc_styles.'">'.$testimonial->description.'</p>
                            </div>
                        </div>';
         
         
        }
    }          
            
    $output .='</div>';


    return $output;
}


add_shortcode('nilima_testimonial_carousel', 'nilima_testimonial_carousel_shortcode');