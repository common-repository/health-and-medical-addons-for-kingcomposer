<?php

add_action('init', 'nilima_counter_params', 99 );
 
function nilima_counter_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_counter' => array(
                'name' => 'Counter',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
                
                'general' => array(
                
                    array(
                        'type'            => 'group',
                        'label'            => __('Counter Items', 'KingComposer'),
                        'name'            => 'counter_items',
                        'description'    => __( 'Repeat this fields', 'KingComposer' ),
                        'options'     => array( 'add_text' => __( 'Add more counter', 'kingcomposer' ) ),                
                        
                        'params' => array(
                        
                            array(
                                'name' => 'icon',
                                'type' => 'text',
                                'label' => __('Icon Name', 'kingcomposer'),
                                'description' => __('Insert icon name', 'kingcomposer'),
                                'value' => __('', 'kingcomposer')
                            ),            
                            array(
                                'name' => 'value',
                                'label' => __('Counter Value', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer'),
                            ),
                            array(
                                'name' => 'c_text',
                                'label' => __('Text', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer'),
                            ),                                              

                        ),
                    ),
                                                                            
                ),

                'Styling' => array(
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Value Font Size', 'kingcomposer' ),
                        'name' 			=> 'value_font_size',
                        'value'			=> 30,
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                            'show_input' => true
                        ),

                    ),
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Description Font Size', 'kingcomposer' ),
                        'name' 			=> 'text_font_size',
                        'value'			=> 20,
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
                        'name' => 'value_color',
                        'label' => __('Value Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'text_color',
                        'label' => __('Text Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
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


function nilima_counter_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'counter_items'  => '',
        'value_font_size'    => '',
        'text_font_size'    => '',
        'icon_color'    => '',
        'value_color'    => '',
        'text_color'    => '',        
        'extraclass'    => '',
        
    ), $atts) );


    $output ='';
       
    
    $heading_styles = '';     
    if(!empty($value_font_size)){
        $heading_styles .= ' font-size: '.$value_font_size.'px; ';
    }    
    if(!empty($value_color)){
        $heading_styles .= ' color: '.$value_color.'; ';
    }
    
    $desc_styles = '';
    if(!empty($text_font_size)){
        $desc_styles .= ' font-size: '.$text_font_size.'px; ';
    }    
    if(!empty($text_color)){
        $desc_styles .= ' color: '.$text_color.'; ';
    }    
        
    $output ='<section class="fun-fact-section '.$extraclass.'">
                <div class="auto-container">
                    <div class="row clearfix">';


    $counter_items = $atts['counter_items'];
    if( isset( $counter_items ) ){
        foreach( $counter_items as $counter_item ){

            $output .= '<div class="counter-column col-md-3 col-sm-6 col-xs-12">
                            <div class="count-box">
                                <span style="color: '.$icon_color.'" class="icon flaticon-'.$counter_item->icon.'"></span>
                                <span style="'.$heading_styles.'" class="count-text" data-speed="3000" data-stop="'.$counter_item->value.'">0</span>+
                                <h4 style="'.$desc_styles.'" class="counter-title">'.$counter_item->c_text.'</h4>
                            </div>
                        </div>';  
            
            
        }
    }




    $output .='</div></div></section>';
    
    
    return $output;
}


add_shortcode('nilima_counter', 'nilima_counter_shortcode');