<?php

add_action('init', 'nilima_gallery_shortcode_init', 99 );
 
function nilima_gallery_shortcode_init(){
 
    global $kc;
    $kc->add_map(
        array(
            'nilima_gallery' => array(
                'name' => 'Gallery',
                'icon' => 'akc_before_after_icon',
                'css_box' => true,
                'category' => 'Nilima Theme',
                'params' => array(
            
                    array(
                        'name' => 'images',
                        'label' => 'Gallery Images',
                        'type' => 'attach_images',
                        "description" => __("Select multiple images from media library.", "kingcomposer")
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
                    
                )
            )
        )
    );
} 


// Register Before After Shortcode
function nilima_gallery_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'images'  => '',
        'add_btn'  => '',
        'btn_text'  => '',
        'btn_url'  => '',        
        'extraclass'    => '',
        
    ), $atts) );
    
    


    $output ='';
    
    $btn_html = !empty($btn_text) ? '<a href="'.$btn_url.'" class="theme-btn btn-style-two"><i class="fa fa-user-md"></i>'.$btn_text.'</a>' : '';
                 
    $output .='<div class="mixitup-gallery project-section '.$extraclass.'">
                <div class="filter-list row clearfix">';
                
    if( !empty( $images ) )
        $images 	= explode( ',', $images );

    if ( is_array( $images ) && !empty( $images ) ) {

        foreach( $images as $image_id ){

            $attachment_data[] = wp_get_attachment_image_src( $image_id, 'full');

        }
    }

    $i = 0;
    foreach( $attachment_data as $i => $image ){
        
        $output .= '<div class="project-block mix col-md-4 col-sm-6 col-xs-12">
                        <div class="image-box">
                            <figure><img src="'.$image[0].'" alt=""></figure>
                            <a href="'.$image[0].'" class="lightbox-image" data-fancybox="Gallery"><span class="fa fa-arrows-alt"></span></a>
                        </div>
                    </div>';                
    
    $i++;    
    }
                               
    $output .='</div><div class="btn-box">
                    '.$btn_html.'
                </div>';

    return $output;
}


add_shortcode('nilima_gallery', 'nilima_gallery_shortcode');