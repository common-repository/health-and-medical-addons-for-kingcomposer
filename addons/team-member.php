<?php

add_action('init', 'nilima_team_member_params', 99 );
 
function nilima_team_member_params(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_team_member' => array(
                'name' => 'Team Member',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
            
                'general' => array(
                    array(
                        'name' => 'image',
                        'label' => 'Member Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library.", "kingcomposer")
                    ),
                    
                    array(
                        'name' => 'name',
                        'label' => __('Member Name', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'designation',
                        'label' => __('Memeber Designation', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'link',
                        'label' => __('Add Link', 'kingcomposer'),
                        'type' => 'link',
                        'description' => __('Add internal or external link', 'kingcomposer')
                    ),                                        
                    array(
                        'name' => 'facebook',
                        'label' => __('Facebook URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'twitter',
                        'label' => __('Twitter URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'google_plus',
                        'label' => __('Google Plus URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'instagram',
                        'label' => __('Instagram URL', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    
                ),
                
                'Styling' => array(
                    array(
                        'type' 			=> 'number_slider',
                        'label' 		=> __( 'Name Font Size', 'kingcomposer' ),
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
                        'label' 		=> __( 'Designation Font Size', 'kingcomposer' ),
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
                        'label' => __('Name Color', 'kingcomposer'),
                        'type' => 'color_picker',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer')
                    ),
                    array(
                        'name' => 'desc_color',
                        'label' => __('Designation Color', 'kingcomposer'),
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


function nilima_team_member_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'image' => '',
        'name' => '',
        'designation' => '',
        'link'  => '',
        'facebook' => '',
        'twitter' => '',
        'google_plus' => '',
        'instagram'  => '',
        'title_font_size' => '',
        'desc_font_size'=> '',
        'title_color' => '',
        'desc_color' => '',        
        'extraclass' => '',
        
    ), $atts) );
    
    
    $image = wp_get_attachment_image_src( $image, 'full' );
    $link    = kc_parse_link($link);
    
    
    $link_html = '';
    if (!empty($link['url'])){
        $link_html = '<a href="'.$link['url'].'">'.$name.'</a>';
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
    
    $social_html = '';
    $social_html .= !empty($facebook) ? '<li><a href="'.$facebook.'" class="fab fa-facebook-f"></a></li>' : '';             
    $social_html .= !empty($twitter) ? '<li><a href="'.$facebook.'" class="fab fa-twitter"></a></li>' : '';             
    $social_html .= !empty($google_plus) ? '<li><a href="'.$facebook.'" class="fab fa-google-plus"></a></li>' : '';             
    $social_html .= !empty($instagram) ? '<li><a href="'.$instagram.'" class="fab fa-instagram"></a></li>' : '';             
       
        
    $output ='<div class="team-block '.$extraclass.'">
                    <div class="inner-box">
                        <div class="image-box">
                            <img src="'.$image[0].'" alt="">
                            <ul class="social-links">
                                '.$social_html.'
                            </ul>
                        </div>
                        <div class="info-box">
                            <h3 style="'.$heading_styles.'">'.$link_html.'</h3>
                            <span class="designation" style="'.$desc_styles.'">'.$designation.'</span>
                        </div>
                    </div>
                </div>';



    return $output;
}


add_shortcode('nilima_team_member', 'nilima_team_member_shortcode');