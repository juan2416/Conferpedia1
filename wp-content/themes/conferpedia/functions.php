<?php
/**
 * Created by PhpStorm.
 * User: JuanMiguel
 * Date: 07/04/16
 * Time: 10:37 PM
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'twentyfifteen-css', get_template_directory_uri() . '/style.css' );
}