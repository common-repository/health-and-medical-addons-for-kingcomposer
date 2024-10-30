<?php

add_action('init', 'nilima_timetable_params', 99 );
 
function nilima_timetable_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_timetable' => array(
                'name' => 'Timetable',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
                
                'General' => array(                
            
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
                        'type'            => 'group',
                        'label'           => __('Day - Time', 'KingComposer'),
                        'name'            => 'daytimes',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new day-time', 'kingcomposer' ) ),
                        
                        'params' => array(
                            array(
                                'name' => 'day',
                                'label' => __('Day', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer'),
                            ),
                            array(
                                'name' => 'time',
                                'label' => __('Time', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                                                                                                                                
                        ),
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


function nilima_timetable_shortcode($atts, $content = null){
    extract( shortcode_atts( array(

        'title'         => '',
        'description'   => '',
        'daytimes'      => '',           
        'extraclass'    => '',
        
    ), $atts) );
    
    
    
    
    $title = !empty($title) ? $title : '';       
    $description = !empty($description) ? $description : '';       
           
    
    $output ='';
           
    $output ='<div class="'.$extraclass.'">
                <div class="auto-container">
                    <div class="row clearfix">';
        
    $output ='<div class="timetable-column">
                <div class="timetable">
                    <h3>'.$title.'</h3>
                    <p>'.$description.'</p>
                    <ul>';
                    
                            
    $daytimes = $atts['daytimes'];
    if( isset( $daytimes ) ){
        foreach( $daytimes as $daytime ){
            $output .= '<li>'.$daytime->day.' <span>'.$daytime->time.'</span></li>';
        }
    }
    
    $output .= '</ul></div></div>';          
            
    $output .='</div></div></div>';



    return $output;
}


add_shortcode('nilima_timetable', 'nilima_timetable_shortcode');