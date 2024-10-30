<?php

add_action('init', 'nilima_call_to_action_params', 99 );
 
function nilima_call_to_action_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_call_to_action' => array(
                'name' => 'Call to Action',
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
                        'value' => __('medical-2', 'kingcomposer')
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
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
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


function nilima_call_to_action_shortcode($atts, $content = null){
    extract( shortcode_atts( array(

        'icon'          => '',
        'title'         => '',
        'description'   => '',
        'add_btn'       => '',
        'btn_text'      => '',
        'btn_url'       => '',
        'title_font_size'    => '',
        'desc_font_size'    => '',
        'icon_color'    => '',
        'title_color'    => '',
        'desc_color'    => '',                
        'extraclass'    => '',
        
    ), $atts) );
    
    
    
    
    $title = !empty($title) ? $title : '';   
    $icon = !empty($icon) ? $icon : '';
    
    $link_html = '';
    if (!empty($btn_url) && !empty($btn_text)){
        $link_html = '<div class="btn-box"><a href="'.$btn_url.'" class="theme-btn btn-style-two"><i>+</i> '.$btn_text.'</a></div>';
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
    
    $desc_styles = '';
    if(!empty($desc_font_size)){
        $desc_styles .= ' font-size: '.$desc_font_size.'px; ';
    }    
    if(!empty($desc_color)){
        $desc_styles .= ' color: '.$desc_color.'; ';
    }    
           
    
    $output ='';
           
    $output ='<div class="call-to-action '.$extraclass.'">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="title-box">
                            <span style="color: '.$icon_color.'" class="icon flaticon-'.$icon.'"></span>
                            <h2 style="'.$heading_styles.'">'.$title.'</h2>
                            <p style="'.$desc_styles.'">'.$description.'</p>
                        </div>
                        '.$link_html.'
                    </div>
                </div>
            </div>';



    return $output;
}


add_shortcode('nilima_call_to_action', 'nilima_call_to_action_shortcode');