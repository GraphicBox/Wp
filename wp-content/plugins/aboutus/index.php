<?php
/*
Plugin Name: About us
*/

add_action('admin_menu','aboutus');
function aboutus() {
    add_menu_page('About us','About us','manage_options','aboutus/aboutus.php');
}

function enqueue_our_required_stylesheets(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
}
add_action('admin_init','enqueue_our_required_stylesheets');

function your_css_and_js() {
    wp_register_style('your_css_and_js',plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('your_css_and_js');
}
add_action('admin_init','your_css_and_js');

function your_css_and_js2() {
    wp_register_script('your_css_and_js2',plugins_url('javascript.js',__FILE__ ));
    wp_enqueue_script('your_css_and_js2');
}
add_action('admin_init','your_css_and_js2');

?>