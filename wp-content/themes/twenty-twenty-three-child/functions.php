<?php


add_action( 'wp_enqueue_scripts', 'twenty_twenty_three_child_enqueue_styles' );
function twenty_twenty_three_child_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'test-style', get_stylesheet_directory_uri() . '/test-shortcode/test.css' ,array('parent-style'));

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_script('bootstrap-script','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',null, true);
    wp_enqueue_script('test-script',get_stylesheet_directory_uri() . '/test-shortcode/test.js', array('bootstrap-script'),null,true);
}



add_shortcode('r_test','showTest');

function showTest($atts, $content){

    ob_start();
    include('test-shortcode/test.html');
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
}

?>