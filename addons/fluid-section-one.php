<?php

add_action('init', 'nilima_fluid_section_one_params', 99 );
 
function nilima_fluid_section_one_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_fluid_section_one' => array(
                'name' => 'Fluid Section One',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
            
                'Left Column' => array(

                    array(
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),                                        

                ),            
            
                'Right column' => array(
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Why', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'title_hlt',
                        'label' => __('Title Highlight', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('highlight text after the title', 'kingcomposer'),
                        'value' => __('Choose Us?', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'description',
                        'label' => __('Content', 'kingcomposer'),
                        'type' => 'editor',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature1',
                        'label' => __('Feature 1', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Over 20 years of experience', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature2',
                        'label' => __('Feature 2', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Experienced Doctor\'s', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature3',
                        'label' => __('Feature 3', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Improving Everyday', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature4',
                        'label' => __('Feature 4', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Emergency Care', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature5',
                        'label' => __('Feature 5', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Pharmacy Support', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'feature6',
                        'label' => __('Feature 6', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('Outdoor Checkup', 'kingcomposer'),
                    ),                                                            

                ),
                

                                
                'extra class' => array(

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


function nilima_fluid_section_one_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'description' => '',
        'feature1'  => '',
        'feature2'  => '',
        'feature3'  => '',
        'feature4'  => '',
        'feature5'  => '',
        'feature6'  => '',
        'image'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    $image = wp_get_attachment_image_src( $image, 'full' );

    $output ='';
           
    $feature1_html = !empty($feature1) ? '<li>'.$feature1.'</li>' : '';              
    $feature2_html = !empty($feature2) ? '<li>'.$feature2.'</li>' : '';              
    $feature3_html = !empty($feature3) ? '<li>'.$feature3.'</li>' : '';              
    $feature4_html = !empty($feature4) ? '<li>'.$feature4.'</li>' : '';              
    $feature5_html = !empty($feature5) ? '<li>'.$feature5.'</li>' : '';              
    $feature6_html = !empty($feature6) ? '<li>'.$feature6.'</li>' : '';              
            
       
        
    $output ='<section class="fluid-section-one '.$extraclass.'">
        <div class="outer-container clearfix">
            <div class="content-column">
                <div class="inner-box">
                    <div class="sec-title"> 
                        <h2>'.$title.' <span>'.$title_hlt.'</span></h2>
                        <div class="separator"><span class="fa fa-plus"></span></div>
                    </div>
                    <div class="content">
                        <p>'.$description.'</p>
                    </div>

                    <div class="choose-info row clearfix">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="services-list">
                                '.$feature1_html.'
                                '.$feature2_html.'
                                '.$feature3_html.'
                            </ul>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="services-list">
                                '.$feature4_html.'
                                '.$feature5_html.'
                                '.$feature6_html.'
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="image-column" style="background-image:url('.$image[0].');">
                <figure class="image-box"><img src="'.$image[0].'" alt=""></figure>
            </div>
        </div>
    </section>';



        return $output;
}


add_shortcode('nilima_fluid_section_one', 'nilima_fluid_section_one_shortcode');