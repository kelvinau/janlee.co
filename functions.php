<?php

$PARENT_DIR = get_template_directory_uri();
$CHILD_DIR = get_stylesheet_directory_uri();
function child_enqueue() {
    global $PARENT_DIR, $CHILD_DIR;
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style , "{$PARENT_DIR}/style.css" );
    wp_enqueue_style( 'child-style', "{$CHILD_DIR}/css/custom.css" , array( $parent_style ));

    // TODO: Concatenate these later
    wp_enqueue_script( 'esheep-script', "https://rawgit.com/kelvinau/web-esheep/popover-removed/src/esheep.min.js", array(), false, true );
    wp_enqueue_script( 'child-script', "{$CHILD_DIR}/js/app.js", array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue', 999 );
