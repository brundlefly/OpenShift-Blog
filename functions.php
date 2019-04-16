<?php

$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/config.php',          // Configuration
  'lib/nav.php',             // Custom nav modifications
  'lib/scripts.php',         // Scripts and stylesheets
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function openshift_styles() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action( 'wp_enqueue_scripts', 'openshift_styles' );

add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' ); 

add_action('after_setup_theme', function() {
  add_image_size( 'home-thumb', 300, 300, array( 'center', 'center' ) );
});

add_image_size( 'recent-thumb', 100, 100, true );


$args = array(
  'name'          => sprintf( __( 'Article Sidebar' )),
  'id'            => "article-sidebar",
  'description'   => '',
  'class'         => '',
  'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget'  => "</li>\n",
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => "</h2>\n",
);
register_sidebar( $args );