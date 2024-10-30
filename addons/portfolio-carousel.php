<?php

add_action('init', 'nilima_portfolio_carousel_shortcode_init', 99 );
 
function nilima_portfolio_carousel_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_portfolio_carousel' => array(
                'name' => 'Portfolio Carousel',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
            
                             
                    array(
                        'type'            => 'group',
                        'label'            => __('Carousel Items', 'KingComposer'),
                        'name'            => 'port_carousels',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'options'     => array( 'add_text' => __( 'Add new item', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'attach_image',
                                "description" => __("Select image from media library for before.", "kingcomposer")
                            ),
                        ),
                    ),                
            
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items per slide', 'kingcomposer' ),
                        'name' 	=> 'items_number',
                        'description' 	=> __( 'The number of items displayed per slide (not apply for auto-height).', 'kingcomposer' ),
                        'value'			=> '5',
                        'options' => array(
                            'min' => 1,
                            'max' => 10
                        )
                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items On Tablet?', 'kingcomposer' ),
                        'name' 			=> 'tablet',
                        'value'			=> 2,
                        'options' => array(
                            'min' => 1,
                            'max' => 10,
                            'show_input' => true
                        ),
                        'description'   => __('Display number of items per each slide (Tablet Screen)')

                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Items On Smartphone?', 'kingcomposer' ),
                        'name' 			=> 'mobile',
                        'value'			=> 1,
                        'options' => array(
                            'min' => 1,
                            'max' => 10,
                            'show_input' => true
                        ),
                        'description'   => __('Display number of items per each slide (Mobile Screen)')

                    ),
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Dots', 'kingcomposer' ),
                        'name'			=> 'dots',
                        'description'	=> __( 'Show the dots under carousel.', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ),
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Auto Play', 'kingcomposer' ),
                        'name'			=> 'auto_play',
                        'description'	=> __( 'The carousel automatically plays when site loaded.', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ),                                   
                    array(
                        'name' => 'extraclass',                    
                        'type' => 'text',
                        'label' => __('Extra class name', 'kingcomposer'),
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kingcomposer')
                    ),                 
                      
                                      
                    
                )
            )
        )
    );
} 


// Register Before After Shortcode
function nilima_portfolio_carousel_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'port_carousels'  => '',
        'items_number'  => '5',
        'tablet'        => '3',
        'mobile'        => '1',
        'dots'    => '',
        'auto_play'     => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
                 
       
        
    $output .='<div class="project-section">';
    $output .='<div class="project-carousel owl-carousel owl-theme '.$extraclass.'">';
        
        
    $port_carousels = $atts['port_carousels'];
    if( isset( $port_carousels ) ){
      foreach( $port_carousels as $port_carousel ){

        $image = wp_get_attachment_image_src( $port_carousel->image, 'full' );
          
        $output .= '<div class="project-block">
                <div class="image-box">
                    <figure><img src="'.$image[0].'" alt=""></figure>
                    <a href="'.$image[0].'" class="lightbox-image" data-fancybox="Gallery"><span class="fa fa-arrows-alt"></span></a>
                </div>`
            </div>';

        }
    }          
            
    $output .='</div>';
    $output .='</div>';

    
    $auto_play = ($auto_play == 'yes' ? 'true' : 'false');
    $dots = ($dots == 'yes' ? 'true' : 'false');
    
    $navTextLeft = '\'<span class="fa fa-angle-left"></span>\'';
    $navTextRight = '\'<span class="fa fa-angle-right"></span>\'';
    
    $output .= '<script>
    
    jQuery(document).ready(function($) {        
    
        $(".project-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,           
                dots: '.$dots.',
                autoWidth: false,
                autoplay: '.$auto_play.',
                autoplayTimeout: 3000,
                smartSpeed: 500,
                autoplayHoverPause: true,
                navText: [ '.$navTextLeft.', '.$navTextRight.' ],
                responsive: {
                    0: {
                        items: '.$mobile.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    480: {
                        items: '.$mobile.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    600: {
                        items: '.$tablet.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    800: {
                        items: '.$tablet.',
                        autoWidth: false,
                        nav: true,
                        dots: false
                    },
                    1024: {
                        items: '.$tablet.',
                        autoWidth: false
                    },
                    1200: {
                        items: '.$items_number.',
                        autoWidth: false
                    }
                }
            });
        });
        
        </script>';



        return $output;
}


add_shortcode('nilima_portfolio_carousel', 'nilima_portfolio_carousel_shortcode');