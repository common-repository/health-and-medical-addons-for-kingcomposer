<?php

add_action('init', 'nilima_call_to_action_two_params', 99 );
 
function nilima_call_to_action_two_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_call_to_action_two' => array(
                'name' => 'Call to Action Two',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
                
                'General' => array(                
                            
                    array(
                        'name' => 'title',
                        'label' => __('Text', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                    ),
                    array(
                        'type'			=> 'toggle',
                        'label'			=> __( 'Add Button', 'kingcomposer' ),
                        'name'			=> 'add_btn',
                        'description'	=> __( '', 'kingcomposer' ),
                        'value'			=> 'yes'
                    ), 
                    array(
                        'name' => 'btn_text',
                        'label' => __('Button Text', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    array(
                        'name' => 'btn_url',
                        'label' => __('Button URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'relation'		=> array(
                            'parent'	=> 'add_btn',
                            'show_when'	=> 'yes'
                        )
                    ),
                    
                ),
                

                'Styling' => array(
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Text Font Size', 'kingcomposer' ),
                        'name' 			=> 'title_font_size',
                        'value'			=> 20,
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                            'show_input' => true
                        ),

                    ),                                    
                    array(
                        'name' => 'title_color',
                        'label' => __('Text Color', 'kingcomposer'),
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


function nilima_call_to_action_two_shortcode($atts, $content = null){
    extract( shortcode_atts( array(

        'title'         => '',
        'add_btn'       => '',
        'btn_text'      => '',
        'btn_url'       => '',
        'title_font_size' => '',
        'title_color'    => '',              
        'extraclass'    => '',
        
    ), $atts) );
    
    
    
    
    $title = !empty($title) ? $title : '';   
    
    $link_html = '';
    if (!empty($btn_url) && !empty($btn_text)){
        $link_html = '<a href="'.$btn_url.'" class="call-btn">'.$btn_text.'</a>';
    }else{
        $link_html = '';
    }
    
    $heading_styles = '';     
    if(!empty($title_font_size)){
        $heading_styles .= ' font-size: '.$title_font_size.'px; ';
    }    
    if(!empty($title_color)){
        $heading_styles .= ' color: '.$title_color.'; ';
    }    
           
    
    $output ='';
           
    $output ='<div class="subscribe-section '.$extraclass.'">
                <div class="inner-container clearfix">
                <h3>'.$title.'</h3>
                '.$link_html.'
            </div></div>';



    return $output;
}


add_shortcode('nilima_call_to_action_two', 'nilima_call_to_action_two_shortcode');