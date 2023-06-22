<?php

function mes_styles_scripts() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('compositon-style', get_stylesheet_directory_uri() . '/js.jquery.js');
}
add_action( 'wp_enqueue_scripts', 'mes_styles_scripts');
