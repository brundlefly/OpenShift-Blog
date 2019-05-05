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
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.css', array(), '1.8.1');
    //wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/js/slick/slick-theme.css', array(), '1.8.1');

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.4.0.min.js', array(), '3.4.0');
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), '1.8.1');

    wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0.0');

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


function openshift_infinite_scroll_init(){
  add_theme_support( 'infinite-scroll', array(
   'container' => 'blog-timeline',
   'footer' => 'page',
  ) );
}

add_action( 'after_setup_theme', 'openshift_infinite_scroll_init' );


// Home "Sliders"

function openshift_home_slider($category = null, &$exclude_array){

  if($category != null){
    query_posts( array(
        'posts_per_page' => 3,
        'post__not_in' => $exclude_array
      )
    );
  } else {
    query_posts( array(
        'posts_per_page' => 3,
        'category_name' => $category,
        'post__not_in' => $exclude_array
      )
    );
  }

  while ( have_posts() ) : the_post();

    $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
    $get_the_image = get_the_image(array( 'width' => '300', 'height' => '300', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
    if ( !empty( $img_url )) {
      $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'home-thumb');
    } elseif(!empty($get_the_image)) {
      $thumb = get_the_image(array( 'width' => '300', 'height' => '300', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
      $thumb_url = $thumb['src'];
    } else {
      $thumb_url = get_stylesheet_directory_uri() . '/assets/img/placeholder.jpg';
    }

    $exclude_array[] = get_the_ID();

    ?>
    <a href="<?php the_permalink(); ?>" class="post" style="background-image: url(<?= $thumb_url; ?>) !important; background-size: cover; background-position: center;">
      <div class="headline-wrapper">
        <h1><?php the_title(); ?></h1>
        <p><?php the_author(); ?> | <?php the_date(); ?></p>
      </div>
    </a>

    <?php

  endwhile;
  wp_reset_query();

}







