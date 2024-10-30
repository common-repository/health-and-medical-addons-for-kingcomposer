<?php

/*
Plugin Name: Health and Medical Addons for KingComposer
Plugin URI: https://codenpy.com/item/nilima-health-medical-wordpress-theme/
Description: Build amazing professional health and medical websites with tons of powerfull addons. 24+ addons with one plugin.
Author: themebon
Author URI: https://codenpy.com
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


// Admin Style CSS
function nilima_admin_enqeue() {
    
    wp_enqueue_style( 'nilima_admin_css', plugins_url( '/assets/admin/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'nilima_admin_enqeue' );


if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
    
    //Loading Scripts
    function nilima_addons_styles() {
        
        // CSS
        wp_enqueue_style('nilima-flaticon-icon', plugins_url( '/assets/css/flaticon.css' , __FILE__ ) );
        wp_enqueue_style('nilima-hover', plugins_url( '/assets/css/hover.css' , __FILE__ ) );
        wp_enqueue_style('nilima-fancybox', plugins_url( '/assets/css/jquery.fancybox.min.css' , __FILE__ ) );
        wp_enqueue_style('nilima-owl-carousel', plugins_url( '/assets/css/owl.css' , __FILE__ ) );
        wp_enqueue_style('nilima-style', plugins_url( '/assets/css/style.css' , __FILE__ ) );
        wp_enqueue_style('nilima-custom', plugins_url( '/assets/css/custom.css' , __FILE__ ) );
        wp_enqueue_style('nilima-responsive', plugins_url( '/assets/css/responsive.css' , __FILE__ ) );
        
        // JS
        wp_enqueue_script('nilima-jquery-appear-js', plugins_url('/assets/js/appear.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('nilima-fancybox-js', plugins_url('/assets/js/jquery.fancybox.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('nilima-mixitup-js', plugins_url('/assets/js/mixitup.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('nilima-owl-js', plugins_url('/assets/js/owl.js', __FILE__), array('jquery'),'', true);
        wp_enqueue_script('nilima-custom-js', plugins_url('/assets/js/custom.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('nilima-script-js', plugins_url('/assets/js/script.js', __FILE__), array('jquery'), false, true);
 
 
    }
    add_action( 'wp_enqueue_scripts', 'nilima_addons_styles' );
    

    // loading Addons
    require_once ( 'addons/index.php' );
    
} 


add_action( 'admin_init', 'nilima_required_plugin' );
function nilima_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notices', 'nilima_required_plugin_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function nilima_required_plugin_notice(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}
?>