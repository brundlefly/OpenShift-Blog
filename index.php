<?php get_header(); ?>

  <div class="home featured-posts">
  	<?php query_posts( 'posts_per_page=2' ); ?>
  	<?php while ( have_posts() ) : the_post();

          $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
          if ( !empty( $img_url )) {
            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'home-thumb');
          } else {
            $thumb = get_the_image(array( 'width' => '300', 'height' => '300', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
            $thumb_url = $thumb['src'];
          }

    ?>

	  	<a href="<?php the_permalink(); ?>" class="post">
        <div class="thumb" style="background-image: url(<?= $thumb_url; ?>) !important; background-size: cover; background-position: center;">
        </div>
        <div class="headline-wrapper">
          <h1><?php the_title(); ?></h1>
        </div>
	  	</a>

	   <?php endwhile; ?>
  </div>

  <div class="home category-posts">
    <div class="recent-posts category">
      
      <h2>Recent Posts</h2>
      <?php query_posts( 'posts_per_page=3' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
          $get_the_image = get_the_post_thumbnail_url(get_the_ID(), 'home-thumb');
          if(!$get_the_image) {
            $get_the_image = get_the_image(array( 'width' => '600px', 'height' => '300px', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
            $get_the_image = $get_the_image['src'];
          }
        ?>
        <a href="<?php the_permalink(); ?>" class="post" style="background-image: url(<?= $get_the_image; ?>) !important; background-size: cover; background-position: center;">
          <div class="headline-wrapper">
            <h1><?php the_title(); ?></h1>
          </div>
        </a>
       <?php endwhile; ?>
    </div>
    <div class="recent-posts category">
      <h2>Partner News</h2>
      <?php query_posts( 'posts_per_page=3' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          $get_the_image = get_the_post_thumbnail_url(get_the_ID(), 'home-thumb');
          if(!$get_the_image) {
            $get_the_image = get_the_image(array( 'width' => '600px', 'height' => '300px', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
            $get_the_image = $get_the_image['src'];
          }
        ?>
        <a href="<?php the_permalink(); ?>" class="post" style="background-image: url(<?= $get_the_image; ?>) !important; background-size: cover;">
          <div class="headline-wrapper">
            <h1><?php the_title(); ?></h1>
          </div>
        </a>
       <?php endwhile; ?>
    </div>
    <div class="recent-posts category">
      <h2>Elsewhere at Redhat</h2>
      <?php query_posts( 'posts_per_page=3' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          $get_the_image = get_the_post_thumbnail_url(get_the_ID(), 'home-thumb');
          if(!$get_the_image) {
            $get_the_image = get_the_image(array( 'width' => '600px', 'height' => '300px', 'image_class' => 'pull-left', 'scan' => true, 'link' => false, 'format' => 'array' ));
            $get_the_image = $get_the_image['src'];
          }
        ?>
        <a href="<?php the_permalink(); ?>" class="post" style="background-image: url(<?= $get_the_image; ?>) !important; background-size: cover;">
          <div class="headline-wrapper">
            <h1><?php the_title(); ?></h1>
          </div>
        </a>
       <?php endwhile; ?>
    </div>
  </div>
  <?php get_footer(); ?>