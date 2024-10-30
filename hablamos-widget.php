<?php

/*
Plugin Name: Click to Speak Fonvirtual
Plugin URI: https://www.fonvirtual.com/click-to-call/
Description: Shortcode para incluir botón que ejecute widget de "Hablamos"
Version: 1.0
Requires at least: 4.9
Requires PHP: 5.6
Author: Fonvirtual Team
Author URI: https://www.fonvirtual.com
License: GPL2
*/



function ctsfv_shortcode($atts, $content = null) {
    $class = isset($atts['class']) ? $atts['class'] : '';
    $widgetId = isset($atts['widgetid']) ? '\'' . $atts['widgetid'] . '\'' : '';
    $analyticsEvent = isset($atts['event']) ? $atts['event']  : 'click';
    $analyticsFunction = '__gaTracker';

    return '<a href="javascript: void(0)" class="' . esc_html($class) . '" onClick="dialogaCS( '. esc_html($widgetId) . ');if (typeof ' . esc_html($analyticsFunction) . ' === \'function\') {' . esc_html($analyticsFunction) . '(\'send\', \'event\', \'widget-click\', \'' . esc_html($analyticsEvent) . '\');}">' . esc_html($content) . '</a>';
}
add_shortcode( 'boton_hablamos', 'ctsfv_shortcode' );


function ctsfv_custom_css() {
    echo '<style type="text/css">
    .cta-button{
    color: #ffffff!important;
    background: #f6343f!important;
    border-color: #ffffff!important;
    padding: .3em 2em .3em .7em;
    border: 2px solid transparent;
    text-decoration: none;
    font-size: 20px;
    font-weight: 500;
    line-height: 1.7em!important;
    position: relative;
    margin:0;
    display: inline-block;
    border-radius: 14px;
}
.cta-button:after{
    margin-left: 0;
    opacity: 1;
    position: absolute;
    text-shadow: none;
    font-size: 32px;
    font-weight: 400;
    font-style: normal;
    font-variant: none;
    line-height: 1em;
    text-transform: none;
    content: "\35";
    -webkit-transition: all .2s;
    -moz-transition: all .2s;
    transition: all .2s;
    speak: none;
    -webkit-font-smoothing: antialiased;
    font-family: ETmodules!important;
}
.floating-button {
    z-index: 9999999999;
    position: fixed;
    bottom: 30px;
    right: 20px;
    border: 0px;
    margin: 0px;
    border-radius: 30px;
    width: 60px;
    height: 60px;
    pointer-events: auto;
    min-width: 0px;
    transform: scale(1);
    box-shadow: rgba(0, 0, 0, 0.8) 1px 1px 3px 1px;
    background-color: #f6343f;
}
.floating-button img {
    margin:11px;
}</style>';
}
add_action('wp_head', 'ctsfv_custom_css');