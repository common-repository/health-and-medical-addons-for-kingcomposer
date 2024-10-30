<?php

add_action('init', 'nilima_heading_params', 99 );
 
function nilima_heading_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_heading' => array(
                'name' => 'Heading',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
            
                array(
                    'name' => 'title',
                    'label' => __('Title', 'kingcomposer'),
                    'type' => 'text',
                    'description' => __('', 'kingcomposer'),
                ),
                array(
                    'name' => 'title_hlt',
                    'label' => __('Title Highlight', 'kingcomposer'),
                    'type' => 'text',
                    'description' => __('highlight text after the title', 'kingcomposer'),
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


function nilima_heading_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'title'  => '',
        'title_hlt'  => '',
        'extraclass'    => '',
        
    ), $atts) );
    
    
    $title = !empty($title) ? $title : '';   
    $title_hlt = !empty($title_hlt) ? $title_hlt : '';   
    
    $output ='';
       
        
    $output ='<div class="sec-title text-center '.$extraclass.'">
                <h2>'.$title.' <span>'.$title_hlt.'</span></h2>
                <div class="separator"><span class="fa fa-plus"></span></div>
            </div>';



        return $output;
}


add_shortcode('nilima_heading', 'nilima_heading_shortcode');