<?php

add_action('init', 'nilima_about_shortcode_init', 99 );
 
function nilima_about_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_about' => array(
                'name' => 'About',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
                                
                
                'Image Column' => array(
                
                    array(
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => 'attach_image',
                        "description" => __("Select image from media library for before.", "kingcomposer")
                    ),                

                ),                
                
                'Features Column' => array(
                    array(
                        'name' => 'title',
                        'label' => __('Title', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'name' => 'title_hlt',
                        'label' => __('Title Highlight', 'kingcomposer'),
                        'type' => 'text',
                        'description' => __('highlight text after the title', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),                    
                    array(
                        'name' => 'description',
                        'label' => __('Description', 'kingcomposer'),
                        'type' => 'textarea',
                        'description' => __('', 'kingcomposer'),
                        'value' => __('', 'kingcomposer'),
                    ),
                    array(
                        'type'            => 'group',
                        'label'           => __('Features', 'KingComposer'),
                        'name'            => 'features',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new feature', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'icon',
                                'label' => 'Icon',
                                'type' => 'icon_picker',
                                "description" => __("Use font awesome icon.", "kingcomposer")
                            ),
                            array(
                                'name' => 'title',
                                'label' => __('Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                               
                            array(
                                'name' => 'desc',
                                'label' => __('Content', 'kingcomposer'),
                                'type' => 'textarea',
                                'value' => __('', 'kingcomposer'),
                            ),                                                                                                
                        ),
                    ),


                ),
                
                'Info Block' => array(
                    array(
                        'type'            => 'group',
                        'label'           => __('Info', 'KingComposer'),
                        'name'            => 'infos',
                        'description'     => __( 'Repeat this fields', 'KingComposer' ),
                        'options'         => array( 'add_text' => __( 'Add new info', 'kingcomposer' ) ),
                        
                        'params' => array(

                            array(
                                'name' => 'icon',
                                'label' => 'Icon',
                                'type' => 'icon_picker',
                                "description" => __("Use font awesome icon.", "kingcomposer")
                            ),
                            array(
                                'name' => 'title',
                                'label' => __('Title', 'kingcomposer'),
                                'type' => 'text',
                                'description' => __('', 'kingcomposer')
                            ),                                               
                            array(
                                'name' => 'desc',
                                'label' => __('Content', 'kingcomposer'),
                                'type' => 'textarea',
                                'value' => __('', 'kingcomposer'),
                            ),                                                                                                
                        ),
                    ),


                ),
                
                                                                
                'Extra Class' => array(                    
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


function nilima_about_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'image'         => '',
        'title'         => '',
        'title_hlt'     => '',
        'description'   => '',
        'features'      => '',
        'infos'         => '',        
        'extraclass'    => '',
        
    ), $atts) );
    

    $image = wp_get_attachment_image_src( $image, 'full' );


    $output ='';
                        
        
    $output .='<div class="about-us '.$extraclass.'">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="feature-column pull-right col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>'.$title.' <span>'.$title_hlt.'</span></h2>
                            <div class="separator"><span class="fa fa-plus"></span></div>
                            <p>'.$description.'</p>
                        </div>

                        <div class="row clearfix">';
                        

    $features = $atts['features'];
    if( isset( $features ) ){
        foreach( $features as $feature ){
            
            $output .='<div class="featrue-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="fa '.$feature->icon.'"></span></div>
                                <h3>'.$feature->title.'</h3>
                                <p>'.$feature->desc.' </p>
                            </div>
                        </div>';
         
         
        }
    }                        


    $output .='</div>
                    </div>
                </div>
                <div class="image-column col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        <figure><img src="'.$image[0].'" alt=""></figure>
                    </div>
                </div>
                <div class="info-column col-md-12 col-sm-12 col-xs-12">
                    <div class="row clearfix">';
    
    
    
    $infos = $atts['infos'];
    if( isset( $infos ) ){
        foreach( $infos as $info ){
            
            $output .='<div class="about-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="icon-box"><span class="fa '.$info->icon.'"></span></div>
                                <h4>'.$info->title.'</h4>
                                <p>'.$info->desc.'</p>
                            </div>
                        </div>';
         
         
        }
    }                    


    $output .='</div>
                </div>
            </div>
        </div>
    </div>';


    return $output;
}
add_shortcode('nilima_about', 'nilima_about_shortcode');