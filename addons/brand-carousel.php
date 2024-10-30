<?php

add_action('init', 'nilima_brand_carousel_shortcode_init', 99 );
 
function nilima_brand_carousel_shortcode_init(){
 
        global $kc;
        $kc->add_map(
            array(
                'nilima_brand_carousel' => array(
                    'name' => 'Brand Carousel',
                    'icon' => 'akc_before_after_icon',
                    'css_box' => true,
                    'category' => 'Nilima Theme',
                    'params' => array(
                                                    
                
                    'Brands' => array(             
                        array(
                            'type'            => 'group',
                            'label'           => __('Brand Images', 'KingComposer'),
                            'name'            => 'brands',
                            'description'     => __( 'Repeat this fields', 'KingComposer' ),
                            'options'         => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                            
                            'params' => array(

                                array(
                                    'name' => 'image',
                                    'label' => 'Brand Image',
                                    'type' => 'attach_image',
                                    "description" => __("Select image from media library for before.", "kingcomposer")
                                ),                                                                                               
                            ),
                        ),                
                    ),
                        
                        
                    'Exta Class' => array(                    
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


function nilima_brand_carousel_shortcode($atts, $content = null){
        extract( shortcode_atts( array(
        
                'brands'  => '',
                'extraclass'    => '',
                
        ), $atts) );
        
        


    $output ='';
                            
        
            
    $output ='<div class="sponsors-outer '.$extraclass.'">
                <ul class="sponsors-carousel owl-carousel owl-theme">';
            
            
    $brands = $atts['brands'];
    $client_html ='';
    if( isset( $brands ) ){
        foreach( $brands as $brand ){
            $image = wp_get_attachment_image_src( $brand->image, 'full' );
            $client_html .= '<li class="brands slide-item"><figure class="image-box"><a href="#"><img src="'.$image[0].'" alt=""></a></figure></li>';

        }
    }
    
                    
    $output .= $client_html;          
                    
    $output .='</ul></div>';

    
    $output .= '<script>
    
    jQuery(document).ready(function($) {        
    
            $(".brand-carousel").owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,            
                    dots: false,
                    autoWidth: false,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    responsive: {
                            0: {
                                    items: 2,
                                    autoWidth: false,
                                    dots: false,
                            },
                            480: {
                                    items: 2,
                                    autoWidth: false,
                                    dots: false,
                            },
                            600: {
                                    items: 4,
                            },
                            1000: {
                                    items: 6,
                                    autoWidth: false
                            }
                    }
            });
            });
            
            </script>';



            return $output;
}


add_shortcode('nilima_brand_carousel', 'nilima_brand_carousel_shortcode');