<?php

function nilima_icons_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
    
        'extraclass'    => '',
        
    ), $atts) );
    
    
    $output ='';
       
        
    $output .='<div class="icon-box">
                <ul>
                    <li><i class="icon flaticon-scientist"></i><h4>scientist</h4></li>
                    <li><i class="icon flaticon-pediatrician"></i><h4>pediatrician</h4></li>
                    <li><i class="icon flaticon-vagina"></i><h4>vagina</h4></li>
                    <li><i class="icon flaticon-surgeon"></i><h4>surgeon</h4></li>
                    <li><i class="icon flaticon-success"></i><h4>success</h4></li>
                    <li><i class="icon flaticon-people-1"></i><h4>people-1</h4></li>
                    <li><i class="icon flaticon-multiple-users-silhouette"></i><h4>multiple-users-silhouette</h4></li>
                    <li><i class="icon flaticon-doctor-1"></i><h4>doctor-1</h4></li>
                    <li><i class="icon flaticon-doctor"></i><h4>doctor</h4></li>
                    <li><i class="icon flaticon-pharmacy"></i><h4>pharmacy</h4></li>
                    <li><i class="icon flaticon-medical-4"></i><h4>medical-4</h4></li>
                    <li><i class="icon flaticon-blood-test"></i><h4>blood-test</h4></li>
                    <li><i class="icon flaticon-test-tube-flask-and-drop-of-blood"></i><h4>test-tube-flask-and-drop-of-blood</h4></li>
                    <li><i class="icon flaticon-ambulance-1"></i><h4>ambulance-1</h4></li>
                    <li><i class="icon flaticon-ambulance"></i><h4>ambulance</h4></li>
                    <li><i class="icon flaticon-medical-operation"></i><h4>medical-operation</h4></li>
                    <li><i class="icon flaticon-stethoscope"></i><h4>stethoscope</h4></li>
                    <li><i class="icon flaticon-kidneys"></i><h4>kidneys</h4></li>
                    <li><i class="icon flaticon-medical-3"></i><h4>medical-3</h4></li>
                    <li><i class="icon flaticon-shape-1"></i><h4>shape-1</h4></li>
                    <li><i class="icon flaticon-brain"></i><h4>brain</h4></li>
                    <li><i class="icon flaticon-add-1"></i><h4>add-1</h4></li>
                    <li><i class="icon flaticon-medical-2"></i><h4>medical-2</h4></li>
                    <li><i class="icon flaticon-medical-1"></i><h4>medical-1</h4></li>
                    <li><i class="icon flaticon-first-aid-kit-1"></i><h4>first-aid-kit-1</h4></li>
                    <li><i class="icon flaticon-worldwide"></i><h4>worldwide</h4></li>
                    <li><i class="icon flaticon-time"></i><h4>time</h4></li>
                    <li><i class="icon flaticon-wall-clock"></i><h4>wall-clock</h4></li>
                    <li><i class="icon flaticon-phone-call"></i><h4>phone-call</h4></li>
                    <li><i class="icon flaticon-phone-1"></i><h4>phone-1</h4></li>
                    <li><i class="icon flaticon-gear"></i><h4>gear</h4></li>
                    <li><i class="icon flaticon-settings-4"></i><h4>settings-4</h4></li>
                    <li><i class="icon flaticon-target-1"></i><h4>target-1</h4></li>
                    <li><i class="icon flaticon-settings-3"></i><h4>settings-3</h4></li>
                    <li><i class="icon flaticon-search-1"></i><h4>search-1</h4></li>
                    <li><i class="icon flaticon-handshake-1"></i><h4>handshake-1</h4></li>
                    <li><i class="icon flaticon-deal"></i><h4>deal</h4></li>
                    <li><i class="icon flaticon-maintenance"></i><h4>maintenance</h4></li>
                    <li><i class="icon flaticon-shopping-cart-2"></i><h4>shopping-cart-2</h4></li>
                </ul>
            </div>';
            
            
            

    $output .='<style>
                .icon-box ul li {
                    list-style: none;
                    width: 270px;
                    display: inline-flex;
                }
                .icon-box ul li i {
                    font-size: 36px;
                    padding-right: 10px;
                    color: #00aeef;
                }
                .icon-box ul li h4{
                    font-size: 16px;
                }

            </style>';

    return $output;
}


add_shortcode('nilima_icons', 'nilima_icons_shortcode');