<?php

$PARENT_DIR = get_template_directory_uri();
$CHILD_DIR = get_stylesheet_directory_uri();
function child_enqueue() {
    global $PARENT_DIR, $CHILD_DIR;
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style , "{$PARENT_DIR}/style.css" );
    wp_enqueue_style( 'child-style', "{$CHILD_DIR}/css/custom.css" , array( $parent_style ));
}
add_action( 'wp_enqueue_scripts', 'child_enqueue', 999 );

function cyb_add_last_modified_header($headers) {
    //Check if we are in a single post of any type (archive pages has not modified date)
    if( is_singular() ) {
        $post_id = get_queried_object_id();
        if( $post_id ) {
            header("Last-Modified: " . get_the_modified_time("D, d M Y H:i:s", $post_id) );
        }
    }
}
add_action('template_redirect', 'cyb_add_last_modified_header');