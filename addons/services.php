<?php

add_action('init', 'nilima_services_params', 99 );
 
function nilima_services_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_services' => array(
                'name' => 'Services',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                
                'params' => array(
                   
                'General' => array(
                    array(
                        'name' => 'icon',
                        'type' => 'text',
                        'label' => __('Icon Name', 'kingcomposer'),
                        'description' => __('Insert icon name', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),               
                    array(
                        'name' => 'description',
                        'label' => __('Content', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('keep blank if you dont want', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'link',
                        'label' => 'Add Link',
                        'type' => 'link',                     
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


function nilima_services_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'icon'  => '',
        'title'  => '',
        'description'  => '',
        'link'  => '',
        'extraclass'    => '',
        
    ), $atts) );


    $link    = kc_parse_link($link);

    $output ='';
    
    $link_html = '';
    if (!empty($link['url'])){
        $link_html = '<a href="'.$link['url'].'">'.$title.'</a>';
    }else{
        $link_html = $title;
    }
   
    $output ='<div class="service-block '.$extraclass.'">
                    <div class="inner-box">
                        <div class="icon-box"><span class="icon flaticon-'.$icon.'"></span></div>
                        <h3>'.$link_html.'</h3>
                        <p>'.$description.'</p>
                    </div>
                </div>';        



    return $output;
}


add_shortcode('nilima_services', 'nilima_services_shortcode');