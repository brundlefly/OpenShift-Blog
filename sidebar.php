<div id="sidebar">
	<div class="recent-articles">
		<h2>Recent Articles</h2>
		<?php query_posts( 'posts_per_page=5' ); ?>
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="article">
		      <?php
		        $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'recent-thumb');
		        if(!$post_thumbnail) {
		          $get_the_image = get_the_image(array( 'width' => '100', 'height' => '100', 'image_class' => 'pull-left', 'scan' => true, 'link' => false ));
		        } else {
		        	the_post_thumbnail('recent-thumb');
		        }
		      ?>
	          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	          <div class="description">
	          	<?php the_excerpt(); ?>
	          </div>
	      </div>
	  	<?php endwhile; ?>
	</div>

	<ul>
		<?php dynamic_sidebar( 'article-sidebar' ); ?> 
	</ul>
</div>