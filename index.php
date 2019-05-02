<?php get_header(); ?>

<!-- FEATURED POSTS -->
<div class="home featured-posts">

  <?php

  $exclude_array = array();

  query_posts( array(
    'posts_per_page' => 2,
    'category_name' => 'featured')
);


?>
<?php while ( have_posts() ) : the_post();

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

  $excerpt = get_the_excerpt();
  $excerpt = substr($excerpt,0,200);

  ?>

  <a href="<?php the_permalink(); ?>" class="post">
    <div class="thumb" style="background-image: url(<?= $thumb_url; ?>) !important; background-size: cover; background-position: center;">
    </div>
    <div class="headline-wrapper">
      <h1 class="resize"><?php the_title(); ?></h1>
      <p class="meta resize"><?php the_author(); ?> | <?php the_date(); ?></p>
      <p class="excerpt resize"><?php echo $excerpt; ?>...</p>
    </div>
  </a>

<?php endwhile; ?>

</div>

<div class="home-content">

<!-- Recent Posts -->
<div class="home category-posts">

  <div class="recent-posts category">

    <h2>Recent Posts</h2>

    <div class="category-slider">

      <?php
      query_posts( array(
        'posts_per_page' => 3,
        'post__not_in' => $exclude_array
      )
    );
    ?>
    <?php while ( have_posts() ) : the_post();

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
      <a href="<?php the_permalink(); ?>" class="post item" style="background-image: url(<?= $thumb_url; ?>) !important; background-size: cover; background-position: center;">
        <div class="headline-wrapper">
          <h1><?php the_title(); ?></h1>
        </div>
      </a>
    <?php endwhile; ?>

  </div>

  <div class="operators category">

    <h2>Operators</h2>

    <div class="category-slider">

      <?php openshift_home_slider('operators', $exclude_array); ?>

    </div>

  </div>

<div class="openshift-commons category">

  <h2>OpenShift Commons</h2>

  <div class="category-slider">

    <?php query_posts( array(
      'posts_per_page' => 3,
      'category_name' => 'openshift-commons',
      'post__not_in' => $exclude_array
    )
  );
  ?>
  <?php while ( have_posts() ) : the_post();

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
      </div>
    </a>
  <?php endwhile; ?>

</div>

</div>

<div class="ecosystem category">

  <h2>Openshift Ecosystem</h2>

  <div class="category-slider">

    <?php
    query_posts( array(
      'posts_per_page' => 3,
      'category_name' => 'openshift-ecosystem',
      'post__not_in' => $exclude_array
    )
  );
  ?>
  <?php while ( have_posts() ) : the_post();

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


    ?>
    <a href="<?php the_permalink(); ?>" class="post" style="background-image: url(<?= $thumb_url; ?>) !important; background-size: cover; background-position: center;">
      <div class="headline-wrapper">
        <h1><?php the_title(); ?></h1>
      </div>
    </a>
  <?php endwhile; ?>

</div>

</div>
</div>
</div>
<?php get_footer(); ?>