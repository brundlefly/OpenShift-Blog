<?php get_header(); ?>

<div id="post-content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php the_post_thumbnail(); ?>

		<h1 class="post-title"><?php the_title(); ?></h1>

		<div class="meta">
			<?php the_time('F j, Y'); ?> | By <?php the_author_link(); ?> 
		</div>

		<?php the_content(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>